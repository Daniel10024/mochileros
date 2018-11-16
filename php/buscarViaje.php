<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mochileros";
try
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $intereses = $_POST['intereses'];
        // prepare sql and bind parameters
        $stmt = $conn->prepare("SELECT p.*, v.id_escala FROM viaje AS v
            JOIN punto AS p ON v.id_viaje = p.id_viaje
            JOIN usuario AS u ON v.id_usuario = u.id_usuario
            JOIN habla AS h ON u.id_usuario = h.id_usuario
            JOIN le_interesa AS i ON i.id_punto = p.id_punto
            WHERE (v.id_escala = :escala) AND (u.pais = :origen AND h.id_idioma = :idioma)
            AND (p.fecha_inicio BETWEEN :fecha_ini AND :fecha_fin OR p.fecha_fin BETWEEN :fecha_ini AND :fecha_fin)
            AND i.id_interes IN (".implode(',',$intereses).")");
        
        $escala = $_POST['escala'];
        $fecha_ini = $_POST['fecha_ini'];
        $fecha_fin = $_POST['fecha_fin'];
        $idioma = $_POST['idioma'];
        $origen = $_POST['origen'];
        $intereses = $_POST['intereses'];

        //$intervalo = new DateInterval('P1D');
        //$rangoFechas = new DatePeriod($fecha_ini, $intervalo ,$fecha_fin);

        $stmt->bindParam(':escala', $escala);
        $stmt->bindParam(':fecha_ini', $fecha_ini);
        $stmt->bindParam(':fecha_fin', $fecha_fin);
        $stmt->bindParam(':idioma', $idioma);
        $stmt->bindParam(':origen', $origen);
        //$stmt->bindParam(':rangoFechas', $rangoFechas);

        $stmt->execute();

        $row = $stmt->fetch();
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