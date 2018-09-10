<?php
    try {
        $dbh = new PDO("mysql: host=localhost; dbname=SQL_Avancerad_Products", "cpu", "lösenord123");

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    // $model = 2001;
    $model = 2003;


    // Förbered en query
    $stmt = $dbh->prepare("
        SELECT *
        FROM laptop
        WHERE model > :model
    ");

    // bindParam "binder" en variabel till ett namn
    // vilket gör att vi ytterligare säkrar mot skadlig kod
    $stmt->bindParam(":model", $model);

    // Kör queryn
    $stmt->execute();

    print_r($stmt->fetchObject());

    // Plocka fram datan (en rad med "fetch", alla rader med "fetchAll")
    // print_r($stmt->fetch(PDO::FETCH_ASSOC));

    // Loopa fram datan
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<p>" . $row["model"] . ": " . $row["price"];

        // alternativ syntax
        // echo "<p> {$row["model"]} : {$row["price"]}";
    }


?>
