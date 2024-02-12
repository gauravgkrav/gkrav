<?php
include 'models/auth.php';
session_start();


if (!isset($_SESSION['name'])) {
   
    header("Location: index.php");
    exit(); 
}
$obj = new auth();


$mes="";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $ui=$_POST['hid'];

    if (empty($name) || empty($email) || empty($message)) {
        $mes = '<div class="alert alert-danger" role="alert">
        please fill all the field
       </div>';
    } else {
        $sql = "INSERT INTO contact_us (name, email, message,user_email) VALUES (:name, :email, :message,:hid)";
        $result = $obj->conn->prepare($sql);
        $result->execute(array(':name' => $name, ':email' => $email, ':message' => $message,':hid'=>$ui));

        if ($result) {
        
            $mes= '<div class="alert alert-success" role="alert">
           Sucessfully send wait for Reply
          </div>';
        } else {
            // Error message
            $mes= '<div class="alert alert-danger" role="alert">
           not send !
          </div>';
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="contactus.php">contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>

                <a class="navbar-brand" href="logout.php">logout</a>

            </div>
        </div>
    </nav>
    <div class="sendm"><?=$mes?></div>
    <div class="container mt-5">
        <h1>Contact Us</h1>
        <p>Fill out the form below to get in touch with us.</p>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <input type="hidden" value="<?=$_SESSION['name'];?>" name="hid">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
var div = document.querySelector('.sendm');
setTimeout(function() {
    div.style.display = 'none';
}, 3000);
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>

</html>