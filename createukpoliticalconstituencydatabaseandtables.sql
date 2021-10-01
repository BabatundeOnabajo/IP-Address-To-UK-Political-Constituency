SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uk_political_constituencies_and_ip_addresses`
--
CREATE DATABASE IF NOT EXISTS `uk_political_constituencies_and_ip_addresses` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `uk_political_constituencies_and_ip_addresses`;

-- --------------------------------------------------------

--
-- Table structure for table `ipcountry_ipv4`
--

CREATE TABLE `ipcountry_ipv4` (
  `ipFROM` int(10) UNSIGNED ZEROFILL NOT NULL DEFAULT '0000000000',
  `ipTO` int(10) UNSIGNED ZEROFILL NOT NULL DEFAULT '0000000000',
  `country_code` char(2) DEFAULT '',
  `country_name` varchar(255) DEFAULT ' ',
  `region_name` varchar(128) DEFAULT NULL,
  `city_name` varchar(128) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `zip_code` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Table structure for table `list_of_postcodes_in_the_united_kingdom_together_with_reference`
--

-- Table structure for table `ipcountry_ipv6`
--

CREATE TABLE `ipcountry_ipv6` (
  `ipFROM` decimal(39,0) NOT NULL,
  `ipTO` decimal(39,0) NOT NULL,
  `country_code` char(2) NOT NULL,
  `country_name` varchar(256) NOT NULL,
  `region_name` varchar(128) DEFAULT NULL,
  `city_name` varchar(128) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `zip_code` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--


CREATE TABLE `list_of_postcodes_in_the_united_kingdom_together_with_reference` (
  `list_of_postcodes_id` bigint(20) UNSIGNED NOT NULL COMMENT 'This is the unique ID used for MySQL purposes.',
  `name_of_postcode` varchar(255) DEFAULT NULL COMMENT 'This is the name of the postcode.',
  `statistical_reference_to_postcode` varchar(255) DEFAULT NULL COMMENT 'This is the statistical reference used by some agencies and government departments. We need this code to search the other table in this database westminster_parliamentary_constituency_by_name_and_code'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This is the table that contains UK postcodes';

