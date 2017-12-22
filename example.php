<?php session_start();
/**
 * Created by Partharaj Deb
 * Date: 12/23/2017
 * Time: 12:59 AM
 */

require_once __DIR__ . "/pd-captcha-php/captcha.php";


$message = "";
if (!empty($_POST['captcha'])) {
    $captcha = $_POST['captcha'];
    if ($captcha == pdCaptchaCode()) {
        $message = "<h1 style='color: green;'>Your given captcha is correct.</h1>";
    } else {
        $message = "<h1 style='color: red;'>Your given captcha is wrong.</h1>";
    }
}


pdCaptchaCreate();

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PD Captcha PHP</title>
    <style>
        div{
            padding-top: 50px;
            position: relative;
            text-align: center;
        }
    </style>
</head>
<body>
<div>
    <?= $message ?>
    <form action="" method="post">
        <img src="<?= pdCaptchaImageSrc() ?>" alt="pd-captcha-php"><br>
        <input style="padding: 5px; margin: 20px 0;" name="captcha" autofocus placeholder="Enter Captcha">
        <input style="padding: 5px;" type="submit" value="Submit">
    </form>
</div>
</body>
</html>
