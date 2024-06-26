<?php
include("included/session_start.php");
include("included/auth.php");
include("controller/EvaluationController.php");
include("controller/MovieInfoController.php");
$eval = new EvaluationController();
$mov_info = new MovieInfoController();

$code = get_session_code();
$day = get_session_day();
$sessions = $mov_info->model[$day];
$session_idx = get_session_session_idx();
$mov_idx = get_session_mov_idx();
$movs = glob($sessions[$session_idx]["glob"]);

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
    <?php
    $php_name = basename(__FILE__);
    include("included/profile.php");
    ?>
    <div id="main-container" class="row">
        <video id="movie" controlsList="nodownload nofullscreen noremoteplayback" oncontextmenu="return false;" onended="endMovie(event)" autoplay="autoplay" style="pointer-events: none;"> // muted="muted" controls="false" 
                <source src="<?php echo $movs[$mov_idx]; ?>" />
        </video>
        <div id="russell">
            <div class="xplus">快</div>
            <div class="xminus">不快</div>
            <div class="yplus">覚醒</div>
            <div class="yminus">眠気</div>
            <div id="russell-rec" onclick="clickRussellRec(event, true)">
                <div class="xaxis"></div>
                <div class="yaxis"></div>
                <div class="time"></div>
            </div>
        </div>
    </div>
</body>
</html>

<?php include("included/js.php"); 
if (count($movs) <= $mov_idx+1 && count($sessions) <= $session_idx+1) {
    $next_php_name = "finish.php";
} else if (count($movs) <= $mov_idx+1) {
    $next_php_name = "rest.php";
} else {
    $next_php_name = "fixation.php";
}
$_SESSION["mov_idx"]++;
?>
<script>
    var params = JSON.parse('<?php echo $params_json; ?>')
    next_php_name = '<?php echo $next_php_name; ?>'
</script>
<script type="text/javascript" src="evaluation.js"></script>
