<?php
	header("Content-Type: application/json; charset=UTF-8");
	include "../init/connection.php";

	$sql = "SELECT DISTINCT(ref) FROM fb_user_all GROUP BY ref";
	$result = $conn->query($sql);
	$total = $result->num_rows;
	$outp = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$ref = $row['ref'];
			$outp[$ref] = get_user_info($ref, $conn );
		}
	}
	echo json_encode(['users'=> $total,'likers'=> $outp]);
	$conn->close();
?>

<?php

//Get liker info
function get_user_info($ref, $conn ){
	$sql = "SELECT DISTINCT(id), COUNT(update_date) As users FROM fb_user_all WHERE ref='$ref' GROUP BY id";
	$result = $conn->query($sql);

	$users = $result->num_rows;
	$data = array();
	if ($result->num_rows > 0) {
		$data = array();
		while($row = $result->fetch_assoc()) {
			$id = $row['id'];
			$likes = $row['users'];
			$data[$id]=['likes' => $likes, 'dates' => get_user_likes_info($id, $ref, $conn )];
		}
	}
	return ['likers'=> $users, 'data' => $data];
}

//Get user likes dates
function get_user_likes_info($id, $ref, $conn ){
	$sql = "SELECT update_date FROM fb_user_all WHERE id='$id' AND ref='$ref'";
	$result = $conn->query($sql);

	$data = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$date = date('d-M-Y h:i A', strtotime($row['update_date']));
			$data[] = $date;
		}
	}
	return $data;
}