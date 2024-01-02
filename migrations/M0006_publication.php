<?php
use app\core\Application;
// namespace app\migrations;

class M0006_publication{
    public function up()
    {
        $db = Application::$app->db;
        $sql = "CREATE TABLE IF NOT EXISTS publication (
            id INT AUTO_INCREMENT PRIMARY KEY,
            editor INT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            publication LONGTEXT NOT NULL
        )";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = Application::$app->db;
        $sql = "DROP TABLE publication)";
        $db->pdo->exec($sql);
    }
}
?>