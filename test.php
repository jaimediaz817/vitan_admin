<?php
    echo "Hola mundo, testando conexión";
    
    try {
        $id=1;
        //$db = new PDO();
        $db = new PDO('mysql:host=vitan.com.co;dbname=vitancom_test;charset=utf8mb4', 'vitancom_test', '12345');  
        echo 'Conectado a '.$db->getAttribute(PDO::ATTR_CONNECTION_STATUS);
        
        // select a particular user by id
        $stmt = $db->prepare("SELECT * FROM productos_base WHERE id_prod= :id");
        $stmt->execute(['id' => $id]); 
        $producto = $stmt->fetch();
        echo (JSON_ENCODE($producto));
        var_dump($producto);
    } catch(PDOException $ex) {
      echo 'Error conectando a la BBDD. '.$ex->getMessage(); 
    }
?>