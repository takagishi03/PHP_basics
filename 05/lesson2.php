<?php
// 以下をそれぞれ表示してください。（すべて改行を行って出力すること)
// 現在時刻を自動的に取得するPHPの関数があるので調べて実装してみて下さい。
date_default_timezone_set('Asia/Tokyo');

// 実行するとその都度現在の日本の日時に合わせて出力されるされるようになればOKです。
// 日時がおかしい場合、PHPのタイムゾーン設定を確認して下さい。

$week = [
    '日',
    '月',
    '火',
    '水',
    '木',
    '金',
    '土',
];

// ・現在日時（xxxx年xx月xx日（x曜日））
$currentDateTime = date('Y年m月d日 (') . $week[date('w')] . '曜日)';
echo $currentDateTime . "<br>";
// ・現在日時から３日後（yyyy年mm月dd日 H時i分s秒）
$futureDateTime = date('Y年m月d日 H時i分s秒', strtotime('+3 days'));
echo $futureDateTime . "<br>";
// ・現在日時から１２時間前（yyyy年mm月dd日 H時i分s秒）
$pastDateTime = date('Y年m月d日 H時i分s秒', strtotime('-12 hours'));
echo $pastDateTime . "<br>";
// ・2020年元旦から現在までの経過日数 (ddd日)
$startDate = strtotime('2020-01-01');
$currentDate = time();
$daysElapsed = floor(($currentDate - $startDate) / (60 * 60 * 24));
echo $daysElapsed . '日' . "<br>";
