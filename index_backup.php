<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hedgerow</title>
    <script src="app.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php //setup
        $index__array = [];
        for ($i = 0; $i < 12; $i++) {
            $index__array[$i] = $i;
        }
        // function getRandomIntFromArrayAndRemove($array) {
        //     global $index__array;
        //     $randInt = rand(1, sizeof($array)-1);
        //     $randIntFromArray = $array[$randInt];
        //     array_splice($array, $randInt, 1);
        //     $index__array = $array;
        //     // print_r($array);
        //     // print_r($index__array);
        //     return $randIntFromArray;
        // }
        // $three3box = 0;
        // $two2box1 = getRandomIntFromArrayAndRemove($index__array);
        // $two2box2 = getRandomIntFromArrayAndRemove($index__array);
        // $two2box3 = getRandomIntFromArrayAndRemove($index__array);
        // $two2box4 = getRandomIntFromArrayAndRemove($index__array);
        // $two2box5 = getRandomIntFromArrayAndRemove($index__array);
        
    ?>
    <section id="baseGrid">
        <?php for ($i = 0; $i < 17; $i++) {
            echo "<article class='box"
            // , ($i==$two2box1)?" two_two":""
            // , ($i==$two2box2)?" two_two":""
            // , ($i==$two2box3)?" two_two":""
            // , ($i==$two2box4)?" two_two":""
            // , ($i==$two2box5)?" two_two":""
            // , "'"
            // , ($i==$three3box)?"id='three_three'":""
            , ">
                <img class='box__img' src='https://images.unsplash.com/photo-1664513291148-4ff5b1d58566?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx'>
                </article>";
        } ?>
    </section>
</body>
</html>

<!-- 
    <p class='box__number'>" 
    . $i . 
    "</p> 
-->

<!-- // $randInt = rand(1, sizeof($inner_array)-1);
            // if ($randInt < 10) {
            //     $chosenValues[0] = ["0", strval($inner_array[$randInt])];
            // } else {
            //     $chosenValues[0] = str_split(strval($inner_array[$randInt]), 1);
            // }
            // array_splice($inner_array, $randInt, 1);

            // array_splice($inner_array, -3, 3);

            // $randInt = rand(1, sizeof($inner_array)-1);
            // $chosenValues[1] = str_split(strval($inner_array[$randInt]), 1);
            // array_splice($inner_array, $randInt, 1); -->

            <!-- function get3_3s() {
            // $max_value = 38;
            // $inner_array = [];

            // for ($i = 0; $i < $max_value; $i++) {
            //     $inner_array[$i] = $i;
            // }

            $chosenValues = [];

            

            $chosenValues[0][0] = rand(2, 8);
            $chosenValues[0][1] = rand(2, 5);

            return $chosenValues;
        }

        // function get2_2s() {
        //     $max_value = 49;
        //     $inner_array = [];

        //     for ($i = 0; $i < $max_value; $i++) {
        //         $inner_array[$i] = $i;
        //     }

        //     $chosenValues = [];

        //     $randInt = rand(1, sizeof($inner_array)-1);
        //     $chosenValues[0] = str_split(strval($inner_array[$randInt]), 1);
        //     array_splice($inner_array, $randInt, 1);

        //     array_splice($inner_array, -2, 2);

        //     $randInt = rand(1, sizeof($inner_array)-1);
        //     $chosenValues[1] = str_split(strval($inner_array[$randInt]), 1);
        //     array_splice($inner_array, $randInt, 1);

        //     array_splice($inner_array, -2, 2);

        //     $randInt = rand(1, sizeof($inner_array)-1);
        //     $chosenValues[2] = str_split(strval($inner_array[$randInt]), 1);
        //     array_splice($inner_array, $randInt, 1);

        //     array_splice($inner_array, -2, 2);

        //     $randInt = rand(1, sizeof($inner_array)-1);
        //     $chosenValues[3] = str_split(strval($inner_array[$randInt]), 1);
        //     array_splice($inner_array, $randInt, 1);

        //     return $chosenValues;
        // }

        $three3s = get3_3s();
        // print_r($three3s[0][0]);
        // print_r($three3s[0][1]);

        // $two2s = get2_2s();
        // var_dump($two2s); -->