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
    <?php
    $php_name = basename(__FILE__);
    include("included/profile.php");
    ?>
    <div id="main-container" class="row">
        <div id="russell">
            <div class="xplus">快</div>
            <div class="xminus">不快</div>
            <div class="yplus">覚醒</div>
            <div class="yminus">眠気</div>
            <div id="russell-rec" onclick="clickRussellRec(event, false)">
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

<script>
    russell.classList.add("active")
</script>
<script type="text/javascript" src="evaluation.js"></script>
