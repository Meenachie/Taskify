<?php

require_once 'includes/connect.php';

class users{
  private $db;

  public function __construct(database $db) {
    $this->db = $db;
  }
   
  public function signup(){
    if(isset($_POST["submit"])){
      $name=$_POST["name"];
      $email=$_POST["email"];
      $password=$_POST["password"];
      $confirm_password=$_POST["confirm_password"];
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      $error = array();
      if(empty($name) || empty($email) || empty($password) || empty($confirm_password)){
        array_push($error,"All fields are required");
      }else if(!preg_match ("/^[a-zA-z]*$/", $name)){ 
        array_push($error," Name should only contain alphabets");
      }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($error,"Email is not valid");
      }else if(!preg_match ("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $password)){
        array_push($error,"Password must contain at least one number, one uppercase and lowercase letter, and at least 8 characters");
      }else if($password!==$confirm_password){
        array_push($error,"Password does not match");
      }
      if(count($error)>0){
        foreach($error as $errors){
        echo"<div class='alert alert-danger'>$errors</div>";
      }
      }else{
      $sql = "SELECT * FROM `user` WHERE email='$email'";
      $result = $this->db->query($sql);
      $row = $result->num_rows;
      if($row>0){
        echo "<div class='alert alert-danger'>Email already exists!</div>";
      }else{
          $sql = "INSERT INTO `user`(name, email, password) VALUES(?,?,?)";
          $stmt = mysqli_stmt_init($this->db->conn);
          $preparestmt= mysqli_stmt_prepare($stmt,$sql);
          if($preparestmt){
              mysqli_stmt_bind_param($stmt,"sss",$name,$email,$hashed_password);
              mysqli_stmt_execute($stmt);
              session_start();
              $_SESSION["email"]="$email";
              $_SESSION["password"]="$password";
              $_SESSION["user"]="yes";
              header("Location: home.php");
          }else{
              die("something went wrong");
          }
        }
      }
    }
  }

  public function login(){
    if(isset($_POST["login"])) {
        $email=$_POST["email"];
        $password=$_POST["password"];
        if(empty($email) || empty($password)){
            echo "<div class='alert alert-danger'>All fields are required</div>";
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<div class='alert alert-danger'>Email is not valid</div>";
        }else if(!preg_match ("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $password)){
            echo "<div class='alert alert-danger'>Password must contain at least one number, one uppercase and lowercase letter, and at least 8 characters</div>";
        }else{
            $sql = "SELECT * FROM `user` WHERE email='$email'";
            $result = $this->db->query($sql);
            $user = $result->num_rows;
            if($user==1) {
              $sql= "SELECT password FROM `user` WHERE email='$email'"; 
              $result=$this->db->query($sql);
              $row = $result->fetch_assoc();
              $hash = $row["password"];
              if(password_verify($password, $hash)) { 
                session_start();
                $_SESSION["email"]="$email";
                $_SESSION["password"]="$password";
                $_SESSION["user"]="yes";
                header("Location: home.php");
              }else {
               echo "<div class='alert alert-danger'>Password is incorrect!</div>"; 
              }       
            }else {
            echo "<div class='alert alert-danger'>Email is incorrect!</div>"; 
            }
        }
    }
}

public function logout(){
  if(isset($_POST["logout"])) {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    session_destroy();
    header("Location: index.php");
  }
}

public function change_password(){
  if(isset($_POST["submit"])) {
      $email=$_POST["email"];
      $old_password=$_POST["old_password"];
      $new_password=$_POST["new_password"];
      $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
      if(empty($email) || empty($old_password) || empty($new_password)){
        echo "<div class='alert alert-danger'>All fields are required</div>";
      }
      else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<div class='alert alert-danger'>Email is not valid</div>";
      }
      else if($email != $_SESSION["email"]){
        echo "<div class='alert alert-danger'>Email is not valid</div>";
      }
      else if($old_password != $_SESSION["password"]){
        echo "<div class='alert alert-danger'>Old Password is wrong</div>";
      }
      else if(!preg_match ("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $old_password)){
        echo "<div class='alert alert-danger'>Password must contain at least one number, one uppercase and lowercase letter, and at least 8 characters</div>";
      }
      else if(!preg_match ("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $new_password)){
          echo "<div class='alert alert-danger'>Password must contain at least one number, one uppercase and lowercase letter, and at least 8 characters</div>";
      }
      else{
        $sql = "UPDATE `user` SET password='$hashed_password' WHERE email='$email'";
        $result = $this->db->query($sql);
        if($result){
          echo "<div class='alert alert-success'>Congratulations! You have successfully changed your password</div>";
        }
        else{
          echo "Old Password is wrong";
        }
      }
  }
}

}
$users = new users($db);

//crud
class todo{
  private $db;

  public function __construct(database $db) {
    $this->db = $db;
  }

  public function create(){
    if(isset($_POST["add"])) {
      $task=$_POST["task"];
      $sql="SELECT id FROM `user` where email = '$_SESSION[email]'";
      $id = $this->db->query($sql);
      $user = $id->fetch_assoc();
      $t = $user['id'];
      if($user>0){
        $sql = "INSERT INTO `task` (task,user_id) VALUES(?,?)";
        $stmt = mysqli_stmt_init($this->db->conn);
        $preparestmt= mysqli_stmt_prepare($stmt,$sql);
          if($preparestmt){
              mysqli_stmt_bind_param($stmt,"si",$task,$t);
              mysqli_stmt_execute($stmt);
              header("location: home.php");
          }else{
          die("something went wrong");
          }
      }
    }
  }

  public function read(){
      $sql= "SELECT t.id,t.task,t.status,t.created_on  FROM `task` as t LEFT JOIN `user` as u ON t.user_id=u.id WHERE u.email='$_SESSION[email]'";
      $result = $this->db->query($sql);
      $id = 1;
      while($row = mysqli_fetch_array($result)){
        $idd =$row['id'];
        $task=$row['task'];
        $status=$row['status'];
        $date =$row['created_on'];
        echo '<tr>
              <td>'. $id++ .'</td>
              <td>'. $task .'</td>
              <td>'. $status .'</td>
              <td>'. $date .'</td>
              <td><form action="update.php" method="get"><a href="update.php?edit='.$idd.'"><input class="btn" type="submit" value="" name="edit" style="decoration:none"><img src=images/edit.png></a></form></td>
              <td><form action="home.php" method="get"><a href="home.php?delete='.$idd.'"><input class="btn" type="submit" value="" name="delete" style="decoration:none"><img src=images/del.png></a></form></td>
              </tr>'; 
      }
  }

  public function edit(){
    if(isset($_GET['edit'])){
      $id=$_GET['edit'];
      $sql= "SELECT task ,status, created_on  FROM `task` WHERE id='$id'";
      $result = $this->db->query($sql);
      while($row = mysqli_fetch_array($result)){
        $taskk= $row['task'];
        $status= $row['status'];
        $datetime= $row['created_on'];
        echo '<div class="container-fluid">
              <form action="#" method="post">
              <div class="container">
              <div class="row">
              <div class="col col-lg col-sm me-2">
                <label class="form-label" for="task" >Task</label>
                <textarea class= "form-control border-#adb5bd" id="task" name="edittask" style="width:320px;height:100px;">'.$taskk.'</textarea>
              </div>
              <div class="col col-lg col-sm">
                <label class="form-label" for="date" >Created On</label>
                <input type="text" class="form-control border-#adb5bd" id="date" name="datetime" style="width:250px;height:50px;" placeholder="'.$datetime.'" readonly>
              </div>
              <div class="col col-lg col-sm">
                <label class="form-label" for="dropdown">Status</label>
                <select class="form-select" name="status" style="width:250px;height:50px;">
                <option>Todo</option>
                <option>In Progress</option>
                <option>Completed</option>
                </select>
              </div>
              </div><br><br>
              <input type="submit" name="save" class="btn" style="width: 150px; background-color:#E74E35; color:white;" value="Save changes">
              </div>
              </form>
              </div>';
      }
    }
  }

  public function update(){
    if(isset($_POST['save']) && isset($_GET['edit'])){
      $idd=$_GET['edit'];
      $edittask=$_POST['edittask'];
      $status=$_POST['status'];
      if(!empty($edittask)){
          $sqltask = "UPDATE `task` SET task='$edittask',created_on= now() WHERE id='$idd'";
          $resulttask= mysqli_query($this->db->conn,$sqltask);
          if($resulttask){
            header("location: home.php");
          }else {
            echo "something went wrong";
          }
      }
      if(!empty($status)){
          $sqlstatus = "UPDATE `task` SET created_on= now(), status='$status' WHERE id='$idd'";
          $resultstatus= mysqli_query($this->db->conn,$sqlstatus);
          if($resultstatus){
            header("location: home.php");
          }else{
            echo "something went wrong";
          }
      }
    } 
    }

  public function delete(){
      if(isset($_GET['delete'])){ 
        $id = $_GET['delete'];
        $sql = "DELETE FROM `task` WHERE id='$id'";
        if(mysqli_query($this->db->conn,$sql)){
          header("location: home.php");
        }
      }
    }

  public function profile(){
        $sql= "SELECT name,email FROM `user` WHERE email ='$_SESSION[email]'";
        $result = mysqli_query($this->db->conn, $sql);
        $row = $result->fetch_assoc();
        if($result){
        echo "<h3>User Profile</h3><br>";
        echo "<p><b>Name: </b>". $row['name']. "<br><b>Email: &nbsp</b>". $row['email']."</p>";
    }
    }
}
$todo = new todo($db);
$todo -> update();

?>