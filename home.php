<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskify</title>
    <link rel="icon" type="image/x-icon" href="images/favicon1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
        $todo -> create();
        $todo -> delete();
        $users -> logout();
        
    ?>
    <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
        <div class="container-fluid">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class=" navbar-brand" href="home.php"><img src="images/home.png" style="width:40px; height:auto" alt="Home"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color:#E74E35; font-size:20px;" href="#"><b>Taskify</b></a>
            </li>
            </ul>
            <form class="d-flex" action="home.php" method="post">
                <button class="btn me-3 d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#myModal" style="background-color:#E74E35; color:white; width:200px" type="button">Create New Task &nbsp&nbsp<img src="images/plus.png" style="width:15px; height:auto;" ></button>
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
    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header border-0">
            <h4 class="modal-title">To Do</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="model-body">
            <form action="home.php" method="post">
            <textarea type="text" class="form-control" id="task" placeholder="new task" name="task" style="height: 100px;"></textarea>
            <form>
        </div>
        <div class="modal-footer border-0">
            <button class="btn btn-danger" type="submit" name="add" style="background-color:#E74E35; color:white;">Add task</button>
        </div>
    </div>
    </div>
    </div>

    <div class="container-fluid">
        <center><p class="h1" style="color:#E74E35;"> To Doo </p></center>
    </div>
    <div class="container">
        <table class="table mt-5">
        <thead>
            <tr>
            <th scope="col">S.No</th>
            <th scope="col">Task</th>
            <th scope="col">Status</th>
            <th scope="col">Created On</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
           <?php $todo -> read(); ?>
        </tbody>
        </table>
    </div>
</body>
</html>