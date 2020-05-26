-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2020 at 01:28 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ferreteria_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `cantidad_disponible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `cantidad_disponible`) VALUES
(10003, 'Herramientas', 0),
(123123, 'Construccion', 0),
(234234, 'Cementos', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `Productos_idproducto` varchar(40) NOT NULL,
  `Facturas_idfactura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detalle_factura`
--

INSERT INTO `detalle_factura` (`Productos_idproducto`, `Facturas_idfactura`) VALUES
('124234', 234234234),
('124234', 5619),
('124234', 7319),
('124234', 219327);

-- --------------------------------------------------------

--
-- Table structure for table `facturas`
--

CREATE TABLE `facturas` (
  `idfactura` int(11) NOT NULL,
  `noventa` text NOT NULL,
  `cantidad_productos` int(11) NOT NULL,
  `total_venta` double NOT NULL,
  `fechahora_venta` datetime NOT NULL,
  `detalle_venta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facturas`
--

INSERT INTO `facturas` (`idfactura`, `noventa`, `cantidad_productos`, `total_venta`, `fechahora_venta`, `detalle_venta`) VALUES
(5619, 'bd04bc67-07f5-44d4-a851-910592bbc5dd', 5, 1171170, '2020-05-16 14:25:01', '[Producto{idproducto=124234, nombre=producto 1, precioVenta=702702.0, precioCompra=234234.0, fechaRegistro=2020-05-16 13:45:21.0, disponibilidad=3, categoria=123123}, Producto{idproducto=234234, nombre=producto 2, precioVenta=468468.0, precioCompra=234234.0, fechaRegistro=2020-05-16 13:45:21.0, disponibilidad=2, categoria=123123}]'),
(7319, '5f6a3d26-64f5-457d-b8b0-3bec5e744dc5', 5, 1171170, '2020-05-16 14:32:32', '[Producto{idproducto=124234, nombre=producto 1, precioVenta=702702.0, precioCompra=234234.0, fechaRegistro=2020-05-16 13:45:21.0, disponibilidad=3, categoria=123123}, Producto{idproducto=234234, nombre=producto 2, precioVenta=468468.0, precioCompra=234234.0, fechaRegistro=2020-05-16 13:45:21.0, disponibilidad=2, categoria=123123}]'),
(219327, 'a955d73a-61c8-4930-b16c-289bcb9efc44', 5, 1171170, '2020-05-16 14:36:13', '[Producto{idproducto=124234, nombre=producto 1, precioVenta=702702.0, precioCompra=234234.0, fechaRegistro=2020-05-16 13:45:21.0, disponibilidad=3, categoria=123123}, Producto{idproducto=234234, nombre=producto 2, precioVenta=468468.0, precioCompra=234234.0, fechaRegistro=2020-05-16 13:45:21.0, disponibilidad=2, categoria=123123}]'),
(234234, '5ec7c8f66a343', 1, 234234, '2020-05-22 00:00:00', '1 x 234234');

-- --------------------------------------------------------

--
-- Table structure for table `f_compra`
--

CREATE TABLE `f_compra` (
  `Factura_idfactura` int(11) NOT NULL,
  `Proveedor_idproveedor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `f_compra`
--

INSERT INTO `f_compra` (`Factura_idfactura`, `Proveedor_idproveedor`) VALUES
(234234234, '2342342');

-- --------------------------------------------------------

--
-- Table structure for table `f_venta`
--

CREATE TABLE `f_venta` (
  `Factura_idfactura` int(11) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `idproducto` varchar(40) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `precio_venta` double NOT NULL,
  `precio_compra` double NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `disponibilidad` int(11) NOT NULL,
  `categoria_idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`idproducto`, `nombre`, `precio_venta`, `precio_compra`, `fecha_registro`, `disponibilidad`, `categoria_idcategoria`) VALUES
('234234', 'producto 1', 234234, 34234, '2020-05-22 00:00:00', 34234, 123123);

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `idproveedor` varchar(100) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `ciudad` varchar(500) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `nombre_contacto` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`idproveedor`, `nombre`, `ciudad`, `telefono`, `nombre_contacto`) VALUES
('232540', 'Casa Construccion', 'Sahagun', '30000000', 'Alberto Andres Sotelo'),
('2342342', 'esdfsdf', 'Sahagun', '12312312', 'Contacto el paisita'),
('322342', 'Other provider', 'Monteria - Cordoba', '310215412', 'Jesus El Vale');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD KEY `fk_Detalle_Factura_Productos1_idx` (`Productos_idproducto`),
  ADD KEY `fk_Detalle_Factura_Facturas1_idx` (`Facturas_idfactura`);

--
-- Indexes for table `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`idfactura`);

--
-- Indexes for table `f_compra`
--
ALTER TABLE `f_compra`
  ADD PRIMARY KEY (`Factura_idfactura`),
  ADD KEY `fk_F_Compra_Proveedor1_idx` (`Proveedor_idproveedor`);

--
-- Indexes for table `f_venta`
--
ALTER TABLE `f_venta`
  ADD PRIMARY KEY (`Factura_idfactura`),
  ADD KEY `fk_F_Venta_Cliente1_idx` (`Cliente_idCliente`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `fk_products_category1_idx` (`categoria_idcategoria`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `fk_Detalle_Factura_Facturas1` FOREIGN KEY (`Facturas_idfactura`) REFERENCES `facturas` (`idfactura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Detalle_Factura_Productos1` FOREIGN KEY (`Productos_idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `f_compra`
--
ALTER TABLE `f_compra`
  ADD CONSTRAINT `fk_F_Compra_Factura1` FOREIGN KEY (`Factura_idfactura`) REFERENCES `facturas` (`idfactura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_F_Compra_Proveedor1` FOREIGN KEY (`Proveedor_idproveedor`) REFERENCES `proveedor` (`idproveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `f_venta`
--
ALTER TABLE `f_venta`
  ADD CONSTRAINT `fk_F_Venta_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_F_Venta_Factura1` FOREIGN KEY (`Factura_idfactura`) REFERENCES `facturas` (`idfactura`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_products_category1` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
