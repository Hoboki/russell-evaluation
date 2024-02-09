<?php
include("included/session_start.php");
if (isset($_SESSION["code"])) {
    $code = $_SESSION["code"];
} else {
    header("Location: index.php");
    exit;
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
            セッションを開始します
        </h3>
    </div>
</body>
</html>

<?php include("included/js.php"); ?>
<script type="text/javascript" src="session_str.js"></script>
