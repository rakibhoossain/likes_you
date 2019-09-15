<?php
//=========== Insert FB user Name & ID into database==========
if (isset($_POST['json'])) {

  $json = $_POST['json'];

  if (is_array($json)) {

    // $insert_row = $update_row = $insert_total = 0;
    $insert_total = 0;
    require_once("../init/connection.php");

    // $insert = $conn->prepare("INSERT INTO fb_user(id,name,update_date) VALUES (?, ?, ?)");
    // $update = $conn->prepare("UPDATE fb_user SET update_date = ?,count = ? WHERE id=?");

    
    foreach($json as $val) {

      $id = $val['id'];
      $date = $val['date'];

      // if ( data_exist($id, $conn) ) {
      //   $total_count = data_count($id, $date, $conn);
      //   $update->bind_param( "sii", $date, $total_count, $id );
      //   $update->execute(); 
      //   $change = ($update->affected_rows == 1)? 1 : 0;
      //   $update_row += $change;

      // }else{
      //   $insert->bind_param("sss", $id, $val['name'], $date);
      //   $insert->execute();
      //   $inserted = ($insert->affected_rows == 1)? 1 : 0;
      //   $insert_row += $inserted;        
      // }

      if ( update_possible($id, $date, $conn) ) {
        $insert_total += save_all_data($val, $conn);
      }

    }

    // echo "Insert: <strong>". $insert_row . "</strong> Update: <strong>". $update_row."</strong> New likes: <strong>" . $insert_total."</strong>";
    echo "New likes: <strong>" . $insert_total."</strong>";
  }
}

//Get dates
if (isset($_POST['date'])) {
  require_once("../init/connection.php");

  $sql = "SELECT DISTINCT(update_date) FROM fb_user_all GROUP BY update_date ORDER BY update_date DESC";
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
  $sql = "SELECT * FROM fb_user_all WHERE update_date='$dt' AND id='$id'";
  $result = $conn->query($sql);
  return ($result->num_rows > 0)? false : true;
}

//save all new date data
function save_all_data($val, $conn){
  $stmnt = $conn->prepare("INSERT INTO fb_user_all(id,name,update_date) VALUES (?, ?, ?)");
  $stmnt->bind_param("sss", $val['id'], $val['name'], $val['date']);
  $stmnt->execute();
  return ($stmnt->affected_rows == 1)? 1 : 0;      
}

// //check exit data
// function data_exist($id, $conn){
//   $sql = "SELECT id FROM fb_user WHERE id='$id'";
//   $result = $conn->query($sql);
//   return ($result->num_rows > 0)? true : false;
// }
// //calculate data count
// function data_count($id, $dt, $conn){
//   $sql = "SELECT count FROM fb_user WHERE id='$id' AND update_date='$dt'";
//   $result = $conn->query($sql);
//   $count = data_count_old($id, $conn);
//   return ($result->num_rows > 0)? $count : ($count+1);
// }

// //calculate data count
// function data_count_old($id, $conn){
//   $sql = "SELECT count FROM fb_user WHERE id='$id'";
//   $result = $conn->query($sql);
  
//   $old_count = 0;
//   if ($result->num_rows > 0) {
//     while($row = $result->fetch_assoc()) {
//       $old_count = $row['count'];
//     }
//   }
//   return $old_count;
// }