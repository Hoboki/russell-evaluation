<?php
include("included/session_start.php");
include("included/auth.php");
include("controller/EvaluationController.php");
include("controller/MovieInfoController.php");
if($_SESSION["day"]==0) {
    $next_php_name = "text_explain.php";
} else {
    $next_php_name = "movie_explain.php";
}
?>

<?php include("included/declaration.php"); ?>
<head>
    <?php include("included/head.php"); ?>
    <link rel="stylesheet" type="text/css" href="evaluation.css" />
    <style>
    .explain-btn {
        float: none;
        position: absolute;
        bottom: -16.5%;
        right: 22.75%;
    }
    </style>
</head>
<body>
    <div id="main-container" class="row">
        <!-- <div id="target" class="text-center"><b><?php echo $movs[$mov_idx] ?></b></div> -->
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
            <form action=<?php echo $next_php_name ?>>
                <input type="submit" class="btn btn-primary explain-btn" value="戻る">
            </form>
        </div>
    </div>
</body>
</html>

<?php include("included/js.php"); 
$_SESSION["mov_idx"]++;
?>
<script>
    russell.classList.add("active")
    str_choice = Date.now()
    var params = JSON.parse('<?php echo $params_json; ?>')
    var target = document.getElementById("target")
    var btnNextBackGroup = document.getElementById("btn-next-back-group")
    next_php_name = 'practice.php'
</script>
<script type="text/javascript" src="evaluation.js"></script>
