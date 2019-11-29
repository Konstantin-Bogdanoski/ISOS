<?php
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
if($_SERVER['REQUEST_METHOD'] === "GET"){
    require_once ("../config/connection.php");
    $query = "SELECT * FROM car ORDER BY date_added DESC";
    $allCars = $conn->prepare($query);
    $allCars->execute();
    if($allCars->rowCount() > 0){
        ?>
        <table style="width: 100%; border: 2px solid black">
            <thead>
            <tr>
                <th style="width: 20%; border: 2px solid black">
                   Date
                </th>
                <th style="width: 20%; border: 2px solid black">
                    Car
                </th>
                <th style="width: 20%; border: 2px solid black">
                    Owner
                </th>
                <th style="width: 20%; border: 2px solid black">
                    Mechanic
                </th>
                <th style="width: 20%; border: 2px solid black">
                    Price
                </th>
            </tr>
            </thead>
        <?php
        while($car = $allCars->fetchAll()){
            for($i=0; $i<count($car); $i++){
                $car_id = $car[$i]['car_id'];
                $owner_id = $car[$i]['owner_id'];
                $query = "SELECT * FROM owner WHERE owner_id=?";
                $ownerList = $conn->query($query.$owner_id);
                $owner = $ownerList->fetchAll();
            }
        }
    }

} else if ($_SERVER['REQUEST_METHOD'] === "POST"){

}