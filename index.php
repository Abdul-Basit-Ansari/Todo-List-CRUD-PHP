<!doctype html>
<html lang="en">

<head>
	<title>Title</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta title="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS v5.2.0-beta1 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
		integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>

<?php 
$insert = false;
if(isset($_POST['title'])){
    // Set connection variables
    $server = "localhost:3325";
    $username = "root";
    $password = "";
    
    // Create a database connection
    $con = mysqli_connect($server, $username, $password);
    
    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";
    $user = 'aba';
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    
    // Collect post variables
    $sql = "INSERT INTO `todoslist`.`todos`(`name`, `title`, `des`, `time`) VALUES ('$user','$title','$desc',current_timestamp())";
    // echo $sql;
    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

	<h1 class="text-center mt-4">Todos-List</h1>
	<div class="container my-2 mx-5">
<form action="index.php" method="post" onsubmit=return false;>

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title"  id="title" placeholder="">
    </div>
		<div class="mb-3">
			<label for="desc" class="form-label">Description</label>
			<textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
		</div>

        <button class="btn btn-primary">Add</button>
    </form>
</div>
    
<?php

$server = "localhost:3325";
$username = "root";
$password = "";
$dbname = 'todoslist';
// Create a database connection
$conn = new mysqli($server, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT sno, name, title , des FROM todos";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo 
      "<div class='container'>sno: " . $row["sno"]. " - Name: " . $row["name"]. " " . $row["title"]. "<br></div>";
    }
  } else {
    echo "0 results";
  }
  $conn->close();


?>

	<!-- Bootstrap JavaScript Libraries -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
		integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
		integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
	</script>
</body>

</html>