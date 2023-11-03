-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2023 at 06:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
  `newsletter` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactos`
--

INSERT INTO `contactos` (`id_contacto`, `nombre`, `telefono`, `email`, `nombre_producto`, `consulta`, `newsletter`) VALUES
(22, 'Jorge Ruanova', '', 'jorge.ruanova@davinci.edu.ar', 'Otras consultas', 'Por favor, enviar catalogo completo a jorge.ruanova@davinci.edu.ar', 1),
(23, 'Jorge Ruanova', '151234455', 'jorge.ruanova@davinci.edu.ar', 'Auricular Gamer Logitech G335 Blanco', 'Vienen en negros?', 0),
(38, 'test', '12345646', 'jruanova1987@gmail.com', 'Monitor Gamer 55&#039;&#039; Samsung Curvo Odyssey 4K 16', 'test', 1),
(39, 'Jorge', '', 'jorge.ruanova@davinci.edu.ar', 'Monitor Gamer 55\'\' Samsung Curvo Odyssey 4K 16', 'consulta sobre monitor en pulgadas (simbolo) con suscripcion newsletter', 1);

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
(8, 'Memoria Ram DDR4 - 8Gb 3600 Mhz Kingston Fury', 'Marca: Kingston Línea: Fury Renegade Modelo: KF436C16RBA/8 UPC: 740617322491 Tipo: DIMM Latencia: 16 Voltaje: 1.35V Capacidad: 8 GB Velocidad: 3600 MHz Tecnología: DDR4 (288 pines) Aplicación: PC Color: Negro Disipador: Si Iluminacion: RGB', 'Memorias', 45999.00, 5242.00, '1', 1, 'jpeg'),
(9, 'Disco Solido Ssd 240Gb Kingston A400', 'Marca: Kingston Serie: A400 P/N: SA400S37/240G Capacidad: 240Gb Interfaz: SATA 3 Factor de forma: 2.5\" Dimensiones: 100.0 x 69.9 x 7.0 mm Velocidad de lectura: 500MB/seg Velocidad de escritura: 350MB/seg', 'Almacenamiento', 25379.00, 1520.00, '2', 1, 'jpeg'),
(10, 'Disco Solido Ssd 240Gb Hikvision C100', 'Marca: Hikvision Línea: C100 P/N: HS-SSD-C100/240G UPC: 842571111576 Capacidad: 240 GB Interfaces: SATA Factor de formato: 2.5\"Velocidad de rotación: Velocidad de transferencia: Lectura 550MB/s Aplicaciones: PC Ubicación del disco: Interno3D NAND: Si', 'Almacenamiento', 26769.00, 0.00, '3', 0, 'jpeg'),
(11, 'Notebook Samsung Galaxy Book3 Pro Core i5 512', 'Marca: Samsung Modelo: Galaxy Book3 Pro 14\" (i5, 512GB, 16GB)UPC / EAN: 8806094971170 P/N: NP940XFG-KB1AR Procesador: Intel Core i5-1340P (1.9 GHz hasta 4.6 GHz 12 MB L3 Cache)Memoria: 16 GB LPDDR5 (On Board 16 GB) Gráficos: Intel Iris Xe Graphics Almacenamiento: SSD 512 GB NVMe Pantalla: 14.0\" (2880 x 1800) WQXGA+ AMOLED Display Teclado Num.: NoTeclado retroiluminado: SiSist. Operativo: Windows 11 Home Lector Optico: No Lector de Tarjetas: Si  Web Cam: Si Usb: 1 x USB 3.2 Gen1, 2 x Thunderbolt 4Rj 45: No Wi-fi: Si Bluetooth: Si Vga: No Hdmi: 1Aur. y mic: Si miniplug 3,5mm Bateria: Ion de Litio 54 Whr Dimensiones: 312.3 x 223.8 x 11.3 mm Peso: 1.17 kg', 'Notebooks', 1000000.00, 17000.00, '4', 1, 'jpeg'),
(12, 'Teclado Gamer Redragon K530W-RGB-PRO Draconic', 'Marca: Redragon Modelo: Draconic Pro K530 White P/N: K530W-RGB-PRO UPC/EAN: 6950376707864 Color: Blanco Peso: 0,8 Kg Distribucion: Inglés Tamaño del enter: Chico Retroiluminación del teclado: RGB Switch: Mecánico, Brown Conectividad del teclado: Bluetooth/2.4Ghz/Cableado Keycaps adicionales: Keycap puller + Switch puller + Switches adicionales Rollover del teclado: 61 Keys (Full N-Key Rollover)Tamaño (Full / TKL): TKL 60% Memoria a bordo: No Bloqueo de Windows: No Controles de medios: No Reposamuñecas: No Tipo de cable del teclado: USB-C desmontable Dimensiones: 291.7 x 101.7 x 36mmLuz de Bloq Mayus: No Interruptor de encendido: Si', 'Teclados', 57999.00, 0.00, '5', 0, 'jpeg'),
(13, 'Mouse Gamer Logitech G203 Lightsync Negro', 'Marca: Logitech Modelo: G203 Color: Negro Dimensiones del mouse: 116,6 x 62,15 x 38,2 mm Peso del mouse: 85 g Conectividad: Cable USB Sensor: Optico DPI: 200 a 8000 DPI Número de botones: 6Botón rueda (Sí/No): Si Iluminacion: RGB Cable mallado: No Interruptor de encendido: No Sistemas operativos compatibles: Windows 7 o posteriores, macOS 10.13 o posteriores, Chrome OSTM', 'Punteros', 26929.00, 890.44, '6', 1, 'jpeg'),
(14, 'Notebook Asus X515EA Core i5 1135G7 8Gb Ssd 2', 'Marca: ASUS Modelo: X515EA UPC / EAN: 195553672917 / 4711081672913 P/N: 90NB0TY1-M013l0 Procesador: Intel Core i5-1135G7 (caché de 8 MB, hasta 4,20 GHz, con IPU) Memoria: 8 GB Gráficos: Gráficos Intel Iris XE Almacenamiento: SSD 256 GB M.2 NVME PCI-e Pantalla: 15,6\" FHD (1920 x 1080) Distribucion teclado: Español Teclado Num.: Si Sist. Operativo: Windows 11 64bit Lector Optico: No Lector de Tarjetas: No Web Cam: Si Usb: 2 x USB 2.0, 1 x USB 3.0, 1 x USB-CRj 45: No Wi-fi: Si Bluetooth: Si Vga: No Hdmi: 1Aur. y mic: Si miniplug 3,5mm Bateria: Ion de litio 37 Wh 2 celdas Dimensiones: 23,5 x 36 x 1,99 cm Peso: 1,8 Kg Origen: Argentina', 'Notebooks', 754389.00, 1723.50, '7', 1, 'jpeg'),
(15, 'Monitor Gamer 55\'\' Samsung Curvo Odyssey 4K 16', 'Marca: Samsung Modelo: S55BG970NL P/N: LS55BG970NLXZB UPC/EAN: 8806094414868 Color: Negro Tamaño de panel: 55\"Curvo/Plano: CurvoColores: Max 1B Tipo de panel: VAResolución: 3,840 x 2,160 Brillo(Max): 600cd/m2 Ángulo de vision: 178 grados / 178 grados Parlantes: Si Conectividad: Pantalla inalámbrica, 1 x miniplug, 1 x Ethernet, Wifi5, Bluetooth 5.2 Frecuencia de actualizacion: 165 HzTiempo de respuesta (ms): 1 ms (GTG) Voltaje: 100-240 V, 50/60 Hz Inclinación: Landscape Giratorio: NoPivote: -90°(±2°)~90°(±2°) Ajuste en altura: No Bloqueo Kensington: No Freesync/Gsync: AMD FreeSync Premium Pro Dimensiones físicas sin base: 1174.8 x 704.8 x 251.8 mm Dimensiones del embalaje: 1362.0 x 922.0 x 317.0 mm Peso con base: 41,5 kg Peso sin base: 21,1 kgPeso del empaque: 53,8 kg', 'Monitores', 1000000.00, 22450.20, '8', 1, 'jpeg'),
(16, 'Auricular Gamer Logitech G335 Blanco', 'Marca: Logitech Modelo: G335 P/N: 981-001017 UPC: 097855165480 Tipo de salida: Stereo Tipo de copa: Circumaural Plegable: No Vibración: No Respuesta en frecuencia: 20 Hz  20 kHz Impedancia: 36 Ohm Sensibilidad: 87,5 db Retroiluminación: No Conectividad: Miniplug 3.5mmBluetooth: No Control de volumen: Integrado en auricular Peso: 240 g Software: No Microfono: Integrado, fijo. Con boton de muteo. Compatibilidad: PC, Xbox, PlayStation, Nintendo Switch y dispositivos móviles con toma de audio de 3,5 mm Contenido de la caja: Audífonos G335 con micrófono y cable para juegos, Divisor para PC para micrófonos y tomas de audífonos (divisor en Y), Documentación del usuario', 'Headsets', 54999.00, 0.00, '9', 0, 'jpeg'),
(17, 'Placa De Video GeForce RTX 4090 24Gb Msi Gami', 'Marca: MSI Modelo: GeForce RTX 4090 GAMING TRIO 24G P/N: 912-V510-095 UPC/EAN: 824142302910 / 4711377019231 Chipset: NVIDIA GeForce RTX 4090 Coolers: 3Pci Express: PCIe 4.0DirectX: 12 Ultimate OpenGl: 4.6 Memoria: GDDR6X 24GB Bits: 384CUDA Cores: 16384 Core Clock: 2535 MHz (MSI Center) Mem Clock: 21 Gbps Alimen. Suple: 1 x 16-pinFuente optima: 700w Vga: No Dvi: No Hdmi: 1 Display Port: 3Máximos displays soportados: 4 Perfil Bajo: No Backplate: Si Dimensiones: 337 x 140 x 77 mmSlots PCI-e: 3,7 Iluminacion: Si', 'Placas Graficas', 999999.00, 32250.87, '10', 1, 'jpeg'),
(18, 'Placa De Video GeForce RTX 4090 24Gb Msi Supr', 'Marca: MSI Modelo: GeForce RTX 4090 SUPRIM LIQUID X 24G P/N: 912-V510-007 UPC/EAN: 824142302903 / 4711377019224 Chipset: NVIDIA GeForce RTX 4090 Coolers: 3 Pci Express: PCIe 4.0 DirectX: 12 Ultimate OpenGl: 4.6 Memoria: GDDR6X 24GB Bits: 384CUDA Cores: 16384Core Clock: 2640 MHz (MSI Center) Mem Clock: 21 Gbps Alimen. Suple: 1 x 16-pin Fuente optima: 1000w Vga: No Dvi: No Hdmi: 1 Display Port: 3Máximos displays soportados: 4 Perfil Bajo: No Backplate: Si Dimensiones: TarjetaSlots PCI-e: 1 Iluminacion: No', 'Placas Graficas', 985000.00, 0.00, NULL, 0, '');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
