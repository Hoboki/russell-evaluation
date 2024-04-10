<?php
include("included/session_start.php");
$last_php_name = $_POST["last_php_name"];

switch ($last_php_name) {
    case "rest.php":
    case "fixation.php":
        $last_php_name = "ready.php";
        break;
    case "text_evaluation.php":
    case "evaluation.php":
        $_SESSION["mov_idx"]--;
        $last_php_name = "ready.php";
        break;
}

if ($_SESSION["day"]==0) {
    $explain_php_name = "text_explain.php";
} else {
    $explain_php_name = "movie_explain.php";
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
        width: 1000px;
    }
    </style>
</head>
<body>
    <div class="text-center" id="target">
        <h1><b>実験者を呼んでください。</b></h1></br></br>
        <h4>被験者氏名： <?php echo $_SESSION["code"] ?> 様</h4>
        <div class="d-flex justify-content-evenly">
            <form action="<?php echo $last_php_name ?>">
                <input type="submit" class="btn btn-primary" value="戻る">
            </form>
            <form action="logout.php">
                <input type="submit" class="btn btn-primary" value="ログアウト">
            </form>
            <form action="<?php echo $explain_php_name ?>">
                <input type="submit" class="btn btn-primary" value="説明">
            </form>
        </div>
    </div>

</body>
</html>

<?php include("included/js.php"); ?>
