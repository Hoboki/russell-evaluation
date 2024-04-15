<?php
include("included/session_start.php");
if(isset($_POST["day"])) {
    $day = $_POST["day"];
    $_SESSION["day"] = $day;
    $_SESSION["session_idx"] = 0;
    $_SESSION["mov_idx"] = 0;
} elseif (isset($_SESSION["day"]) && $_SESSION["day"]==0) {
    $_SESSION["day"] = 1;
    $_SESSION["session_idx"] = 0;
    $_SESSION["mov_idx"] = 0;
} else {
    header("Location: day.php");
    exit;
}

if($_SESSION["day"]==0) {
    header("Location: text_explain.php");
    exit;
} else {
    header("Location: movie_explain.php");
    exit;
}
?>
