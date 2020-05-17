<?php

$str = substr(str_shuffle("1234567890"),0,5); //string
$img = imagecreate(60, 30); // image size (px)
imagecolorallocate($img, 238, 233, 233); // background
$color = imagecolorallocate($img, 0, 0, 0); // text color
imagestring($img, 5, 8, 7, $str, $color);
imagepng($img, "images/captcha.png");

// create cookie captcha 
setcookie("captcha", $str, time() + (60), "/");

if (isset($_POST['send'])) {
    if ($_POST['captcha'] == $_COOKIE['captcha']) {
        echo "Berhasil";
    }else{
        echo "Gagal";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha</title>
</head>
<body>
    <form method='post'>
        <label>Masukkan Captcha :</label><br>
        <img src="images/captcha.png" alt="captcha"><br>
        <input type="text" name="captcha"><br>
        <input type="submit" name="send" value="Send">
    </form>
</body>
</html>