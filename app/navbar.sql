CREATE TABLE `navigation` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  `position` ENUM('left', 'right') NOT NULL DEFAULT 'left',
  `visible_in` ENUM('frontend', 'admin', 'both') NOT NULL DEFAULT 'frontend',
  `order` INT DEFAULT 0
);

INSERT INTO `navigation` (`title`, `url`, `position`, `visible_in`, `order`) VALUES
('Home', '/', 'left', 'frontend', 1),
('Sezóny', '/seasons', 'left', 'frontend', 2),
('Týmy', '/teams', 'left', 'frontend', 3),
('Správa článků', '/admin/articles', 'left', 'admin', 1),
('Odhlásit', '/logout', 'right', 'admin', 2);