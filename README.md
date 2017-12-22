# PD Captcha PHP

 * Description  : This library is able to create captcha code which can be used in form to improve security.
 * Speciality   : It does not generate and store any image file.
 
 # Use of pd-captcha
  
```php
session_start();
require_once "./pd-captcha-php/captcha.php"; // Path to the captcha.php


// Creates new captcha
pdCaptchaCreate(); 


// pdCaptchaImageSrc() returns the image src path.
<img src="<?= pdCaptchaImageSrc() ?>" alt="pd-captcha-php"> 


// Check user input is matches or not
// pdCaptchaCode() returns the generated captcha code in plain text
if ($userInput == pdCaptchaCode()){
  // Captcha is correct
}
```

# Options
If you want to pass your won word and height / width of the captcha image you may use this options _(NOT recommended)_
```php
$config = [
    'height' => 60,
    'width' => 165,
    'word' => 'PD27cap'
];
pdCaptchaCreate($config); 
```

# Don't miss
Must keep captcha.php and font.ttf in the same directory
