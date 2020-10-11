<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $toUser = $_POST['to'];
    $amnt = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the credits are to be transferred.

    $sql = "SELECT * from users where id=$toUser";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

  //if amount that we are gonna deduct from any user is
  // greater than the current credits available then print insufficient balance.
 if($amnt > $sql1['credits'])
    {

        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }

     else if($amnt == 0){
         echo "<script type='text/javascript'>alert('Enter Amount Greater than Zero');
    </script>";
     }
    else {

        //if not then deduct the credits from the user's account that we selected.
        $newCredit = $sql1['credits'] - $amnt;
        $sql = "UPDATE users set credits=$newCredit where id=$from";
        mysqli_query($conn,$sql);



        $newCredit = $sql2['credits'] + $amnt;
        $sql = "UPDATE users set credits=$newCredit where id=$toUser";
        mysqli_query($conn,$sql);

        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `credits`) VALUES ('$sender','$receiver','$amnt')";
        $tns=mysqli_query($conn,$sql);
        if($tns){
           echo "<script type='text/javascript'>
                    alert('Transaction Successfull!');
                    window.location='transactionDetails.php';
                </script>";
        }
        $newCredit= 0;
        $amnt =0;
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credits Transfer</title>
    <!-- <link rel="stylesheet" href="./style.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
    .logo-text, .nav-link1{
      color: white;
      padding-top: 15px;
    }
    .list-customer{
      padding-left: 1100px;
    }

    .nav-link1:hover{
      color: white;
    }
    .button {
      background-color: #60B3EE;
      border: none;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 18px;
      margin: 0px 2px;
      border-radius: 5px;
    }
    h2{
      text-align: center;
      margin-top: 20px;
    }
    body{
       background-image: url("1.jpg");
    }
    table.tg {
  background: rgba(255, 255, 255, 0.8);
  width: 100%;
  position: relative;
}

.tg {
  border-collapse: collapse;
  border-spacing: 0;
}

.tg td {
  font-family: Arial, sans-serif;
  font-size: 14px;
  padding: 10px 5px;
  border-style: solid;
  border-width: 1px;
  overflow: hidden;
  word-break: normal;
  border-color: black;
  text-align: center;
  ;
}

.tg th {
  font-family: Arial, sans-serif;
  font-size: 14px;
  font-weight: normal;
  padding: 10px 5px;
  border-style: solid;
  border-width: 1px;
  overflow: hidden;
  word-break: normal;
  border-color: black;
}
.button
    {
      background-color: white;
  color: black;
  border: 4px solid #555555;
   
    }
    .button:hover{
      background-color: #555555;
  color: white;
     text-decoration: none;
   }
   .button1
    {
      background-color: white;
  color: black;
  border: 4px solid #555555;
   border-radius: 50%;
   width: 150px;
    }
    .button1:hover{
      background-color: #555555;
  color: white;
     text-decoration: none;
   }
    </style>
</head>


<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
  <li class="list-customer">
  <a class="nav-link1" href="viewusers.php"><button type="button" class="button1">Customers Lists</button></a>
  </li>
  </ul>
  </nav>
    <div class="container divStyle">
        <h2 style="font-size: 60px; text-shadow: 3px 3px 4px #181818;">Do The Transaction Here</h2>
        <!-- <form method="post" name="tcredit" class="tabletext"><br/> -->
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id=$sid";
                $query=mysqli_query($conn,$sql);
                if(!$query)
                {
                    echo "Error ".$sql."<br/>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_array($query);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br/>
        <label> <b style="font-size: 20px; text-shadow: 1px 1px 1px #181818;">From: </b></label><br/>
        <div>
            <table class="table roundedCorners  tabletext table-hover  table-striped table-condensed tg"  >
                <tr>
                    <th class="tg-0lax"><b>ID</b></th>
                    <th class="tg-0lax"><b>NAME</b></th>
                    <th class="tg-0lax"><b>EMAIL</b></th>
                    <th class="tg-0lax"><b>CASH AVAILABLE</b></th>
                </tr>
                <tr>
                    <td class="tg-0lax"><?php echo $rows['id'] ?></td>
                    <td class="tg-0lax"><?php echo $rows['name'] ?></td>
                    <td class="tg-0lax"><?php echo $rows['email'] ?></td>
                    <td class="tg-0lax"><?php echo $rows['credits'] ?></td>
                </tr>
            </table>
        </div>
        <br/><br/><br/>
        <label><b style="font-size: 20px; text-shadow: 1px 1px 1px #181818;">To:</b></label>
        <select class=" form-control"   name="to" style="margin-bottom:5%;" required>
            <option value="" disabled selected> </option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM users where id!=$sid";
                $query=mysqli_query($conn,$sql);
                if(!$query)
                {
                    echo "Error ".$sql."<br/>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_array($query)) {
            ?>
                <option class="table text-center table-striped " value="<?php echo $rows['id'];?>" >

                    <?php echo $rows['name'] ;?>
                    <!--(Credits:
                    <?php echo $rows['credits'] ;?> )-->

                </option>
            <?php
                }
            ?>
        </select> <br/><br/><br/>
            <label><b style="font-size: 20px; text-shadow: 1px 1px 1px #181818;">Amount:</b></label>
            <input type="number" id="amm" class="form-control" name="amount" min="0" required  />  <br/><br/>
                <div class="text-center btn3" >
            <button class="button" name="submit" type="submit" id="myBtn">Proceed</button>
            </div>
        </form>
    </div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
