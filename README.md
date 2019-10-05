# newXMLAPI
Simple clase para agregar, modificar y elimianar correos en cpanel desde php

Instalar:
1. Entrar al archivo /newXMLAPI/newXMLAPI.php y modificar la primera linea del __contruct para añadir tu nombre de usuario y contrseña de CPANEL.

Funciones:
1. Agregar un nuevo correo

```
include 'newXMLAPI/newXMLAPI.php';

use newXMLAPI\newXMLAPI as api;

$api = new api();
$api->createEmailAccount("gruposhirushi.com","text11311w23","jesusd");

if($api->errors()){
    echo $api->errors();
} else {
    echo "Crear Success";
}
```
2. Modificar contraseña
```
include 'newXMLAPI/newXMLAPI.php';

use newXMLAPI\newXMLAPI as api;

$api = new api()
$api->setEmailAccount("example.com","username","passwd");
$api->changePassword("jesus1");

if($api->errors()){
    echo $api->errors();
} else {
    echo "Password Success";
}
```
3. Eliminar correo
```
include 'newXMLAPI/newXMLAPI.php';

use newXMLAPI\newXMLAPI as api;

$api = new api()
$api->setEmailAccount("example.com","username","passwd");
$api->delAccount();

if($api->errors()){
    echo $api->errors();
} else {
    echo "Delete Success";
}
```
