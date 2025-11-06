<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rax Clothing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<?php  include 'partials/_dbconnect.php';  ?>
<?php  include 'partials/_header.php';  ?>

<body>
    <style>
    .body {
        min-height: 87vh;
    }
    </style>
    <div id="cart" class="container my-5">
        <h2 class="fw-bold mb-4">Your Cart</h2>
        <?php 
   
    
    $id = $_GET['prodid'];
    $sql = "SELECT * FROM `products` WHERE product_id = '$id'";
    $result = mysqli_query($conn,$sql);
        // starting while here

    while($row = mysqli_fetch_assoc($result)){
      $_SESSION['emptycart']=false;
        $prodname = $row['product_name'];
        $proddesc = $row['product_description'];
        $prodprice = $row['product_price'];
        $imagePath = "images/" . $prodname . ".png";
    }  
    if(isset($_SESSION['emptycart'])&& $_SESSION['emptycart']==false){

      echo '
      
      <div class="row align-items-center border rounded p-3 mb-3">
      <div class="col-md-2 cart-content">
      <img src="'.$imagePath.'" class="img-fluid rounded" alt="Product Image">
      </div>
      
      <div class="col-md-4">
      <h5 class="fw-semibold cart-content">'.$prodname.'</h5>
      <p class="text-muted small cart-content">'.$proddesc.'</p>
      </div>
      
      <div class="col-md-2">
      <input type="number" value="1" min="1" class="form-control w-75 cart-content">
      </div>
      
      <div class="col-md-2">
      <h6 class="fw-semibold text-success cart-content cart-content">PKR '.$prodprice.'</h6>
      </div>
      
      <div class="col-md-2 text-end">
      <a href="cart.php?prodid=0&&emptycart=true" id="removebtn" class="btn btn-outline-danger btn-sm cart-content">remove</a>
      </div>
      </div>
      <div class="text-end mt-4">
      <h4 class="fw-bold cart-content">Total: PKR '.$prodprice.'</h4>
      <a href="checkout.php?prodid='.$id.'" class="btn btn-success btn-lg px-5 mt-3">Checkout</a>
      </div>
      </div>';    
      }
      else{
        echo '
      
      <div class="row align-items-center border rounded p-3 mb-3">
      <div class="col-md-2 cart-content">
      <img src="images/empty cart.png" class="img-fluid rounded" alt="Product Image">
      </div>
      <div class="col-md-4">
      <h5 class="fw-semibold cart-content">Your Cart Is Empty</h5>
      <p class="text-muted small cart-content">Please Select a Product To Checkout</p>
      </div>
      <div class="col-md-2">
      <h6 class="fw-semibold text-success cart-content cart-content">PKR 0</h6>
      </div>
      <div class="col-md-4 mt-4">
      <h4 class="fw-bold cart-content">Total: PKR 0</h4>
      <a href="products.php" class="btn btn-success btn-lg px-5 mt-3">Select a Product</a>
      </div>
      </div>';    
      }
    
    ?>

        <!-- Duplicate the above block for more items -->


        <!-- Cart Summary -->



        <?php  include 'partials/_footer.php';  ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</body>

</html>