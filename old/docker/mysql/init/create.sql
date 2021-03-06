use elunch

DROP TABLE IF EXISTS original;
CREATE TABLE original (
  id INT unsigned NOT NULL auto_increment,
  name VARCHAR(255) NOT NULL,
  description VARCHAR(1023) DEFAULT NULL,
  min_price INT unsigned NOT NULL DEFAULT 0,
  max_price INT unsigned NOT NULL DEFAULT 0,
  star FLOAT NOT NULL DEFAULT 0,
  holiday INT NOT NULL DEFAULT 7,
  photo VARCHAR(1023) DEFAULT NULL,
  url VARCHAR(1023) DEFAULT NULL,
  location VARCHAR(1023) DEFAULT NULL,
  latitude double(9,7) DEFAULT NULL,
  longitude double(10,7) DEFAULT NULL,
  status TINYINT(1) NOT NULL DEFAULT 0,
  created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS taberogu;
CREATE TABLE taberogu (
  id INT unsigned NOT NULL auto_increment,
  name VARCHAR(255) NOT NULL,
  description VARCHAR(1023) DEFAULT NULL,
  min_price INT unsigned NOT NULL DEFAULT 0,
  max_price INT unsigned NOT NULL DEFAULT 0,
  star FLOAT NOT NULL DEFAULT 0,
  holiday VARCHAR(255) NOT NULL DEFAULT '不定休',
  photo VARCHAR(1023) DEFAULT NULL,
  url VARCHAR(1023) DEFAULT NULL,
  location VARCHAR(1023) DEFAULT NULL,
  latitude double(9,7) DEFAULT NULL,
  longitude double(10,7) DEFAULT NULL,
  status TINYINT(1) NOT NULL DEFAULT 0,
  created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);
