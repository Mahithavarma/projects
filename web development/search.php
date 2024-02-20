
<html>
<head>
    <link rel="stylesheet" href="searchpage.css">
</head>
</html>
<?php
require('db.php');
// session_start();
$session_flag = 0;

/* it will check if a form has submitted before runnig the code*/
if(isset($_POST['submit']))
{
    if($_POST['name'] == '' && $_POST['city'] == '' && !($_POST['min_quantity'] > 0) && 
    !($_POST['max_quantity']) > 0 && !($_POST['min_price'] > 0) && !($_POST['max_price'] > 0)) {
/*here isset function checks whether variable is declared and it has some value*/        
        if(isset($_SESSION["name"]) || isset($_SESSION["city"]) || isset($_SESSION["min_quantity"]) || isset($_SESSION["max_quantity"])
        || isset($_SESSION["min_price"]) || isset($_SESSION["max_price"])){
        $name = $_SESSION["name"];
        $city = $_SESSION["city"];
        $min_quantity = $_SESSION["min_quantity"];
        $max_quantity = $_SESSION["max_quantity"];
        $min_price = $_SESSION["min_price"];
        $max_price = $_SESSION["max_price"];
        
      
        
    $condition = "";
 
    if($name != ''){
        $condition = " where pname like '%$name%'";
    }
    if($city !='')
    {
        if($condition == ''){ //checking the city and condition
            $condition = " where city like '%$city%'";
        }
        else{
         $condition.=  " and city like '%$city%'";
        }
    }
    
    
     if($min_quantity > 0){
        if($condition == ''){ //checking the   condition
            $condition = " where quantity >='$min_quantity'";
        }
        else{
         $condition .=  " and quantity >='$min_quantity'";
        }
         
     }
    if( $max_quantity > 0){
     if($condition == ''){
         $condition =" where quantity <='$max_quantity'";
     }
     else{
         $condition .= " and quantity <='$max_quantity'";
     }
        
    }
    
    if($min_price > 0){
         if(  $condition== ''){
            $condition = " where price >='$min_price'";
         }
         else{
            $condition .=  " and price >='$min_price'";
         }
        
    }
   if($max_price > 0){
         if(  $condition== ''){
            $condition = " where price <='$max_price'";
         }
         else{
            $condition .=   " and price <='$max_price'";
         }
        
    } 
    
    
    if($condition == ''){
        
        $query = "select * from products";
        /*if given search is query it displays results or it returns error description of previous function*/
    $result = mysqli_query($con, $query) or die (mysqli_error());
        
    }else {
         $query = "select * from products" . $condition;
         
        $result = mysqli_query($con, $query) or die (mysqli_error());
    }
        
        }
        else {
            $session_flag = 1;
        }
    }
    else {
        
    $_SESSION["name"] = $_POST['name'];
    $_SESSION["city"] = $_POST['city'];
    $_SESSION["min_quantity"] = $_POST['min_quantity'];
    $_SESSION["max_quantity"] = $_POST['max_quantity'];
    $_SESSION["min_price"] = $_POST['min_price'];
    $_SESSION["max_price"] = $_POST['max_price'];
        
        
   
    $name=$_POST['name'];
    $query = "";
    $condition = "";
    if($_POST['name'] != ''){
        
        $condition = " where pname like '%$name%'";
    }
    else {
        $condition = " where pname != ''";
    }
    $city=$_POST['city'];
    if($_POST['city'] != ''){
    if($condition == ''){ //checking the city and condition
            $condition = " where city like '%$city%'";
        }
        else{
         $condition.=  " and city like '%$city%'";
        }
    }
    if($_POST['min_quantity'] > 0){
        
    $min_quantity=$_POST['min_quantity'];
    
    if($condition == ''){ //checking the   condition
            $condition = " where quantity >='$min_quantity'";
        }
        else{
         $condition .=  " and quantity >='$min_quantity'";
        }
    }
    if($_POST['max_quantity'] > 0){
    $max_quantity=$_POST['max_quantity'];
       
        if($condition == ''){
         $condition =" where quantity <='$max_quantity'";
     }
     else{
         $condition .= " and quantity <='$max_quantity'";
     }
    }
    if($_POST['min_price'] > 0){
    $min_price=$_POST['min_price'];
       
       if(  $condition== ''){
            $condition = " where price >='$min_price'";
         }
         else{
            $condition .=  " and price >='$min_price'";
         }
        
    }
    if($_POST['max_price'] > 0){
        
    $max_price=$_POST['max_price'];
       
         if(  $condition== ''){
            $condition = " where price <='$max_price'";
         }
         else{
            $condition .=   " and price <='$max_price'";
         }
    }
    //echo $condition;
    $query ="";
    if($condition == ''){
        $query = "select * from products";
    $result = mysqli_query($con, $query) or die (mysqli_error());
        
    }else {
        $query = "select * from products" . $condition;
        
        $result = mysqli_query($con, $query) or die (mysqli_error());
    }
    }
    
    if($session_flag == 1) {
        $name=$_POST['name'];
    $condition = "";
    if($_POST['name'] != ''){
        $condition = " where pname like '%$name%'";
    }
    else {
        $condition = " where pname != ''";
    }
    $city=$_POST['city'];
    if($_POST['city'] != ''){
   if($condition == ''){ //checking the city and condition
            $condition = " where city like '%$city%'";
        }
        else{
         $condition.=  " and city like '%$city%'";
        }
    }
    if($_POST['min_quantity'] > 0){
        
    $min_quantity=$_POST['min_quantity'];
    if($min_quantity > 0){
        if($condition == ''){ //checking the   condition
            $condition = " where quantity >='$min_quantity'";
        }
        else{
         $condition .=  " and quantity >='$min_quantity'";
        }
         
     }
    }
    if($_POST['max_quantity'] > 0){
    $max_quantity=$_POST['max_quantity'];
        if( $max_quantity > 0){
     if($condition == ''){
         $condition =" where quantity <='$max_quantity'";
     }
     else{
         $condition .= " and quantity <='$max_quantity'";
     }
        
    }
    }
    if($_POST['min_price'] > 0){
    $min_price=$_POST['min_price'];
       if($min_price > 0){
         if(  $condition== ''){
            $condition = " where price >='$min_price'";
         }
         else{
            $condition .=  " and price >='$min_price'";
         }
        
    }
        
    }
    if($_POST['max_price'] > 0){
        
    $max_price=$_POST['max_price'];
          if($max_price > 0){
         if(  $condition== ''){
            $condition = " where price <='$max_price'";
         }
         else{
            $condition .=   " and price <='$max_price'";
         }
        
    } 
    }
    
    if($condition == ''){
        $query = "select * from products";
    $result = mysqli_query($con, $query) or die (mysqli_error());
        
    }else {
        $query = "select * from products" . $condition ;
        $result = mysqli_query($con, $query) or die (mysqli_error());
    }
    } 

}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
    <div class="dealer">
        
    <center>
<h1>Mahitha Wholesale Products</h1>
    </center>
    </div>
<div class="container">
    <div class="table-wrapper">
<table class="fl-table">
  <thead>
    <tr>
      <th scope="col">Product Id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product City</th>
      <th scope="col">Product Quantity</th>
       <th scope="col">Product Price</th>
    </tr>
  </thead>
  <tbody>
      <?php
$flag = 0;
while ($row = mysqli_fetch_assoc($result)) { 
  $flag = 1;
?>
    <tr>
      <th scope="row"><?php echo $row['pid'] ?></th>
      <td><?php echo $row['pname'] ?></td>
      <td><?php echo $row['city'] ?></td>
      <td><?php echo $row['quantity'] ?></td>
      <td><?php echo $row['price'] ?></td>
    </tr>
<?php } 
if($flag == 0){
    ?>
    <p>oops! No records Found</p>
    
<?php
}
?>
  </tbody>
</table>
</div>
<center>
    

<button class="btn btn-danger" onclick="history.go(-1);">Perform Another Search </button>
</center>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

