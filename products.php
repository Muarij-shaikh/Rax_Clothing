<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rax Clothing - Products</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background:#f3f4f6; }
    .product-card img { height:280px; object-fit:cover; transition:.3s; }
    .product-card:hover img { transform:scale(1.05); }
    .product-card { border:none; border-radius:12px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.08); transition:.3s; }
    .product-card:hover { box-shadow:0 6px 18px rgba(0,0,0,0.14); }
  </style>
</head>
<body>
<?php include 'partials/_dbconnect.php'; include 'partials/_header.php'; ?>
<div class="container py-5">
  <h1 class="text-center fw-bold mb-5">Explore Our Collection</h1>
  <div class="row g-4">
  <?php
  $sql = "SELECT * FROM products";
  $result = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_assoc($result)){
    $id = $row['product_id'];
    $name = $row['product_name'];
    $desc = $row['product_description'];
    $price = $row['product_price'];
    $image = 'images/'.$name.'.png';
    echo '<div class="col-md-4 col-sm-6">
      <div class="product-card bg-white h-100">
        <img src="'.$image.'" class="w-100" alt="'.$name.'">
        <div class="p-3">
          <h5 class="fw-semibold">'.$name.'</h5>
          <p class="text-muted small">'.substr($desc,0,60).'...</p>
          <p class="fw-bold text-success mb-2">PKR '.$price.'</p>
          <a href="productlist.php?prodid='.$id.'" class="btn btn-dark w-100">View Product</a>
        </div>
      </div>
    </div>';
  }
  ?>
  </div>
</div>
<?php include 'partials/_footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
