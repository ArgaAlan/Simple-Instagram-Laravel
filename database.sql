CREATE DATABASE IF NOT EXISTS auth;
USE auth;

SELECT * FROM users;

CREATE TABLE IF NOT EXISTS images(
    id INT NOT NULL AUTO_INCREMENT,
    user_id BIGINT,
    image_path VARCHAR(255),
    description TEXT,
    created_at DATETIME,
    updated_at DATETIME,
    CONSTRAINT pk_images PRIMARY KEY(id),
    CONSTRAINT fk_images_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDB;

INSERT INTO images VALUES(NULL, 1, 'test.jpg', 'descripcion de prueba 1', CURTIME(), CURTIME());
INSERT INTO images VALUES(NULL, 1, 'playa.jpg', 'descripcion de prueba 2', CURTIME(), CURTIME());
INSERT INTO images VALUES(NULL, 1, 'arena.jpg', 'descripcion de prueba 3', CURTIME(), CURTIME());
INSERT INTO images VALUES(NULL, 3, 'familia.jpg', 'descripcion de prueba 4', CURTIME(), CURTIME());

SELECT * FROM images;

CREATE TABLE IF NOT EXISTS comments(
    id INT NOT NULL AUTO_INCREMENT,
    user_id BIGINT,
    image_id INT,
    content TEXT,
    created_at DATETIME,
    updated_at DATETIME,
    CONSTRAINT pk_users PRIMARY KEY(id),
    CONSTRAINT fk_comments_users FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT fk_comments_images FOREIGN KEY(image_id) REFERENCES images(id)
)ENGINE=InnoDB;

INSERT INTO comments VALUES(NULL, 1, 4, 'Buena foto de familia!!!!', CURTIME(), CURTIME());
INSERT INTO comments VALUES(NULL, 2, 1, 'Buena foto de playa!!!!', CURTIME(), CURTIME());
INSERT INTO comments VALUES(NULL, 2, 4, 'Que bueno!!!!', CURTIME(), CURTIME());

CREATE TABLE IF NOT EXISTS likes(
    id INT NOT NULL AUTO_INCREMENT,
    user_id BIGINT,
    image_id INT,
    created_at DATETIME,
    updated_at DATETIME,
    CONSTRAINT pk_users PRIMARY KEY(id),
    CONSTRAINT fk_likes_users FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT fk_likes_images FOREIGN KEY(image_id) REFERENCES images(id)
)ENGINE=InnoDB;

INSERT INTO likes VALUES(NULL, 1, 4, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 2, 4, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 3, 1, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 3, 2, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 2, 1, CURTIME(), CURTIME());
