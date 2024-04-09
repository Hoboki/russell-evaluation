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
    </style>
</head>
<body>
    <div class="spacer0500"></div>

    <div class="text-center" id="target">
        <h3>
            以上で本日の実験は終了です。ありがとうございました。
            <br />
            実験者にお声かけください。
        </h3>
        <br />
        <br />
        <form action="logout.php" method="get">
            <input type="submit" class="btn btn-primary" value="終了する">
        </form>
    </div>
</body>
</html>

<?php include("included/js.php"); ?>
