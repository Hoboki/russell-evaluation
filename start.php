<?php
include("included/session_start.php");
if(isset($_POST["day"])) {
    $day = $_POST["day"];
    $_SESSION["day"] = $day;
    $_SESSION["session_idx"] = 0;
    $_SESSION["mov_idx"] = 0;
} else {
    header("Location: day.php");
    exit;
}

?>

<?php include("included/declaration.php"); ?>
<head>
    <?php include("included/head.php"); ?>
</head>
<body>
    <?php include("included/profile.php"); ?>
    <div class="spacer01"></div>

    <div class="text-center">
        <form action="session_str.php">
            <input type="submit" class="btn btn-primary" value="開始">
        </form>
    </div>
</body>
</html>

<?php include("included/js.php"); ?>
