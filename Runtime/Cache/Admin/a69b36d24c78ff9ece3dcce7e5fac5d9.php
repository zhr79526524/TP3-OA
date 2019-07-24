<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>时间戳</title>
</head>
<body>
    <?php echo (date('Y-m-d H:i:s',$time )); ?>
    <h1><?php echo (strtoupper(substr($str ,0,5))); ?></h1>
</body>  
</html>