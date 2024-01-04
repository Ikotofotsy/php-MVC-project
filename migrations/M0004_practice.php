<?php
use app\core\Application;
// namespace app\migrations;

class M0004_practice{
    public function up()
    {
        $db = Application::$app->db;
        $sql = "CREATE TABLE IF NOT EXISTS practice (
            user INT,
            langage INT,
            level INT,
            exp INT,
            PRIMARY KEY(user,langage,level)
        )";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = Application::$app->db;
        $sql = "DROP TABLE practice)";
        $db->pdo->exec($sql);
    }
}
?>