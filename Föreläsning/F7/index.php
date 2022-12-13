<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>PHP F7</title>
    </head>
    <body>
        <main>
            <?php 

                //Kodexempel med utskrift och variabler
                echo('Hallå');

                $hej = "hej";
                echo('<p>' . $hej . '</p>');

                $num = 123;
                $str = "String";

                echo('<p>' . gettype($num) . ' | ' . gettype($str) . '</p>');

                // Ändra från int till t.ex. string.
                $int = 345;
                $boolean = true;
                $str = '678';
                $str2 = 'abcd23213';
                setType($int, "string");
                setType($boolean, "string");
                setType($str, "integer");
                setType($str2, "integer");

                echo('<p>' . $int . '</p>');
                echo('<p>' . $boolean . '</p>');
                echo('<p>' . $str . '</p>');
                echo('<p>' . $str2 . '</p>');

                //Kodexempel med selektion

                $klienthp = 3.5;
                $serverph = 4.5;
                $helkurs = 7.5;

                if($klienthp + $serverph === $helkurs) {

                    echo('du är klar.');
                } else {

                    echo('du har saker kvar.');
                }

                //Kodexempel med iteration

                for($i = 1; $i < 7; $i++) {

                    echo('<h' . $i . '>' . 'Header: h' . $i . '</h' . $i . '/>');
                }

                // Köra javascript i php:
                echo("<script>alert('hallå');</script>");

                echo("<p style=\"background-color: red;\">Hej</p>");

                $array = array(
                    'Ett' => 1,
                    'Två' => 2,
                    'Tre' => 3
                );

                print_r($array);

                echo('<pre>');
                print_r($array);
                echo('</pre>');

            ?>
        </main>
    </body>
</html>