<?php
// 以下配列の中身をfor文を使用して表示してください。
// 表が縦横に伸びてもある程度対応できるように柔軟な作りを目指してください。
// 表示はHTMLの<table>タグを使用すること

/**
 * 表示イメージ
 *  _________________________
 *  |_____|_c1|_c2|_c3|横合計|
 *  |___r1|_10|__5|_20|___35|
 *  |___r2|__7|__8|_12|___27|
 *  |___r3|_25|__9|130|__164|
 *  |縦合計|_42|_22|162|__226|
 *  ‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
 */

$arr = [
    'r1' => ['c1' => 10, 'c2' => 5, 'c3' => 20],
    'r2' => ['c1' => 7, 'c2' => 8, 'c3' => 12],
    'r3' => ['c1' => 25, 'c2' => 9, 'c3' => 130]
];

// 縦列
// $vkeys = array_keys($arr);
// print_r($vkeys);
// echo "<BR>";
// 横列
// $bkeys = array_keys($arr[$vkeys[0]]);
// print_r($bkeys);
// echo "<BR>";
// $bkeys = array_keys($arr[$vkeys[1]]);
// print_r($bkeys);
// echo "<BR>";
// $totalRow = array('縦合計' => array_fill_keys($colNames, 0));
// print_r($totalRow);

// Javaをやっているせいか、配列の使い方に違和感を感じる。要復習
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>テーブル表示</title>
    <style>
        table {
            border: 1px solid #000;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
        }
    </style>
</head>

<body>
    <!-- ここにテーブル表示 -->
    <table>

        <tr>
            <th></th>
            <?php
            $colNames = array_keys(reset($arr));
            foreach ($colNames as $colName) {
                echo "<th>{$colName}</th>";
            }
            echo "<th>横合計</th>";
      
            ?>
        </tr>

        <?php
        $totalRow = array_fill_keys($colNames, 0);
        foreach ($arr as $rowName => $rowData) {
            echo "<tr>";
            echo "<td>{$rowName}</td>";
            $rowTotal = 0;
            foreach ($colNames as $colName) {
                $value = $rowData[$colName];
                echo "<td>{$value}</td>";
                $rowTotal += $value;
                $totalRow[$colName] += $value;
            }
            echo "<td>{$rowTotal}</td>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "<td>縦合計</td>";
        $total = 0;
        foreach ($colNames as $colName) {
            $colTotal = $totalRow[$colName];
            echo "<td>{$colTotal}</td>";
            $total += $colTotal;
        }
        echo "<td>{$total}</td>";
        echo "</tr>";
        ?>
    </table>
</body>

</html>