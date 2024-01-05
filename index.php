<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskify</title>
    <link rel="icon" type="image/x-icon" href="images/favicon1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
    if(isset($_POST['login'])){
        header("location: login.php");
    }
    if(isset($_POST['signup'])){
        header("location: signup.php");
    }
    ?>
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
        <form class="d-flex" action="index.php" method="post">
            <input class="btn btn-light me-3" type="submit" name="login" value="Login">
            <input class="btn me-2" style="background-color:#E74E35; color:white;" type="submit" name="signup" value="Signup">
        </form>
        </div>
    </nav><br><br><p></p><br><br>
    <div class="container-fluid">
        <p class="h1 mt-2 text-center" style="font-size:50px;"></b>Ultimate Task Management Solution</b></p>
        <p class="text-muted mt-4 text-center ps-5 pe-5" style="font-size:25px;">Taskify is a powerful and user-friendly task management app designed to help you stay organized, boost productivity, and achieve your goals effortlessly."</p>
        <center><a href="signup.php"><button class="btn mt-2 mb-3"style="background-color:#E74E35; color:white;" type="button">Signup for free</button></a></center><hr class="ms-1 me-1">
    </div>
    <div class="container-fluid mt-5 mb-5">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <img src="images/todo.jpg" class="mx-auto d-block img-fluid rounded" alt="image" style="width:600px;height:auto" >
            </div>
            <div class="col-lg-6 col-md-6">
                <p class="h3 mt-1 ms-3"><b>Simplify Your Day, with Taskify!</b></p><br>
                <p style="font-size:20px;" class="me-5 mb-3 ms-3">Effortlessly create your day today tasks with our intuitive interface. Getting started with Taskify is a breeze. Sign up, create your first task, and start managing your to-dos in minutes.<p>
            </div>
        </div>
    </div><hr class="ms-3 me-3">
    <div class="container-fluid mt-5 mb-5">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <p class="h3 ms-3 text-align-right"><b>Empower Your Productivity with Taskify!</b></p><br>
                <p style="font-size:20px;" class="ms-3 mb-5 text-align-right">Taskify empowers you to be more productive by providing a clear overview of your tasks and priorities. Whether it's personal or professional, Taskify is your partner in achieving your goals.<p>
            </div>
            <div class="col-lg-6 col-md-6">
                <img src="images/todo1.jpg" class="mx-auto d-block img-fluid rounded" alt="image" style="width:600px;height:auto" >
            </div>
        </div>
    </div><hr class="ms-3 me-3">
    <div class="container-fluid mt-5 mb-5">
    <center><p class="h1"><b>Efficiency at Your Fingertips</b></p></center><br>
    <img src="images/logo.jpeg" class="mx-auto d-block rounded-circle" style="width:200px;height:auto"><br>
    <center><p class="h1" style="color:#E74E35;"><b>Taskify</b>&nbsp;&nbsp;<a href="login.php"><button class="btn btn-outline-dark btn-sm me-3" style="width:80px" type="button">Login </button></a></p></center><br>
    </div>
</body>
</html>