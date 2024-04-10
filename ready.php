<?php
include("included/session_start.php");
if ($_SESSION["day"]==0) {
    $_SESSION["eval_php"] = "text_evaluation.php";
} else {
    $_SESSION["eval_php"] = "evaluation.php";
}
?>

<?php include("included/declaration.php"); ?>
<head>
    <?php include("included/head.php"); ?>
    <style>
    #target {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        font-size: 50px;
    }
    </style>
</head>
<body>
    <?php
    $php_name = basename(__FILE__);
    include("included/profile.php");
    ?>
    <div class="text-center">
        <h3 id="target">
        セッションを開始します
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
