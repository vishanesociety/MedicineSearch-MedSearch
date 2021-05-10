<?php
//error_reporting(0);
// Create connection
session_start();
ob_start();
$host = 'localhost';
$username = 'root';
$password = '';
$databasename = 'med-search';

$conn = mysqli_connect($host, $username, $password, $databasename);
$sql = "SELECT * FROM med_data2 WHERE med_shop LIKE '%" . $_POST['name'] . "%' limit 3";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
        <?php
        $address = $row['address'];
        ?>

            <div class="contain">
            <div class="result-product">
                <?php
                $name_shop = $row['med_shop'];
                ?>
                <div style="margin-left: 2.5%; display: flex; justify-content: center; align-items: center;">
                    <div>
                        <img src="assets/images/store-icon.png" alt="" style="margin-right: 10px; height: 45px;">
                    </div>

                    <!-- <h2> data from search2 </h2> -->
                    <div>
                        <h3><b><?php echo $row['med_shop'] ?></b></h3>
                    </div>
                </div>

                <div class="" style="margin-right: 3%; width: 40%; text-align: right;">

                    <a href="shop_details.php?name=<?php echo $row['med_shop']; ?>&address=<?php echo $row['address']; ?>&contact=<?php echo $row['contact']; ?>&location=<?php echo $row['location']; ?>&opentime=<?php echo $row['opening-time']; ?>&closetime=<?php echo $row['closing-time']; ?>&contact=<?php echo $row['contact']; ?>&google_maps=<?php echo $row['google-map']; ?>">
                        <button type="submit" name="explore-store" value="<?php echo $row['med_shop'] ?>" class="btn btn-primary" style="background-color: #5fd37e; border: none; color: black; padding: 2% 4% 2% 4%; margin-left: 35%; border-radius:10px;"><b>Explore Store</b></button>                       
                    </a>

                </div>
            </div>
            <div class="result-product-foot">
                <div class="address-field">
                    <h5><?php echo $row['address'] ?></h5>
                </div>

                <div class="button-field">
                    <a href="tel:<?php echo $row['contact']?>"><button type="button" class="btn btn-primary" style="background-color: #5fd37e; border: none; color: black; padding: 3% 5% 3% 5%; margin: 0.3rem; border-radius:10px; margin-right:1rem;"><b>Contact</b></button></a>
                    <a href="<?php echo $row['google-map']?>"><button type="button" class="btn btn-primary" style="background-color: #5fd37e; border: none; color: black; padding: 3% 5% 3% 5%; border-radius:10px;"><b>Google Maps</b></button></a>



                </div>
        
                <?php

                if (isset($_POST['explore-store'])) {
                    // $search_data = $_POST['explore-store'];
                    $name =  $row['med_shop'];
                    $address =  $row['address'];
                    $contact =  $row['contact'];
                    $location = $row['location'];
                    $opentime = $row['opening-time'];
                    $closetime = $row['closing-time'];


                    $_SESSION['sent_shop_name'] = $name;
                    $_SESSION['sent_shop_address'] = $address;
                    $_SESSION['sent_shop_contact'] = $contact;
                    $_SESSION['sent_shop_location'] = $location;
                    $_SESSION['sent_shop_opentime'] = $opentime;
                    $_SESSION['sent_shop_closetime'] = $closetime;

                    header('location:shop_details.php');
                }
                ?>
            </div>

        </div>

<?php

    }
} else {
    echo "<tr><td>0 result's found</td></tr>";
}

?>