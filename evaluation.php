<?php
include("included/session_start.php");
include("included/auth.php");
include("controller/EvaluationController.php");
include("controller/MovieInfoController.php");
$eval = new EvaluationController();
$mov_info = new MovieInfoController();
if (isset($_POST["day"])) {
    $_SESSION["day"] = $_POST["day"];
}

if (isset($_POST["session_idx"])) {
    $_SESSION["session_idx"] = $_POST["session_idx"];
}

if (isset($_POST["mov_idx"])) {
    $_SESSION["mov_idx"] = $_POST["mov_idx"];
}

$code = get_session_code();
$day = get_session_day();
$sessions = $mov_info->model[$day];
$session_idx = get_session_session_idx();
$mov_idx = get_session_mov_idx();
$movs = glob($sessions[$session_idx]["glob"]);
if (count($movs) <= $mov_idx && count($sessions) - 1 <= $session_idx) {
    header("Location: finish.php");
    exit;
} else if (count($movs) <= $mov_idx) {
    $_SESSION["session_idx"]++;
    $_SESSION["mov_idx"] = 0;
    header("Location: rest.php");
    exit;
}

$x = $eval->get($code, $mov_info->getSessionID($day, $session_idx) . "_" . $mov_idx . "_x");
$y = $eval->get($code, $mov_info->getSessionID($day, $session_idx) . "_" . $mov_idx . "_y");
$t = $eval->get($code, $mov_info->getSessionID($day, $session_idx) . "_" . $mov_idx . "_t");
$x = !empty($x)? $x : -10000;
$y = !empty($y)? $y : -10000;
$t = !empty($t)? $t : -10000;

$params_json = json_encode(array(
    "code" => $code,
    "mov_idx" => $mov_idx,
    "x" => $x,
    "y" => $y,
    "t" => $t,
));
?>

<?php include("included/declaration.php"); ?>
<head>
    <?php include("included/head.php"); ?>
    <link rel="stylesheet" type="text/css" href="evaluation.css" />
</head>
<body>
    <?php include("included/profile.php"); ?>
    <div class="spacer0200"></div>

    <div id="main-container" class="row">
        <video id="movie" controls="false" controlsList="nodownload nofullscreen noremoteplayback" oncontextmenu="return false;" onended="endMovie(event)" autoplay="autoplay"> // muted="muted"
            <source src="<?php echo $movs[$mov_idx]; ?>" />
        </video>
        <div id="russell">
            <div class="xplus">快</div>
            <div class="xminus">不快</div>
            <div class="yplus">覚醒</div>
            <div class="yminus">眠気</div>
            <div id="russell-rec" onclick="clickRussellRec(event)">
                <div class="xaxis"></div>
                <div class="yaxis"></div>
                <div class="time"></div>
            </div>
        </div>
    </div>

    <form action="evaluation.php" id="btn-next-back-group" class="row" method="post">
        <button type="submit" id="btn-back" name="mov_idx" class="btn btn-outline-success col-4" value="<?php echo max($mov_idx - 1, 0); ?>">戻る</button>
        <div class="col-1"></div>
        <button type="submit" id="btn-back" name="mov_idx" class="btn btn-outline-primary col-7" value="<?php echo $mov_idx + 1; ?>">次へ</button>
    </form>
</body>
</html>

<?php include("included/js.php"); ?>
<script>
    var params = JSON.parse('<?php echo $params_json; ?>')
</script>
<script type="text/javascript" src="evaluation.js"></script>
