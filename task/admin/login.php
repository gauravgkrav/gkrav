<?php 

include '../models/auth.php';
session_start();
$obj=new auth();

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $pass=$_POST['pass'];

    $sql="SELECT * from admin where username=:name and password =:pass";
    $res=$obj->conn->prepare($sql);
    $res->execute([":name"=>$name,":pass"=>$pass]);

   
    if($res->rowCount() > 0){
        $_SESSION['username'] = $name;
        header("Location: home.php");
        
    }else{
        
        $error = "Invalid username or password";
    }
}
?>
<!doctype html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="k"></div>
    <div class="main">
        <h1> Admin Login Form</h1>
        <div class="main1">
            <form method="post" id="inputf" class="p-5">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="pass" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <p class="text-end"><a class="link-opacity-100" href="index.php">Not a user? Register here</a></p>

            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</body>

</html>