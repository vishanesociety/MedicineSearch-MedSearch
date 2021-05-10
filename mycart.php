<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dawaaii - Search medicines in nearby pharmacies</title>
    <link rel="icon" href="assets/images/med.png" type="image/x-icon">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/medjs.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    

    <style>
        @font-face {
            font-family: gilroy;
            src: url(assets/fonts/Gilroy-Light.otf) format("opentype");
        }

        body {
            /* font-family: "Lato", sans-serif; */
            font-family: gilroy;

        }

        .navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: white;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: rgb(89, 218, 89);
            display: block;
            transition: 0.3s;
        }

        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #111;
            color: white;
            padding: 10px 15px;
            border: none;
        }

        .openbtn:hover {
            background-color: #444;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidebar {
                padding-top: 15px;
            }

            .sidebar a {
                font-size: 18px;
            }
        }

        .container {
            max-width: 1200px;
        }
    </style>
</head>

<body>

    <header class="header-area header-sticky">

        <nav class="navigation">

            <div id="mySidebar" class="sidebar">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

                <div class="side-nav-input" style="width: 100%; margin: 5%; border-bottom: 1px solid grey;">
                    <form action="" method="post" style="margin-bottom: 5%;">
                        <input type="text" id="search_input" style="margin-right: 5%; width: 90%; height: 50px;" placeholder="search for area or streets" class="form-control ">
                    </form>
                </div>

                <div class="location-btn-field" style="margin: 10% 5% 0 5%; border-style: none;  ">

                    <button type="button" class="btn btn-primary btn-lg" style="background-color: white; height: 70px; color: black; border-color: grey; "><i class="far fa-compass" style="color: black;"></i> Get current location</button>

                </div>

            </div>



            <div class="location" style=" display: flex;  justify-content: center; align-items: center;">
                <div>
                    <a href="index.php"> <img style="height: 3rem; margin-right: 0.5rem; margin-top: 0.5rem;" src="assets/images/med.png" alt=""></a>
                </div>
                <!-- <div>
                    <a onclick="openNav()" style="text-decoration: none; color: black; cursor: pointer;">
                        <p class="font-weight-light" style=" color:black;">Location <i class="fas fa-chevron-down"></i></p>
                    </a>
                </div> -->
                <div><a href="result.php" style="color:black;"><i class="fas fa-backward"></i> <b>Continue</b></a></div>                
            </div>

            <div class="nav-contact" style="display: flex; justify-content: center; align-items: center;">
                <div>
                    <a href="https://wa.me/919631349717" style="text-decoration: none; color: black;">
                        <p class="font-weight-light" style=" color:black;">Need help ? Chat wth us</p>
                        <!-- <a href="mycart.php" class="btn btn-outline-success">My Cart (0)</a> -->
                    </a>
                </div>
                <div style="margin-left: 0.5rem;"><img src="assets/images/whatsapp.png" style="height: 2rem;" alt=""></div>
            </div>
        </nav>

    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light ">
                <h1>My Cart</h1>

            </div>

            <div style="overflow: auto;" class="col-lg-9 my-3">

                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col" >Serial No.</th>
                            <th scope="col" >Item Name</th>
                            <th scope="col" >Shop Name</th>
                            <th scope="col" >Item Price</th>
                            <th scope="col" >Quantity</th>
                            <th scope="col" >Total</th>
                            <th scope="col" ></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                        <?php

                        //$total = 0;
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                //print_r($value);

                                $serno = $key + 1;
                                //$total = $total+$value['Price'];
                                echo "
                            <tr>
                                <td>$serno</td>
                                <td>$value[Item_Name]</td>
                                <td>$value[Shop_Name]</td>
                                <td>₹$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
                                <td><input class='text-center iquantity' onchange='subTotal()' type='number' value='$value[Quantity]' min='1' max='50'></td>
                                <td class='itotal'></td>
                                <td>
                                    <form action='manage_cart.php' method='POST'>
                                        <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                                        <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                                    </form>
                                </td>
                            </tr>
                          ";
                            }
                        }
                        ?>


                    </tbody>
                </table>

            </div>

            <div class="col-lg-3 my-4">
                <div class="border bg-light rounded p-4">
                    <h4>Grand Total:( <b>₹</b> )</h4>

                    <h5 class='text-right' id="gtotal"></h5>
                    <br>
                    <form action="">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Cash on Delivery
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Online Payment
                            </label>
                        </div>
                        <br>
                        <button class="btn btn-primary btn-block">Make Payment</button>
                    </form>

                </div>
            </div>

        </div>
    </div>

    <script>
        var gt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var gtotal = document.getElementById('gtotal');

        function subTotal() {
            gt = 0;
            for (i = 0; i < iprice.length; i++) {
                itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);
                gt = gt + (iprice[i].value) * (iquantity[i].value);
            }
            gtotal.innerText = gt;
        }

        subTotal();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>


</body>

</html>