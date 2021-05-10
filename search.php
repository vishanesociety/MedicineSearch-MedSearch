<?php
//error_reporting(0);
// Create connection
$host = 'localhost';
$username = 'root';
$password = '';
$databasename = 'med-search';

$conn = mysqli_connect($host, $username, $password, $databasename);
$sql = "SELECT * FROM med_data WHERE med_name LIKE '%" . $_POST['name'] . "%' limit 10";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

?>

        <div class="contain" id="product-result">
           <form action="manage_cart.php" method="POST">
            <div class="result-product">
                <div style="margin-left: 3%;">
                    <h4><b><?php echo $row['med_shop'] ?></b></h4>
                </div>

                <!-- <h2> data from search </h2> -->

                <div style="text-align: left;">
                    <h3><?php echo $row['med_name'] ?></h3>
                </div>
                <div style="margin-right: 3%;">
                    <h4><b>Rs <?php echo $row['price'] ?>/-</b></h4>
                </div>
            </div>
            <div class="result-product-foot">
                <div class="address-field" style="text-align:left;">
                    <h5><?php echo $row['address'] ?></h5>
                </div>

                <div class="button-field" style="text-align: right;">
                    <button type="submit" class="btn btn-primary" name="Add_To_Cart" style="background-color: #5fd37e; border: none; color: black; padding: 3% 5% 3% 5%; margin: 0.3rem;  border-radius:10px;"><b>Book Pickup</b></button>
                    <input type="hidden" name="Item_Name" value="<?php echo $row['med_name'] ?>">
                    <input type="hidden" name="Price" value="<?php echo $row['price'] ?>">
                    <input type="hidden" name="Shop_Name" value="<?php echo $row['med_shop'] ?>">
              
                    <a href="<?php echo $row['google-map'] ?>"><button type="button" class="btn btn-primary" style="background-color: #5fd37e; border: none; color: black; padding: 3% 5% 3% 5%; border-radius:10px;"><b>Google Maps</b></button></a>
                </div>
            </div>
            </form>
        </div>



<?php







    }
} else {
    echo "<tr><td>0 result's found</td></tr>";
}

?>