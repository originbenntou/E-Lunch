CREATE DATABASE elunch;
use elunch

DROP TABLE IF EXISTS origin;
CREATE TABLE special (
  id INT unsigned NOT NULL auto_increment,
  name VARCHAR(255) NOT NULL,
  description VARCHAR(1023) DEFAULT NULL,
  latitude double(9,7) DEFAULT NULL,
  longitude double(10,7) DEFAULT NULL,
  holiday INT NOT NULL DEFAULT 7,
  status INT NOT NULL DEFAULT 0,
  created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS taberogu;
CREATE TABLE taberogu (
  id INT unsigned NOT NULL auto_increment,
  name VARCHAR(255) NOT NULL,
  description VARCHAR(1023) DEFAULT NULL,
  latitude double(9,7) DEFAULT NULL,
  longitude double(10,7) DEFAULT NULL,
  holiday INT NOT NULL DEFAULT 7,
  status INT NOT NULL DEFAULT 0,
  created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);
