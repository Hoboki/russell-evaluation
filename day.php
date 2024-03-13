<?php
include("included/session_start.php");
include("controller/MovieInfoController.php");
if (isset($_SESSION["code"])) {
}

$mov_info = new MovieInfoController();
?>

<?php include("included/declaration.php"); ?>
<head>
    <?php include("included/head.php"); ?>
</head>
<body>
    <?php include("included/profile.php"); ?>

    <div class="spacer0200"></div>

    <div class="text-center d-flex justify-content-evenly">
        <?php
        for ($i = 0; $i < count($mov_info->model); $i++) {
            echo '<form action="explain.php" method="post">';
            echo '<input type="hidden" name="day" class="btn btn-primary" value="' . $i. '" />';
            echo '<input type="submit" class="btn btn-primary" value="' . ($i+1) . '日目" />';
            echo '</form>';
        }
        ?>
    </div>
</body>
</html>

<?php include("included/js.php"); ?>
