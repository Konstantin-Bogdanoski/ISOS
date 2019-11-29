<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    //Tested Input:
    //    cenata na kaputot e:$100.5! Ok li e? Ako sakate kje dodadam ushte:$18%DDV
    //Received Output:
    //    118.5 $
    $totalPrice = 0;
    $data = str_split($_POST['data']);
    $number = 0;
    for ($i = 0; $i < sizeof($data); $i++) {
        //We found a Dollar, time to read the number
        if ($data[$i] == "$") {
            $number = "";
            $i++;
            $temp_i = $i;
            while (is_numeric($data[$temp_i]) ||
                (is_numeric($data[$temp_i - 1])
                    && $data[$temp_i] === "."
                    && is_numeric($data[$temp_i + 1]))) {
                $number .= $data[$temp_i];
                $temp_i++;
            }
            $i += $temp_i;
            $totalPrice += (float)$number;
        }
    }
    ?>
    <h1>Your total price is: <?php echo $totalPrice ?> $</h1>
    <?php
}
else
    header("Location: /");