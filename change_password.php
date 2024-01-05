<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change password</title>
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
                <a class=" navbar-brand" href="home.php"><img src="images/home.png" style="width:40px; height:auto" alt="Home"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color:#E74E35; font-size:20px;" href="home.php"><b>Taskify</b></a>
            </li>
            </ul>
        </div>
    </nav><br><br><p></p><br><br>
    <div class="container mt-5">
    <div class="shadow-lg p-4 mb-4 bg-white">
    <center><p class="h3">Change Password</p></center>
    <div class="container mt-3">
    <?php
    session_start();
    if(!isset($_SESSION["user"])){
      header("Location: index.php");
    }
    include_once 'includes/functions.php';
    $users -> change_password();
    ?>
    <form action="change_password.php" method="post">
    <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required>
      <label for="email">Email</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input type="password" class="form-control" id="oldpwd" placeholder="Old password" name="old_password" required>
      <label for="old_password">Old Password</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input type="password" class="form-control" id="newpwd" placeholder="New password" name="new_password" required>
      <label for="new_password">New Password</label>
    </div>
    <center><button type="submit" name="submit" class="btn" style="width: 150px; background-color:#E74E35; color:white;">Submit</button><center>
    </form>
    </div>
  </div>
</div>    
</body>
</html>