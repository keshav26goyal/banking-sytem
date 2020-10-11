<!-- transactionDetails -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Summary</title>
    <!-- <link rel="stylesheet" href="./style.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

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
    h2{
      text-align: center;
      margin-top: 20px;
    }
    body
    {
     background-image: url("1.jpg");
    }
    .button1
    {
      background-color: white;
  color: black;
  border: 4px solid #555555;
   border-radius: 50%;
   width: 100px;
    }
    .button1:hover{
      background-color: #555555;
  color: white;
     text-decoration: none;
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

    </style>
</head>
<!--  background="./images/thistory.jpg" style="background-repeat: no-repeat; background-size: 100%;" -->
<body>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
<ul class="navbar-nav">
<li class="list-customer">
<a class="nav-link1" href="index.php"><button type="button" class="button1">Home</button></a>
</li>
</ul>
</nav>
        <div class="container divStyle">
        <h2 style="font-size: 70px; text-shadow: 3px 3px 4px #181818;">Transaction History</h2>

       <br>
       <div class="table-responsive-sm">
    <table class="table roundedCorners  tabletext table-hover table-striped table-condensed tg" >
        <thead>
            <tr>
                <th class="tg-0lax"><b>ID</b></th>
                <th class="tg-0lax"><b>SENDER</b></th>
                <th class="tg-0lax"><b>RECEIVER</b></th>
                <th class="tg-0lax"><b>CASH TRANSFERED</b></th>
            </tr>
        </thead>
        <tbody>
        <?php

            include 'config.php';

            $sql ="select * from transaction";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_array($query))
            {
        ?>
            <tr>
            <td class="tg-0lax"><?php echo $rows['id']; ?></td>
            <td class="tg-0lax"><?php echo $rows['sender']; ?></td>
            <td class="tg-0lax"><?php echo $rows['receiver']; ?></td>
            <td class="tg-0lax"><?php echo $rows['credits']; ?> </td>

        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>
