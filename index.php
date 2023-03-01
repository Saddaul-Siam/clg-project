<?php
// Create connection
$conn = new mysqli( "localhost", "root", "", "phpdb");

// Check connection
if ($conn->connect_error) {
  echo("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
  $firstname = $_POST['firstname']; 
  $lastname  = $_POST['lastname'];
  $number    = $_POST['number'];
  $password  = $_POST['password'];

$sql =  "INSERT INTO project (firstname, lastname, number,  password)  
        VALUES ('$firstname','$lastname','$number', '$password')";

        if(mysqli_query($conn, $sql)===TRUE){
          echo "Data Inserted";
          header("location:all-users.php");
        }else{
          echo "Not Insert";
        }
};
?>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<style>
  body {
    background-image: linear-gradient(to bottom, rgba(31, 30, 30, 0.50), rgba(0, 0, 0, 0.70)),
    url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80');
    height: 100vh;
  }
</style>
</head>
<body>
<div class="container h-100 w-100 d-flex justify-content-center align-items-center">
  <div class="bg-secondary rounded-2 p-5 ">
    <form action="index.php" method="post" >

      <h2 class="text-white">Create Your User Account</h2>

      <div class="pt-5">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">First Name</span>
            <input type="text" name='firstname' class="form-control" placeholder="First Name..." aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Last Name</span>
            <input type="text"name='lastname'  class="form-control" placeholder="Last Name..." aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Number</span>
            <input type="text"name='number'  class="form-control" placeholder="Number..." aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Password</span>
            <input type="text" name='password' class="form-control" placeholder="Password..." aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <input type="submit" name='submit' value="Create" class="btn btn-primary w-100 mt-3">
      </div>
    </form>
  </div>
  </div>
</body>
</html>