<?php



define('ENCRIPTAR',1);
define('DESENCRIPTAR',2);
define('ENCRYPT_METHOD','AES-256-CBC'); //metodo que vamos a utilizar para encriptar/desencripar
define('SECRET_KEY','Clave secreta'); //clave secreta
define('SECRET_V', 'Secret v'); //cuanto más complejo mejor

function encriptar_desencriptar($action,$string)
{
    $output = false;

    $key = hash("sha256",SECRET_KEY);
    $v = substr(hash("sha256",SECRET_V),0,16); 

    if ($action == ENCRIPTAR)
    {
        $output = openssl_encrypt($string, ENCRYPT_METHOD, $key, 0, $v);
        $output = base64_encode($output);
    }
    elseif($action == DESENCRIPTAR)
    {
        $output = base64_decode(($string));
        $output = openssl_decrypt($output, ENCRYPT_METHOD, $key, 0, $v);
    }
    return $output;
}

/*$password = '123456';
$encriptado = encriptar_desencriptar(ENCRIPTAR,$password);
echo $encriptado. '<br>';
$desencriptado = encriptar_desencriptar(DESENCRIPTAR,$encriptado);
echo $desencriptado. '<br>';*/

function logueado()
{
    if(!isset($_SESSION['loggedin']))
    {
        return false;
    }
    if(!$_SESSION['loggedin'])
    {
        return false;
    }

    if(time() - $_SESSION['loggedstart'] > (15 * 60)) //15 * 60 son los segundos = 900 segundos = 15 minutos
    {
        session_unset();
        session_destroy();

        return false;
    }
$_SESSION['loggedstart'] = time();
return true;
}

?>