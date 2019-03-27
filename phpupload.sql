/* データベース作成*/
CREATE DATABASE photoupload CHARACTER SET utf8mb4;

/* taskテーブル作成*/
CREATE TABLE photo (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    photo_path VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
);