<?php 
// Reference 
// http://stackoverflow.com/questions/1289061/best-way-to-use-php-to-encrypt-and-decrypt-passwords


function Encrypt($word, $secretKey)
{
   if(!$word) return;

   $iv = mcrypt_create_iv(
    mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC),
    MCRYPT_DEV_URANDOM
    );

   $encrypted = base64_encode(
    $iv .
    mcrypt_encrypt(
        MCRYPT_RIJNDAEL_256,
        hash('sha256', $secretKey, true),$word, MCRYPT_MODE_CBC, $iv )
    );
   return $encrypted;
}


function Decrypt($word, $secretKey)
{
    if(!$word) return;

    $data = base64_decode($word);
    $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
    $decrypted = rtrim(
        mcrypt_decrypt(
            MCRYPT_RIJNDAEL_256,
            hash('sha256', $secretKey, true),
            substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),
            MCRYPT_MODE_CBC,$iv),"\0");
    return $decrypted;
}
?>