<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "test");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
if(isset($_POST['order_btn'])){
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$method = mysqli_real_escape_string($link, $_REQUEST['method']);
$flat = mysqli_real_escape_string($link, $_REQUEST['flat']);
$street = mysqli_real_escape_string($link, $_REQUEST['street']);
$city = mysqli_real_escape_string($link, $_REQUEST['city']);
$state = mysqli_real_escape_string($link, $_REQUEST['state']);
$country = mysqli_real_escape_string($link, $_REQUEST['country']);
$pin_code = mysqli_real_escape_string($link, $_REQUEST['pin_code']);



// Attempt insert query execution
$sql = "INSERT INTO persons1 (first_name, last_name, email, method, flat, street, city, state, country, pin_code) VALUES ('$first_name', '$last_name', '$email', '$method', '$flat', '$street', '$city', '$state', '$country', '$pin_code')";
if(mysqli_query($link, $sql)){
    echo "Thankyou for shopping";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if($sql){
    echo "
    <div class= 'order-message-container'>
      <div class= 'message-container'>
         <h3>thank you for shopping!</h3>
          <div class='order-detail'>
             
            
           </div>
      <div class='customer-details'>
         <p> your first_name :  <span>".$first_name."</span> </p>
         <p> your last_name : <span>".$last_name."</span> </p>
         <p> your email : <span> ".$email."</span> </p>
         <p> your address : <span> ".$flat.", ".$street.", ".$city.", ".$state.", ".$country.", ".$pin_code." </span> </p>
         <p> your payment mode : <span>".$method."</span> </p>
         <p>(*pay when product arrives*)</p>
      </div>
     <a href='cart.php' class='btn'>continue shopping</a>
  </div>
</div>

 ";   
}

}
// Close connection
mysqli_close($link);
?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <title>GO GREEN | Online Nursery Plant Website</title>
   <link rel="stylesheet" href="checkout.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
    <div class="header">
    <div class="container">

      <div class="navbar">
         <div class="logo">
            <a href="index.html"><img src="images\gp.jpg" width="140" height="150"></a>
         </div>
     <nav>
       <ul id="MenuItems">
           <li><a href="home.html">Account</a></li> 
          <li><a href="index.html">Home</a></li>
          <li><a href="products.html">Products</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          
       </ul>
      </nav>

      <img src="images\cart.jpg" width="75px" height="60px"></a>
      <img src="images\menu1.jpg" class="menu-icon" onclick="menutoggle()">

     </div>
  </div>

    
<div class="container">
    <section class="checkout-form">
    <h1 class="heading">COMPLETE YOUR ORDER</h1>
     <form action=" " method="post">
        <div class="display-order">
       
         
</div>
            <div class="flex">
            
                <div class="inputBox">
                    <span>your name</span>
                    <input type="text" placeholder="enter your name" name="first_name" required>
                </div>
                <div class="inputBox">
                    <span>your name</span>
                    <input type="text" placeholder="enter your name" name="last_name" required>
                </div>
                <div class="inputBox">
                    <span>your email</span>
                    <input type="email" placeholder="enter your email" name="email" required>
                </div>
                <div class="inputBox">
                    <span>payment method</span>
                    <select name="method">
                        <option value="cash on delivery" selected>cash on delivery</option>
                        <option value="paypal">paypal</option>
                        <option value="credit cart">credit cart</option>
                    </select>    
                </div>
                <div class="inputBox">
                    <span>address line 1</span>
                    <input type="text" placeholder="e.g. flat no." name="flat" required>
                </div>
                <div class="inputBox">
                    <span>address line 2</span>
                    <input type="text" placeholder="e.g. street name." name="street" required>
                </div>
                <div class="inputBox">
                    <span>city</span>
                    <input type="text" placeholder="e.g. mumbai." name="city" required>
                </div>
                <div class="inputBox">
                    <span>state</span>
                    <input type="text" placeholder="e.g. maharastra." name="state" required>
                </div>
                <div class="inputBox">
                    <span>country</span>
                    <input type="text" placeholder="e.g. india." name="country" required>
                </div>
                <div class="inputBox">
                    <span>pin code</span>
                    <input type="text" placeholder="e.g. 123456." name="pin_code" required>
                </div>
            </div>
            <input type="submit" value="order now" name="order_btn" class="btn">
        </form>
    </section>    
</div>
</body>
</html>
