

CREATE TABLE vehiculo(
    ID_vehiculo NUMBER GENERATED ALWAYS AS IDENTITY PRIMARY KEY NOT NULL,
    marca varchar2(30),
    modelo varchar2(30),
    anio number,
    tipo_ve varchar2(30),
    capacidad number,
    placa varchar2(10),
    estado varchar2(2)
);

CREATE TABLE repartidor(
    ID_repartidor NUMBER GENERATED ALWAYS AS IDENTITY PRIMARY KEY NOT NULL,
    ID_vehiculo number,
    nombre_rep varchar2(30),
    apellidos_rep varchar2(40),
    edad number,
    telefono number(10),

    CONSTRAINT fk_repartidor_vehiculo FOREIGN KEY (ID_vehiculo) REFERENCES vehiculo(ID_vehiculo)

);

CREATE TABLE destinatario(
    ID_destinatario NUMBER GENERATED ALWAYS AS IDENTITY PRIMARY KEY NOT NULL,
    nombre_des varchar2(30),
    apellidos_des varchar(40),
    calle varchar2(30),
    ciudad varchar2(30),
    estado varchar2(30),
    cp number(5),
    telefono number(10),
    correo varchar2(40)

);

CREATE TABLE almacen(
    ID_almacen NUMBER GENERATED ALWAYS AS IDENTITY PRIMARY KEY NOT NULL,
    capacidad number,
    calle varchar2(30),
    ciudad varchar2(30),
    estado varchar2(30),
    cp number(5)
);

CREATE TABLE empleado(
    ID_empleado NUMBER GENERATED ALWAYS AS IDENTITY PRIMARY KEY NOT NULL,
    nombre_emp varchar2(30),
    apellidos_emp varchar2(40),
    puesto varchar2(20),
    ID_almacen number,

    CONSTRAINT fk_empleado_almacen FOREIGN KEY (ID_almacen) REFERENCES almacen(ID_almacen)
);

CREATE TABLE paquetes(
    ID_paquete NUMBER GENERATED ALWAYS AS IDENTITY PRIMARY KEY NOT NULL,
    ID_destinatario number,
    ID_empleado number,
    ID_repartidor number,
    tipo_paquete varchar2(30),
    fecha_envio INTERVAL DAY TO SECOND,
    peso number,
    estado varchar2(30),
    fecha_entrega INTERVAL DAY TO SECOND,

    CONSTRAINT fk_paquete_destinatario FOREIGN KEY (ID_destinatario) REFERENCES destinatario(ID_destinatario),
    CONSTRAINT fk_paquete_empleado FOREIGN KEY (ID_empleado) REFERENCES empleado(ID_empleado),
    CONSTRAINT fk_paquete_repartidor FOREIGN KEY (ID_repartidor) REFERENCES repartidor(ID_repartidor)

);
