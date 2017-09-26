<?php
require_once "app.php";
$data = getBeneficiary(isset($_POST['fid']) ? $_POST['fid'] : null);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
?>