<?php
// Create connection
$conn = new mysqli( "localhost", "root", "", "phpdb");

if ($_GET['id']) {
  $getid = $_GET['id'];

  $sql = "SELECT * FROM project WHERE id=$getid";
  $query = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($query);

// get data
  $id        = $data['id']; 
  $firstname = $data['firstname']; 
  $lastname  = $data['lastname'];
  $number    = $data['number'];
  $password  = $data['password'];
}

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $number = $_POST['number'];
  $password = $_POST['password'];

$sql1 = "UPDATE project SET firstname='$firstname', lastname='$lastname', number='$number', password='$password' WHERE id='$id' ";
  
  if (mysqli_query($conn, $sql1) === TRUE) {
    header('location:all-users.php');
    echo "data update";
  }else{
    echo "data not update";
  }
}
?> 
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<style>
  body {
    background-image: linear-gradient(to bottom, rgba(31, 30, 30, 0.50), rgba(0, 0, 0, 0.70)),
    url('https://images.unsplash.com/photo-1526628953301-3e589a6a8b74?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1406&q=80');
    height: 100vh;
  }
</style>
</head>
<body>
<div class="container h-100 w-100 d-flex justify-content-center align-items-center">
  <div class="bg-secondary rounded-2 p-5 ">
    <form action="edit-user.php" method="post">
      <h2 class="text-white">Edit Your Account</h2>
      <div class="pt-5">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">First Name</span>
            <input type="text" class="form-control" name="firstname" value="<?php echo $firstname?>">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Last Name</span>
            <input type="text" value="<?php echo $lastname?>" class="form-control" name="lastname">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Number</span>
            <input type="text" value="<?php echo $number?>" class="form-control" name="number">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Password</span>
            <input type="text"value="<?php echo $password?>" class="form-control" name="password">
            <input type="text" name="id" hidden value="<?php echo $id?>">
          </div>
          <input type="submit" name='submit' value="Update" class="btn btn-primary w-100 mt-3">
      </div>
    </form>
  </div>
  </div>
</body>
</html>