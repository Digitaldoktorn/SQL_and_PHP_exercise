<?php
    include_once("class.Laptop.php");

    $query = new Laptop();

    // Visa alla rader
    $result = $query->getter();

    foreach($result as $row){
        foreach($row as $key => $value){
            echo "<p>" . $key . " " . $value;
            
        }
        echo "<br><br>--------------------------<br><br>";
    }

    // visa en modell
    echo "<p>";
    var_dump($query->getter(2001));


    // printar modelnr + lägger en ny laptop i databasen
    // echo $query->setter(125, 400, 2400, 16, "15.5", 650);
    echo $query->setter(126, 402, 2200, 15, "15.5", 649);

?>