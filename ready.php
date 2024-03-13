<?php
include("included/session_start.php");
$_SESSION["mov_idx"] = 0;
if (isset($_SESSION["code"])) {
    $code = $_SESSION["code"];
} else {
    header("Location: index.php");
    exit;
}
if ($_SESSION["session_idx"]==0 && $_SESSION["day"]==0 && $_SESSION["mov_idx"]==0) {
    $_SESSION["eval_php"] = "practice.php";
    $session_name = "練習セッションを開始します";
} else {
    $_SESSION["eval_php"] = "evaluation.php";
    $session_name = "本番セッションを開始します";
}
?>

<?php include("included/declaration.php"); ?>
<head>
    <?php include("included/head.php"); ?>
</head>
<body>
    <?php include("included/profile.php"); ?>
    <div class="spacer0500"></div>

    <div class="text-center">
        <h3>
            <?php echo $session_name ?>
        </h3>
    </div>
</body>
</html>

<?php include("included/js.php"); ?>
<script>
    const READY_TIME_SECOND = 5
    setTimeout(() => {
        window.location.href = "fixation.php";
    }, READY_TIME_SECOND*1000);
</script>
