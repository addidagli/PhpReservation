<?php session_start();

    require_once "header.php";
    
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
   
    
    $code = $_SESSION['code'];

    $email = $_SESSION['email'];

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->SMTPKeepAlive = true;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls'; //ssl
    
    $mail->Port = 587; //25 , 465 , 587
    $mail->Host = "smtp.gmail.com";
    
    $mail->Username = "edmunddantes1001@gmail.com";
    $mail->Password = "addi1903";
    
    
    $mail->setFrom("edmunddantes1001@gmail.com", "Login");
    $mail->addAddress($email);
    
    $mail->isHTML(true);
    $mail->Subject = "code";
    $mail->Body = "Kodunuz: ".$code;
    
    $mail->send();

    if(isset($_POST['check']))
    {
        echo "addi";
        $check = $_POST['code'];
        echo "code: ".$code;
        echo "check: ".$check;
        if($check == $code)
        {
        
            $_SESSION['logged'] = 1;
            header("Location:panel.php");
            exit;
        }
        else
        {
            echo "yanlış kod";
        }
    }
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container" id="codepage">
<form id="login-form" class="form" action="" method="post">
        <div class="form-group">
            <label for="code" class="text-info">Lütfen mailinize gönderilen kodu giriniz</label><br>
            <input type="text" name="code" id="code" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" id="codebtn" name="check" class="btn btn-info btn-md" value="Send">
        </div>
</form>
    </div>
</body>
</html>