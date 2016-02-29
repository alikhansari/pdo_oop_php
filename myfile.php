<?php
require('conn.php');
$db = new Database();
$db->query("SELECT * FROM student WHERE sex= ? ");
$db->bind(1,1);
$db->execute();
echo "<pre>";
var_dump($db->resultset());
echo "</pre>";