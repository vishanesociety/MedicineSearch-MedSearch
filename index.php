<?php
session_start();
ob_start();
?>

<?php
if (isset($_POST['search'])) {
    $response = "<ul><li>No data found!</li></ul>";
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $databasename = 'med-search';

    $connection = new mysqli($host, $username, $password, $databasename);
    $q = $connection->real_escape_string($_POST['q']);

    $sql = $connection->query("SELECT med_name FROM med_data WHERE med_name LIKE '%$q%' limit 5");
    if ($sql->num_rows > 0) {
        $response = "<ul>";

        while ($data = $sql->fetch_array())
            $response .= "<li><h5>"  . $data['med_name'] .  "</h5></li>";

        $response .= "</ul>";
    }


    exit($response);
}
?>





<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.css">

    <!-- add this to webpage -->
    <title>Dawaaii - Search medicines in nearby pharmacies</title>
    <link rel="icon" href="assets/images/med.png" type="image/x-icon">
    <!-- till here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">




    <link rel="stylesheet" href="assets/css/style.css">

    <!-- for google api /start -->

    <!-- Google Maps JavaScript library -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyA75U5nC5tleDbvONkaGSy3DEAhIprCh_s"></script>


    <!-- google api end -->




    <style>
        @font-face {
            font-family: gilroy;
            src: url(assets/fonts/Gilroy-Light.otf) format("opentype");
        }


        body {

            font-family: gilroy;

            /* font-family: "Lato", sans-serif; */
        }

        .navigation {
            margin: 0% 2% 2% 3%;
        }

        .nav-down {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
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

        /*  .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }
        */
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

        .response {
            width: 75%;
            position: absolute;

            background-color: white;

        }
    </style>
    <!-- for location /start -->
    <style>
        #search_input {
            font-size: 18px;
        }

        .form-group {
            margin-bottom: 10px;
            margin-top: 50px;
        }

        .form-group label {
            font-size: 18px;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .form-group input:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        }

        .container {
            max-width: 1200px;
        }

        .response {
            text-align: left;
            margin: 4rem 0 0 5%;
            width: 100%;
            color: none;

        }
    </style>

    <!-- end -->


</head>

<body>

    <!-- this part was commented out 17-03-2021 -->

    <!--  <div id="mySidebar" class="sidebar" style="border-right: 1px solid #f2f2f2;">
        <a href="javascript:void(0) javascript:myBlurFunction(1)" class="closebtn" onclick="closeNav()">×</a>

        <div class="side-nav-input" style="width: 100%; margin: 5%; border-bottom: 1px solid grey;">
            <form action="result.php" method="get" style="margin-bottom: 5%;">
                <div class="input-group-prepend border-0">

                    <button id="button-addon45" type="button" name="index_search" style="border-radius: none;" class="btn btn-link text-info"></button>
                </div>


                <input type="text" id="search_input" name="search_box2" style="margin-right: 5%; width: 90%; height: 50px;" placeholder="search for area or streets" class="form-control ">

            </form>
        </div>
    -->
    <!-- <div class="front-form">
                    <form action="result.php" method="get">
                        <div class="input-group mb-4 border rounded-pill p-1" style="width: 60% ;">
                            <div class="input-group-prepend border-0">
                                <button id="button-addon45" type="button" name="index_search" style="border-radius: none;" class="btn btn-link text-info"></button>
                            </div>
                            <input type="text" id="search_input" name="search_box2" placeholder="search for area or streets" aria-describedby="button-addon4" class="form-control border-0" style="width: 80%; border-radius:none;">
                        </div>
                    </form>
                </div> -->

    <!-- <div style="border: 1px solid grey;"> 

                </div> -->

    <!-- this part was commented out 17-03-2021 -->

    <!--  <div class="location-btn-field" style="margin: 10% 0% 0 5%; border-style: none;  ">

            <button type="submit" class="" id="geo-loc-btn" name="geo-loc-btn" onclick="getLocation()" style="background-color: white; padding: 20px 40px 20px 40px; color: black; border: 1px solid grey; border-radius: none;"><i class="far fa-compass" style="color: black;"></i> Get current location</button>

        </div>
    -->


    <div id="mySidebar" class="sidebar" style="border-right: 1px solid #f2f2f2;">

        <div class="side-nav-input" style="width: 100%; margin: 5%; border-bottom: 1px solid grey;">
            <form action="result.php" method="get" style="margin-bottom: 5%;">
                <div class="input-group-prepend border-0">


                    <button id="button-addon45" type="button" name="index_search" style="border-radius: none;" class="btn btn-link text-info"></button>
                </div>
                <div style=" width:100% ;display:flex; justify-content: center; align-items:center;">
                    <div style="width: 15%; margin-right:3%;">
                        <a href="javascript:void(0) javascript:myBlurFunction(1)" class="closebtn" onclick="closeNav()">
                            <h2>×</h2>
                        </a>
                    </div>
                    <div style="width: 80%; ">
                        <input type="text" id="search_input" name="search_box2" style="margin-right: 8%; width: 83%; height: 50px;" placeholder="search for area or streets" class="form-control ">
                    </div>
                </div>
            </form>
        </div>




        <div class="location-btn-field" style="margin: 10% 0% 0 8%; border-style: none;  ">

            <button type="submit" class="" id="geo-loc-btn" name="geo-loc-btn" onclick="getLocation()" style="background-color: white; padding: 20px 47px 20px 47px; color: black; border: 1px solid grey; border-radius: none;"><i class="far fa-compass" style="color: black;"></i> Get current location</button>

        </div>










        <?php

        if (isset($_POST['button-addon45'])) {
            $search_data = $_POST['search_box2'];
            // $_SESSION['search_data'] = $search_data;
            header('location:result.php');
        }

        ?>

    </div>
    <div style="background: url('assets/images/image28.png'); height: 43rem;">
        <header class="header-area header-sticky">
            <nav class="navigation">

                <div class="nav-down" style="margin-top: 2%;">
                    <div class="location" style=" display: flex;  justify-content: center; align-items: center;">

                        <div>
                            <img style="height: 3rem; margin-right: 0.5rem; margin-top: 0.5rem;" src="assets/images/med.png" alt="">
                        </div>
                        <div>
                            <a onclick="openNav()" style="text-decoration: none; color: black; cursor: pointer;">
                                <p class="font-weight-light" style=" color:black;">location <i class="fas fa-chevron-down"></i></p>
                            </a>
                            <div id="output" style="text-align: center;">

                            </div>

                            <?php
                            // $variablePHP = '<script> document.write(showLocation()) </script>';
                            // echo $variablePHP;
                            ?>


                        </div>
                    </div>

                    <!--        <div class="nav-contact" style="display: flex; justify-content: center; align-items: center;">
                    <div>
                        <a href="https://wa.me/919631349717" style="text-decoration: none; color: black;">
                            <p class="font-weight-light" style=" color:black;">Need help ? Chat wth us</p>
                        </a>
                    </div>
                    <div style="margin-left: 0.5rem;">
                        <img src="assets/images/whatsapp.png" style="height: 2rem;" alt="">
                    </div>
                </div>  -->


                    <div class="nav-contact" style="  display: flex; justify-content: flex-end; align-items: center;">
                        <div>
                            <a href="https://wa.me/919631349717" style="text-decoration: none; color: black;">
                                <p class="font-weight-light h7" style=" color:black;">Need help ? Chat wth us</p>
                            </a>
                        </div>
                        <div style="margin-left: 0.5rem; margin-right: 2rem; display:flex; justify-content:center; align-items: center;">

                            <img src="assets/images/whatsapp.png" style="height: 2rem;" alt="">

                            <a href="after-login.php"><button class="btn btn-primary" style="margin-left:1rem; background-color: #74B9F9; padding: 10% 30% 10% 30%; border-radius: 10px; color:white; border:none;">Login</button></a>

                        </div>

                    </div>



                </div>
            </nav>

        </header>

        <div class="header-text" style="margin-top: -5px;">
            <div class="container" id="front-container">

                <div class="text-area">
                    <h1 class="display-1" style="color: black; margin: 5rem 0 1% 0;"><strong><b>Dawaaii</b></strong></h1>

                    <!-- <img src="assets/images/med.png" alt="" style="margin: 2% 7% 2% 0; height: 9rem;"> -->
                    <p class="h5" style="color: black;">Find any medicine in nearby pharmacies. Get it delivered or pickup in store </p>
                </div>




                <div class="front-form" style="display:flex; justify-content:center; align-items: center; width:100%;">
                    <form action="result.php" method="get" style="width:100%; ">

                        <div class="input-group mb-4 border rounded-pill p-1" style="background-color:white; width: 72%; text-align:center; margin-left:10%;">

                            <!--   top     width:85%    margin-left: 2.3rem; -->

                            <div class="input-group-prepend border-0">
                                <button id="button-addon4" type="button" name="index_search" class="btn btn-link text-info"><i class="fas fa-search" style="margin-top: 8px;  color:black;"></i></button>
                            </div>
                            <input type="hidden" id="second-box" name="second-box">

                            <input type="text" id="searchBox" style="border-radius: 30px;" name="search_box" placeholder="Type the name of your medicine/shop you are looking for" aria-describedby="button-addon4" class="form-control btn-lg bg-none border-0" style="width: 80%;" autocomplete="off">
                            <div class="col-md-5 response" id="response">

                            </div>

                        </div>

                        <input type="submit" class="btn btn-lg btn-success" name="submit" value="Search" style="background-color: #74B9F9; padding: 8px 60px; color: chite; margin-top: 2%; margin-right:10%; border:none;">
                    </form>

                </div>


                <?php

                if (isset($_POST['index_search'])) {
                    $search_data = $_POST['search_box'];
                    $_SESSION['search_data'] = $search_data;
                    header('location:result.php');
                }
                ?>

                <?php

                if (isset($_POST['submit'])) {
                    $search_data = $_POST['search_box'];
                    $_SESSION['search_data'] = $search_data;
                    $current_address = $_POST['second-box'];
                    echo $current_address;


                    header('location:result.php');
                }
                ?>




            </div>
        </div>




    </div>






    <section class="section" style="margin-top: 8rem;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="features-item" style="background-color: #74B9F9;">
                        <div class="features-icon" style="text-align: initial;">

                            <img src="assets/images/1.png" style="height: 4rem;" alt="">
                            <p class="h4" style="font-weight: 1000; color: black; margin-bottom: 1rem;"><b>Check item Stock</b></h4>
                            <p class="font-weight-normal" style="color: black; font-size: 1rem;">Check medicine inventory at numerous stores at a glance and easily find what you are looking for </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="features-item" style="background-color: #74B9F9 ;">
                        <div class="features-icon" style="text-align: initial;">

                            <img src="assets/images/2.png" style="height: 4rem;" alt="">
                            <p class="h4" style="font-weight: 1400; color: black; margin-bottom: 1rem;"> <b>Compare Prices</b></p>

                            <p class="font-weight-normal" style="color:black; font-size:1rem;">Check prices at different retailers to get the best deal, no matter what medicine you are searching for.</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="features-item" style="background-color: #74B9F9 ;">
                        <div class="features-icon" style="text-align: initial;">

                            <img src="assets/images/3.png" style="height: 4rem;" class="height:5rem;" alt="">
                            <p class="h4" style="font-weight: 1400; color: black; margin-bottom: 1rem;"> <b>Vocal for local</b></p>

                            <!-- <p class="font-weight-bold" style ="font-weight: 900; color: black;"><b>Vocal for local</b></p> -->
                            <p class="font-weight-normal" style="color: black; font-size: 1rem; ">Your local businesses need your help. Find the same medicine you might buy online from a local retailer</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="" style="margin: 4% 2% 10% 2%;">
        <div class="container">
            <div class="row" style=" display: flex; justify-content:space-around; align-items:center; background-color:#74B9F9; border-radius: 10px;">

                <div class="col-md-6" style=" margin-top: 1%; margin-left:3%;">

                    <h2 class="" style="margin-top: 5%; margin-bottom: 3%; font-weight: 1000;"><b>Help us get more inventory in your area </b></h2>
                    <p class="h6" style="margin-bottom: 5%;color:black;">Tell us which stores you’d like to see on Dawaaii and we’ll work with them to get their inventory online.</p>
                    <button type="button" class="btn  btn-lg" style="background-color: white; color: black; margin-bottom: 5%;"><b>Suggest a business</b></button>

                </div>
                <div class="col-md-4" style=" text-align:center; margin-left:5rem; margin-right:3rem; display:flex; justify-content:center; align-items:center;">
                    <img src="assets/images/house.png" alt="" style="height: 12rem; margin-left:20%;">
                </div>

            </div>
        </div>
        </div>
    </section>



    <section class="section" style="margin-top:-1rem;">
        <div class="sub-section" style="width: 82%; border-radius: 5px;">
            <div class="container" style="display: grid; justify-content: center; align-items: center;">

                <div class="">
                    <!-- <h3 style="text-align: center;">Unable to find the product, chat with us and we will help you out of the way to find it</h3> -->
                    <h2 class="text-center" style="font-size: 2rem; color:black; margin-bottom:2rem;">Unable to find the product, chat with us and we will help you out of the way to find it. </h2>
                </div>
                <div class="" style="margin: 3% auto;">
                    <a href="https://wa.me/919631349717"><button type="button" class="btn btn-secondary" style=" border-radius:10px;background-color: #74B9F9; color: black; height: 60px; ">
                            <h4><img src="assets/images/whatsapp.png" style="height: 2rem;" alt=""> <b>+91 7678394361</b></h4>
                        </button></a>
                </div>


            </div>
        </div>





    </section>
    <footer class="footer" style="margin-top: 3rem;">
        <div class="footer-top">
            <div style="margin-left: 2%;">
                <img src="assets/images/med.png" style="height: 4rem;" alt="">
            </div>
            <div style="margin-left: 2%;">
                <h1 class="display-4 font-weight-bold" style="color: white; margin-bottom: 4%; font-weight: 1000;"><b>Dawaaii</b></h1>
            </div>
        </div>
        <div class="container container-footer" style="margin-right:18rem;">
            <div class="row row-footer" style="margin-left: 8%;">
                <div class="footer-col">
                    <h4><b>Let us help you</b></h4>
                    <li><a href="#" style="color:black;">Contact Us</a></li>
                    <li><a href="#" style="color:black;">Privacy Policy</a></li>
                    <li><a href="#" style="color:black;">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4 class="font-weight-bold"><b>join us</b></h4>

                    <li><a href="#" style="color:black;">Retailers</a></li>
                    <li><a href="#" style="color:black;">Medical Representatives</a></li>
                    <!--    <li><a href="#"></a></li>   -->

                </div>
                <div class="footer-col">
                    <h4><b>About</b></h4>
                    <ul>
                        <li><a href="#">Careers</a></li>
                        <div class="footer-icons">
                            <img src="assets/images/instagram.png" alt="" style="height: 35px; margin: 2px; margin-top: 3%; margin-left: -2%;">
                            <img src="assets/images/facaebook.png" alt="" style="height: 30px; margin: 2px;">
                            <img src="assets/images/linkedin.png" alt="" style="height: 30px; margin: 2px;">
                        </div>

                    </ul>
                </div>

            </div>
        </div>
        <div class="footer-bottom">
            <h5 style="text-align: center; margin-top: 4%; margin-bottom: -4%;">Made with <i class="fas fa-heart" style="color: red;"></i> in India by Med Search 2021</h5>
        </div>
    </footer>


    <!-- jQuery -->
    <!-- <script src="assets/js/jquery-2.1.0.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>







    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "20rem";
            document.getElementById("main").style.marginLeft = "20rem";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#searchBox").keyup(function() {
                var query = $("#searchBox").val();

                if (query.length > 0) {
                    $.ajax({
                        url: 'index.php',
                        method: 'POST',
                        data: {
                            search: 1,
                            q: query
                        },
                        success: function(data) {
                            $("#response").html(data);
                        },
                        dataType: 'text'
                    });
                }
            });

            $(document).on('click', 'li', function() {
                var result = $(this).text();
                $("#searchBox").val(result);
                $("#response").html("");
            });
        });
    </script>


    <!-- for location search/ start -->

    <script>
        var searchInput = 'search_input';

        $(document).ready(function() {
            var autocomplete;
            autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
                types: ['geocode'],
                /*componentRestrictions: {
                 country: "IN",
                 postalCode: "221001",
                }*/
            });

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var near_place = autocomplete.getPlace();
            });
        });
    </script>

    <!-- end -->


    <!-- geoAPI script -->
    <script>
        var x = document.getElementById('output');

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "not supported";
            }
        }

        function showPosition(position) {
            // x.innerHTML = "latitude = " + position.coords.latitude;
            // x.innerHTML += "<br />"
            // x.innerHTML += "longitude = " + position.coords.longitude;
            var locAPI = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + position.coords.latitude + "," + +position.coords.longitude + "&key=AIzaSyA75U5nC5tleDbvONkaGSy3DEAhIprCh_s";
            // var locAPI = "http://maps.googleapis.com/maps/api/geocode/json?latlng=" + position.coords.latitude + "," + +position.coords.longitude + "&key=AIzaSyA75U5nC5tleDbvONkaGSy3DEAhIprCh_s";
            // x.innerHTML = locAPI;
            $.get({
                url: locAPI,
                success: function(data) {
                    console.log(data);
                    document.getElementById("second-box").value = data.results[0].address_components[1].long_name + ", " + data.results[0].address_components[2].long_name + ", " + data.results[0].address_components[3].long_name + ", " + data.results[0].address_components[4].long_name + ", " + data.results[0].address_components[6].long_name;


                    // x.innerHTML = data.results[0].address_components[1].long_name + ", ";
                    // x.innerHTML += data.results[0].address_components[2].long_name + ", ";
                    // x.innerHTML += data.results[0].address_components[3].long_name + ", ";
                    x.innerHTML += data.results[0].address_components[4].long_name + ", ";
                    x.innerHTML += data.results[0].address_components[5].long_name + ", ";
                    x.innerHTML += data.results[0].address_components[6].long_name;
                }
            });
        }
    </script>
    <!-- end -->



</body>

</html>