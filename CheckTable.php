<?php
declare(strict_types=1);

namespace App;
// use App\CreateT;
use Core\DB;
require __DIR__ . '/vendor/autoload.php';

class CheckTable {
    public \PDO $db;

    public function __construct() {
        $this->db = DB::connect();
    }

    public function checkTables(): array {
        $query = "SELECT TABLE_NAME FROM information_schema.tables WHERE table_schema = 'tasklib2'";
        $result = $this->db->query($query);

        $rows = $result->fetchAll(\PDO::FETCH_ASSOC);
        $tables = [];

        foreach ($rows as $row) {
            $tables[] = $row['TABLE_NAME'];
        }
        return $tables; 

    }
}

