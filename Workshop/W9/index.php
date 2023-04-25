<?php

    session_start();
    session_regenerate_id(true);

    $title = "logga in";
    $html = "";

    if( isset($_SESSION["inloggad"]) ) {

        $inloggad = "true";
    } else {

        $inloggad = "false";
    }

    try {

        $dataSourceName = "mysql:" . "host=localhost;" . "dbname=cars;" . "charset=utf8";
        $userName = "myusername";
        $passWord = "mypassword";
        $dbhsOptions = array(

            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        $dbh = new PDO($dataSourceName, $userName, $passWord, $dbhsOptions);

        if(isset($_POST["btnLoggaIn"])) {

            $username = $_POST["txtUsername"];
            $password = $_POST["txtPassword"];

            $sql = "SELECT * FROM users WHERE username=:user AND password=:pass";

            /* prepare() innan bindValue() */
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(":user", $username);
            $stmt->bindValue(":pass", $password);

            $stmt->execute();
        
            /*
             * Använd alltid parametrar.
             * Detta är sårbart för SQL-injection: 
             * $sql = "SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password . "';";
             * $stmt = $dbh->prepare($sql);
             * $stmt->execute();
             */

            if($stmt->rowCount() > 0) {

                $title="S U P E R  U S E R";
                $inloggad = "true";

                $_SESSION["inloggad"] = $inloggad;
                $_SESSION["user"] = $username;
                //setcookie("inloggad", $inloggad, time() + 3600);
            }
        }

        $sql = "SELECT * FROM cars ORDER BY farg ASC";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        while($row = $stmt->fetch()) {

            $html = $html . "<tr><td>" . $row['fabrikat'] . "</td><td>" . $row['modell'] . "</td><td>" . $row['regnr'] . "</td><td style='background-color: " . $row["farg"] . "'>" . $row['farg'] . "<td><a href='" . $_SERVER["PHP_SELF"] "?cmd=delete&id=" . $row["id"] . "'>Ta bort</a></td></tr>";
        }

        if( $inloggad == "true" ) {
            if( isset($_POST["addCar"]) ) {

                try {

                    // kontrollera invärden
                    // kontrollera villkor
                    // kolla modell

                    $sql = "INSERT INTO cars(fabrikat, modell, regnr, farg) VALUES(:fabrikat, :modell, :regnr, :farg);";
                    
                    $stmt = null;
                    $stmt = $dbh->prepare($sql);
                    $stmt->bindValue(":fabrikat", $_POST["txtFabrikat"]);
                    $stmt->bindValue(":modell", $_POST["txtModell"]);
                    $stmt->bindValue(":regnr", $_POST["txtRegnr"]);
                    $stmt->bindValue(":farg", $_POST["txtFarg"]);
                    $stmt->execute();
                } 

                if( isset($_GET["cmd"])) {

                    if($_GET["cmd"] == "delete") {

                        $sql = "DELETE FROM cars WHERE id=:id";
                        $stmt = $dbh->prepare($sql);
                        $stmt->bindValue(":id", $_GET["id"]);
                        $stmt->execute();
                    }
                }
            }
        }
            
        } catch ( PDOException $e ) {

            echo('<div>' . $e->getMessage() . '</div>');
        } finally {

            echo('<script>console.log("null");</script>');
            $stmt = null;
            $dbh = null;
        }

?>


<!DOCTYPE html>
<html lang="sv">
    <head>
        <title><?php echo($title); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  
        <link href="assets/LoginForm.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   
    </head>
    <body>
    <div class="page-container">
        <!-- Login box -->  
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="loginmodal-container modal-content">
                    <form method="POST">
                        <h1>Logga in på ditt konto</h1><br/>                 
                        <input type="text" ID="txtUsername" name="txtUsername" placeholder="Användarnamn">
                        <input id="txtPassword" name="txtPassword" placeholder="Lösenord" type="password" />
                        <input type="submit" ID="btnLoggaIn" name="btnLoggaIn" value="Logga in" class="btn btn-primary w-100">   
                    </form>                         
                </div>
            </div>
		</div>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
                <a class="navbar-brand" href="#"><img src="assets/rooster-logo-silhouette-clipart.jpg" alt="logo" style="width: 10%; height:auto;"> Tuppenfina bilar!</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        
                        <li class="nav-item">
                            <a class="nav-link" id="nav-art" href="#"><span class="fas fa-car-side"></span> Lager</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-lev" href="#"><span class="fa fa-truck-moving"></span> Leveranser</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-cust" href="#"><span class="fa fa-users"></span> Kunder</a>
                        </li>
                       
                    </ul>
                   
                </div>
            </nav>
        </header>
        <main>
        <?php

            if($inloggad == "true") {
            
            ?>
                <table class="table">
                    <tr>
                        <th>Fabrikat</th>
                        <th>Modell</th>
                        <th>Regnr</th>
                        <th>Färg</th>
                    </tr>
                    <?php
                        echo($html);
                    ?>
                </table>

                <form method="POST">
                    Fabrikat: <input class="form-control" type="text" name="txtFabrikat"><br>
                    Modell: <input class="form-control" type="text" name="txtModell"><br>
                    Regnr: <input class="form-control" type="text" name="txtRegnr"><br>
                    Färg: <input class="form-control" type="color" name="txtFarg">
                    <input type="submit" name="addCar" value="Lägg till bil">
                </form>

                <?php
            }

        ?>
        </main>

    <?php

    if($inloggad != "true") {

        echo(
            "<script>"
            ."$('#login-modal').modal('show');"
            ."</script>"
        );
    }

    ?>

     
    </div>
    </body>
</html>