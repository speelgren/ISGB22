<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PHP F8</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <main>
            <?php

            try {

                $dataSourceName = "mysql:" . "host=localhost;" . "dbname=cars;" . "charset=utf8";
                $userName = "myusername";
                $passWord = "mypassword";
                $dbhsOptions = array(

                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                );

                $dbh = new PDO($dataSourceName, $userName, $passWord, $dbhsOptions);

                $sql = "SELECT * FROM cars;";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();

                /*
                $rs = $stmt->fetchAll();
                echo('<pre>');
                    print_r($rs);
                echo('</pre>');
                */

                while($row = $stmt->fetch()) {

                    echo('<div>');
                        echo('<h1 style="color:' . $row["farg"] . '">' . $row["fabrikat"] . '</h1>');
                        echo('<h3>' . $row["modell"] . '</h3>');
                        echo('<h3>' . 'reg: ' . $row["regnr"] . '</h3>');
                        echo('<hr>');
                    echo('</div>');
                }
            } catch ( PDOException $e ) {

                echo('<div>' . $e->getMessage() . '</div>');
            } finally {

                echo('<script>console.log("null");</script>');
                $stmt = null;
                $dbh = null;
            }

                /*
                echo('Test');
                try {

                    $dataSourceName = "mysql:" . "host=localhost;" . "dbname=cars;" . "charset=utf8";
                    $userName = "myusername";
                    $passWord = "mypassword";
                    $dbhsOptions = array(

                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    );

                    $dbh = new PDO($dataSourceName, $userName, $passWord, $dbhsOptions);

                    echo("test");
                } catch (PDOException $PDOEx) {

                    echo($PDOEx);
                } finally {

                    $sql = "SELECT * FROM cars;";

                    // PDO prepare();
                    public PDO::prepare(

                        string $query,
                        array $options = []): PDOStatement|false

                    $stmt = $dbh->prepare($sql);
                    )

                    //PDO execute();
                    public PDOStatement::execute(?array $params = null): bool
                    $stmt->execute();

                }

                $stmt->fetch(); // hämtar första raden
                $stmt->fetchAll(); // hämtar alla rader
                rowcount();

                while($row = $stmt->fetch()) {

                    echo('<div>');
                    echo('<p>' . $row["regnr"] . '</p>');
                    echo('</div>');
                }

                frigöra minne vid SELECT:
                $stmt = null;
                $dbh = null;

                */
            ?>
        </main>
    </body>
</html>