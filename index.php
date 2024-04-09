<?php
// phpinfo();
include("included/session_start.php");
include("controller/EvaluationController.php");
$eval = new EvaluationController();
if (isset($_POST["code"]) && $_POST["code"]) {
    $_SESSION["code"] = $_POST["code"];
}
if (isset($_SESSION["code"])) {
    $code = $_SESSION["code"];
    if (array_search($code, $eval->codes)===false) {
        $eval->makeCode($code);
        header("Location: day.php?first=true");
    } else {
        header("Location: day.php");
    }
    exit;
}
?>

<?php include("included/declaration.php"); ?>
<head>
    <?php include("included/head.php"); ?>
</head>
<body>
    <div class="spacer0200"></div>

    <div class="text-center">
        <?php
        if (isset($_GET["status"])) {
            $status = $_GET["status"];
            switch ($status) {
                default:
                    $msg = "エラーが発生しました。実験者にご報告ください。";
            }
            echo "<p class=\"text-danger\">" . $msg . "</p>";
        }
        ?>
    </div>

    <div class="text-center">
        <form action="index.php" method="post">
            <input name="code" type="text" placeholder="被験者コード">
            <input type="submit" class="btn btn-primary" value="ログイン">
        </form>
    </div>
</body>
</html>

<?php include("included/js.php"); ?>
