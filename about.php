<?php
include 'partials/_dbconnect.php';
include 'partials/_header.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us - Rax Clothing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background: #f2f2f2;
        /* Slightly warmer gray */
        font-family: 'Poppins', sans-serif;
        color: #333;
    }

    .brand-section {
        padding: 90px 0 40px 0;
        text-align: center;
        background: #e6e6e6ff;
        /* light cream tone for header section */
    }

    .brand-section h1 {
        font-size: 3rem;
        font-weight: 700;
        letter-spacing: 1px;
        color: #2c2c2c;
    }

    .brand-line {
        width: 180px;
        height: 4px;
        background: #ff6262ff;
        /* subtle accent color */
        margin: 15px auto 0;
        border-radius: 6px;
    }

    .intro-text {
        max-width: 800px;
        margin: 25px auto;
        color: #555;
        font-size: 1.1rem;
        line-height: 1.7rem;
    }

    .content-section {
        padding: 50px 0;
        background-color: #e4e4e4ff;
    }

    .content-card {
        background: #ffffffcc;
        /* slight transparency for soft contrast */
        border-radius: 12px;
        padding: 35px;
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s;
    }

    .content-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
    }

    .content-card h3 {
        font-weight: 600;
        margin-bottom: 20px;
        color: #2c2c2c;
    }

    .values-list li {
        margin-bottom: 10px;
        font-size: 1.05rem;
    }

    .values-list strong {
        color: #ff6f61;
        /* match accent */
    }

    /* Optional: subtle background for container */
    .container.content-section {
        background: #f9f9f9;
        border-radius: 15px;
        padding: 50px 30px;
    }
    </style>
</head>

<body>

    <div class="brand-section">
        <h1>Rax Clothing</h1>
        <div class="brand-line"></div>
        <p class="intro-text">
            Rax Clothing is not about trends — it's about identity. We create menswear rooted in cultural heritage,
            refined with a modern aesthetic. Our designs speak quietly, but they carry presence.
        </p>
    </div>

    <div class="container content-section">
        <div class="row g-4 align-items-start">

            <div class="col-lg-7">
                <div class="content-card">
                    <h3>Who We Are</h3>
                    <p>
                        Rax Clothing represents a mindset. A man who knows who he is doesn't need to prove it — his
                        clothing speaks subtly,
                        confidently, and with intention. Our garments are crafted for those who carry heritage with
                        dignity.
                    </p>
                    <p>
                        We work alongside skilled artisans who specialize in traditional and contemporary ethnic
                        menswear.
                        Every stitch, cut and detail is carefully curated to create pieces that hold value.
                    </p>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="content-card">
                    <h3>What We Make</h3>
                    <ul class="values-list">
                         <?php
          $sql = "SELECT product_name , product_id FROM `products`";
        $result = mysqli_query($conn,$sql);
        // starting while here
        while($row = mysqli_fetch_assoc($result)){
          echo '
          <li><a class="dropdown-item" href="/ecommerce_muarij/productlist.php?prodid='.$row['product_id'].'"><strong>'.$row['product_name'].'</a></strong></li>';
        }
        ?>
                        
                    </ul>
                    <p class="mt-3 mb-0">
                        Every piece is inspected for comfort, fabric integrity and finishing — no compromises.
                    </p>
                </div>
            </div>

        </div>
    </div>

    <?php include 'partials/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>