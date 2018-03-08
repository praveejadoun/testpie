<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["course_id"])) {
	$query ="SELECT * FROM batches WHERE course_id = '" . $_POST["course_id"] . "'";
	$results = $db_handle->runQuery($query);
?>
	<option value="">Select State</option>
<?php
	foreach($results as $state) {
?>
	<option value="<?php echo $state["id"]; ?>"><?php echo $state["name"]; ?></option>
<?php
	}
}
?>