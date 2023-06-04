CREATE DATABASE dbimovelguide;
USE dbimovelguide;
CREATE TABLE `corretores` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(100) NOT NULL,
  `cpf` char(11) NOT NULL UNIQUE,
  `creci` int(11) NOT NULL
)