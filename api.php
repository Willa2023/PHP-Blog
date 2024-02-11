<?php
date_default_timezone_set('Pacific/Auckland');
header("Content-type: application/json");
?>
{"x":"<?php echo date('c');?>","y":{"z":[1,2,3]}}