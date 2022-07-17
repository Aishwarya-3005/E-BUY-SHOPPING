<?php

session_start();
$connect = mysqli_connect("localhost", "root", "", "test");

if(isset($_POST["add_to_cart"]))
{
  if(isset($_SESSION["shopping_cart"]))
  {
      $item_array_id=array_column($_SEESION["shopping_cart"], "item_id");
      if(!in_array($_GET["id"], $item_array_id))
              {
                $count = count($_SESSION["shopping_cart"]);
                  $item_array=array(
                    'item_id'              =>    $_GET["id"],
                    'item_name'            =>    $_POST["hidden_name"],
                    'item_price'           =>    $_POST["hidden_price"],
                    'item_quantity'        =>    $_POST["quantity"] 
                 );
                     $_SESSION["shopping_cart"][$count] = $item_array;
               }
       else{
        echo '<script>alert("Item Already Added")</script>';
        echo '<script>window.location="cart.php"</script>';
      }
    }
     else
     {
         $item_array=array(
           'item_id'              =>    $_GET["id"],
           'item_name'            =>    $_POST["hidden_name"],
           'item_price'           =>    $_POST["hidden_price"],
           'item_quantity'        =>    $_POST["quantity"]
         );
         $_SESSION["shopping_cart"][0] = $item_array;
         
     }
   }
 if(isset($_GET["action"]))
 {
  if($_GET["action"]=="delete")
  {
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
      if($values["item_id"]==$_GET["id"])
      {
        unset($_SESSION["shopping_cart"][$keys]);
        echo '<script>alert("Item Removed")</script>';
        echo '<script>window.location="cart.php"</script>';
      }
    }
  }
 }
           


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Shopping Cat</title>
        
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="regist.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<div class="header">
    <div class="container">

      <div class="navbar">
         <div class="logo">
            <img src="images\go.jpg" width="140" height="150">
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
      <img src="images\menu.jpg" class="menu-icon" onclick="menutoggle()">

     </div>
  </div>
  <script>
             var MenuItems = document.getElementById("MenuItems");
             
            MenuItems.style.maxHeight = "0px";

            function menutoggle(){
                if(MenuItems.style.maxHeight == "0px")
                  {
                     MenuItems.style.maxHeight = "300px";
                   }
                 else
                    {
                        MenuItems.style.maxHeight = "0px";
                    }
             }
</script>  
        <div class="container" style="width:700px;">
       <h3 >Shopping Cart</h3><br />
       <?php
       $query="SELECT * FROM tbl_product ORDER BY id ASC";
       $result=mysqli_query($connect, $query);
       if(mysqli_num_rows($result) > 0)
       {
        while($row=mysqli_fetch_array($result))
        {
            ?>
            <div class="col-md-4">
             <form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
                <div style="border:1px solid #333; background-color:#f1f1f1; border-radius: 5px; padding: 16px;">
                  <img src="./images/<?php echo $row['image']; ?>" class="img-responsive" /><br />  
                   <h4 class="text-info"><?php echo $row["name"]; ?></h4>
                   <h4 class="text-danger">Rs <?php echo $row["price"]; ?></h4>
                   <input type ="text" name="quantity" class="form-control" value="1" />
                    <input type ="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                   <input type ="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                   <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to cart" />
                 </div>
               </form>
             </div>    
             <?php
             }
         }
    
        ?>
        <div style="clear:both"></div>
        <br />
        <h3>Order Details</h3>
        <div class="table_responsive">
          <table class="table table-bordered">
            <tr>
              <th width="40%">Item Name</th>
              <th width="10%">Quantity</th>
              <th width="20%">Price</th>
              <th width="15%">Total</th>
              <th width="5%">Action</th>
           </tr>
           <?php
           if(!empty($_SESSION["shopping_cart"]))
           {
            $total = 0;
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
              ?>
              <tr>
                   <td><?php echo $values["item_name"]; ?></td>
                   <td><?php echo $values["item_quantity"]; ?></td>
                   <td>  Rs <?php echo $values["item_price"]; ?></td>
                   <td> <?php echo number_format ($values["item_quantity"] * $values["item_price"], 2); ?></td>
                   <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span><a></td>
            </tr>
            <?php
                $total=$total + ($values["item_quantity"] * $values["item_price"]);
            }
          
            ?>
            <tr>
              <td colspan="3" align="right">Total</td>
              <td align="right">Rs <?php echo number_format($total, 2); ?></td>
              <td></td>
          </tr>
            <?php
            
           }
           ?>
        </table> 
    </div>

    <div class="cart-btn" style= "margin-top: 10px;" align="right;">
      <a href="checkout.php" class="btn ">proceed to checkout</a>
      </div>
    </div>
    <br />
   </body>
 </html>
