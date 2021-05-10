<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dawaaii - Search medicines in nearby pharmacies</title>
    <link rel="icon" href="assets/images/med.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <title>Dawaaii - Search medicines in nearby pharmacies</title>
    <link rel="icon" href="assets/images/med.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

</head>

<style>
    body {
        background-image: url('assets/images/image32.png');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
    }

    @font-face {
        font-family: gilroy;
        src: url(assets/fonts/Gilroy-Light.otf) format("opentype");
    }


    body {

        font-family: gilroy;

        /* font-family: "Lato", sans-serif; */
    }

    .display-sec {
        margin-top: 10%;
    }

    .container {
        max-width: 1200px;
    }

    .nav-contact {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
</style>


<body>

    <header class="header-area header-sticky">


        <nav class="navigation">

            <div class="nav-down" style="display: flex; justify-content:space-between; align-items:center;margin-top: 2%;">
                <div class="location" style=" margin-left: 2%; display: flex;  justify-content: center; align-items: center;">

                    <div >
                        <a href="index.php"><img style=" height: 3rem; margin-right: 0.5rem; " src="assets/images/med.png" alt=""></a>
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

                <div class="" style=" margin-right:2%; display: flex; justify-content: center; align-items: center; ">
                    <div>
                        <a href="https://wa.me/919631349717" style="text-decoration: none; color: black; ">
                            <p class="font-weight-light" style=" color:black;">Need help ? Chat wth us</p>
                        </a>
                    </div>
                    <div style="margin-left: 0.5rem;  margin-top:-7%; ">
                        <img src="assets/images/whatsapp.png" style="height: 2rem;" alt="">
                    </div>
                </div>
            </div>
        </nav>

    </header>


    <section class="display-sec">
        <div class="container">
            <div class="row">
                <div style="height: 12rem;">
                    <img src="assets/images/image29.png" style="height:100%;" alt="">
                </div>
                <p class="h2" style="margin-top: 2rem ;"><b>Thank you!<br>Please check your <br> Whatsapp/Message App</b></p>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>



</body>

</html>