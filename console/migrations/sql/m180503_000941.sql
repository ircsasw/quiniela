ALTER TABLE `user` ADD COLUMN `role` INT(6) NULL DEFAULT '10' AFTER `updated_at`;

ALTER TABLE `user`
	CHANGE COLUMN `role` `role` INT(11) NULL DEFAULT '10' AFTER `status`;
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='quiniela';