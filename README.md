# Demo-PDO-Registration

# database 
CREATE TABLE users (
    id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname varchar(255) NOT NULL,
	lastname varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    role varchar(255) NOT NULL,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=INNODB DEFAULT CHARSET=utf8;
