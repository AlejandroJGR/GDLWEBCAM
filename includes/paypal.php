<?php 
require 'includes/vendor/autoload.php';

define('URL_SITIO', 'http://localhost/Curso_Desarrollo_web_gabby/GDLWEBCAM');

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AY32xR1hxa5SxhIOHdx41TzVVHqvLF-UTCkIAPEN02X7NP6_uj0gQi_466DbKakrnkscaSiOhw1loAmu', //clientID
        'EKuuP8ouWMi9Boh7YUMst42Dx4udx8NfR6htt-pOJZorElOex4_RDG57jurSWdwwKKX6r5g5mVKNp0Dt'//secret
    )
);