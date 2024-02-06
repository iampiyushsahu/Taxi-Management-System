<?php
include 'taxi_database_connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login1'])) {
        $email = $_POST['email1'];
        $password = $_POST['pass1'];
        $sql = "SELECT * from taxi_login where email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $a = mysqli_fetch_assoc($result);
            $_SESSION['a'] = $a['name'];
        }
    }
?>
    <?php
    if (empty($email) || empty($password)) {
    ?>
        <div class="con">
            <?php
            echo "please enter email or password";
            ?>
        </div>
        <?php
    } else {
        $sql1 = "SELECT * from taxi_login where email = '$email'";
        $result1 = mysqli_query($conn, $sql);
        $num1 = mysqli_num_rows($result);
        if ($num1 == 0) {
        ?>
            <div class="con">
                <?php
                echo "please enter Valid email";
                ?>
            </div>
<?php
        }
    }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .img1 {
            height: 50px;
            width: 50px;
            border-radius: 10px;

            margin: 10px !important;

        }

        .navbar1 {
            font-size: x-large !important;
        }

        .button1 {
            margin-right: 50px;
            border-radius: 10px;
        }

        .button1:hover {
            background-color: white;
            color: black;
        }

        .p1 {
            margin-right: 50px;
            white-space: nowrap;
            display: flex;
            gap: 100px;
        }

        .logout {
            margin-top: 15px;
        }

        .p2 {
            margin-top: 12px;
            padding: 10px;
            width: 150px;
        }

        .p3 {
            background-color: black !important;
            color: white !important;
        }

        .con {
            background-color: red;
            color: white;
            text-align: center;
        }

        .img2 {
            height: 500px !important;
        }

        .h2 {
            text-align: center;
            margin-top: 20px;
        }

        .p4 {
            text-align: center;
            color: gray;
        }

        .separation {
            border: 1px solid gray;
        }

        .container {
            text-align: center;
        }

        .btn-dark:hover {
            background-color: white;
            color: black;
        }

        .dd {
            background-color: green;
            color: white;

            height: 30px;
            display: flex;
            gap: 1200px;

        }

        .ddd {
            background-color: black;
            color: white;
        }

        .ddd:hover {
            background-color: white;
            color: black;
        }

        .div_black {
            height: 800px;
            background-image: url(taxiimg/y.png);
            background-position: center center;
            background-size: 800px;
            background-repeat: no-repeat;
            height: 100vh;
            position: relative;
            background-color: black;
        }

        .box {
            height: 100vh;
            width: 100%;
            opacity: 0.4;
            background-color: black;
            position: absolute;
            top: 0;
        }

        .our_service {
            color: white;
            text-align: center;
            font-size: xx-large;
            padding-top: 5px;
        }

        .other_service {
            background-color: cornsilk;
            padding: 20px;
        }

        .pp {
            text-align: center;
            color: white;
            padding-left: 30px;
        }

        .b {
            display: flex;
            padding: 50px;
            margin-left: 250px;
            font-size: larger;
        }

        .ppp {
            background-color: cornsilk;
            color: black;
            width: 300px;
            height: 200px;
        }

        .footer1 {
            display: flex;
            justify-content: space-between;
        }

        .home1 {
            padding-left: 100px !important;
            color: cadetblue !important;
    font-family: cursive !important;
        }
    </style>
</head>

<body>
    <!-- nav bar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img src="taxiimg/taxi.png" alt="" class="img1">
            <a class="navbar-brand navbar1" href="#">Taxi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link home1" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link home1" href="booking.php">Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active home1" href="taxi.php">Taxi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link home1" aria-disabled="true" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active home1" aria-disabled="true" href="my_profile.php">My Profile</a>
                    </li>
                </ul>
            </div>
        </div>
        <?php
        if (!empty($_SESSION['name'])) {
        ?>
            <div class="welcome_box p1">
                <div class="welcome_box_child1">
                    <p class="p2"><?php echo "Welcome    " . $_SESSION['login_name']; ?></p>

                </div>
                <div class="logout">
                    <a href="logout.php">
                        <button class="btn btn-danger p3">logout</button>
                    </a>

                </div>

            </div>
        <?php
        } elseif (!empty($_SESSION['a'])) {
        ?>
            <div class="welcome_box p1">
                <div class="welcome_box_child1">
                    <p class="p2"><?php echo "Welcome    " . $_SESSION['login_name']; ?></p>

                </div>
                <div class="logout">
                    <a href="logout.php">
                        <button class="btn btn-danger p3">logout</button>
                    </a>

                </div>

            </div>
        <?php
        } else {
        ?>
            <!-- <button type="button" class="btn btn-dark button1" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button> -->
            <p><?php echo "Taxi management system"; ?></p>
            <script>
                window.location.replace('home.php');
            </script>
        <?php
        }

        ?>
    </nav>
    <?php
    if (!empty($_SESSION['c'])) {
    ?>
        <div class="dd">
            <p><?php echo "booked " . $_SESSION['c']." " . $_SESSION['car_name']  ?></p>
            <?php $_SESSION['c'] = ""; ?>
            <a href="taxi.php"><button class="ddd dd">Back to page</button></a>

        </div>
    <?php
    }
    ?>
    <!-- carosuel -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="taxiimg/taxi_wall.png" class="d-block w-100 img2" alt="...">
            </div>
            <div class="carousel-item">
                <img src="taxiimg/city_taxi.png" class="d-block w-100 img2" alt="...">
            </div>
            <div class="carousel-item">
                <img src="taxiimg/t.png" class="d-block w-100 img2" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container">
        <h2 class="h2">See All The Taxi | Private Taxi</h2>
        <div class="p4">
            <p>See the transfer prices below Milan to Como . You can review pictures of the automobiles at the Automobile Fleet page To order transfer/private taxi <br> for the selected route, please go to the Order page.</p>
        </div>
        <div class="separation"> </div>
    </div>

    <!-- Cards -->

    <div class="container">
        <div class="row">
            <?php
            $sql = "SELECT * from all_taxis";
            $result1 = mysqli_query($conn, $sql);
            while ($a = mysqli_fetch_assoc($result1)) {
            ?>
                <div class="col-md-4">
                    <!-- card 1 -->
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $a['taxi_image'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $a['taxi_name'] ?></h5>
                            <p class="card-text"><b><?php echo $a['taxi_seats'] . " SEATER." ?> </b> <br> <b>PRICE:</b> 1000 Rs. Per km</p>
                            <a href="taxi_book_form.php?id=<?php echo $a['id'] ?>"><button class="btn btn-dark" name="audi">BOOK NOW</button></a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- <form action="" method="post">
            <div class="col-md-4"> -->
    <!-- card 2 -->
    <!-- <div class="card" style="width: 18rem;">
                    <img src="taxiimg/maruti_taxi.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Maruti Suzuki</h5>
                        <p class="card-text"><b>5 SEATER.</b> <br> <b>PRICE:</b> 50 Rs. Per km</p>
                        <button class="btn btn-dark" name="maruti">BOOK NOW</button>
                    </div>
                </div>
            </div>
            </form> -->
    <!-- <div class="col-md-4"> -->
    <!-- card 3  -->
    <!-- <div class="card" style="width: 18rem;">
                    <img src="taxiimg/toyota.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Toyota</h5>
                        <p class="card-text"><b>7 SEATER.</b> <br> <b>PRICE:</b> 100 Rs. Per km</p>
                           <a href="taxi_book_form.php" class="btn btn-dark" name="toyota">BOOK NOW</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4"> -->
    <!-- card 4 -->
    <!-- <div class="card" style="width: 18rem;">
                    <img src="taxiimg/thar.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Thar</h5>
                        <p class="card-text"><b>4 SEATER.</b> <br> <b>PRICE:</b> 200 Rs. Per km</p>
                        <a href="taxi_book_form.php" class="btn btn-dark" name="thar">BOOK NOW</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4"> -->
    <!-- card 5 -->
    <!-- <div class="card" style="width: 18rem;">
                    <img src="taxiimg/skoda.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Skoda</h5>
                        <p class="card-text"><b>5 SEATER.</b> <br> <b>PRICE:</b> 100 Rs. Per km</p>
                        <a href="taxi_book_form.php" class="btn btn-dark" name="skoda">BOOK NOW</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4"> -->
    <!-- card 6 -->
    <!-- <div class="card" style="width: 18rem;">
                    <img src="taxiimg/kia.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">kia</h5>
                        <p class="card-text"><b>5 SEATER.</b> <br> <b>PRICE:</b> 300 Rs. Per km</p>
                        <a href="taxi_book_form.php" class="btn btn-dark" name="kia">BOOK NOW</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4"> -->
    <!-- card 7 -->
    <!-- <div class="card" style="width: 18rem;">
                    <img src="taxiimg/bmw.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">BMW</h5>
                        <p class="card-text"><b>5 SEATER.</b> <br> <b>PRICE:</b> 900 Rs. Per km</p>
                        <a href="taxi_book_form.php" class="btn btn-dark">BOOK NOW</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4"> -->
    <!-- card 8 -->
    <!-- <div class="card" style="width: 18rem;">
                    <img src="taxiimg/honda.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Honda</h5>
                        <p class="card-text"><b>5 SEATER.</b> <br> <b>PRICE:</b> 100 Rs. Per km</p>
                        <a href="taxi_book_form.php" class="btn btn-dark" name="honda">BOOK NOW</a>
                    </div>
                </div>
            </div> -->




    <!-- our service -->
    <div class="div_black">
        <div class="box">

        </div>
        <div class="our_service">
            our service
        </div>
        <div class="b">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="image">
                            <img src="taxiimg/fixed.png" alt="">
                        </div>
                        <div class="pp">
                            <p>Fixed prices</p>
                        </div>
                        <div class="ppp">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos, recusandae!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="image">
                            <img src="taxiimg/per-hour.png" alt="">
                        </div>
                        <div class="pp">
                            <p>Per-hour lease</p>
                        </div>
                        <div class="ppp">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos, recusandae!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="image">
                            <img src="taxiimg/saftey.png" alt="">
                        </div>
                        <div class="pp">
                            <p>Safety, comfort</p>
                        </div>
                        <div class="ppp">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos, recusandae!</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- other services -->
        <div class="our_service">
            Other services
        </div>
        <div class="container other_service">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, magnam quis consequatur id a ipsam reprehenderit maiores voluptatem quam? Perspiciatis?</p>
        </div>
    </div>
    <footer class="container footer1">
        <p>© 2017–2023 Company, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
        <p class="float-end"><a href="#">Back to top</a></p>
    </footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>