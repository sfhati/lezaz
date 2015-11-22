<?PHP

function encrypt_sfhti($string) {
    return $string;
    return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, SALT, $string, MCRYPT_MODE_CBC, "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"));
}

function decrypt_sfhti($string) {
    return $string;
    return mcrypt_decrypt(MCRYPT_RIJNDAEL_128, SALT, base64_decode($string), MCRYPT_MODE_CBC, "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0");
}
