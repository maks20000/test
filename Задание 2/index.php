<?php require_once "sms.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php

    $url = 'http://api.zmtech.ru:7777/v1';
    $header = ['id'=>'27843', 'password'=>'1daca5949494f685605affb10164464369c8fcc1'];
    $sms = new sms ($url, $header);

    print_r ($sms->ZMgetInfo());
    $sms->ZMsendSms([
        'phone' => '89370643111',
        'message' => 'test sms',
        'sender' => 'zmtech.ru'
    ]);
    
?>
