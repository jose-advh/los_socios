-- Crear la tabla USUARIO
CREATE TABLE USUARIOS (
    Id VARCHAR(20) PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    Apellido VARCHAR(50) NOT NULL,
    Direccion VARCHAR(100),
    Telefono VARCHAR(20),
    Email VARCHAR(100) UNIQUE NOT NULL,
    Estado ENUM('Activo', 'Inactivo', 'Suspendido', 'Vedado') NOT NULL,
    cargo VARCHAR(10),
    Password VARCHAR(255) NOT NULL
);

-- Crear la tabla JOYAS
CREATE TABLE JOYAS (
    Codigo VARCHAR(20) PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    Diseño VARCHAR(100),
    Peso DECIMAL(10, 2),
    Fecha_Creacion DATE,
    Material VARCHAR(50),
    Valor DECIMAL(10, 2) NOT NULL,
    img_url VARCHAR(250)
);

-- Crear la tabla VENTAS
CREATE TABLE VENTAS (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Identificacion_Cliente VARCHAR(20),
    Codigo_Joya VARCHAR(20),
    Fecha_Venta DATE NOT NULL,
    Fecha_Devolucion DATE,
    Estado ENUM('Activa', 'Cancelada', 'Anulada') NOT NULL,
    Cantidad INT NOT NULL,
    Valor_Unitario DECIMAL(10, 2) NOT NULL,
    Subtotal DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (Identificacion_Cliente) REFERENCES USUARIOS(Id),
    FOREIGN KEY (Codigo_Joya) REFERENCES JOYAS(Codigo)
);

-- Datos Admin

INSERT INTO `usuarios`(`Id`, `Nombre`, `Apellido`, `Direccion`, `Telefono`, `Email`, `Estado`, `Password`, `cargo`) VALUES ('1','Admin','Jesus','Centro Inca','000','admin@gmail.com','Activo','admin123', 'admin');

INSERT INTO `usuarios`(`Id`, `Nombre`, `Apellido`, `Direccion`, `Telefono`, `Email`, `Estado`, `Password`, `cargo`) VALUES ('2','Usuario','Alex','Centro Inca','123','usuario@gmail.com','Inactivo','usuario123', 'cliente');

INSERT INTO `joyas`(`Codigo`, `Nombre`, `Diseño`, `Peso`, `Fecha_Creacion`, `Material`, `Valor`, `img_url`) VALUES ('111','Argolla Versace','Bañada en Oro 18k','25','2024-03-02','Oro','2700000','../uploads/argolla_versace.webp');

INSERT INTO `joyas`(`Codigo`, `Nombre`, `Diseño`, `Peso`, `Fecha_Creacion`, `Material`, `Valor`, `img_url`) VALUES ('222','Pulsera Cubana','Ligero','10','2023-01-05','Oro','400000','../uploads/pulsera_t-x3.webp');

INSERT INTO `joyas`(`Codigo`, `Nombre`, `Diseño`, `Peso`, `Fecha_Creacion`, `Material`, `Valor`, `img_url`) VALUES ('333','Tobillera Corazones','Ligero, amoroso','15','2024-05-06','Oro','1000000','../uploads/tobillera_corazone.webp');

