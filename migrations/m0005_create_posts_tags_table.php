<?php

namespace app\migrations;

use app\src\Application;

class m0005_create_posts_tags_table {

    final public function up(): void
    {
        $db = Application::$app->db;
        $SQL = "
            CREATE TABLE posts_tags (
                id INT AUTO_INCREMENT PRIMARY KEY,
                tag_id INT NOT NULL REFERENCES tags(id),
                post_id INT NOT NULL REFERENCES posts(id),
                created_at TIMESTAMP DEFAULT  CURRENT_TIMESTAMP
            ) ENGINE=INNODB;
        ";
        $db->pdo->exec($SQL);
    }

    final public function down(): void
    {

        $db = Application::$app->db;
        $SQL = "
            DROP TABLE posts_tags;";
        $db->pdo->exec($SQL);
    }
}