<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <?php if($day == 1): ?>星期一
            <?php elseif($day == 2): ?>
            星期二
            <?php elseif($day == 3): ?>
            星期三
            <?php elseif($day == 4): ?>
            星期四
            <?php elseif($day == 5): ?>
            星期无
            <?php elseif($day == 6): ?>
            星期六<?php endif; ?>
              
</body>
</html>