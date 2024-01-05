<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update task</title>
    <link rel="icon" type="image/x-icon" href="images/favicon1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    </style>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location: index.php");
    }
    include 'includes/functions.php';
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
        </div>
    </nav><br><br><p></p><br><br>
    <?php
    $todo -> edit();
    $todo -> update();
    ?>
    
</body>
</html>