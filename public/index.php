<!DOCTYPE html>
<html lang="en">
<head>
  <title>Who likes your post in facebook</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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

/************************/
/********Search Box*******/
/************************/
input[type="search"] {
    color: #666;
    background: #fff;
    background-image: -webkit-linear-gradient(rgba(255, 255, 255, 0), rgba(255, 255, 255, 0));
    border: 1px solid #bbb;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    display: block;
    padding: 0.3em;
    width: 100%;
}


input[type="search"] {
    -webkit-appearance: textfield;
    outline-offset: -2px;
}

#search-box{
  position: relative;
}
#search-box .search{
    position: absolute;
    top: 20%;
    right: 12px;
}
.mt-20{
  margin-top: 20px;
}
</style>

</head>
<body>
<?php include "../nav.php";?>
<div class="jumbotron text-center">
  <h1>Who likes!</h1>

  <div class="row justify-content-md-center">
    <div class="col-lg-3 col-md-6 col-sm-12 mt-20">
          <div id="search-box">
            <input type="search" id="search" placeholder="Type to search..." />
            <span class="search"><i class="fa fa-search" aria-hidden="true"></i></span>
          </div>  
        </div>  
  </div>

</div>
  
<div class="container-fluid photo-list">


<?php
  include "../init/connection.php";
  $sql = "SELECT DISTINCT(id), name, COUNT(update_date) As count FROM fb_user_all WHERE ref='100012913927165' GROUP BY id, name ORDER By count DESC";
        
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
        
    // output data of each row
      while($row = $result->fetch_assoc()) {
        $img = "http://graph.facebook.com/".$row['id']."/picture?type=large";

            echo '<a href="https://www.facebook.com/'.$row['id'].'" target="_blank" class="image_link" val="'.$row['id'].'"><img alt="'.$row['name'].'" title="'.$row['name'].'" src="'.$img.'"><span class="count"><strong>'.$row['count'].'</strong></span></a>';
      }
  } else {
      echo 'No data found';
  }
  $conn->close();


?>





</div>

<script type="text/javascript">
  
$( document ).ready( function( $ ) {
"use strict";

  // Write on keyup event of keyword input element
  $("#search").keyup(function(){
    let find = $(this).val().toLowerCase();        
    // Show only matching TR, hide rest of them
    $.each($("a.image_link"), function() {

        let id = $(this).attr('val');
        let name = $(this).children('img').attr('title').toLowerCase();
        let val = ( $.isNumeric( find ) )? id.indexOf( find ) : name.indexOf( find );

        if( val === -1 )
          $(this).hide();
        else
            $(this).show();           
    });

  });


});
</script>




</body>
</html>
