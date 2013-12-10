-- DB Setup for international-edu project ADEC2013

CREATE USER 'devAdmin'@'localhost' IDENTIFIED BY '4mMl4d3#';
SELECT 'User devAdmin created' AS '';  -- print statement

CREATE DATABASE IF NOT EXISTS 4mintledudev;
SELECT 'Database 4mintledudev' AS '';  -- print statement

GRANT ALL ON 4mintledudev.* TO 'devAdmin'@'localhost';
SELECT 'User devAdmin granted all priviledges for database 4mintledudev' AS '';  -- print statement