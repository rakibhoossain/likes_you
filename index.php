<?php
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}
if( isset($_SESSION['userid']) ){
  header("Location: likers.php");
  exit();
}
if(isset($_POST["json_mncc_login_id"])){

  $url = "http://graph.facebook.com/".$_POST["json_mncc_login_id"];
  $curlSession = curl_init();
  curl_setopt($curlSession, CURLOPT_URL, $url);
  curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
  curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

  $jsonData = json_decode(curl_exec($curlSession));
  curl_close($curlSession);

  if($jsonData->error->code == 104){
  $_SESSION['userid'] = $_POST["json_mncc_login_id"];
  header("Location: likers.php");
  }
}
?>

<!DOCTYPE html>
<html>
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




<!-- Modal -->
<div class="modal fade" id="idInputModal" tabindex="-1" role="dialog" aria-labelledby="profileModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"><h5 class="modal-title" id="idInputModalTitle">Profile ID:</h5></div>
      <div class="modal-body">
        <div class="col-12">
          <form method="post">
           <div class="form-group row">
            <div class="col-sm-10">
              <div class="form-inline">       
                <div class="form-group mx-sm-3 mb-2 mt-2">
                  <input type="text" name="json_mncc_login_id" id="json_mncc_login_id" class="form-control"  width="276">  
                </div>
                <input type="submit" name="process" id="json_mncc_login_btn" class="btn btn-primary mt-2 mb-2" value="Next">   
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $( document ).ready( function( $ ) {
  "use strict";
    $('#idInputModal').modal('show'); 
  });
</script>





</body>
</html>