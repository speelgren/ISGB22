<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>PHP F8</title>
    </head>
    <body>
        <main>
        
        <?php
            try {
                $dataSourceName = "mysql:" . "host=localhost;" . "dbname=bilar;" . "charset=utf8";
                $userName = "root";
                $passWord = "";
                $dbhsOptions = array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                );
                
                $dbh = new PDO($dataSourceName, $userName, $passWord, $dbhsOptions);

                //echo("Japp!");
                $sql = "SELECT * FROM cars;";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();

                //Antalet rader...
                echo("<p>" . $stmt->rowCount() . "</p>");
                //Dumpa "tabellen"...
                //$rs = $stmt->fetchAll();
                /*
                echo("<pre>");
                print_r($rs);
                echo("</pre>");
                */

                //Iterera igenom "tabellen" (tabell -> rad -> kolumn)
                while($row = $stmt->fetch()) {

                    //print_r($row);

                    echo("<div>");
                    
                    echo("<p>Fabrikat: " . $row["fabrikat"] . "</p>");
                    echo("<p>Modell: " . $row["modell"] . "</p>");

                    echo("</div>" . PHP_EOL);

                }


            }catch(PDOException $e) {
                echo("<div>" . $e->getMessage() . "</div>");
            } finally{

                echo("<script>console.log('städar');</script>");
                $stmt = null;
                $dbh = null;
            }
            
        ?>
        
        </main>
    </body>
</html>