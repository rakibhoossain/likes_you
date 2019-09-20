<?php
  exit();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Who likes your post in facebook</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php include "../nav.php";?>

<div class="jumbotron text-center">
  <h1>Compare: Who likes you!</h1> 
</div>
  
<div class="container-fluid">

<?php
  include "../init/connection.php";
  $sql = "SELECT fb_user.name, fb_user.id  FROM fb_user INNER JOIN fb_user_old ON fb_user.id=fb_user_old.id";
        
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
        
    // output data of each row
      while($row = $result->fetch_assoc()) {
        $img = "http://graph.facebook.com/".$row['id']."/picture?type=large";

            echo '<a href="https://www.facebook.com/'.$row['id'].'" target="_blank"><img alt="'.$row['name'].'" title="'.$row['name'].'" src="'.$img.'"></a>';
      }
  } else {
      echo '-1';
  }
  $conn->close();


?>
</div>

<div class="jumbotron text-center">
  <h1>Both of your FB accounts: </h1> 
</div>
<div class="container-fluid">

<?php
  $sql = "SELECT id,name FROM fb_user UNION SELECT id,name FROM fb_user_old";
  
  include "../init/connection.php";
        
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
        
    // output data of each row
      while($row = $result->fetch_assoc()) {
        $img = "http://graph.facebook.com/".$row['id']."/picture?type=large";

            echo '<a href="https://www.facebook.com/'.$row['id'].'" target="_blank"><img alt="'.$row['name'].'" title="'.$row['name'].'" src="'.$img.'"></a>';
      }
  } else {
      echo '-1';
  }
  $conn->close();

?>
</div>

</body>
</html>
