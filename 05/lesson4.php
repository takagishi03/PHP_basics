<?php
// ＜アルゴリズムの注意点＞
// アルゴリズムではこれまでのように調べる力ではなく物事を論理的に考える力が必要です。
// 検索して答えを探して解いても考える力には繋がりません。
// まずは検索に頼らずに自分で処理手順を考えてみましょう。


// 以下は自動販売機のお釣りを計算するプログラムです。
// 150円のお茶を購入した際のお釣りを計算して表示してください。
// 計算内容は関数に記述し、関数を呼び出して結果表示すること
// $yen と $product の金額を変更して計算が合っているか検証を行うこと

// 表示例1）
// 10000円札で購入した場合、
// 10000円札x0枚、5000円札x1枚、1000円札x4枚、500円玉x1枚、100円玉x3枚、50円玉x1枚、10円玉x0枚、5円玉x0枚、1円玉x0枚

// 表示例2）
// 100円玉で購入した場合、
// 50円足りません。

$yen = 10000;   // 購入金額
$product = 150; // 商品金額

function calc($yen, $product)
{
    // この関数内に処理を記述
    $money = [
        10000 => '10000円札',
        5000 => '5000円札',
        1000 => '1000円札',
        500 => '500円玉',
        100 => '100円玉',
        50 => '50円玉',
        10 => '10円玉',
        5 => '5円玉',
        1 => '1円玉'
    ];

    $change = $yen - $product;

    $changeDetails = [];
    foreach ($money as $value => $name) {
        $count = intval($change / $value);
        if ($count > 0) {
            $changeDetails[$name] = $count;
            $change -= $value * $count;
        } else {
            $changeDetails[$name] = 0;
        }
    }

    if ($yen < 1000) {
        echo "{$yen}円玉で購入した場合、\n";
    } else {
        echo "{$yen}円札で購入した場合、\n";
    }
    if ($change === 0) {
        foreach ($changeDetails as $name => $count) {
            echo "{$name}x{$count}枚、";
        }
    } else {
        $shortage = $product - $yen;
        echo $shortage . "円足りません。";
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>お釣り</title>
</head>

<body>
    <section>
        <!-- ここに結果表示 -->
        <?php
        calc($yen, $product);
        echo "<br>";
        calc(999, 50);
        // echo "<br>";
        // calc(10, 150);
        // echo "<br>";
        // calc(1000, 15000);
        // echo "<br>";
        // calc(50, 1500);
        ?>
    </section>
</body>

</html>
