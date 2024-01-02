<?php
use app\core\Application;
// namespace app\migrations;

class M0007_comment{
    public function up()
    {
        $db = Application::$app->db;
        $sql = "CREATE TABLE IF NOT EXISTS comment (
            publication INT,
            commentator INT,
            commented_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            comment LONGTEXT NOT NULL,
            PRIMARY KEY (publication, commentator, commented_at)
        )";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = Application::$app->db;
        $sql = "DROP TABLE comment)";
        $db->pdo->exec($sql);
    }
}
?>