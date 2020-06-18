<?php
include "database.php";

addingList();
deletingList();
selectingVal();
updatingValues();
logout();
if(isset($_SESSION['email']))
  {
    echo "";
  }
  else
  {
    echo "<script>window.open('index.php', '_self')</script>";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To-Do List</title>
  <link rel="stylesheet" href="css/bootstrap.css">

<style>
.custom
{
    height: 100vh;
}


</style>
  <link rel="stylesheet" href="icofont/icofont.css">
</head>
<body>
  <div class="container">
    <div class="col-md-8 border offset-md-2 custom">
      <section><form action="" method="post">
<button class="btn btn-primary float-right mt-2"  name="logout">Logout</button>
      </form>
<h1 class="text-center">To-Do List</h1>


        <form action="" method="post">
          <input type="hidden" name="id" value="<?php echo $rowss['id']; ?>">
          <div clas="form-control">
            <input class="w-75" id="input" type="text" placeholder="Enter your task" required name="add-list" value=" <?php if(isset($rowss['items'])) {
             echo $rowss['items'];
           } ?>"
>          <?php
if(isset($rowss['items'])){
  ?>

  <input type="submit" name="edit-value" value="Update" id="btn">
  <?php
}
  else {
    ?>
    <input type="submit" name="add-value" value="Add" id="btn">
    <?php
  }
?>

          </div>
        </form>
      </section>
      <section>
        <div>
          <ul id="list">

            <table class="table">
              <thead>
                <th>List Items</th>
                <th>Actions</th>
              </thead>
              <tbody>
                <?php
                $query = "SELECT * from `{$_SESSION['email']}`";
                $result = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($result))
                {
                  ?>
                  <tr>
                    <td><?php echo $row['items']; ?></td>
                    <td>
                      <form action="" method="post">
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                      <button name="edit"><i class="icofont-edit"></i></button>
                      <button name="remove"><i class="icofont-delete"></i></button>
                      </form>
                    </td>
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </table>

            </ul>
          </div>
        </section>
      </div>
    </div>
  </body>
  </html>
