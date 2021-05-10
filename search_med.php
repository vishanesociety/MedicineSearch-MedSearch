<?php

// Create connection
$host = 'localhost';
$username = 'root';
$password = '';
$databasename = 'med-search';

$conn = mysqli_connect($host, $username, $password, $databasename);
$name2 = $_POST['name2'];
$sql = "SELECT * FROM med_data WHERE med_name LIKE '%" . $_POST['name'] . "%'AND med_shop = '$name2'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

?>


        <div class="container" style="border: 1px solid #A8F2BC; margin-top: 1rem; margin-right:4rem; border-radius: 10px;">
            <div class="row" >
               <div style=" padding: 1rem ;display:flex; justify-content: center; align-items: center;">
                <div style=" width: 70%; margin-left: 1rem;" >
                    <h5><b><?php echo $row['med_name'] ?></b></h5>
                </div>
                <?php  // echo $_POST['name2'];?>
                <div style="width: 30%; text-align: left;" >
                <h5><b><?php echo $row['price'] ?> /- per 10 capsule </b></h5>
                </div>
                </div>
            </div>

        </div>


       
<?php

        // echo "	<tr>
        //           <td>".$row['med_name']."</td>
        //           <td>".$row['price']."</td>		          
        //         </tr>";
    }
} else {
    echo "<tr><td>0 result's found</td></tr>";
}

?>