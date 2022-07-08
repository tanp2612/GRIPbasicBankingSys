<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['uid'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from user_info where uid=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from user_info where uid=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
    }


  
    
    else if($amount > $sql1['balanceamt']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")'; 
        echo '</script>';
    }
    


   
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                
                $newbalance = $sql1['balanceamt'] - $amount;
                $sql = "UPDATE user_info set balanceamt=$newbalance where uid=$from";
                mysqli_query($conn,$sql);
             

                
                $newbalance = $sql2['balanceamt'] + $amount;
                $sql = "UPDATE user_info set balanceamt=$newbalance where uid=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['folkname'];
                $receiver = $sql2['folkname'];
                $sql = "INSERT INTO transaction_history(`creditor_name`, `debtor_name`, `transfer_amt`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='moneytransfer.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="tabular.css">
    <link rel="stylesheet" type="text/css" href="navbar.css">

    <style type="text/css">
    	
		button{
			border:none;
			background: #d9d9d9;
		}
	    button:hover{
			background-color:#777E8B;
			transform: scale(1.1);
			color:white;
		}

    </style>
</head>

<body>
 
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
        <h2 class="text-center pt-4">Current Transaction</h2>
            <?php
                include 'config.php';
                $sid=$_GET['uid'];
                $sql = "SELECT * FROM  user_info where uid=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr>
                    <th scope="col" class="text-center py-2">User_Id</th>
                    <th scope="col" class="text-center py-2">Folk_Name</th>
                    <th scope="col" class="text-center py-2">EMail_Id</th>
                    <th scope="col" class="text-center py-2">Balance_amt</th>
                </tr>
                <tr>
                    <td class="py-2"><?php echo $rows['uid'] ?></td>
                    <td class="py-2"><?php echo $rows['folkname'] ?></td>
                    <td class="py-2"><?php echo $rows['emailid'] ?></td>
                    <td class="py-2"><?php echo $rows['balanceamt'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <label>Transfer To:</label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config.php';
                $sid=$_GET['uid'];
                $sql = "SELECT * FROM user_info where uid!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['uid'];?>" >
                
                    <?php echo $rows['folkname'] ;?> (Balance: 
                    <?php echo $rows['balanceamt'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label>Amount:</label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
        </form>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>