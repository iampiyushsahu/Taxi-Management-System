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
        .logout{
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
        .table_container{
            width: 1000px;
        }
        .Customer_rides{
            text-align: center;
            margin-top: 60px;
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
        .home1{
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
                        <a class="nav-link active home1" href="booking.php">Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link home1" href="taxi.php">Taxi</a>
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
      <div class="Customer_rides">
        <h2> <u>Customer rides</u></h2>
      </div>
    <!-- table -->
    <?php
    $c = $_SESSION['login_name'];
    $sql = "SELECT * from taxi_book_ride1 where name = '$c'";
     $result = mysqli_query($conn, $sql);
     $count=1;
    ?>
    <div class="container table_container">
        <table class="table table-sm">
               <table class="table">
                <thead>
                    <tr>
                        
                        <th scope="col">Sr no.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Your loacation</th>
                        <th scope="col">destination</th>
                        <th scope="col">pick-up-time</th>
                        <th scope="col">number-of-members</th>
                        <th scope="col">pin-code</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    while($a = mysqli_fetch_assoc($result)){
                        ?>
                    <tr>
                        <th scope="row"><?php echo $count ?> </th>
                        <td><?php echo $a['name']?></td>
                        <td><?php echo $a['your_location']?></td>
                        <td><?php echo $a['destination']?></td>
                        <td><?php echo $a['pick_up_time']?></td>
                        <td><?php echo $a['number_of_members']?></td>
                        <td><?php echo $a['pin_code']?></td>
                     </tr>
                     <?php
                     $count++;
                    }
                    ?>
                </tbody>
            </table>
        </table>
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