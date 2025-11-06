<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rax Clothing - Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background:#f3f4f6; }
    .product-image { border-radius:12px; box-shadow:0 6px 20px rgba(0,0,0,0.15); }
    .btn-custom-main { background:#111; color:#fff; border-radius:6px; }
    .btn-custom-main:hover { background:#444; }
    .btn-custom-outline { border:1px solid #111; border-radius:6px; }
    .btn-custom-outline:hover { background:#111; color:#fff; }
    
  </style>
</head>
<body>
<?php include 'partials/_dbconnect.php'; include 'partials/_header.php'; ?>
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
?>
<div class="container py-5">
  <div class="row g-5">
    <div class="col-lg-5 text-center">
      <img src="<?php echo $image; ?>" class="img-fluid product-image" alt="<?php echo $name; ?>">
    </div>
    <div class="col-lg-7 d-flex flex-column justify-content-center">
      <h1 class="fw-bold mb-3"><?php echo $name; ?></h1>
      <p class="text-muted mb-3"><?php echo $desc; ?></p>
      <h3 class="text-success fw-bold mb-4">PKR <?php echo $price; ?></h3>
      <div class="mb-4">
        <h6 class="fw-bold">Product Features</h6>
        <ul>
          <li>Premium quality material</li>
          <li>Comfort fit stitching</li>
          <li>Durable and long-lasting</li>
        </ul>
      </div>
      <div class="d-flex gap-3">
        <a href="cart.php?prodid=<?php echo $id; ?>" class="btn btn-custom-main px-4 py-2">Buy Now</a>
        <a href="cart.php?prodid=<?php echo $id; ?>" class="btn btn-custom-outline px-4 py-2">Add to Cart</a>
      </div>
    </div>
  </div>
</div>
<?php include 'partials/_footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
