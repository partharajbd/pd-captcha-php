# PD Captcha PHP

 * Name         : PD Captcha PHP
 * Author       : Partharaj Deb
 * Date         : 23 December 2017
 * Description  : This library is able to create captcha code which can be used in form to improve security.
 * Speciality   : It does not generate any image file. All functionality are done in a single file (captcha.php).
 
# Functions
1. Create a new captcha code
```php 
pdCaptchaCreate(); 
```

2. Get captcha image url to show in the user interface using `img` tag.
```php 
pdCaptchaImageSrc();
```

2. Get captcha code in plain text to compare with user input
```php 
pdCaptchaCode();
```


 
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

# Example

![Sample 1](https://github.com/partharajbd/pd-captcha-php/blob/master/samples/sample.JPG?raw=true "Sample 1")
![Sample 2](https://github.com/partharajbd/pd-captcha-php/blob/master/samples/sample2.JPG?raw=true "Sample 2")
