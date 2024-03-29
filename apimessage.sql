CREATE DATABASE `apimessage`;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
CREATE TABLE `apimessage`.`messages` (
                                         `id` int(11) NOT NULL,
                                         `author` varchar(255) NOT NULL,
                                         `message` text NOT NULL,
                                         `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO `apimessage`.`messages` (`id`, `author`, `message`, `date`) VALUES
(1, '<span class="red">Admin</span>', 'Type : <i>/Help</i> to display the command list;', '24/11/2019 - 18:41');
ALTER TABLE `apimessage`.`messages`
    ADD PRIMARY KEY (`id`);
ALTER TABLE `apimessage`.`messages`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
