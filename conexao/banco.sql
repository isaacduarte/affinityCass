CREATE TABLE `Usuario` (
  `id_usuario` int(10) PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(500) DEFAULT 'NULL',
  `cpf` varchar(13) DEFAULT 'NULL',
  `email` varchar(50) DEFAULT 'NULL',
  `telefone` varchar(50) DEFAULT 'NULL',
  `login` varchar(10) DEFAULT NULL,
  `senha` varchar(1000) DEFAULT NULL
  `nivel` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Cliente` (
  `id_cliente` int(10) PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(500) DEFAULT 'NULL',
  `CNPJ` varchar(50) DEFAULT 'NULL',
  `adquirente` varchar(10) DEFAULT 'NULL',
  `telefone` varchar(20) DEFAULT 'NULL',
  `email` varchar(20) DEFAULT NULL,
  `id_usuario` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `loja` (
  `id_loja` int(10) PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(500) DEFAULT 'NULL',
  `cnpj` varchar(50) DEFAULT 'NULL',
  `adquirente` varchar(10) DEFAULT 'NULL',
  `telefone` varchar(20) DEFAULT 'NULL',
  `email` varchar(20) DEFAULT NULL,
  `id_cliente` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `Cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `Usuario` (`id_usuario`);
COMMIT;
ALTER TABLE `loja`
  ADD CONSTRAINT `loja_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);
COMMIT;
