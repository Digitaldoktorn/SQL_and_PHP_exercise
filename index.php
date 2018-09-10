<?php
    try {
        $dbh = new PDO("mysql: host=localhost; dbname=SQL_Avancerad_Products", "cpu", "lösenord123");

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $model = 2001;

    // Förbered en query
    $stmt = $dbh->prepare("
        SELECT *
        FROM laptop
        WHERE model = :model
    ");
    $stmt->bindParam(":model", $model);

    // Kör queryn
    $stmt->execute();

    // Plocka fram datan (en rad med "fetch", alla rader med "fetchAll")
    print_r($stmt->fetch(PDO::FETCH_ASSOC));

?>
