<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mochileros4";
try
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        // prepare sql and bind parameters
        $stmt = $conn->prepare("SELECT id_usuario, eje_x, eje_y FROM punto 
            WHERE id_viaje = :id_viaje");
        
        
        $id_viaje = $_POST['id_viaje'];

        $stmt->bindParam(':id_viaje', $id_viaje);

        $stmt->execute();

        $row = $stmt->fetchAll();
        echo json_encode ($row);
    }
catch(PDOException $e)
    {
        echo $e->getMessage() ;
    }
/*Las conexiones PDO se mantienen abiertas durante el ciclo de vida del objeto PDO*/
/*Asi se cierran los PDO*/
$conn = null;
?>