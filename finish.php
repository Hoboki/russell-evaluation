<?php include("included/declaration.php");?>
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
        font-size: 35px
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
            以上で本日の実験は終了です。ありがとうございました。
            <br />
            実験者にお声がけください。
        </h3>
    </div>
</body>
</html>

<?php include("included/js.php"); ?>
