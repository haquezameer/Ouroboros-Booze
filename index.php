<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
</head>
<body>
<div id="body_wrapper">
  <!-- Start of Page Header -->
  <div id="page_header">
    <!-- Start of Company Name -->
    <div id="company_name">
      <h1><span>OUR COLABORATORS</span></h1>
    </div>
    <!-- End of Company Name -->
   
   
  </div>
  <!-- End of Page Header -->
  
  <!-- Start of Main Content -->
  <div id="maincontent_1">
    <div id="maincontent_2">
      <div id="maincontent_content">
	  <?php
 // config file used to connect to data base.
 // connection to database.
 $con = mysql_connect("localhost","root");
 // if database is not found.
 $query=mysql_query("SET CHARACTER SET utf8") or die('Cannot select CHARACTER SET utf8: ' . mysql_error());
 // selection of database.
 mysql_select_db("booze",$con);
 
 
 $query = mysql_query("SELECT collaborator FROM menu
								")
								or die(mysql_error());
								
	
	$num1= @mysql_num_rows($query);
   
  while ($row = mysql_fetch_array($query))
   {
	 $oprice= $row['collaborator'];   
   ?>
   <td><h1><?php echo $oprice;?></h1></td>
   <?php
   $query1 = mysql_query("SELECT * FROM menu
							")
								or die(mysql_error());
	$num= @mysql_num_rows($query);
   
   while ($row1 = mysql_fetch_array($query1))
   {
   
   $pname= $row1['items'];
   $oqty=$row1['price'];
  
 ?>
		
         <td>MENU</td><br/>
		 <td><tr><?php echo $pname;?>........................</tr>
		 <tr><?php echo $oqty;?></tr>
		 </td>
         
         
        </tr>
<?php  
 }
}
 ?>					

      </div>
    </div>
  </div>
  <!-- End of Main Content -->
  
  
</html>
