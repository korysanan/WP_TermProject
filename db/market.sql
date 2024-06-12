CREATE TABLE market (
    num INT NOT NULL AUTO_INCREMENT,
    id CHAR(15) NOT NULL,
    name CHAR(10) NOT NULL,
    subject CHAR(200) NOT NULL,
    content TEXT NOT NULL,
    regist_day CHAR(20) NOT NULL,
    hit INT NOT NULL,
    file_name CHAR(40),
    file_type CHAR(40),
    file_copied CHAR(40),
    category INT(11) NOT NULL DEFAULT 0,
    price INT NOT NULL,
    PRIMARY KEY (num)
);