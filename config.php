<?php

//Laddar autmatiskt in klasser när de kallas
function autoLoader($className) {
    $filePath = "classes/" . $className . ".class.php";
    include($filePath);
}
spl_autoload_register("autoLoader"); 


//Databasinställningar lokalt
define("DBHOST", "localhost");
define("DBUSERNAME", "Portfolio");
define("DBPASSWORD", "12345");
define("DBNAME", "Portfolio");


?>