<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mochileros4";
    try{

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO escala (id_escala, escala) 
            VALUES (1, :escala)");

        $stmt->bindParam(':escala', $escala);

        $escala = $_POST['escala'];

        $stmt->execute();
        echo json_encode ("ok");
    }

catch(PDOException $e)
    {
        echo $e ;
    }

$conn = null;


?>