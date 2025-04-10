<?php
require "vendor/autoload.php";

use Core\DB;

$db = DB::connect();
echo "ss";

try{
$db->exec("CREATE TABLE IF NOT EXISTS all_tasks(
    name VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

} catch(PDOException $e){
    die("Xatolik: " . $e->getMessage());
}