<?php
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["userid"])){
exit(); }
?>


<?php
//=========== Insert FB user Name & ID into database==========
if (isset($_POST['json'])) {

  $json = $_POST['json'];

  if (is_array($json)) {
    $insert_total = 0;
    require_once("../init/connection.php");
    
    foreach($json as $val) {

      $id = $val['id'];
      $date = $val['date'];


      if ( update_possible($id, $date, $conn) ) {
        $insert_total += save_all_data($val, $conn);
      }

    }

    echo "New likes: <strong>" . $insert_total."</strong>";
  }
}

//Get dates
if (isset($_POST['date'])) {
  require_once("../init/connection.php");
  $userid = $_SESSION["userid"];

  $sql = "SELECT DISTINCT(update_date) FROM fb_user_all WHERE ref='$userid' GROUP BY update_date ORDER BY update_date DESC";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $option = '';
    while($row = $result->fetch_assoc()) {
      $option .= '<option value="'.$row['update_date'].'">'.$row['update_date'].'</option>';
    }
    echo $option;
  }
}


//Insert possibility of new like data
function update_possible($id, $dt, $conn){
  $userid = $_SESSION["userid"];
  $sql = "SELECT * FROM fb_user_all WHERE update_date='$dt' AND id='$id' AND ref='$userid'";
  $result = $conn->query($sql);
  return ($result->num_rows > 0)? false : true;
}

//save all new date data
function save_all_data($val, $conn){
  $userid = $_SESSION["userid"];
  $stmnt = $conn->prepare("INSERT INTO fb_user_all(id,name,update_date,ref) VALUES (?, ?, ?, ?)");
  $stmnt->bind_param("ssss", $val['id'], $val['name'], $val['date'], $userid);
  $stmnt->execute();
  return ($stmnt->affected_rows == 1)? 1 : 0;      
}