<?php
include 'partials/_dbconnect.php';
include 'partials/_header.php';

$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!empty($name) && !empty($email) && !empty($message)) {
        $sql = "INSERT INTO `contacts` (`name`, `email`, `messege`, `dt`) VALUES ('$name', '$email', '$message', current_timestamp())";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $showAlert = true;
        } else {
            $showError = "Database error: " . mysqli_error($conn);
        }
    } else {
        $showError = "All fields are required!";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us | iForum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
    body {
        background: linear-gradient(120deg, #f7f1e3, #e0f7fa);
        font-family: 'Poppins', sans-serif;
        color: #333;
    }

    .contact-card {
        background: #ffffffcc;
        border-radius: 20px;
        padding: 50px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .contact-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
    }

    .contact-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #00796b;
        position: relative;
        display: inline-block;
    }

    .contact-title::after {
        content: '';
        width: 70px;
        height: 4px;
        background: #ff6f61;
        display: block;
        margin-top: 8px;
        border-radius: 4px;
    }

    .form-label {
        font-weight: 500;
    }

    .form-control:focus {
        border-color: #00796b;
        box-shadow: 0 0 8px rgba(0, 121, 107, 0.2);
    }

    .btn-submit {
        background: #00796b;
        color: #fff;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-submit:hover {
        background: #004d40;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .alert {
        border-radius: 0;
    }

    .container {
        min-height: 80vh;
    }

    .form-icon {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #00796b;
    }

    .form-group {
        position: relative;
    }

    .form-control.with-icon {
        padding-left: 40px;
    }
    </style>
</head>

<body>

    <?php
if ($showAlert) {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> Your message has been sent successfully. We will get back to you soon.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
            <strong>Error!</strong> ' . $showError . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
?>

    <div class="container d-flex justify-content-center align-items-center my-5">
        <div class="col-md-8">
            <div class="contact-card">
                <h3 class="text-center contact-title mb-4">Contact Us</h3>
                <p class="text-center text-muted mb-4">Questions, feedback, or suggestions? Fill out the form and we’ll
                    get back to you promptly.</p>

                <form action="contact.php" method="POST">
                    <div class="mb-3 form-group">
                        <i class="fas fa-user form-icon"></i>
                        <input type="text" class="form-control with-icon" id="name" name="name" placeholder="Full Name"
                            required>
                    </div>

                    <div class="mb-3 form-group">
                        <i class="fas fa-envelope form-icon"></i>
                        <input type="email" class="form-control with-icon" id="email" name="email"
                            placeholder="Email Address" required>
                    </div>

                    <div class="mb-3 form-group">
                        <i class="fas fa-comment form-icon"></i>
                        <textarea class="form-control with-icon" id="message" name="message" rows="5"
                            placeholder="Write your message..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-submit w-100">Send Message</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php include 'partials/_footer.php'; ?>