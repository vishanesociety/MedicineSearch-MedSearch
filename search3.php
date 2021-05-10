<?php
//error_reporting(0);
// Create connection
$host = 'localhost';
$username = 'root';
$password = '';
$databasename = 'med-search';

$conn = mysqli_connect($host, $username, $password, $databasename);
$sql = "SELECT * FROM med_data WHERE med_name LIKE '%".$_POST['name']."%' limit 10";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		
		?>

			<div class="contain" id="product-result"> 
                         <div class="result-product">
                            <div style="margin-left: 4%;">
                                <h5><b><?php  echo $row['med_shop'] ?></b></h5>
                            </div>
                            <div>
                                <h4><?php  echo $row['med_name'] ?></h4>
                            </div>
                            <div style="margin-right: 3%;">
                                <h4><b>Rs <?php  echo $row['price'] ?>/-</b></h4>
                            </div>
                        </div>
                        <div class="result-product-foot">
                            <div class="address-field">
                                <h6><?php  echo $row['address'] ?></h6>
                            </div>

                            <div class="button-field">
                                <a href="tel:<?php echo $row['contact'] ?>"><button type="button" class="btn btn-primary" style="background-color: #5fd37e; border: none; color: black; padding: 10px 20px 10px 20px; ">Book Pickup</button></a>
                                <a href="<?php echo $row['google-map'] ?>"><button type="button" class="btn btn-primary" style="background-color: #5fd37e; border: none; color: black; padding: 10px 20px 10px 20px;">Google Maps</button></a>
                            </div>
                        </div> 

                     </div>



		<?php
		
		
		
		
		
		
		
	}
}
else{
	echo "<tr><td>0 result's found</td></tr>";
}

?>