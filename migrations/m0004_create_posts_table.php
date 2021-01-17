<?php

namespace app\migrations;

use core\Application;

class m0004_create_posts_table {

    final public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
            CREATE TABLE posts (
                id INT AUTO_INCREMENT PRIMARY KEY,
                post_title VARCHAR(255) NOT NULL,
                body MEDIUMTEXT NOT NULL,
                excerpt TEXT NOT NULL,
                user_id INT REFERENCES users(id),
                category_id INT REFERENCES categories(id),
                image_url VARCHAR(500) NOT NULL,
                slug VARCHAR(400) NOT NULL, 
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