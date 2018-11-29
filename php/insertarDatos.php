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
        $stmt = $conn->prepare("INSERT INTO idiomas (id_idioma, idioma) 
            VALUES (:id_idioma, :idioma)");

        $stmt->bindParam(':idioma', $idioma);
        $stmt->bindParam(':id_idioma', $id_idioma);

        $idioma = $_POST['idioma'];
        $id_idioma = $_POST['id_idioma'];

        $stmt->execute();
        echo json_encode ("ok");
    }

catch(PDOException $e)
    {
        echo $e ;
    }

$conn = null;


?>