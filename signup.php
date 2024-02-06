<?php

include 'taxi_database_connect.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name1'];
    $email = $_POST['email1'];
    $_SESSION['email1'] = $email;
    $password = $_POST['pass1'];
    $confirmpassword = $_POST['pass2'];
    $upload_documentname = $_FILES['file1']['name'];
    $upload_documentsize = $_FILES['file1']['size'];
    $upload_documenttmp = $_FILES['file1']['tmp_name'];
    $upload_documenttype = $_FILES['file1']['type'];
    $upload_documenttype1 = strtolower(pathinfo($upload_documentname, PATHINFO_EXTENSION));
    $allow_type = array('png', 'jpg', 'jpeg');


    $sql = "SELECT * from taxi_login where email = '$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $a = mysqli_fetch_assoc($result);
    if ($a !== null && $a['email'] == $email) {
        ?>
                 <script>
                    alert('dont enter same email again')
                </script>
                <?php
        // echo "dont enter same email again";
    } else {

        if (empty($name) || empty($email) || empty($password) || empty($confirmpassword) || empty($upload_documentname)) {
            ?>
                 <script>
                    alert('something not enter')
                </script>
                <?php
            //echo "something not enter";
        } elseif (preg_match("/[0123456789!@#$%^&*()_+]/", $name)) {
            ?>
                 <script>
                    alert('enter a correct word')
                </script>
                <?php
           // echo "enter a correct word";
        } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            ?>
                 <script>
                    alert('please enter valid email')
                </script>
                <?php
            //echo "please enter valid email";
        } elseif (strlen($password) <= 2) {
            ?>
                 <script>
                    alert('enter more than 2 words')
                </script>
                <?php
            //echo "enter more than 2 words";
        } elseif ($upload_documentsize > 1048576) {
            ?>
                 <script>
                    alert('limit 600')
                </script>
                <?php
           // echo "limit 600";
        } elseif (!in_array($upload_documenttype1, $allow_type)) {
            ?>
                 <script>
                    alert('file not match')
                </script>
                <?php
            // echo "file not match";
        } elseif ($password == $confirmpassword) {
            echo "welcome welcome";
            $a = " INSERT INTO taxi_login ( name, email, password, image) VALUES ( '$name', '$email', '$password', '$upload_documentname')";
            $result = mysqli_query($conn, $a);
            
            if ($result) {
                $b = mt_rand(10, 100);
                move_uploaded_file($upload_documenttmp, "documents/" . $b . $upload_documentname);
                $_SESSION['a'] = $name;
                $_SESSION['login_name'] = $_SESSION['a'];
                $_SESSION['name'] = $name;
                $b = "SELECT * from taxi_login where email = '$email' AND password = '$password'";
                $resultt = mysqli_query($conn, $b);
                $aa = mysqli_fetch_assoc($resultt);
                $_SESSION['id'] = $aa['id'];
                header("location: home.php");
            } else {
                echo "Error";
            }
        } else {
            ?>
                 <script>
                    alert('your both password is mismatch')
                </script>
                <?php
            //echo "your both password is mismatch";
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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: darkgray;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            /* align-items: center; */
            /* height: 80vh; */
            background-color: linear-gradient(to top left, white, gray);
            color: cadetblue;
        }

        .signup-container {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            /* text-align: center; */
        }

        h2 {
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input {
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .button {
            padding: 10px;

            border: none;
            border-radius: 50px;
            cursor: pointer;
            display: flex;
            justify-content: center;

        }

        .button>input {
            background-color: black;
            color: white;
            width: 40%;
        }

        .but:hover {
            background-color: white;
            color: black;
        }
        .div1{
            background-color: red;
            color: white;
        }
        .signup_continer{
            margin-top: 42px;
            width: 574px;
            border: 2px solid darkgray;
            font-family: cursive;
        }
        .input_submit{
            background-color: cadetblue !important;
        }
        .signup1 h2{
            color: blue;
            color: cadetblue;
            font-size: 39px;
        }
    </style>
</head>

<body>
    <div class="signup-container signup_continer">
        <div class="div1"></div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="signup1">
            <h2>sign up</h2>
            </div>
            name: <input type="name" name="name1" placeholder="enter name" />
            email: <input type="text" name="email1" placeholder="enter email" />
            password: <input type="password" name="pass1" placeholder="enter password" />
            confirm password: <input type="password" name="pass2" placeholder="enter password" />
            upload document: <input type="file" name="file1" />
            <div class="button">
                <input class="input_submit" type="submit" value="submit" name="sign1" class="but"/>
            </div>
        </form>
        <footer class="signup_footer">
            <p>
                Already have an account? <a href="login.php">login</a>
            </p>
        </footer>
    </div>


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