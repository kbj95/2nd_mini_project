CREATE DATABASE minitwo;

USE minitwo;

CREATE TABLE user_info(
	u_no INT PRIMARY KEY AUTO_INCREMENT
	,u_id VARCHAR(12) NOT NULL
	,u_pw VARCHAR(512) NOT NULL
	,u_name VARCHAR(30) NOT NULL
	,u_phone_num VARCHAR(11) NOT NULL
	,u_from_date DATE NOT NULL
	,u_to_date DATE NULL
	,u_del_flg CHAR(1) DEFAULT 0
);

INSERT INTO user_info(
	u_id
	,u_pw
	,u_name
	,u_phone_num
	,u_from_date
) 
VALUES(
	u_id
	,u_pw
	,u_name
	,u_phone_num
	,u_from_date
);

COMMIT;

FLUSH PRIVILEGES;