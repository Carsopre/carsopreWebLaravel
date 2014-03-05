/*
Note: in-table foreign key (ITFK) must allow NULL value even if the referenced table
doesn't allow NULL because DataMapperORM saves the object first and the relationships later
*/

DROP TABLE IF EXISTS
web,
sections,
categories,
permissions_profiles,
permissions,
users,
profiles,
languages,
sessions;

/************************************************************************/

DROP TABLE IF EXISTS sessions;
CREATE TABLE IF NOT EXISTS sessions (
	session_id varchar(40) DEFAULT '0' NOT NULL,
	ip_address varchar(16) DEFAULT '0' NOT NULL,
	user_agent varchar(120) NOT NULL,
	last_activity int(10) unsigned DEFAULT 0 NOT NULL,
	user_data text NOT NULL,
	PRIMARY KEY (session_id),
	KEY last_activity_idx (last_activity)
) ENGINE = MyISAM DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci; /*Importante poner el CHARACTER ...*/

/************************************************************************/

DROP TABLE IF EXISTS languages;
CREATE TABLE IF NOT EXISTS languages (
	id tinyint(1) unsigned NOT NULL auto_increment PRIMARY KEY,
	enabled tinyint(1) unsigned NOT NULL DEFAULT 1,
	locale char(5) NOT NULL,
	name varchar(16) NOT NULL UNIQUE,
	flag varchar(24)
) ENGINE = InnoDB;

INSERT INTO languages(id, locale, name, flag, enabled) VALUES
(1, 'es_ES', 'Español', 'es.png', 1),
(2, 'en_US', 'English', 'us.png', 0);

/************************************************************************/

DROP TABLE IF EXISTS profiles;
CREATE TABLE IF NOT EXISTS profiles (
	id smallint(1) unsigned NOT NULL auto_increment PRIMARY KEY,
	name varchar(64) NOT NULL UNIQUE,
	created datetime,
	updated datetime
) ENGINE = InnoDB;

INSERT INTO profiles (id, name) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Guest');

/************************************************************************/

DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users (
	id mediumint(1) unsigned NOT NULL auto_increment PRIMARY KEY,
	language_id tinyint(1) unsigned DEFAULT 1, FOREIGN KEY (language_id) REFERENCES languages (id) ON UPDATE CASCADE ON DELETE RESTRICT,
	profile_id smallint(1) unsigned, FOREIGN KEY (profile_id) REFERENCES profiles (id) ON UPDATE CASCADE ON DELETE RESTRICT,
	username varchar(64) NOT NULL UNIQUE,
	email varchar(65) NOT NULL UNIQUE,
	`password` varchar(40) NOT NULL,
	enabled tinyint(1) unsigned NOT NULL DEFAULT 1,
	created timestamp,
	updated timestamp
) ENGINE = InnoDB;

INSERT INTO users (id, profile_id, username, `password`) VALUES
(1, 1, 'carsopre', '');

/************************************************************************/

DROP TABLE IF EXISTS permissions;
CREATE TABLE IF NOT EXISTS permissions (
	id tinyint(1) unsigned NOT NULL PRIMARY KEY,
	name varchar(64) NOT NULL UNIQUE
) ENGINE = InnoDB;

INSERT INTO permissions (id, name) VALUES
-- Users
(0, 'View Users list'),
(1, 'Create user'),
(2, 'Edit user'),
(3, 'Delete user'),
-- Profiles
(10, 'View Profile list'),
(11, 'New profile'),
(12, 'Edit profile'),
(13, 'Delete profile');

/************************************************************************/

DROP TABLE IF EXISTS permissions_profiles;
CREATE TABLE IF NOT EXISTS permissions_profiles (
	id mediumint(3) unsigned NOT NULL auto_increment PRIMARY KEY,
	permission_id tinyint(1) unsigned, FOREIGN KEY (permission_id) REFERENCES permissions(id) ON UPDATE CASCADE ON DELETE CASCADE,
	profile_id smallint(1) unsigned, FOREIGN KEY (profile_id) REFERENCES profiles(id) ON UPDATE CASCADE ON DELETE CASCADE,
	UNIQUE(permission_id, profile_id)
) ENGINE = InnoDB;

/* Admin profile has all permissions */
INSERT INTO permissions_profiles (permission_id, profile_id) SELECT id, 1 FROM permissions WHERE id NOT IN (SELECT permission_id FROM permissions_profiles WHERE profile_id=1);

/* Al resto de momento unos especificos */
INSERT INTO permissions_profiles (profile_id, permission_id) VALUES
(2, 0),
(2, 10);

/************************************************************************/

DROP TABLE IF EXISTS categories;
CREATE TABLE IF NOT EXISTS categories (
	id tinyint(1) unsigned NOT NULL auto_increment PRIMARY KEY,
	name varchar(64) NOT NULL UNIQUE,
	description TEXT NOT NULL,
	enabled tinyint(1) unsigned NOT NULL DEFAULT 1,
	created datetime,
	updated datetime
) ENGINE = InnoDB;

INSERT INTO categories (id, name) VALUES
(1, 'Web'),
(2, 'Curriculum Vitae'),
(3, 'Portfolio'),
(4, 'Contact');

UPDATE categories SET description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi.
Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";

/************************************************************************/

DROP TABLE IF EXISTS sections;
CREATE TABLE IF NOT EXISTS sections (
	id smallint(1) unsigned NOT NULL auto_increment PRIMARY KEY,
	type_id tinyint(1) unsigned, FOREIGN KEY (type_id) REFERENCES categories(id) ON UPDATE CASCADE ON DELETE RESTRICT,
	name varchar(128) NOT NULL UNIQUE,
	description TEXT NOT NULL,
	enabled tinyint(1) unsigned NOT NULL DEFAULT 1,
	created timestamp,
	updated timestamp
) ENGINE = InnoDB;

/************************************************************************/

