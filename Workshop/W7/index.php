<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>PHP W6</title>

        <!-- 9. -->
        <style>
            img { height: 20%; width: 15%; }
        </style>
    </head>

    <body>

        <main>    
            <?php

                /*
                    Bilder på tärningar (1-6):
                    <img src="https://openclipart.org/download/282132/Die6.svg" />
                    <img src="https://openclipart.org/download/282131/Die5.svg" />
                    <img src="https://openclipart.org/download/282130/Die4.svg" />
                    <img src="https://openclipart.org/download/282129/Die3.svg" />
                    <img src="https://openclipart.org/download/282128/Die2.svg" />
                    <img src="https://openclipart.org/download/282127/Die1.svg" />
                    
                    1. Slumpa ett tal mellan 1 och 6 och skriv ut resultatet.
                        se rand() funktionen på https://www.php.net/manual/en/function.rand.php
                    2. Skriv ut resultatet från punkt 1 i ett p-element.
                    3. Med iteration (for) slumpa 6 tal mellan 1 och 6 och skriv ut resultatet.
                    4. Skriv ut resultatet från punkt 3 i ett div-element och varje framslumpat tal i 
                        ett eget p-element.
                    5. Summera alla framslumpade tal och skriv ut summan i ett eget p-element.
                    6. För varje framslupat tal mellan 1 och 6 skriv ut ett img-element som pekar
                        (använd src-attributet) på en bild som matchar en tärning (se ovan).
                    7. Om tid finns! Skapa använd instruktionerna ovan för img-element och skapa en vektor där varje img-element
                        finns i ett eget index. Revidera sedan punkt 6 och använd vektorn och ett framslupat värde (=vektorindex)
                        för att skriva ut img-element instruktionerna.
                    8. Gör om punkt 3 och 4 med med while och do while iteration.
                    9. Använd CSS för att minska bilderna till en storlek där alla tre tärningar visas på samma rad.
                    10. Lägg till alt-attributet för bilderna och validera sedan er kod.
                    
                */

                //echo('<p>' . rand(1, 6) . '</p>');

                /*
                for($i = 1; $i < 7; $i++) {
                    $rand = rand(1, 6);

                    echo('<h' . $rand . '>');
                        echo('<p>');
                            echo($rand);
                        echo('</p>');
                    echo('</h' . $rand . '>');
                }
                */

                /*
                echo('<div class="div-container">');
                    echo('<p>');
                    $sum = 0;
                        for($i = 1; $i < 7; $i++) {
                            $rand = rand(1, 6);

                            echo($rand . ' ');
                            $sum += $rand;
                        }
                    echo('</p>');

                    echo('<p>' . 'Summan: ' . $sum . '</p>');
                echo('</div>');
                */

                /*
                $printStr = "";
                $printStr.= '<div class="div-container">';
                $sum = 0;

                    for($i = 1; $i < 7; $i++) {
                        $rand = rand(1, 6);

                        $printStr .= '<p>';
                        $printStr .= $rand;
                        $printStr .= '</p>';
                        $sum += $rand;
                    }
                    $printStr .= '</div>';

                echo('<p>' . 'Summa: ' . $sum . '</p>');
                echo($printStr);

                */

                // Uppgift 6.
                $sum = 0;
                echo('<div class="div-container">');
                for($i = 1; $i < 7; $i++) {
                    $imgDefaultString = "<img src=\"https://openclipart.org/download/2821";
                    $rand = rand(1, 6);

                    $imgDefaultString .= (26 + $rand) . "/Die";
                    //echo($imgDefaultString . $rand . '.svg"' . 'alt="Die: ' . $rand . '"/>');
                    $sum += $rand;
                }
                //echo('<p>' . 'Summan: ' . $sum . '</p>');
                echo('</div>');
                
                // Uppgift 7.
                define('IMG', 'https://openclipart.org/download/2821');
                $vektor = [];

                for($i = 1; $i < 7; $i++) {

                    $vektor[$i] = IMG . (26 + $i) . '/Die' . $i . '.svg';
                }

                /*
                echo('<pre>');
                    print_r($vektor);
                echo('</pre>');
                */

                /*
                for($i = 1; $i < 7; $i++) {

                    $rand = rand(1, 6);
                    echo('<img src="' . $vektor[$rand] . '"/>');
                }
                */
            ?>
               
            <!-- Uppgift 8 -->
            <form method="POST">
                <input type="submit" name="kasta" value="kasta!" />
            </form>

            <?php

                if(isset($_POST["kasta"])) {

                    echo('<h3>' . 'Tärningarna kastade..' . '</h3>');
                    $sum = 0;
                    $sumTotal = "";
                    $diceStr = "";

                        for($i = 1; $i < 7; $i++) {
                            $rand = rand(1, 6);
                            $sum += $rand;

                            $diceStr .= ('<img src="' . $vektor[$rand] . '" />');
                        }
                        //echo('<p>' . 'Summan: ' . $sum . '</p>');
                    
                    $sumTotal = ('<p>' . 'Summan: ' . $sum . '</p>');

                    echo($sumTotal);
                    echo($diceStr);
                }

            ?>

        </main>

    </body>

</html>