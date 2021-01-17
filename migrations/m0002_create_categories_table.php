<?php

namespace app\migrations;

use app\src\Application;

class m0002_create_categories_table {

    final public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
            CREATE TABLE categories (
                id INT AUTO_INCREMENT PRIMARY KEY,
                category VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT  CURRENT_TIMESTAMP
            ) ENGINE=INNODB;
        ";
        $db->pdo->exec($SQL);
    }

    final public function down(): void
    {

        $db = Application::$app->db;
        $SQL = "
            DROP TABLE categories;";
        $db->pdo->exec($SQL);
    }
}