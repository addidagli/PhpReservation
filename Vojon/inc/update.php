<?php session_start();
    require "db.php";
    require_once "header.php";

    if($_SESSION['logged'] == 1)
    {
    $reservationid = $_SESSION['reservationid'];        
    if(isset($_POST['updatebook']))
    {
        $name     = $_POST['updateName'];
        $email    = $_POST['updateEmail1'];
        $phone  = $_POST['updatePhoneNumber'];
        $person = $_POST['updateNumberPerson'];
        $date = $_POST['updateDate'];
        $time = $_POST['updateTime'];
        $comments = $_POST['updatecomments'];

        if(!empty($name) && !empty($email) && !empty($phone) && !empty($person) && !empty($date) && !empty($time) && !empty($comments))
        {
            $stmt= $db->prepare("UPDATE reservation SET `name`=?, `phone`=?, `email`=?,`numberperson`=?, `date`=?, `time`=?,`message`=? WHERE id=?");
            $result = $stmt->execute(array($name, $phone, $email, $person, $date, $time, $comments, $reservationid));
            if($result)
            {
              echo "güncellendi";  
            }
            else
            {
                echo "hata";
            }
            
        }
        else
        {
            echo "Lütfen boşlukları doldurun";
        }
    }
    }
    else{
        header("Location:login.php");
        exit;
    }

    



?>


<div class="section reservation-section" id="reservation1">
                <div class="container">
                    <div class="row">
                        <div class="section-title-box col-md-6 col-md-offset-3">
                            <h1>Reservation</h1>
                            <span class="title-divider">
                                <i class="fa fa-cutlery" aria-hidden="true"></i>
                            </span>
                        </div><!-- end about caption -->
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <form class="reservation-form row" id="reservation1-form" name="contactform" method="post">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="updateName" name="updateName" placeholder="NAME" required="required" >
                                        <i class="fa fa-pencil-square-o"></i>
                                    </div><!-- end of /.time group -->
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="updatePhoneNumber" name="updatePhoneNumber" placeholder="PHONE NUMBER" required="required">
                                        <i class="fa fa-phone"></i>
                                    </div><!-- end of /.phone number group -->
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="updateEmail1" name="updateEmail1" placeholder="EMAIL" required="required">
                                        <i class="fa fa-envelope-o"></i>
                                    </div><!-- end of /.email group -->
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="updateNumberPerson" name="updateNumberPerson" placeholder="NUMBER OF PERSON" required="required">
                                        <i class="fa fa-user"></i>
                                    </div><!-- end of /.number person group -->
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="date" class="form-control" id="updateDate" name="updateDate" placeholder="DATE" required="required">
                                        <i class="fa fa-calendar-o"></i>
                                    </div><!-- end of /. date group -->
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="datetime" class="form-control" id="updateTime" name="updateTime" placeholder="TIME" required="required">
                                        <i class="fa fa-clock-o"></i>
                                    </div><!-- end of /.time group -->
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group message-group">
                                        <textarea name="updatecomments" id="updatecomments" cols="30" rows="5" placeholder="MESSAGE OR ANY SPECIAL REQUEST"></textarea>
                                        <i class="fa fa-comments" aria-hidden="true"></i>
                                </div><!-- end of /.message group -->
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="vojon-btn" id="res-submit" name="updatebook">Update</button>
                                </div>
                            </form><!-- end of /.form -->
                            <div id="alert"></div>
                        </div><!-- end of /.columns 6 -->
                    </div><!-- end of /.roe -->
                </div><!-- end of /.container -->
            </div><!-- end of /.reservation swction 