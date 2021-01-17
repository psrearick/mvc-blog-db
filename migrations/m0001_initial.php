<?php

namespace app\migrations;

use core\Application;

class m0001_initial {

    final public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
            CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                password VARCHAR(512) NOT NULL,
                status TINYINT NOT NULL,
                created_at TIMESTAMP DEFAULT  CURRENT_TIMESTAMP
            ) ENGINE=INNODB;
        ";
        $db->pdo->exec($SQL);
    }

    final public function down(): void
    {

        $db = Application::$app->db;
        $SQL = "
            DROP TABLE users;";
        $db->pdo->exec($SQL);
    }
}