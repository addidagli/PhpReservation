<?php session_start();

    require "db.php";

    if(isset($_POST['login']))
    {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
    

        if(!empty($email) && !empty($password))
        {
            $query = $db->prepare("SELECT * FROM  `admin` WHERE `email`='$email' AND `pass`= '$password'");
            $query->execute();
            $result = $query->fetchAll();  
            $sayi = $query->rowCount();
            if ($sayi>0)
            { 
                $_SESSION['email'] = $email;

                $_SESSION['code'] =  mt_rand(100000, 999999);
                header("Location:passing.php");
                exit;
            }
            else{
                echo "kullanıcı adı veya şifre yanlış";
            }
        }
        else
        {
            echo "Lütfen Tüm boşlukları doldurunuz";
        }

       
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<div id="main">
    <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" id="login" name="login" class="btn btn-info btn-md" value="login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>