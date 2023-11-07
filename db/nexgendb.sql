-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 07:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nexgendb`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactos`
--

CREATE TABLE `contactos` (
  `id_contacto` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `nombre_producto` varchar(200) NOT NULL,
  `consulta` varchar(300) NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `fecha_consulta` date NOT NULL,
  `respondido` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactos`
--

INSERT INTO `contactos` (`id_contacto`, `nombre`, `telefono`, `email`, `nombre_producto`, `consulta`, `newsletter`, `fecha_consulta`, `respondido`) VALUES
(22, 'Jorge Ruanova', '', 'jorge.ruanova@davinci.edu.ar', 'Otras consultas', 'Por favor, enviar catalogo completo a jorge.ruanova@davinci.edu.ar', 1, '2023-10-01', 1),
(23, 'Jorge Ruanova', '151234455', 'jorge.ruanova@davinci.edu.ar', 'Auricular Gamer Logitech G335 Blanco', 'Vienen en negros?', 0, '2023-10-02', 0),
(38, 'test', '12345646', 'jruanova1987@gmail.com', 'Monitor Gamer 55&#039;&#039; Samsung Curvo Odyssey 4K 16', 'test', 1, '2023-10-03', 0),
(39, 'Pepito', '', 'pepito@gmail.com', 'Otras consultas', 'test', 1, '2023-10-04', 0),
(40, 'test', '12341', 'jruanova.dev@gmail.com', 'Otras consultas', 'test fecha', 0, '2023-11-07', 1),
(41, 'test', '', 'jruanova.dev@gmail.com', 'Teclado Gamer Redragon K530W-RGB-PRO Draconic', 'test nuevo campo', 0, '2023-11-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` text NOT NULL,
  `descripcion_producto` text NOT NULL,
  `categoria_producto` varchar(45) NOT NULL,
  `precio_producto` float(8,2) NOT NULL,
  `descuento_producto` float(8,2) NOT NULL,
  `nombre_archivo_producto` varchar(45) DEFAULT NULL,
  `producto_promo` tinyint(1) DEFAULT NULL,
  `formato_imagen` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `descripcion_producto`, `categoria_producto`, `precio_producto`, `descuento_producto`, `nombre_archivo_producto`, `producto_promo`, `formato_imagen`) VALUES
(8, 'Memoria Ram DDR4 - 8Gb 3600 Mhz Kingston Fury test', 'Marca : KingstonLínea : Fury RenegadeModelo : KF436C16RBA/8UPC : 740617322491Tipo : DIMMLatencia : 16Voltaje : 1.35V Capacidad : 8 GBVelocidad : 3600 MHzTecnología : DDR4 (288 pines)Aplicación : PCColor : NegroDisipador : SiIluminacion : RGB', 'Memorias', 45999.00, 5242.00, '16992433001', 1, 'jpeg'),
(9, 'Disco Solido Ssd 240Gb Kingston A400', 'Marca : KingstonSerie : A400P/N : SA400S37/240GCapacidad : 240GbInterfaz : SATA 3 Factor de forma : 2.5\"Dimensiones : 100.0 x 69.9 x 7.0 mmVelocidad de lectura : 500MB/segVelocidad de escritura : 350MB/seg', 'Almacenamiento', 25379.00, 1520.00, '2', 1, 'jpeg'),
(10, 'Disco Solido Ssd 240Gb Hikvision C100', 'Marca : HikvisionLínea : C100P/N : HS-SSD-C100/240GUPC : 842571111576Capacidad : 240 GBInterfaces : SATAFactor de formato : 2.5\"Velocidad de rotación : Velocidad de transferencia : Lectura 550MB/sAplicaciones : PCUbicación del disco : Interno3D NAND : Si', 'Almacenamiento', 26769.00, 0.00, '3', 0, 'jpeg'),
(11, 'Notebook Samsung Galaxy Book3 Pro Core i5 512', 'Marca : SamsungModelo : Galaxy Book3 Pro 14\" (i5, 512GB, 16GB)UPC / EAN : 8806094971170P/N : NP940XFG-KB1ARProcesador : Intel Core i5-1340P (1.9 GHz hasta 4.6 GHz 12 MB L3 Cache)Memoria : 16 GB LPDDR5 (On Board 16 GB)Gráficos : Intel Iris Xe GraphicsAlmacenamiento : SSD 512 GB NVMePantalla : 14.0\" (2880 x 1800) WQXGA+ AMOLED DisplayTeclado Num. : NoTeclado retroiluminado : SiSist. Operativo : Windows 11 HomeLector Optico : No Lector de Tarjetas : SiWeb Cam : SiUsb : 1 x USB 3.2 Gen1, 2 x Thunderbolt 4Rj 45 : NoWi-fi : SiBluetooth : SiVga : NoHdmi : 1Aur. y mic : Si miniplug 3,5mmBateria : Ion de Litio 54 WhrDimensiones : 312.3 x 223.8 x 11.3 mmPeso : 1.17 kg', 'Notebooks', 1000000.00, 17000.00, '4', 1, 'jpeg'),
(12, 'Teclado Gamer Redragon K530W-RGB-PRO Draconic', 'Marca : RedragonModelo : Draconic Pro K530 WhiteP/N : K530W-RGB-PROUPC/EAN : 6950376707864Color : BlancoPeso : 0,8 KgDistribucion : InglésTamaño del enter : ChicoRetroiluminación del teclado : RGBSwitch : Mecánico, BrownConectividad del teclado : Bluetooth/2.4Ghz/Cableado Keycaps adicionales : Keycap puller + Switch puller + Switches adicionalesRollover del teclado : 61 Keys (Full N-Key Rollover)Tamaño (Full / TKL) : TKL 60%Memoria a bordo : NoBloqueo de Windows : NoControles de medios : NoReposamuñecas : NoTipo de cable del teclado : USB-C desmontableDimensiones : 291.7 x 101.7 x 36mmLuz de Bloq Mayus : NoInterruptor de encendido : Si', 'Teclados', 57999.00, 0.00, '5', 0, 'jpeg'),
(13, 'Mouse Gamer Logitech G203 Lightsync Negro', 'Marca : LogitechModelo : G203Color : NegroDimensiones del mouse : 116,6 x 62,15 x 38,2 mmPeso del mouse : 85 gConectividad : Cable USBSensor : Optico DPI : 200 a 8000 DPINúmero de botones : 6Botón rueda (Sí/No) : SiIluminacion : RGBCable mallado : NoInterruptor de encendido : NoSistemas operativos compatibles : Windows 7 o posteriores, macOS 10.13 o posteriores, Chrome OSTM', 'Punteros', 26929.00, 890.44, '6', 1, 'jpeg'),
(14, 'Notebook Asus X515EA Core i5 1135G7 8Gb Ssd 2', 'Marca : ASUSModelo : X515EAUPC / EAN : 195553672917 / 4711081672913P/N : 90NB0TY1-M013l0Procesador : Intel Core i5-1135G7 (caché de 8 MB, hasta 4,20 GHz, con IPU)Memoria : 8 GBGráficos : Gráficos Intel Iris XEAlmacenamiento : SSD 256 GB M.2 NVME PCI-ePantalla : 15,6\" FHD (1920 x 1080)Distribucion teclado : EspañolTeclado Num. : SiSist. Operativo : Windows 11 64bitLector Optico : No Lector de Tarjetas : NoWeb Cam : SiUsb : 2 x USB 2.0, 1 x USB 3.0, 1 x USB-CRj 45 : NoWi-fi : SiBluetooth : SiVga : NoHdmi : 1Aur. y mic : Si miniplug 3,5mmBateria : Ion de litio 37 Wh 2 celdasDimensiones : 23,5 x 36 x 1,99 cmPeso : 1,8 KgOrigen : Argentina', 'Notebooks', 754389.00, 1723.50, '7', 1, 'jpeg'),
(15, 'Monitor Gamer 55 pulgadas Samsung Curvo Odyssey 4K 16', 'Marca : SamsungModelo : S55BG970NLP/N : LS55BG970NLXZBUPC/EAN : 8806094414868Color : NegroTamaño de panel : 55\"Curvo/Plano : CurvoColores : Max 1BTipo de panel : VAResolución : 3,840 x 2,160Brillo(Max) : 600cd/m2Ángulo de vision : 178 grados / 178 gradosParlantes : SiConectividad : Pantalla inalámbrica, 1 x miniplug, 1 x Ethernet, Wifi5, Bluetooth 5.2 Frecuencia de actualizacion : 165 HzTiempo de respuesta (ms) : 1 ms (GTG)Voltaje : 100-240 V, 50/60 HzInclinación : LandscapeGiratorio : NoPivote : -90°(±2°)~90°(±2°)Ajuste en altura : NoBloqueo Kensington : NoFreesync/Gsync : AMD FreeSync Premium ProDimensiones físicas sin base : 1174.8 x 704.8 x 251.8 mmDimensiones del embalaje : 1362.0 x 922.0 x 317.0 mmPeso con base : 41,5 kgPeso sin base : 21,1 kgPeso del empaque : 53,8 kg', 'Monitores', 1000000.00, 22450.20, '8', 1, 'jpeg'),
(16, 'Auricular Gamer Logitech G335 Blanco', 'Marca : LogitechModelo : G335P/N : 981-001017UPC : 097855165480Tipo de salida : StereoTipo de copa : CircumauralPlegable : NoVibración : NoRespuesta en frecuencia : 20 Hz  20 kHzImpedancia : 36 Ohm Sensibilidad : 87,5 dbRetroiluminación : NoConectividad : Miniplug 3.5mmBluetooth : NoControl de volumen : Integrado en auricularPeso : 240 gSoftware : NoMicrofono : Integrado, fijo. Con boton de muteo.Compatibilidad : PC, Xbox, PlayStation, Nintendo Switch y dispositivos móviles con toma de audio de 3,5 mmContenido de la caja : Audífonos G335 con micrófono y cable para juegos, Divisor para PC para micrófonos y tomas de audífonos (divisor en Y), Documentación del usuario', 'Headsets', 54999.00, 0.00, '9', 0, 'jpeg'),
(17, 'Placa De Video GeForce RTX 4090 24Gb Msi Gami', 'Marca : MSIModelo : GeForce RTX 4090 GAMING TRIO 24GP/N : 912-V510-095UPC/EAN : 824142302910 / 4711377019231Chipset : NVIDIA GeForce RTX 4090Coolers : 3Pci Express : PCIe 4.0DirectX : 12 UltimateOpenGl : 4.6Memoria : GDDR6X 24GBBits : 384CUDA Cores : 16384Core Clock : 2535 MHz (MSI Center) Mem Clock : 21 GbpsAlimen. Suple : 1 x 16-pinFuente optima : 700wVga : NoDvi : NoHdmi : 1Display Port : 3Máximos displays soportados : 4Perfil Bajo : NoBackplate : SiDimensiones : 337 x 140 x 77 mmSlots PCI-e : 3,7Iluminacion : Si', 'Placas Graficas', 999999.00, 32250.87, '10', 1, 'jpeg'),
(18, 'Placa De Video GeForce RTX 4090 24Gb Msi Supr', 'Marca : MSIModelo : GeForce RTX 4090 SUPRIM LIQUID X 24GP/N : 912-V510-007UPC/EAN : 824142302903 / 4711377019224Chipset : NVIDIA GeForce RTX 4090Coolers : 3Pci Express : PCIe 4.0DirectX : 12 UltimateOpenGl : 4.6Memoria : GDDR6X 24GBBits : 384CUDA Cores : 16384Core Clock : 2640 MHz (MSI Center) Mem Clock : 21 GbpsAlimen. Suple : 1 x 16-pinFuente optima : 1000wVga : NoDvi : NoHdmi : 1Display Port : 3Máximos displays soportados : 4Perfil Bajo : NoBackplate : SiDimensiones : TarjetaSlots PCI-e : 1Iluminacion : No', 'Placas Graficas', 985000.00, 50.00, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol`) VALUES
(1, 'Jorge', 'jorge@nexgen.com', 'jorge123', 'Admin'),
(2, 'Manu', 'manu@nexgen.com', 'manu123', 'Admin'),
(3, 'Erik', 'erik@nexgen.com', 'erik123', 'Empleado'),
(4, 'Fer', 'fer@gmail.com', 'fer123', 'Usuario');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
