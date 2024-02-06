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
    if (isset($_POST['contact1'])) {
        $name = $_POST['name1'];
        $mobile = $_POST['mobile1'];
        $email = $_POST['email1'];
        $message = $_POST['message1'];
        $upload_documentname = $_FILES['file1']['name'];
        $upload_documentsize = $_FILES['file1']['size'];
        $upload_documenttmp = $_FILES['file1']['tmp_name'];
        $upload_documenttype = $_FILES['file1']['type'];
        $upload_documenttype1 = strtolower(pathinfo($upload_documentname, PATHINFO_EXTENSION));
        $allow_type = array('png', 'jpg', 'jpeg', 'pdf');
        $a = " INSERT INTO taxi_contact ( name, mobile, email, message) VALUES ( '$name', '$mobile', '$email', '$message')";
        $result = mysqli_query($conn, $a);
        if ($result) {
            if ($upload_documentsize > 1048576) {
                ?>
                <p class="p10"><?php echo "limit 600" ?> </p>
                <?php
            } elseif (!in_array($upload_documenttype1, $allow_type)) {
                echo "file not match";
            }elseif (!empty($name) && !empty($mobile) && !empty($email) && !empty($message) && !empty($upload_documentname)) {
                $_SESSION['d'] = $name;
                //header("location:contact.php");
            } else {
            ?>
                <p class="p10"><?php echo "fill all the query" ?> </p>
<?php
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['contact1'])) {
        $name = $_POST['name1'];
        $mobile = $_POST['mobile1'];
        $email = $_POST['email1'];
        $message = $_POST['message1'];
        $upload_documentname = $_FILES['file1']['name'];
        $upload_documentsize = $_FILES['file1']['size'];
        $upload_documenttmp = $_FILES['file1']['tmp_name'];
        $upload_documenttype = $_FILES['file1']['type'];
        $upload_documenttype1 = strtolower(pathinfo($upload_documentname, PATHINFO_EXTENSION));
        $allow_type = array('png', 'jpg', 'jpeg', 'pdf');
        $b = mt_rand(10, 100);
        $_SESSION['mailheaders'] = "NAME: " . $name . " \r \n Email: " . $email . "\r \n mobile no: " . $mobile . "\r \n message: " . $message . "\r \n";

        if ($upload_documentsize > 1048576) {
            ?>
            <p class="p10"> </p>
            <?php
        } elseif (!in_array($upload_documenttype1, $allow_type)) {
            
        } else{
        include 'send.php';
        move_uploaded_file($upload_documenttmp, "documents/" . $b . $upload_documentname);
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

        .home1 {
            padding-left: 100px !important;
            color: cadetblue !important;
    font-family: cursive !important;
        }

        .p10 {
            background-color: red;
            color: white;
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

        .c {
            padding: 25px;
            margin: 40px 1201px 0px 110px;
            border: 2px solid black;
            background-color: white;
            color: black;
            padding-left: 51px;
        }
        .l1{
            margin-top: 18px;
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
                        <a class="nav-link home1" href="taxi.php">Taxi</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link active home1" aria-disabled="true">Contact</a>
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
                <div class="l1">
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
    if (!empty($_SESSION['d'])) {
    ?>
        <div class="dd">
            <p><?php echo "done "  ?></p>
            <?php $_SESSION['d'] = ""; ?>
            <a href="home.php"><button class="ddd dd">Back to page</button></a>

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
    <!-- contact us box -->
    <span>
        <p class="c">Contact Us</p>
    </span>
    <!-- form -->
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Name</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="name1" placeholder="Example input placeholder">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Mobile no.</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" name="mobile1" placeholder="Another input placeholder">
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Email</label>
                <input type="email" class="form-control" id="formGroupExampleInput" name="email1" placeholder="Example input placeholder">
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Message</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="message1" placeholder="Example input placeholder">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">upload document</label>
                <input type="file" class="form-control" id="formGroupExampleInput" name="file1" placeholder="Example input placeholder">
            </div>
            <button name="contact1">Submit</button>

        </form>
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
</body>

</html>