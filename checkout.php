<?php
$success = false;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Get form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Later you can save this to DB — right now just showing success alert
    $success = true;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rax Clothing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <style>
.body {
    min-height: 87vh;
}
</style>
  <?php  include 'partials/_dbconnect.php';  ?>
  <?php  include 'partials/_header.php';  ?>

  <body>
<div class="container my-5">

    <h2 class="fw-bold mb-4">Checkout</h2>

    <?php 
    $id = $_GET['prodid'];
$sql = "SELECT * FROM products WHERE product_id = '$id'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
  $name = $row['product_name'];
  $desc = $row['product_description'];
  $price = $row['product_price'];
  $image = 'images/'.$name.'.png';
}
    if($success){
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your order has been placed successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>';
    }
    ?>
<div class="border rounded p-3 mb-4 d-flex align-items-center">
    <img src="<?php echo $image; ?>" class="img-fluid rounded" style="width: 90px; height: 90px; object-fit: cover;">
    
    <div class="ms-3" style="flex: 1;">
        <h5 class="fw-bold mb-1"><?php echo $name; ?></h5>
        <p class="small text-muted mb-1"><?php echo $desc; ?></p>
        <span class="fw-semibold text-success">PKR <?php echo $price; ?></span>
    </div>
</div>
    <form action="" method="POST" class="border p-4 rounded bg-light">

        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" required class="form-control" placeholder="Enter your full name">
        </div>

        <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="text" name="phone" required class="form-control" placeholder="Enter your phone number">
        </div>

        <div class="mb-3">
            <label class="form-label">Full Address</label>
            <textarea name="address" required class="form-control" rows="3" placeholder="House / Street / City"></textarea>
        </div>

        <button type="submit" class="btn btn-success btn-lg w-100">Confirm Order</button>

    </form>

</div>
<?php  include 'partials/_footer.php';  ?>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>