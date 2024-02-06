<?php
error_reporting(E_ERROR | E_PARSE);
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
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['book1'])) {
        $name = $_POST['name1'];
        $pin_code = $_POST['pin_code1'];
        $your_location = $_POST['your_location1'];
        $destination = $_POST['destination1'];
        $pick_up_time = $_POST['pick_up_time1'];
        // $number_of_members = $_POST['number_of_members1'];
        // $id = $_GET['id'];
        // $x = "SELECT * from all_taxis where id = '$id'";
        // $sql = mysqli_query($conn, $x);
        // $z = mysqli_fetch_assoc($sql);
        // if($number_of_members > $z['taxi_seats']){
        //     echo "dont enter more than limit";
        // } else{
            $a = " INSERT INTO taxi_book_ride2 ( name, your_location, destination, pick_up_time,pin_code) VALUES ( '$name', ' $your_location', '$destination', '$pick_up_time', '$pin_code')";        
            $result = mysqli_query($conn, $a);
            if ($result) {
                if (!empty($name) && !empty($pin_code) && !empty($your_location) && !empty($destination) && !empty($pick_up_time)) {
                    // $_SESSION['cc'] = $name;
                    ?>
                    <script>
                    alert('Done!')
                </script>
                <?php
                    // header("location:home.php");
                } else {
                ?>
                    <p class="p10"><?php echo "fill all the query" ?> </p>
    <?php
                }
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

        .form_label {
            margin-left: 20px;
        }

        .container {
            margin-top: 50px !important;
        }

        .b1 {
            background-color: black;
            color: white;
        }

        .b1:hover {
            background-color: white;
            color: black;
        }

        .p10 {
            background-color: red;
            color: white;
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
        }

        .heading {
            margin-top: 0px;
            margin-bottom: 0px;
            padding-top: 30px;
            padding-bottom: 30px;
            background-color: black;
            color: white;
            text-align: center;
            font-size: 50px;
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
            <button type="button" class="btn btn-dark button1" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <?php
        }

        ?>
    </nav>
    <div class="heading">
        <p>Enter Details for Booking</p>
    </div>
    <!-- form -->
    <div class="container">
        <form action="" method="post">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label form_label">NAME</label>
                <input type="text" class="form-control" name="name1" id="formGroupExampleInput" placeholder="Enter name">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label form_label">PIN CODE</label>
                <input type="text" class="form-control" name="pin_code1" id="formGroupExampleInput2" placeholder="Enter pin code">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label form_label">Your location</label>
                <input type="text" class="form-control" name="your_location1" id="formGroupExampleInput2" placeholder="Choose location">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label form_label">Destination</label>
                <input type="text" class="form-control" name="destination1" id="formGroupExampleInput2" placeholder="Destination">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label form_label">Pick up time</label>
                <input type="time" class="form-control" name="pick_up_time1" id="formGroupExampleInput2" placeholder="Destination">
            </div>
            <!-- <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label form_label">Number of members</label>
                <input type="number" class="form-control" name="number_of_members1" id="formGroupExampleInput2" placeholder="0">
            </div> -->
            <div class="mb-3">
                <a href=""><button class="b1" name="book1">Submit</button></a>
            </div>
        </form>
        <div class="b11">
            <a href="home.php"><button class="b1">Back</button></a>
        </div>

    </div>


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

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
</body>

</html>