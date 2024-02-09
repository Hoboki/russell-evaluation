<?php
include("included/declaration.php");
?>

<head>
    <?php include("included/head.php"); ?>
    <link rel="stylesheet" type="text/css" href="evaluation.css" />
    <style>
    body {
        background-color: white;
        overflow:hidden;
    }
    li {
        padding: 10px 0;
        line-height:30px;
        font-size:20px;
    }
    .clearfix:after {
        content:"";
        display:block;
    }
    .explain-txt {
        width: 1200px;
        float: left;
        height: auto;
        position: absolute;
        top: 50%;
        transform: translate(-70%, -50%);
        left: 48%;
    }
    .explain-img {
        float: right;
        object-fit: contain;
        width: 600px;
        height: auto;
        position: absolute;
        top: 50%;
        transform: translate(0, -50%);
        right: 4%;
    }
    .explain-btn {
        float: none;
        position: absolute;
        bottom: 10%;
        right: 5%;
        width: 400px;
    }
    </style>
</head>
<body>
    <?php
    $php_name = basename(__FILE__);
    include("included/profile.php");
    ?>
    <div class="main-center">
        <section class="explain clearfix">
            <div class="explain-txt">
                <header><h2>実験内容</h2></header>
                <ul>
                    <li>この課題では、動画を視聴し、その動画に対するご自身の感情を回答していただきます。</li>
                    <li>実験が開始すると、画面に10秒～15秒間の短い動画が再生されます。</br>
                    動画を見ているときの自分の感情を、右の感情評価マップを使って回答していただきます。</li>
                </ul>
                <header><h2></br>感情評価マップの使い方</h2></header>
                <ul>
                    <li>動画が再生されたあと、二つの軸を持った感情評価マップが表示されます。</br>
                    横軸は快-不快を表しており、右に行くほどポジティブな感情、左に行くほどネガティブな感情に近づきます。</br>
                    縦軸は覚醒度を表現しており、下に行くほど覚醒度が低く興味が無い状態、上に行くほど覚醒度が高く強い感情に近づきます。</br>
                    右上は興奮してわくわくした気持ち、右下はリラックスして穏やかな気持ち、</br>
                    左下は憂鬱で悲しい気持ち、左上は嫌悪感や恐怖といったストレスを感じている状態を表しています。</br>
                    中央のニュートラルは、感情が快・不快、覚醒・眠気のいずれにもあてはまならない中立な状態を表しています。</li>
                    <li>動画を見ているときの自分の感情として最もあてはまる位置にカーソルを動かし、クリックして回答してください。</br>
                    <li>クリックすると画面は自動で切り替わり、次の動画が再生されます。</br>
                    急いで回答する必要はありませんので、視聴時の自分の気持ちに最も近い位置を選択してください。</li>
                </ul>
                <header><h2></br>その他</h2></header>
                <ul>
                    <li>それぞれの動画が開始する前に、画面中央に十字マークが表示されます。表示中は常に十字マークを注視してください。</li>
                    <li>実験時間はおおよそ70分間です。1つのセッション（8分から12分）が終了するごとに1分間の休憩時間が設けられます。</br>
                    この時間内では、飲み物を飲んだり、体を動かしていただいて構いません。</li>
                    <li>途中で気分が悪くなるなどした場合は、実験を中断または中止いたしますので、実験者にお伝えください。</li>
                    <li>実験内容に関して質問があれば、実験者にお尋ねください。</li>
                </ul>
            </div>
            <img src="russelu_map.png" alt="russelu-map" class="explain-img">
            <table class="explain-btn">
            <tr>
            <td>
                <form action="practice.php">
                    <input type="submit" class="btn btn-primary" value="練習">
                </form>
            </td>
            <td>
                <form action="ready.php">
                    <input type="submit" class="btn btn-primary" value="開始">
                </form>
            </td>
            </tr>
            </table>
        </section>
    </div>
</body>
</html>

<?php include("included/js.php"); ?>
<script>
    console.log (<?php echo $explain_file; ?>);
</script>