# newXMLAPI
Simple clase para agregar, modificar y elimianar correos en cpanel desde php, funciona en CPANEL 78.0.38 con cualquier thema.
hace uso del API 2 WHM API JSON.

*A Simple class to add, modify and delete email accounts on cpanel from php, it works on cpanel v78.0.38 with any theme. it use  of cpanel api 2, whm api json.*


Para extender esta clase o referencias visita: 

*For any extenson or references go to:*

https://documentation.cpanel.net/display/DD/cPanel+API+2+Functions+-+Email%3A%3Abrowseboxes

Instalar:

*Install:*

1. Entrar al archivo /newXMLAPI/newXMLAPI.php y modificar la funcion __contruct__ para añadir tu nombre de usuario y contrseña de CPANEL.

*1. Go to /newXMLAPI/newXMLAPI.php and modify __construct__ function to add and your username and password from your cpanel*

```
$this->systemAccount = new systemAccount("",""); 
```

Funciones:

*Functions:*

1. Agregar un nuevo correo

*1. Addd new email account*

```
include 'newXMLAPI/newXMLAPI.php';

use newXMLAPI\newXMLAPI as api;

$api = new api();
$api->createEmailAccount("example.com","username","passwd");

if($api->errors()){
    echo $api->errors();
} else {
    echo "Crear Success";
}
```
2. Modificar contraseña

*2. Modify email account password*
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

*3. delete email account*
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
