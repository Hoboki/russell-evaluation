<?php
include("../included/session_start.php");
include("../controller/EvaluationController.php");
include("../controller/MovieInfoController.php");
$eval = new EvaluationController();
$mov_info = new MovieInfoController();
if (
    isset($_SESSION["code"]) &&
    isset($_POST["mov_idx"])&&
    isset($_POST["x"])&&
    isset($_POST["y"])
) {
    $code = $_SESSION["code"];
    $day = $_SESSION["day"];
    $session_idx = $_SESSION["session_idx"];
    $session_id = $mov_info->getSessionID($day, $session_idx);
    $mov_idx = $_POST["mov_idx"];
    $x = $_POST["x"];
    $y = $_POST["y"];
    $eval->set($code, $session_id . "_" . $mov_idx . "_x", $x);
    $eval->set($code, $session_id . "_" . $mov_idx . "_y", $y);
    $res = array("code" => 200);
} else {
    $res = array("code" => 400);
}
echo json_encode($res);
exit;
