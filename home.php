<?php

include 'taxi_database_connect.php';
$_SESSION['b'] = "";
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
            $_SESSION['b'] = $a['password'];
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
            if ($_SESSION['b'] != $password) {
        ?>
                <div class="con">
                    <?php
                    echo "please enter Valid email or password";
                    ?>
                </div>
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

        .div1:hover {
            background-color: white !important;
            color: black !important;
        }

        .p3:hover {
            background-color: white !important;
            color: black !important;
            border: 2px solid black;
        }

        .div1 {
            margin-left: 10px;
            background-color: black !important;
            color: white !important;
        }

        .d {
            margin-left: 10px;
            background-color: white;
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

        /* .table1 {
            width: 700px;
            margin-left: 260px;
        } */

        .td2 {
            padding: 0px !important;
        }

        .td_button {
            width: 100%;
            /* width: 162px; */
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
            font-family: cursive !important ;
        }

        .taxi_booking{
            width: 100%;
        }
        .cc{
            width: 416px;
        }
        .thh{
            width: 159px !important;
        }
        /* .table1{
            margin-left: -52px;
    margin-right: -50px;
        } */
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
                        <a class="nav-link active home1" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (!empty($_SESSION['name'])) {
                        ?>
                            <a class="nav-link home1" href="booking.php">Booking</a>
                        <?php
                        } elseif (!empty($_SESSION['a'])) {
                        ?>
                            <a class="nav-link home1" href="booking.php">Booking</a>
                        <?php
                        } else {
                        ?>
                            <a class="nav-link home1" href="booking.php" data-bs-toggle="modal" data-bs-target="#exampleModal">Booking</a>
                        <?php
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (!empty($_SESSION['name'])) {
                        ?>
                            <a class="nav-link home1" href="taxi.php">Taxi</a>
                        <?php
                        } elseif (!empty($_SESSION['a'])) {
                        ?>
                            <a class="nav-link home1" href="taxi.php">Taxi</a>
                        <?php
                        } else {
                        ?>
                            <a class="nav-link home1" href="taxi.php" data-bs-toggle="modal" data-bs-target="#exampleModal">Taxi</a>
                        <?php
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (!empty($_SESSION['name'])) {
                        ?>
                            <a class="nav-link home1" href="contact.php">Contact</a>
                        <?php
                        } elseif (!empty($_SESSION['a'])) {
                        ?>
                            <a class="nav-link home1" href="contact.php">Contact</a>
                        <?php
                        } else {
                        ?>
                            <a class="nav-link home1" href="contact.php" data-bs-toggle="modal" data-bs-target="#exampleModal">Contact</a>
                        <?php
                        }
                        ?>
                    </li>

                    <li class="nav-item">
                        <?php
                        if (!empty($_SESSION['name'])) {
                        ?>
                            <a class="nav-link home1" href="my_profile.php">My Profile</a>
                        <?php
                        } elseif (!empty($_SESSION['a'])) {
                        ?>
                            <a class="nav-link home1" href="my_profile.php">My Profile</a>
                        <?php
                        } else {
                        ?>
                            <a class="nav-link home1" href="my_profile.php" data-bs-toggle="modal" data-bs-target="#exampleModal">My Profile</a>
                        <?php
                        }
                        ?>
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
            <a href="login.php"> <button type="button" class="btn btn-dark button1" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button></a>
        <?php
        }

        ?>



    </nav>
    <!-- Modal -->
    <!-- <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="loginModalLabel">Login Customer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Taxi login
                </div>
                <form method="Post">
                    <div class="mb-3 d">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3  d">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="pass1" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" name="login1" class="btn btn-light div1" data-bs-toggle="modal" data-bs-target="#loginModal">login</button>
                </form>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> -->

    <!-- modal 2 -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">taxi login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    please login first.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <a href="login.php"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">login</button></a>

                </div>
            </div>
        </div>
    </div>

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

    <!-- boxes -->
    <div class="container my-4 div2">
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary-emphasis">TAXI</strong>
                        <h3 class="mb-0">Maruti Suzuki</h3>
                        <p class="card-text mb-auto">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corrupti perferendis voluptatum quaerat, voluptas aliquid reprehenderit delectus minus tempore aspernatur suscipit.</p>
                        <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                            Continue reading
                            <svg class="bi">
                                <use xlink:href="#chevron-right"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="taxiimg/m.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success-emphasis">TAXI</strong>
                        <h3 class="mb-0">Toyota</h3>
                        <p class="mb-auto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis aspernatur sapiente at hic eum distinctio, dolor nulla voluptatibus quod alias.</p>
                        <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                            Continue reading
                            <svg class="bi">
                                <use xlink:href="#chevron-right"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="taxiimg/toyota.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container my-4 div2">
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary-emphasis">TAXI</strong>
                        <h3 class="mb-0">Thar</h3>
                        <p class="card-text mb-auto">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia ducimus voluptatibus reprehenderit animi magnam rerum vero obcaecati molestiae suscipit quas.</p>
                        <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                            Continue reading
                            <svg class="bi">
                                <use xlink:href="#chevron-right"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="taxiimg/thar.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success-emphasis">TAXI</strong>
                        <h3 class="mb-0">Audi</h3>
                        <p class="mb-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem aspernatur voluptatem eius temporibus tenetur, doloribus nostrum illo impedit ratione magnam..</p>
                        <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                            Continue reading
                            <svg class="bi">
                                <use xlink:href="#chevron-right"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="taxiimg/audi.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="container my-4 div2">
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary-emphasis">TAXI</strong>
                        <h3 class="mb-0">Skoda</h3>
                        <p class="card-text mb-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur facere voluptate magni aliquam consectetur harum officia esse doloremque expedita dolor?</p>
                        <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                            Continue reading
                            <svg class="bi">
                                <use xlink:href="#chevron-right"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="taxiimg/skoda.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success-emphasis">TAXI</strong>
                        <h3 class="mb-0">Kia</h3>
                        <p class="mb-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores itaque repudiandae libero aut debitis corporis numquam cupiditate suscipit. Voluptatibus, iure.</p>
                        <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                            Continue reading
                            <svg class="bi">
                                <use xlink:href="#chevron-right"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="taxiimg/kia.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="container my-4 div2">
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary-emphasis">TAXI</strong>
                        <h3 class="mb-0">BMW</h3>
                        <p class="card-text mb-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt voluptate nesciunt nisi inventore recusandae esse libero minima dolorum. Est, distinctio!</p>
                        <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                            Continue reading
                            <svg class="bi">
                                <use xlink:href="#chevron-right"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="taxiimg/bbb.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success-emphasis">TAXI</strong>
                        <h3 class="mb-0">Honda</h3>
                        <p class="mb-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat doloribus quibusdam tempora eum quos ratione nobis beatae laborum, recusandae cumque!</p>
                        <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                            Continue reading
                            <svg class="bi">
                                <use xlink:href="#chevron-right"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="taxiimg/honda.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h2>Also Book a Pickup from here</h2>
    </div>
    <!-- table -->
    <?php
       $sql3 = "SELECT * from all_taxis_pickup";
       $result3 = mysqli_query($conn, $sql3);
       
    
    while($aaa = mysqli_fetch_assoc($result3)){
        ?>
    <div class="container cc">
        <div class="row">
        <table class="table table-bordered table1">
            <tbody class="table-group-divider">
                <tr>
                    <th class="thh" scope="row"> <?php echo  $aaa['taxi_name'] ?> </th>
                    <td colspan="2"><?php echo $aaa['taxi_space'] ?> </td>
                    <td class="td2"><a href="taxi_book_form2.php?id=<?php echo $aaa['id'] ?>" class="taxi_booking"><button type="button" class="btn btn-dark td_button">Book Now</button></a></td>
                </tr>
                
            </tbody>
        </table>
        </div>
    </div>
    <?php
    }
    ?>
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