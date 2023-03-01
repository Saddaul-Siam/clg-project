<?php
// Create connection
$conn = new mysqli( "localhost", "root", "", "phpdb");

// Check connection
if ($conn->connect_error) {
  echo("Connection failed: " . $conn->connect_error);
}

// delete user
if (isset($_GET['deleteid'])) {
  $deleteid = $_GET['deleteid'];
  $sql = "DELETE FROM project WHERE id = $deleteid";

  if (mysqli_query($conn, $sql) == TRUE) {
    header ('location:all-users.php');
  };
}
?>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />


<style>
  body {
    background-image:
    linear-gradient(to bottom, rgba(31, 30, 30, 0.50), rgba(0, 0, 0, 0.70)),
    url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2015&q=80');
    width: 100vw;
    height: 100vh;
    background-size: cover;
  }
</style>
</head>
<body>
<div class="container h-100 w-100 d-flex flex-column justify-content-center align-items-center ">

<h1 class="text-white mb-5">All User List</h1>
<div class="bg-secondary w-100 p-3 pb-0 rounded-2">

<table class="table table-striped bg-white rounded-2">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Number</th>
      <th scope="col">Password</th>
      <th scope="col" class="d-flex justify-content-center">Action</th>
    </tr>
  </thead>
  <tbody>

<?php
  $sql = "SELECT * FROM project";
  $query = mysqli_query($conn, $sql);

while ($data = mysqli_fetch_assoc($query)){

  $id = $data['id'];
  $firstname = $data['firstname'];
  $lastname = $data['lastname'];
  $number = $data['number'];
  $password = $data['password'];

  echo "<tr>
          <td>$id</td>
          <td>$firstname</td>
          <td>$lastname </td>
          <td>$number</td>
          <td>$password</td>
          <td class='d-flex justify-content-center align-items-center'>
          <a href='edit-user.php?id=$id'><button class='btn btn-success m-1'>Edit</button></a>
          <a href='all-users.php?deleteid=$id'>
          <button class='btn btn-danger m-1'f>Delete</button>
          </a>
          </td>
        </tr>";
}?>
  </tbody>
</table> 
</div>
  </div>
</body>
</html>