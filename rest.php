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
    <div class="spacer0500"></div>

    <div class="text-center">
        <h3>
            1分間休憩してください。
        </h3>
        <h3>
            残り時間：<span id="rest-time"></span>
        </h3>
    </div>
</body>
</html>

<?php include("included/js.php"); ?>
<script type="text/javascript" src="rest.js"></script>
