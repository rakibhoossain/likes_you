<?php
//Get user info
if (isset($_POST['id'])) {
	include "../init/connection.php";

	$id = $_POST['id'];

	// $sql = "SELECT * FROM fb_user WHERE id='$id'";

	$sql = "SELECT DISTINCT(id), name, COUNT(update_date) As count FROM fb_user_all WHERE id='$id' GROUP BY id, name";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$img = "http://graph.facebook.com/".$row['id']."/picture?type=large";
			$url = 'https://www.facebook.com/'.$row['id'];
			$name = $row['name'];
			$count = $row['count'];
		}
		?>

		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle"><a href="<?php echo $url;?>" target="_blank"><?php echo $name;?></a> <strong><span class="count">(<?php echo $count;?>)</span></strong></h5> 
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<?php get_dates($id, $conn);?>
		</div>

		<?php

	}
}

//Get dates
function get_dates($id, $conn){
	$sql = "SELECT update_date FROM fb_user_all WHERE id='$id'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$like = '<ol>';
		while($row = $result->fetch_assoc()) {
			$newDateTime = date('d-M-Y h:i A', strtotime($row['update_date']));
			$like .= '<li>Date: '.$newDateTime.'</li>';
		}
		$like .= '</ol>';
		echo $like;
	}
}