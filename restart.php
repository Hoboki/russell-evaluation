<?php
include("included/session_start.php");
include("controller/EvaluationController.php");
include("controller/MovieInfoController.php");
$eval = new EvaluationController();
$mov_info = new MovieInfoController();

?>

<?php include("included/declaration.php"); ?>
<head>
    <?php include("included/head.php"); ?>
    <link rel="stylesheet" type="text/css" href="evaluation.css" />
</head>
<body>
    <?php
    include("included/profile.php");
    ?>
    <div class="spacer0200"></div>

    <div id="main-container" class="row">
        <video id="movie" controls="false" controlsList="nodownload nofullscreen noremoteplayback" oncontextmenu="return false;" onended="endMovie(event)" autoplay="autoplay" muted="muted">
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
