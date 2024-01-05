<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" type="image/x-icon" href="images/favicon1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <style>
    .dropdown-item:active {
         background-color: #E74E35;
    }
    </style> 
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION["user"])){
            header("Location: index.php");
        }
        include_once 'includes/functions.php'; 
    ?>
    <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
    <div class="container-fluid">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class=" navbar-brand" href="home.php"><img src="images/home.png" style="width:40px; height:auto" alt="Home"></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="color:#E74E35; font-size:20px;" href="home.php"><b>Taskify</b></a>
        </li>
        </ul>
        <form class="d-flex" action="change_password.php" method="post">
            <a href="change_password.php" style="text-decoration:none"><input class="btn me-3 d-flex align-items-center justify-content-center" style="background-color:#E74E35; color:white; width:200px" type="submit" value="Change Password"></a>&nbsp&nbsp
            <div class="dropdown">
            <button type="button" class="btn" style="border:none" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="images/user.png" style="width:30px; height:auto" alt="user">
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="change_password.php">Change Password</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><input class="dropdown-item" type="submit" name="logout" value="Log Out"></li>
            </ul>
            </div>
        </form>
    </div>
    </nav><br><br><p></p><br><br>

    <div class="container-fluid mt-3">
    <div class="container mt-5">
    <div class="shadow-lg p-4 mb-4 bg-white">
        <?php $todo -> profile(); ?>
    </div>
    </div>
</div>
</body>
</html>