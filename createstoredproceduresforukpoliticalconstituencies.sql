DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GETCOUNTRYFROMIPADDRESSV4TABLE`(
IN ipNumberOnDatabase int(10)
)
BEGIN
SELECT * FROM ipcountry_ipv4 where ipNumberOnDatabase BETWEEN ipFrom AND ipTo;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GETCOUNTRYFROMIPADDRESSV6TABLE`(
IN ipNumberOnDatabase int(10)
)
BEGIN
SELECT * FROM ipcountry_ipv6 where ipNumberOnDatabase BETWEEN ipFrom AND ipTo;
END$$
DELIMITER ;
