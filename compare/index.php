<?php
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["userid"]) || ($_SESSION["userid"] != '100012913927165') ){
header("Location: ../index.php");
exit(); }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Who likes your post in facebook</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<style type="text/css">

  .photo-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
  }
  .photo-list>a{
    display: inline-block;
    position: relative;
  }

.photo-list>a .count{
    position: absolute;
    top: 0;
    left: 0;
    z-index: 999;
    background: rgba(0,0,0,.075);
    color: #dc3545;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>

</head>
<body>
<?php 
  include "../nav.php";
  include "../init/connection.php";
  $ref = $_SESSION['userid'];
  $sql = "SELECT DISTINCT(id), name FROM fb_user_old ORDER By name DESC";
  
  $result = $conn->query($sql);
  $count = $result->num_rows;

?>
<div class="jumbotron text-center">
  <h1>Who likes you! Old account (<?php echo $count;?>)</h1>
  <h2><?php echo $_SESSION['name']; ?></h2>
</div>
  
<div class="container-fluid photo-list">
<?php
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $img = "http://graph.facebook.com/".$row['id']."/picture?type=large";
            echo '<a href="https://www.facebook.com/'.$row['id'].'" target="_blank" class="image_link" val="'.$row['id'].'"><img alt="'.$row['name'].'" title="'.$row['name'].'" src="'.$img.'"></a>';
      }
  } else {
      echo 'No data found';
  }


$sql = "SELECT DISTINCT(fb_user_old.id) as id, fb_user_old.name as name FROM fb_user_old INNER JOIN fb_user_all ON fb_user_old.id = fb_user_all.id WHERE fb_user_all.ref='$ref'";
$result = $conn->query($sql);
$count = $result->num_rows;
?>
</div>

<div class="jumbotron text-center">
  <h1>Who likes you! Both account (<?php echo $count;?>)</h1>
  <h2><?php echo $_SESSION['name']; ?></h2>
</div>
<div class="container-fluid photo-list">
<?php
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
        
    // output data of each row
      while($row = $result->fetch_assoc()) {
        $img = "http://graph.facebook.com/".$row['id']."/picture?type=large";
            echo '<a href="https://www.facebook.com/'.$row['id'].'" target="_blank" class="image_link" val="'.$row['id'].'"><img alt="'.$row['name'].'" title="'.$row['name'].'" src="'.$img.'"></a>';
      }
  } else {
      echo 'No data found';
  }


$sql = "SELECT * FROM fb_user_old WHERE NOT EXISTS (SELECT * FROM fb_user_all WHERE fb_user_old.id = fb_user_all.id)";
$result = $conn->query($sql);
$count = $result->num_rows;
?>
</div>

<div class="jumbotron text-center">
  <h1>Who likes you! Only old (<?php echo $count;?>)</h1>
  <h2><?php echo $_SESSION['name']; ?></h2>
</div>
<div class="container-fluid photo-list">
<?php
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
        
    // output data of each row
      while($row = $result->fetch_assoc()) {
        $img = "http://graph.facebook.com/".$row['id']."/picture?type=large";
            echo '<a href="https://www.facebook.com/'.$row['id'].'" target="_blank" class="image_link" val="'.$row['id'].'"><img alt="'.$row['name'].'" title="'.$row['name'].'" src="'.$img.'"></a>';
      }
  } else {
      echo 'No data found';
  }
  $conn->close();
?>
</div>

<!-- Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"></div>
  </div>
</div>


<script type="text/javascript">
  
$( document ).ready( function( $ ) {
"use strict";

  //Profile modal
  $(document).delegate( ".photo-list a.image_link", "click", function(event) {
    event.preventDefault();

    const id = $(this).attr("val");

    $.ajax({
      url: "../adaptar/modal.php",
      type: "POST",
      data: {
       id
     },
     success: function(response){
      if (response) {
        $('#profileModal .modal-content').html(response);      
        $('#profileModal').modal('show');
      }
    }        
    });
  });

});
</script>




</body>
</html>