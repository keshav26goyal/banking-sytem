<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Customers</title>
    <!-- <link rel="stylesheet" href="./style.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <style type="text/css">
    .logo-text, .nav-link1{
      color: white;
      padding-top: 15px;
    }
    body
    {
     background-image: url("1.jpg");
    }
    .list-home{
      padding-left: 1200px;
    }
    .nav-link1:hover{
      color: white;
    }
    .container{
      padding-top: 30px;
      text-align: center;
    }
    .button {
      background-color: #60B3EE;
      border: none;
      color: white;
      padding: 5px 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      border-radius: 5px;
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
   width: 100px;
    }
    .button1:hover{
      background-color: #555555;
  color: white;
     text-decoration: none;
   }

    </style>


</head>
<body>
<?php
    require 'config.php';
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn,$query);
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
<ul class="navbar-nav">
<li class="list-home">
  <a class="nav-link1" href="index.php"><button type="button" class="button1">Home</button></a>
</li>
</ul>
</nav>
    <div class="container divStyle">
        <h2 style="font-size: 70px; text-shadow: 3px 3px 4px #181818;"> Customers</h2>
        <br>

            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table roundedCorners tabletext table-hover table-sm table-striped table-condensed tg">
                        <thead>
                            <tr>
                            <th scope="col" class="tg-0lax"><b>ID</b></th>
                            <th scope="col" class="tg-0lax"><b>CUSTOMER</b></th>
                            <th scope="col"class="tg-0lax"><b>EMAIL</b></th>
                            <th scope="col"class="tg-0lax"><b>BALANCE</b></th>
                            <th scope="col"class="tg-0lax"><b>OPERATIONS</b></th>
                            </tr>
                        </thead>
                        <tbody>
                <?php
                
                    while($rows=mysqli_fetch_array($result)){
                ?>
                    <tr>
                        <td class="tg-0lax"><?php echo $rows['id'] ?></td>
                        <td class="tg-0lax"><?php echo $rows['name']?></td>
                        <td class="tg-0lax"><?php echo $rows['email']?></td>
                        <td class="tg-0lax"><?php echo $rows['credits']?></td>
                        <td class="tg-0lax"><a href="selectedUserdetail.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="button">Transfer</button></a></td>
                    </tr>
                <?php
                    }
                ?>

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            </div>

</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
