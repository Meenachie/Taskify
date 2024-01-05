<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="icon" type="image/x-icon" href="images/favicon1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
        <div class="container-fluid">
            <ul class="navbar-nav">
            <li class="nav-item">
            <a class=" navbar-brand" href="index.php"><img src="images/home.png" style="width:40px; height:auto" alt="Home"></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" style="color:#E74E35; font-size:20px;" href="index.php"><b>Taskify</b></a>
            </li>
            </ul>
        <form class="d-flex">
            <a href="login.php"><button class="btn btn-light me-3" type="button">Login</button></a>
            <a href="#"><button class="btn me-2" style="background-color:#E74E35; color:white;" type="button">Signup</button></a>
        </form>
        </div>
    </nav><br><br><br>
    <div class="container mt-5">
        <div class="shadow-lg p-4 mb-4 bg-white">
            <center><p class="h3">Sign Up</p></center>
            <div class="container mt-3"> 
            <?php include 'includes/functions.php';
            $users -> signup();
            ?>
                <form action="signup.php" method="post">
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" >
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" >
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" >
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="password" class="form-control" id="pwdd" placeholder="Re-enter password" name="confirm_password" >
                        <label for="confirm_password">Confirm Password</label>
                    </div>
                    <center><button type="submit" name="submit" class="btn" style="width:150px; background-color:#E74E35; color:white;">Sign Up</button><center>
                    <hr>
                    <p>Already have an account?&nbsp;<a href=login.php style="text-decoration:none;color:#E74E35;">Login</a></p>
                </form>
            </div>
        </div>
    </div> 
</body>
</html>