<?php

try {

    $pdo = new PDO("mysql:host=localhost;dbname=Nascimentos", 'root', '');

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
 catch (PDOException $e) {
    
    echo "Conexão Falhada: " . $e->getMessage();
}



?>
