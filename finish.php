<?php include("included/declaration.php"); ?>
<head>
    <?php include("included/head.php"); ?>
</head>
<body>
    <div class="spacer0500"></div>

    <div class="text-center">
        <h3>
            以上で本日の実験は終了です。お疲れ様でした。
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