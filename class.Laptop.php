<?php
    class Laptop {

        public $model;
        public $speed;
        public $hd;
        public $ram;
        public $screen;
        public $price;

        public function getter($model=0) {

            // skapa uppkoppling
            $dbh = $this->connect();

            // om model är 0 ska alla rader visas
            if($model == 0) {
                // Förbered en query
                $stmt = $dbh->prepare("
                SELECT *
                FROM laptop
                WHERE 1
            ");
            }
            else {
                // förbered en query
                $stmt = $dbh->prepare("
                SELECT *
                FROM laptop
                WHERE model = :model
                ");

                // bindParam "binder" en variabel till ett namn-ökad säkerhet
                $stmt->bindParam(":model", $model);
            }
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function connect(){
            try {
                $dbh = new PDO("mysql: host=localhost; dbname=SQL_Avancerad_Products", "cpu", "lösenord123");
        
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            return $dbh;
        }

        // INSERT - Kod för att bygga en setterfunktion
        public function setter($model, $ram, $hd, $speed, $screen, $price) {
            $dbh = $this->connect();

            $stmt = $dbh->prepare("
            INSERT INTO laptop
            (model, ram, hd, speed, screen, price)
            VALUES (:model, :ram, :hd, :speed, :screen, :price)
            ");

            $stmt->execute(array(
            ':model' => $model,
            ':ram' => $ram,
            ':hd' => $hd,
            ':speed' => $speed,
            ':screen' => $screen,
            ':price' => $price
            ));
            
            if ($stmt->rowCount() == 1)
            echo "<p>" . $dbh->lastInsertId();

            return $model;
        }
        
    }
?>