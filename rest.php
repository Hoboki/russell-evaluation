<?php
include("included/session_start.php");
$_SESSION["session_idx"]++;
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
            １分間休憩してください。
        </h3>
        <h3>
            残り時間：<span class=span id="rest-time"></span> 秒
        </h3>
    </div>
</body>
</html>

<?php include("included/js.php"); ?>
<script type="text/javascript" src="rest.js"></script>
