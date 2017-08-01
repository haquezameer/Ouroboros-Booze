<!DOCTYPE HTML>

<?php
 // config file used to connect to data base.
 // connection to database.
 $con = mysql_connect("localhost","root");
 // if database is not found.
 $query=mysql_query("SET CHARACTER SET utf8") or die('Cannot select CHARACTER SET utf8: ' . mysql_error());
 // selection of database.
 mysql_select_db("booze",$con);
?>

<?php

$nameErr=$emailErr=$phoneErr=$address1Err=$address2Err=$cvvErr=$cardErr=$expErr=$today_dt="";

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
	  
	$username=$_POST['username'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address1=$_POST['address1'];
    $address2=$_POST['address2'];
    $card=$_POST['card'];
    $cvv=$_POST['cvv'];
   
  if (empty($_POST["username"])) 
   {
		$nameErr = "Name is required";
   } 
  elseif (!preg_match("/^[a-zA-Z ]*$/",$username)) 
  {
	  
      $nameErr = "Only letters and white space allowed"; 
  }
  else
  {
	  if (empty($_POST["email"])) 
	  {
      $emailErr = "Email is required";
      } 
	  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
      $emailErr = "Invalid email format"; 
    }
	else
	{
	  	if (empty($_POST["phone"])) 
		{
          $phoneErr = "phone is required";
        } 
       elseif (!preg_match('/^[0-9]{10}+$/', $phone))
	   {
    
			 $phoneErr = "phone number is required";
       }
		else
		{
			if (empty($_POST["address1"])) 
		{
          $address1Err = "address is required";
        } 
       elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $address1))
	   {
    
			 $address1Err = "address is required";
       }
	   else
	   {
		   if (empty($_POST["address2"])) 
		{
          $address2Err = "address is required";
        } 
       elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $address2))
	   {
    
			 $address2Err = "address is required";
       }
	   else
	   {
		   if (empty($_POST["card"])) 
		{
          $cardErr = "card number is required";
        } 
       elseif (!preg_match('/^[0-9]{16}+$/', $card))
	   {
    
			 $cardErr = "card number is required";
       }
	   else
	   {
		   if (empty($_POST["cvv"])) 
		{
          $cvvErr = "cvv number is required";
        } 
       elseif (!preg_match('/^[0-9]{3}+$/', $cvv))
	   {
    
			 $cvvErr = "cvv number is required";
       }
	   else
	   {
		   $edate=strtotime($_POST['exp']); 
			$edate=date("Y-m-d",$edate);
			$today_dt = strtotime("Y-m-d");


			if ($edate > $today_dt) { $expErr = "invalid"; }
			else
			{
				$query = mysql_query("INSERT INTO transaction
								(username,email,phone,address1,address2,card,cvv,exp)
								VALUES ('$username','$email','$phone','$address1','$address2','$card','$cvv','$edate')")
						or die(mysql_error());
								echo "<script>alert('Your transaction is successful !!');</script>";
			}
			
	   }
	   }
	   }
	   }
		}
	}
    }
	
   }
 ?>


<html>
	<head>
		<title> Transaction Page</title>
		<meta charset="utf-8">
		 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href='http://fonts.googleapis.com/css?family=Allan:bold' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Cardo' rel='stylesheet' type='text/css'>	
		<link href='http://fonts.googleapis.com/css?family=Nobile' rel='stylesheet' type='text/css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<style>
			body {
				background-image: url(assets/images/transaction.jpg);
				background-repeat: no-repeat;
				background-color: #cccccc;
				background-attachment: fixed;

				}
			.colorbar {
            height: 5px;
            border-top: 0;
            background: #c4e17f;
            border-radius: 5px;
            background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            
        }
        .inner {
  			display: table;
  			margin: 0 auto;
		}

		
		.heading {
			color:#FFFFFF;
			font-family: 'Allan', Helvetica, Arial, sans-serif;
			font-size: 100px;
			line-height: 145px;
			
			}
 		.p {
			font-family: 'Cardo', Georgia, Times, serif;
			font-size: 18px;
			line-height: 25px;
		}
		.p1 {
			font-family: 'Nobile', Helvetica, Arial, sans-serif;
			font-size: 13px;
			line-height: 25px;
			}
		</style>
		<br>
		<div class="container">	
			<div class="heading" >	
				<div class="inner">Almost there.. </div>
			</div>
		</div>

		</div>
		<br>
	</head>
	<body>
		<div class="row">
    	<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3" >

    	<form action = "<?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="submitMain" enctype="multipart/form-data">
		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading"  style = "background-color: #dedef8;">
					<h4 class="panel=title">
						<a data-toggle="collapse" data-parent="#accordion" href= "#collapseOne">
							<div class="p">Personal Details</div>
							<hr class="colorbar">

						</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in">
					<div class="panel-body" >
				
						<div class="form-group" >
							<div class="p1">
							<label for="name">Name</label>
							<input type="text" class="form-control"  placeholder="Enter your name." name="username" id="username"><b><?php echo $nameErr;?></b></br>

							<label for="email">E-mail</label>
							<input type="email" class="form-control"  placeholder="Enter your E-mail id." name="email" id="email"><?php echo $emailErr;?></br>

							<label for="phone">Phone</label>
							<input type="text" class="form-control"  placeholder="Enter your Phone No." name="phone" id="phone"><?php echo $phoneErr;?></br>

							<label for="address">Address</label>
							<input type="text" class="form-control"  placeholder="Address Line 1" name="address1" id="address1"><b><?php echo $address1Err;?></b></br><br>
							<input type="text" class="form-control"  placeholder="Address line 2." name="address2" id="address2"><b><?php echo $address2Err;?></b></br>
							</div>
						</div>
					</div>
				</div>
			</div>



			<div class="panel panel-default">
				<div class="panel-heading" style = "background-color: #dedef8;">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href= "#collapseTwo">
							<div class ="p">Credit Card/Debit Card/Netbanking</div>
							<hr class="colorbar">

						</a>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse">
					<div class="panel-body">
						<div class="p1">
						<label for="cardno">Card No.</label>
						<input type="text" class="form-control"  placeholder="XXXX XXXX XXXX XXXX" name="card" id="card"><b><?php echo $cardErr;?></b></br>

						<label for="cvv">Cvv</label>
						<input type="text" class="form-control"  placeholder="Enter your Cvv" name="cvv" id="cvv"><b><?php echo $cvvErr;?></b></br>

						<label for="expiry">Expiry Date</label>
						<input type="date" class="form-control"  placeholder="dd-mm-yyyy" name="exp" id="exp"><b><?php echo $expErr;?></b></br>

						</div>			
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading" style = "background-color: #dedef8;">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href= "#collapseThree">
							<div class="p">Summary</div>
							 <hr class="colorbar">
							</a>
					</h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse">
					<div class="panel-body">
						<div class="p1">
							 <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                Antiquity
                                </div>
                                 <div class="col-xs-12 col-sm-6 col-md-6">
                                 Rs.450/-
                             </div>
                             </div>
                             
                             <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                  Tuborg
                                </div>
                                 <div class="col-xs-12 col-sm-6 col-md-6">
                                 Rs.180/-
                             </div>
                             </div>
                             --------------------------------------------------------------------
                             <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                Total:
                                </div>
                                 <div class="col-xs-12 col-sm-6 col-md-6">
                                 Rs.630/-
                             </div>
                             </div>
                              <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <input type="submit" value="submit" id="submitMain" name="submitMain" class="submit btn btn-primary btn-block btn-md" tabindex="7">
                                </div>
                                </div>
                                
                            </div>

						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
		</div>




</body>

<script>
	$(function() { //shorthand document.ready function
    $('#transactionform').on('submit', function(e) { //use on if jQuery 1.7+
        e.preventDefault();  //prevent form from submitting
        var data = $("#transactionform :input").serializeArray();
        console.log(data); //use the console for debugging, F12 in Chrome, not alerts
    });
});
</script>

</html>