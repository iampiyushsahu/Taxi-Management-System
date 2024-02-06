<?php
include 'taxi_database_connect.php';
// $_SESSION['id'] coming form login page.
$x = $_SESSION['id'];
$sql = "SELECT * from taxi_login where id = '$x'";
$result = mysqli_query($conn, $sql);
$a = mysqli_fetch_assoc($result);
$_SESSION['login_name'] = $a['name'];


if (isset($_POST['update1'])) {
    $name = $_POST['name1'];
    $email = $_POST['email1'];

    $upload_documentname = $_FILES['file1']['name'];
    $upload_documentsize = $_FILES['file1']['size'];
    $upload_documenttmp = $_FILES['file1']['tmp_name'];
    $upload_documenttype = $_FILES['file1']['type'];
    $upload_documenttype1 = strtolower(pathinfo($upload_documentname, PATHINFO_EXTENSION));
    $allow_type = array('png', 'jpg', 'jpeg');


    $sql1 =  "UPDATE taxi_login 
       SET name ='$name' , email = '$email', image = '$upload_documentname'
       WHERE id = $x";
    $result1 = mysqli_query($conn, $sql1);
    if ($result1) {
        header("location:my_profile.php");
    } else {
        echo "not updated";
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

        .p3:hover {
            background-color: white !important;
            color: black !important;
            border: 2px solid black;
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

        .home1 {
            padding-left: 100px !important;
            color: cadetblue !important;
    font-family: cursive !important;
        }

        /* profile page css */

        body {
            background: gray
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }

        .div1 {
            margin: 0px 302px !important;
        }
    </style>
</head>

<body>
    <!-- nav bar -->
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
                        <a class="nav-link home1" aria-disabled="true" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link home1" aria-disabled="true" href="my_profile.php">My Profile</a>
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
     
    
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row col-md-12">

            <div class="col-md-12 border-right">
                <div class="p-3 py-5 div1">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile</h4>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">Name</label>
                                <input type="text" class="form-control" placeholder="Name" name="name1" value="<?php echo $a['name'] ?>">
                            </div>
                            <!-- <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="" placeholder="surname"></div> -->
                        </div>
                        <div class="row mt-3">
                            <!-- <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value=""></div> -->
                            <!-- <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address line 1" value=""></div>
                                 <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                                 <div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                                 <div class="col-md-12"><label class="labels">State</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div> -->
                            <!-- <div class="col-md-12"><label class="labels">Area</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div> -->
                            <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" name="email1" value="<?php echo $a['email'] ?>"></div>
                            <!-- <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value=""></div> -->
                            <div class="col-md-12"><label class="labels">update document</label><input type="file" class="form-control" placeholder="education" name="file1" value=""></div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-dark" name="update1" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>