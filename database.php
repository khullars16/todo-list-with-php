<?php
$connection = mysqli_connect("localhost", "root", "", "todo");
?>
<?php
session_start();

?>
<?php
// function createTable() {
// global $connection;
//
// }

?>

<?php
function register()
{
  global $connection;
  if (isset($_POST["enter"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpass = $_POST["cpassword"];
    if ($password == $confirmpass) {
      $sql = "INSERT into user(username, email, password) VALUES ('$username', '$email', '$password')";
      $result = mysqli_query($connection, $sql);

// echo $email;

      $sqlAdd = "CREATE TABLE `{$email}` (
        id INT AUTO_INCREMENT PRIMARY KEY,
        items VARCHAR(100)
      )";

      $resulting = mysqli_query($connection, $sqlAdd);
      // if($resulting){
      //   echo "table created successfully";
      // }
      // else {
      //   echo "table no ceated";
      // }

     echo "<script>window.open('login.php', '_self')</script>";
    }
  }
}
?>

<?php
function login()
{
  global $connection;
  if(!isset($_SESSION['email'])){
    if (isset($_POST["enter"])) {
      $email = $_POST["email"];
      $password = $_POST["password"];

      $sql = "SELECT * from user WHERE email = '$email' AND password = '$password'";
      $result = mysqli_query($connection, $sql);
      if(mysqli_num_rows($result) < 1)
      {
        echo "invalid details";
      }
      else{
        $data = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $data['email'];
        //echo $data["id"];
        echo "<script>window.open('todo.php', '_self')</script>";
      }

    }
  }
  else {
    echo "<script>window.open('todo.php', '_self')</script>";
  }
}
?>

<?php
function addingList(){
  global $connection;
  if(isset($_POST['add-value']))
  {
    $list = $_POST['add-list'];
    $sql = "INSERT into `{$_SESSION['email']}`(items) VALUES ('$list')";
    $result = mysqli_query($connection, $sql);
  }
}
?>

<?php
function deletingList(){
  global $connection;
  if(isset($_POST['remove']))
  {
    $id = $_POST['id'];
    $sql = "DELETE from `{$_SESSION['email']}` where id = '$id'";
    $result = mysqli_query($connection, $sql);
  }
}
?>

<?php
function selectingVal(){
  global $connection, $rowss;
  if(isset($_POST["edit"])) {
     $sqlQuery = "SELECT * FROM `{$_SESSION['email']}` WHERE id = {$_POST['id']}";
     $resultQuery = mysqli_query($connection, $sqlQuery);
     $rowss = mysqli_fetch_assoc($resultQuery);
    //echo "<script>alert('clicked')</script>";
  }
}
?>


<?php
function updatingValues() {
  global $connection;
  if(isset($_POST["edit-value"])) {
    $list = $_POST['add-list'];
    $sql = "UPDATE `{$_SESSION['email']}` SET items = '$list' WHERE id = {$_POST['id']}";
    $result = mysqli_query($connection, $sql);
  }
}
?>


<?php
function logout() {
  if(isset($_POST['logout']))
  {
    session_destroy();
    echo "<script>window.open('login.php', '_self')</script>";
  }
}
?>
