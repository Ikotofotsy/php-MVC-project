<?php
use app\core\Application;
// namespace app\migrations;

class M0002_level{
    public function up()
    {
        $db = Application::$app->db;
        $sql = "CREATE TABLE IF NOT EXISTS level (
            id INT AUTO_INCREMENT PRIMARY KEY,
            level VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = Application::$app->db;
        $sql = "DROP TABLE level)";
        $db->pdo->exec($sql);
    }
}
?>