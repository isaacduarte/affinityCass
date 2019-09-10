CREATE TABLE `usuario` (
  `id_usuario` int(10) PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(500) DEFAULT 'NULL',
  `cpf` varchar(13) DEFAULT 'NULL',
  `email` varchar(50) DEFAULT 'NULL',
  `telefone` varchar(50) DEFAULT 'NULL',
  `login` varchar(10) DEFAULT NULL,
  `senha` varchar(1000) DEFAULT NULL,
  `nivel` int(1) ,
  `cnpj` varchar(50) DEFAULT 'NULL',
  `inscricao` varchar(50) DEFAULT 'NULL',
  `filiado` int(1) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `cliente` (
  `id_cliente` int(10) PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(500) DEFAULT 'NULL',
  `telefone` varchar(20) DEFAULT 'NULL',
  `email` varchar(20) DEFAULT 'NULL',
  status int(1),
  plano int(1),
  `id_usuario` int(10)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `loja` (
  `id_loja` int(10) PRIMARY KEY AUTO_INCREMENT,
  `cnpj` varchar(50) DEFAULT 'NULL',
  `id_cliente` int(10)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `adquirente` (
  `id_adquirente` int(10) PRIMARY KEY AUTO_INCREMENT,
  `descricao` varchar(50) DEFAULT 'NULL',
  `id_loja` int(10)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `loja_adquirente` (
  `id_loja` int(10),
  `id_adquirente` int(10)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `Usuario` (`id_usuario`);

ALTER TABLE `loja`
  ADD CONSTRAINT `loja_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

ALTER TABLE `adquirente`
  ADD CONSTRAINT `adquirente_ibfk_1` FOREIGN KEY (`id_loja`) REFERENCES `loja` (`id_loja`);

ALTER TABLE `loja_adquirente`
  ADD CONSTRAINT `loja_adquirente_ibfk_1` FOREIGN KEY (`id_loja`) REFERENCES `loja` (`id_loja`);

ALTER TABLE `loja_adquirente`
  ADD CONSTRAINT `loja_adquirente_ibfk_2` FOREIGN KEY (`id_adquirente`) REFERENCES `adquirente` (`id_adquirente`);
