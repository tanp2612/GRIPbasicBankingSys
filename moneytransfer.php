<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<?php
    include 'config.php';
    $sql = "SELECT * FROM user_info";
    $result = mysqli_query($conn,$sql);
?>
      <nav class="navbar navbar-expand-md navbar-light bg-light">
      <a class="navbar-brand" href="index.php">GRIP@Sparks_foundation</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">HOME</a>
              </li>
          </div>
       </nav>

<div class="container">
        <h2 class="text-center pt-4">Money Transfer</h2>
        <br>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed table-bordered">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col" class="text-center py-2">User_Id</th>
                            <th scope="col" class="text-center py-2">Folk_Name</th>
                            <th scope="col" class="text-center py-2">EMail_Id</th>
                            <th scope="col" class="text-center py-2">Balance_amt</th>
                            <th scope="col" class="text-center py-2">Transfer</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td class="table-warning"><?php echo $rows['uid'] ?></td>
                        <td class="table-info"><?php echo $rows['folkname']?></td>
                        <td class="table-secondary"><?php echo $rows['emailid']?></td>
                        <td class="table-success"><?php echo $rows['balanceamt']?></td>
                        <td><a href="usertransferinfo.php?uid= <?php echo $rows['uid'] ;?>"> <button type="button" class="btn btn-warning">Transfer</button></a></td> 
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
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
</body>
</html>