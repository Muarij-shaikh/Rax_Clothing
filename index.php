<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rax Clothing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body { background-color:#f8f9fa; }
      .hero {
        background: url('images/hero-bg.png') center/cover no-repeat;
        min-height: 65vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
        position: relative;
      }
      .hero::after{
        content:"";
        position:absolute;
        top:0;left:0;width:100%;height:100%;
        background:rgba(0,0,0,0.55);
      }
      .hero-content{ position:relative; z-index:2; }
      .category-card img{ transition:0.3s; }
      .category-card:hover img{ transform:scale(1.05); }
      .product-card img{ height:260px; object-fit:cover; }
      .category-img {
    width: 100%;
    height: 260px; /* Adjust height to what looks good */
    object-fit: cover;
    border-radius: 12px;
    display: block;
}
    </style>
  </head>
  <body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>

    <!-- Hero -->
    <div class="hero mb-5">
      <div class="hero-content">
        <h1 class="fw-bold display-4 mb-3">Elevate Your Style</h1>
        <p class="lead mb-4">Premium quality apparel crafted for modern elegance.</p>
        <a href="products.php" class="btn btn-light btn-lg px-5 fw-semibold">Shop Now</a>
      </div>
    </div>

    <!-- Categories -->
    <div class="container mb-5">
      <h2 class="fw-semibold mb-4 text-center">Shop by Category</h2>
      <div class="row g-4 justify-content-center">
        <div class="col-6 col-md-3">
          <div class="card border-0 category-card text-center">
            <img src="images/afghani shervani.png" class="category-img" alt="">
            <div class="card-body p-2">
              <a href="productlist.php?prodid=1" class="text-dark fw-semibold">Afghani Shervani</a>
            </div>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="card border-0 category-card text-center">
            <img src="images/indian trousers.png" class="category-img" alt="">
            <div class="card-body p-2">
              <a href="productlist.php?prodid=3" class="text-dark fw-semibold">Indian Trousers</a>
            </div>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="card border-0 category-card text-center">
            <img src="images/japani kurta.png" class="category-img" alt="">
            <div class="card-body p-2">
              <a href="productlist.php?prodid=2" class="text-dark fw-semibold">Japani Kurta</a>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="card border-0 category-card text-center">
            <img src="images/irani abaya.png" class="category-img" alt="">
            <div class="card-body p-2">
              <a href="productlist.php?prodid=4" class="text-dark fw-semibold">Irani Abaya</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Featured Products -->
    <div class="container mb-5">
      <h2 class="fw-semibold mb-4 text-center">Featured Products</h2>
      <div class="row g-4 justify-content-center">
        <?php
        $sql = "SELECT * FROM products LIMIT 3";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
          $prodname = $row['product_name'];
          $proddesc = $row['product_description'];
          $prodprice = $row['product_price'];
          $imagePath = "images/".$prodname.".png";
          echo '<div class="col-md-4">
            <div class="card product-card h-100 shadow-sm">
              <img src="'.$imagePath.'" class="card-img-top" alt="'.$prodname.'">
              <div class="card-body">
                <h5 class="card-title">'.$prodname.'</h5>
                <p class="text-success fw-semibold">PKR '.$prodprice.'</p>
                <p class="small text-muted">'.substr($proddesc,0,60).'...</p>
              </div>
              <div class="card-footer bg-white border-0">
                <a href="products.php" class="btn btn-dark w-100">Buy Now</a>
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
