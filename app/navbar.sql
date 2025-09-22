CREATE TABLE navbar (
    id INT PRIMARY KEY AUTO_INCREMENT,
    label VARCHAR(50) NOT NULL,
    url VARCHAR(100) NOT NULL,
    visible_for ENUM('all', 'authenticated') NOT NULL DEFAULT 'all',
    display_order INT NOT NULL
);

INSERT INTO navbar (label, url, visible_for, display_order) VALUES
('Home', '/', 'all', 1),
('Sezóny', '/sezony', 'all', 2),
('Týmy', '/tymy', 'all', 3),
('Administrace', '/admin', 'authenticated', 4);