<?php
use app\core\Application;
// namespace app\migrations;

class M0005_contact{
    public function up()
    {
        $db = Application::$app->db;
        $sql = "CREATE TABLE IF NOT EXISTS contact (
            issuer INT,
            receiver INT,
            sended_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            message LONGTEXT NOT NULL,
            PRIMARY KEY (issuer, receiver, sended_at)
        )";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = Application::$app->db;
        $sql = "DROP TABLE contact)";
        $db->pdo->exec($sql);
    }
}
?>