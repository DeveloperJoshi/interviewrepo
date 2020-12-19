<?php

print_r($_POST['array']);
$data = $_POST['array'];

echo implode(',',array_keys($data));
$table = 'sample';

?>