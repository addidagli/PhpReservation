<?php session_start();


    require "db.php";
    require "header.php";

    if($_SESSION['logged'] == 1)
    {
        $query = $db->prepare("SELECT * from reservation");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    else
    {
        header("Location:login.php");
        exit;
    }
    if(isset($_POST['deleteid']))
    {
        echo "addi";
        $id = $_POST['deleteid'];
        $query = $db->prepare("DELETE FROM reservation WHERE id=".$id);
        $result = $query->execute();
        if($result)
        {
          header('location: panel.php');
        }
        else{
          echo "item couln't delete";
        }
    }

    if(isset($_POST['updateid']))
    {
        $_SESSION['reservationid'] = $_POST['updateid'];
        header('location: update.php');
        exit;

    }

    ?>

    <div class="container">
        <form action="" method="post">
        <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <?php
                 foreach ($result as $emp)
                 {
                     foreach($emp as $key=>$emp2)
                     {
                        echo '<th>'.$key.'</th>';
                     }
                    break;
                }  
                echo '<th>update</th>';
                echo '<th>delete</th>';
                ?>
            </tr>
        </thead>
        <tbody>
                <?php foreach ($result as $emp)
                {
                    echo '<tr>';
                    foreach($emp as $key=>$emp2)
                     {
                        echo '<th>'.$emp2.'</th>';
                     }
                     echo '<th><button type="submit" name="updateid" value="'.$emp['id'].'" class="btn btn-warning">Update</button></th>';
                     echo '<th><button type="submit" name="deleteid" value="'.$emp['id'].'" class="btn btn-danger">Delete</button></th>';
                     echo '</tr>';
                }
                    
                ?>
        </tbody>
        <tfoot>
            <tr>
                <?php 
                  foreach ($result as $emp)
                  {
                      foreach($emp as $key=>$emp2)
                      {
                         echo '<th>'.$key.'</th>';
                      }
                     break;
                 }
                 echo '<th>update</th>';
                 echo '<th>delete</th>';
                ?>
            </tr>
        </tfoot>
    </table>
        </form>

</div>
</body>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</html>


