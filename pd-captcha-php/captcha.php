<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
/**
 * Library Name : PD Captcha PHP
 * Author       : Partharaj Deb
 * Date         : 23 December 2017
 * Description  : This library is able to create captcha code which can be used in form to improving security.
 * Speciality   : It does not generate any image file. All functionality are done in a single file.
 */

if (isset($_GET['show'])) {
    header("Content-Type: image/png");
    $code = $_SESSION['pd-captcha']['code'];

    $img = imagecreatetruecolor(isset($config['height']) ? $config['height'] : 165, isset($config['width']) ? $config['width'] : 60);
    $white = imagecolorallocate($img, 255, 255, 255);
    imagefilledrectangle($img, 0, 0, imagesx($img), imagesy($img), $white);

    $x = 0;
    $y = 0;
    $w = imagesx($img) - 1;
    $z = imagesy($img) - 1;

    $lineCount = 0;
    while ($x < $w && $y < $z) {
        $x += rand(-10, 10);
        $y += rand(-10, 10);
//        echo $x . ' ' . $y;
        $lineColor = imagecolorallocate($img, rand(100, 255), rand(100, 255), rand(100, 255));
        imageline($img, $x, $y, $x + $w, $y + $z, $lineColor);
        if ($lineCount > 100) {
            break;
        }
    }

    $i = 0;
    while (strlen($code) > 0) {
        $c = substr($code, 0, 1);
        $code = substr($code, 1, strlen($code));
        $txtColor = imagecolorallocate($img, rand(0, 100), rand(0, 100), rand(0, 100));
        imagettftext($img, 50, rand(-15, 15), 2 + $i, rand(40, 55), $txtColor, __DIR__ . "/font.ttf", $c);
//        imagestring($img, 3, 2+$i, rand(1,5), $c,$txtColor);
        $i += 26;
    }

    imagepng($img);
    imagedestroy($img);
    exit();
}

/*$config = [
    'height' => 58,
    'width' => 20,
    'word' => null
];*/
function pdCaptchaCreate($config = null)
{
    global $config;
    if (isset($config['word'])) $code = $config['word'];
    else $code = substr(sha1(time()), 0, 6);
    $_SESSION['pd-captcha'] = [
        'code' => $code,
        'src' => 'pd-captcha-php/captcha.php?show'
    ];
}

function pdCaptchaImageSrc(){
    return $_SESSION['pd-captcha']['src'];
}
function pdCaptchaCode(){
    return $_SESSION['pd-captcha']['code'];
}
