<?php
use app\core\Application;
// namespace app\migrations;

class M0003_langage{
    public function up()
    {
        $db = Application::$app->db;
        $sql = "CREATE TABLE IF NOT EXISTS langage (
            id INT AUTO_INCREMENT PRIMARY KEY,
            langage VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = Application::$app->db;
        $sql = "DROP TABLE langage)";
        $db->pdo->exec($sql);
    }
}
?>