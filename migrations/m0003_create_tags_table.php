<?php

namespace app\migrations;

use core\Application;

class m0003_create_tags_table {

    final public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
            CREATE TABLE tags (
                id INT AUTO_INCREMENT PRIMARY KEY,
                tagName VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT  CURRENT_TIMESTAMP
            ) ENGINE=INNODB;
        ";
        $db->pdo->exec($SQL);
    }

    final public function down(): void
    {

        $db = Application::$app->db;
        $SQL = "
            DROP TABLE tags;";
        $db->pdo->exec($SQL);
    }
}