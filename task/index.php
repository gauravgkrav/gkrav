<?php

include 'models/auth.php';
$obj = new auth();
$sr="";
$er="";
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    $errors = array();
    $required_fields = array('name', 'email', 'phone', 'pass', 'cpass');
    foreach ($required_fields as $field) {
        if (empty(trim($_POST[$field]))) {
            $errors[] = "Please fill in all fields";
        }
    }

    if ($pass !== $cpass) {
        $errors[] = "Passwords do not match";
    }

    if (strlen($pass) < 6) {
        $errors[] = "Password must be at least 6 characters long";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "please fill all the details ";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            $er ='<div class="alert alert-danger" role="alert">' . $error . '</div>';
        }
        // exit;
    }
    else{

   

    if($obj->emailverify($email)){
        $sr= '<div class="alert alert-danger" role="alert"> email already exists</div>';
    } else {
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user(name, email, phone, password) VALUES (:name, :email, :phone, :cpass)";
        $result = $obj->conn->prepare($sql);
        $result->execute([":name" => $name, ":email" => $email, ":phone" => $phone, ":cpass" => $hashed_password]);

        if($result){
            $sr ='<div class="alert alert-success" role="alert"> Registered sucessfully</div>';
            echo '<script>
            setTimeout(function() {
                window.location.href = "login.php";
            }, 3000);
        </script>';
            
        } else {
            echo "Not inserted";
        }
    }
}
}
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
    .errr {
        color: red;
    }
    </style>
</head>

<body>
    <div class="k">
        <div class="main">
            <h1>Register Form</h1>
            <form method="post" id="inputf" class="p-5">
                <div class="showe"><?=$er;?><?=$sr;?></div>


                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name </label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">phone</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="pass" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm password</label>
                        <input type="password" class="form-control" name="cpass" onkeyup="check(this)">
                        <div class="errr"></div>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                    <p class="text-end"><a class="link-opacity-100" href="login.php">Already user</a></p>

            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
    function check(an) {
        var pass = document.getElementById('exampleInputPassword1').value;
        if (pass.length > 0) {
            if (an.value !== pass) {
                document.querySelector('.errr').innerHTML = "Passwords do not match";
            } else {
                document.querySelector('.errr').innerHTML = "";
            }
        }
    }


    var div = document.querySelector('.showe');
    setTimeout(function() {
        div.style.display = 'none';
    }, 3000);
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</body>

</html>