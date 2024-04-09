<?php
include("included/session_start.php");
$next_php_name = $_SESSION["eval_php"]
?>

<?php include("included/declaration.php"); ?>
<head>
    <?php include("included/head.php"); ?>
    <style>
        .cursor_none {
            cursor: none;
        }
        .cross {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 10px; /* 縦棒の幅 */
            height: 80px; /* 縦棒の長さ */
            background: black; /* 縦棒の色 */
        }

        .cross::before {
            content: "";
            position: absolute;
            top: 35px; /* 横棒のy位置 */
            left: -35px; /* 横棒のX位置 */
            width: 80px; /* 横棒の長さ */
            height: 10px; /* 横棒の幅 */
            background: black; /* 横棒の色 */
        }
    </style>
</head>
<body class="cursor_none">
    <div>
        <div class="cross"></div>
    </div>
</body>
</html>

<?php include("included/js.php"); ?>
<script>
    const FIX_TIME_SECOND = 1
    var next_php_name = '<?php echo $next_php_name; ?>';
    setTimeout(() => {
        window.location.href = next_php_name;
    }, FIX_TIME_SECOND*1000);
</script>
