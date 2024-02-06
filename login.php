<?php


include 'taxi_database_connect.php';
$error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email1'];
    $password = $_POST['pass1'];
    $sql = "SELECT * from taxi_login where email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $a =  mysqli_fetch_assoc($result);
        $_SESSION['name'] = $a['name'];
        $_SESSION['login_name'] = $a['name'];
        $_SESSION['id'] = $a['id'];
        if ($a) {
            header("location:home.php");
        }
    } else {
        ?>
        <script>
           alert('password or email is wrong')
       </script>
       <?php

        //$error = "password or email is wrong";
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
            /* height: 40vh; */
            width: 100%;
            color: cadetblue;
            font-family: cursive;
        }

        .di {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            margin-top: 139px;
            width: 312px;
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
            border-radius: 4px;
            cursor: pointer;
            width: 30%;
            margin-left: 119px;
        }

       
        

        .button>input {
            background-color: cadetblue;
            color: white;
            text-align: center;
        }

        .p1 {
            color: red;
        }

        .div1:hover {
            background-color: white;
            color: black;
        }
        .signup_footer p{
            margin-top: -7px;
        }
        .ddd{
            display: flex;
            align-items: center; 
        }
        .h2_class{
            color: cadetblue;
        }
    </style>
</head>

<body>
    <p class="p1"><?php echo $error ?> </p>
    <div class="ddd">
            
        <div class="di">
            <form action="" method="post">
                   <h2 class="h2_class" >Login</h2>
                email: <input type="email" name="email1" placeholder="enter email" /><br />
                password: <input type="password" name="pass1" placeholder="enter password" /><br />
    
                <div class="button"><input type="submit" value="login" name="login1" class="div1" /></div>
            </form>
            <footer class="signup_footer">
                <p>
                    Sign up <a href="signup.php">here</a>
                </p>
            </footer>
    
            <footer class="signup_footer">
                <p>
                    Login as  <a href="admin/signin.php">admin</a>
                </p>
            </footer>
    
    
        </div>

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