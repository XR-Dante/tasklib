<?php
declare(strict_types=1);

namespace App;

use Core\DB;
//use App\CheckTable;

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/CheckTable.php';

class CreateT {
    public \PDO $db;

    public function __construct() {
        $this->db = DB::connect();
    }

    public function createForTables(){ 
        $task=(new CheckTable())->checkTables();
        $migrations = array_diff($task, ['all_tasks']);
        
        foreach ($migrations as $table) {
            $query = "INSERT INTO all_tasks (name) VALUES (:table)";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':table', $table, \PDO::PARAM_STR); 
            $stmt->execute();
        }
    }
}


$checker = new CreateT();
$checker->createForTables();

