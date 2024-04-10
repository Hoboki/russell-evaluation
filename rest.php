<?php
include("included/session_start.php");
$_SESSION["mov_idx"] = 0;
$_SESSION["session_idx"]++;
if ($_SESSION["day"]==0) {
    $_SESSION["day"] = 1;
    $next_php_name = "init_setting.php";
} else {
    $next_php_name = "ready.php";
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
    .fs {
        font-size: 50px
    }
    </style>
</head>
<body>
    <?php
    $php_name = basename(__FILE__);
    include("included/profile.php");
    ?>
    <div class="spacer0500"></div>

    <div class="text-center" id="target">
        <h3 class="fs">
            １分間休憩してください。
        </h3>
        <h3 class="fs">
            残り時間：<span class=span id="rest-time"></span> 秒
        </h3>
    </div>
</body>
</html>

<?php include("included/js.php"); ?>
<script>
    next_php_name = '<?php echo $next_php_name; ?>'
</script>
<script type="text/javascript" src="rest.js"></script>
