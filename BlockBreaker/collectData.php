<?php
include_once('connects.php');

$user_id = $_POST['user_id'];
$game_title = $_POST['game_title'];
$game_score = $_POST['game_score'];

// Check if a record with the same user_id exists
$result = mysqli_query($con, "SELECT game_score FROM game_record WHERE user_id = '$user_id'");
$row = mysqli_fetch_assoc($result);

if ($row) {
    $old_game_score = $row['game_score'];

    if ($game_score > $old_game_score) {
        // If new score is higher, update the record
        $query = "UPDATE game_record SET game_score = ? WHERE user_id = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "is", $game_score, $user_id);
        mysqli_stmt_execute($stmt);
    }
} else {
    // If no record exists, insert a new one
    $query = "INSERT INTO game_record (user_id, game_title, game_score) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "iss", $user_id, $game_title, $game_score);
    mysqli_stmt_execute($stmt);
}

// Close the statement
mysqli_stmt_close($stmt);

// Close the connection
mysqli_close($con);
?>
