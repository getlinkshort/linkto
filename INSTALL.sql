SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "-08:00";

CREATE TABLE `linkto` (
  `id` int(11) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `sid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `linkto`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `linkto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
