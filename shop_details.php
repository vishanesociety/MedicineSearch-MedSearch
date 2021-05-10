<?php
    session_start();
    ob_start();
   // error_reporting(0);
    // echo $_GET['name'];
    // echo $_GET['address'];
    // echo $_GET['contact'];
    // echo $_GET['location'];
    
     $name = $_GET['name'];
     $address = $_GET['address'];
     $contact = $_GET['contact'];
     $location = $_GET['location'];
     $opentime = $_GET['opentime'];
     $closetime = $_GET['closetime'];
     $contact = $_GET['contact'];
     $location = $_GET['google_maps'];
    //  echo $_GET['google_maps'];
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <title>Dawaaii - Search medicines in nearby pharmacies</title>
    <link rel="icon" href="assets/images/med.png" type="image/x-icon">


    <!-- <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

     <!-- for google api /start -->

    <!-- Google Maps JavaScript library -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyA75U5nC5tleDbvONkaGSy3DEAhIprCh_s"></script>


    <!-- google api end -->



    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/medjs.js"></script>
    <style>

    </style>

    <style>

    @font-face {
        font-family: gilroy;
        src: url(assets/fonts/Gilroy-Light.otf) format("opentype");
    }


        body {
            /* font-family: "Lato", sans-serif; */
            
             font-family: gilroy; 
             /* background-color: #1e1e1e; */


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
        .container{
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
                <div>
                    <a onclick="openNav()" style="text-decoration: none; color: black; cursor: pointer;">
                        <p class="font-weight-light" style=" color:black;">Location <i class="fas fa-chevron-down"></i></p>
                    </a>
                </div>
            </div>

            <div class="nav-contact" style="display: flex; justify-content: center; align-items: center;">
                <div>
                    <a href="https://wa.me/919631349717" style="text-decoration: none; color: black;">
                        <p class="font-weight-light" style=" color:black;">Need help ? Chat wth us</p>
                    </a>
                </div>
                <div style="margin-left: 0.5rem;"><img src="assets/images/whatsapp.png" style="height: 2rem;" alt=""></div>
            </div>
        </nav>

    </header>

         <input type="hidden" id="shop_name" value="<?php echo $name;?>"> 
    
    <section class="section" style="margin-top: -20px; width: 100%; margin-bottom: 10px">
        <div class="container" >
            <div class="row">

                <div id="store" class="tabcontent" style="width: 100%;">
                    <div class="contain-shop-details" style="width: 100%; ">
                        <div class="result-product" style="margin-top: 1rem;">
                            <div style=" display: flex; justify-content: center; align-items: center;">
                                <div>
                                    <img src="assets/images/store-icon.png" alt="" style="margin-right: 10px; height: 2rem;">
                                </div>
                                <div>
                                    <h3 class="font-weight-bold"><b><?php echo $name;?></b></h3>
                                </div>
                            </div>
                            <div class="" style="text-align: right;">
                                <a href="tel:<?php echo $contact; ?>"><button type="button" class="btn btn-primary" style="background-color: #5fd37e; border: none; color: black; padding: 10px 20px 10px 20px; border-radius:10px; margin-right: 1rem;"><b>Contact</b></button></a>
                                <a href="<?php echo $location; ?>"><button type="button" class="btn btn-primary" style="background-color: #5fd37e; border: none; color: black; padding: 10px 20px 10px 20px; border-radius:10px;"><b>Google Maps</b></button></a>
                            </div>

                        </div>
                        <div class="result-product-foot">
                            <div class="">
                                <h5><?php echo $address;?></h5>
                            </div>
                            <div style="margin-left: 5%; width:50%; text-align: end; ">
                                <h5 class="" ><?php echo $opentime;?> to <?php echo $closetime;?>, Mon to Sat</h5>
                            </div>

                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    

   <section>
       <div class="container">
           <div class="row">
               <div class="slide-nav-input">
                   <!-- <h4>class</h4> -->
                  <!-- <form action="" method="post" > --> 
                       
                       <i class="fas fa-search" style="position: absolute; margin-top:12px; margin-left: 10px; color:grey;"></i>
                        <input type="text" style="border-radius: 10px;" id="search" value="" placeholder="    search product in store" class="form-control ">
                        
                  <!-- </form>  -->
               </div>

                <table id="fetched-data-table" >

                </table>

                <div class="result-table" >
                    <!--      ajax table here       -->

                </div>

           </div>
       </div>
   </section>

   <div style="border: 1px solid grey; margin-top: 2rem;"></div>

   <section class="" style="margin: 4% 2% 10% 2%;">
        <div class="container">
            <div class="row" style="display: flex; justify-content:space-around; align-items:center; background-color:#A8F2BC; border-radius: 10px;">

                <div class="col-md-6" style=" margin-top: 1%; margin-left:3%;">

                    <h2 class="font-weight-bold" style="margin-top: 5%; margin-bottom: 3%;"><b>Help us get more inventory in your area </b></h2>
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

    
    <!-- <section class="section" id="promotion" style="margin-top: -8%;">
        <div class="sub-section" style="width: 82%; height: 250px; margin: auto;  border-radius: 5px;">
            <div class="container" style="display: grid; justify-content: center; align-items: center;">

                <div>
                    <h2 style="text-align: center;">Unable to find the product?, chat with us and we will help you out of the way to find it</h2>
                </div>
                <div style="margin: 3% auto;">
                <a href="https://wa.me/919631349717"><button type="button" class="btn btn-secondary" style="background-color: #A8F2BC; color: black; height: 60px; ">
                        <h5><img src="assets/images/whatsapp.png" style="height: 2rem;" alt=""> +91 7678394361</h5>
                    </button></a>
                </div>


            </div>
        </div> -->
        <section class="section" >
        <div class="sub-section" style="width: 82%; border-radius: 5px;">
            <div class="container" style="display: grid; justify-content: center; align-items: center;">

                <div class="">
                    <!-- <h3 style="text-align: center;">Unable to find the product, chat with us and we will help you out of the way to find it</h3> -->
                    <h2 class="text-center" style="font-size: 2rem; color:black; margin-bottom:2rem;">Unable to find the product, chat with us and we will help you out of the way to find it. </h2>
                </div>
                <div class = "" style="margin: 3% auto;">
                    <a href="https://wa.me/919631349717"><button type="button" class="btn btn-secondary" style="background-color: #A8F2BC; color: black; height: 60px; border-radius:10px;">
                    <h4 ><img src="assets/images/whatsapp.png" style="height: 2rem;" alt=""> <b>+91 7678394361</b></h4>
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

    <!-- Bootstrap -->
    <!-- <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

    <!-- <script src="assets/js/owl-carousel.js"></script> -->

    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "300px";
            document.getElementById("main").style.marginLeft = "300px";
            
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>
   
   
        <!-- new code -->
        
          <script type="text/javascript">
      $.ajax({
        type:'POST',
        url:'search_med.php',
        data:{
          name:$("#search").val(),
          name2:$("#shop_name").val(),
        },
        success:function(data){
          $("#fetched-data-table").html(data);
        }
      });
  
</script>      
           
        
        
        <!-- new code ends here-->
   
   
   
   
    <script type="text/javascript">
  $(document).ready(function(){
    $("#search").keypress(function(){
      $.ajax({
        type:'POST',
        url:'search_med.php',
        data:{
          name:$("#search").val(),
          name2:$("#shop_name").val(),
        },
        success:function(data){
          $("#fetched-data-table").html(data);
        }
      });
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

    


</body>

</html>