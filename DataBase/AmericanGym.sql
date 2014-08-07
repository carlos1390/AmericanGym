/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     20/01/2014 9:21:29 p. m.                     */
/*==============================================================*/


drop table if exists BIOTIPO;

drop table if exists CARTERA;

drop table if exists CONCEPTOCARTERA;

drop table if exists DEFICIENCIASCORPORALES;

drop table if exists DEFICIENCIASDEPERSONA;

drop table if exists DEPARTAMENTO;

drop table if exists EPS;

drop table if exists GENERO;

drop table if exists HORARIO;

drop table if exists MEDIDA;

drop table if exists MUNICIPIO;

drop table if exists OCUPACION;

drop table if exists PERFIL;

drop table if exists PERSONA;

drop table if exists REGISTRODEMEDIDA;

drop table if exists TIPODOCUMENTO;

drop table if exists UNIDADDEMEDIDA;

drop table if exists USUARIO;

/*==============================================================*/
/* Table: BIOTIPO                                               */
/*==============================================================*/
create table BIOTIPO
(
   BIOTIPO_ID           int not null auto_increment,
   BIO_NOMBRE           varchar(50),
   primary key (BIOTIPO_ID)
)
ENGINE = InnoDB;

/*==============================================================*/
/* Table: CARTERA                                               */
/*==============================================================*/
create table CARTERA
(
   CARTERA_ID           int not null auto_increment,
   CONCEPTO_ID          int,
   NUMERODOCUMENTO      varchar(20),
   FECHACARTERA         date,
   ABONO                decimal(18,2),
   SALDO                decimal(18,2),
   primary key (CARTERA_ID)
)
ENGINE = InnoDB;

/*==============================================================*/
/* Table: CONCEPTOCARTERA                                       */
/*==============================================================*/
create table CONCEPTOCARTERA
(
   CONCEPTO_ID          int not null auto_increment,
   NOMBRE               varchar(50),
   TOTALCONCEPTO        decimal(18,2),
   primary key (CONCEPTO_ID)
)
ENGINE = InnoDB;

/*==============================================================*/
/* Table: DEFICIENCIASCORPORALES                                */
/*==============================================================*/
create table DEFICIENCIASCORPORALES
(
   DEFICIENCIA_ID       int not null auto_increment,
   NOMBRE               varchar(50),
   primary key (DEFICIENCIA_ID)
)
ENGINE = InnoDB;

/*==============================================================*/
/* Table: DEFICIENCIASDEPERSONA                                 */
/*==============================================================*/
create table DEFICIENCIASDEPERSONA
(
   NUMERODOCUMENTO      varchar(20) not null,
   DEFICIENCIA_ID       int not null,
   primary key (NUMERODOCUMENTO, DEFICIENCIA_ID)
)
ENGINE = InnoDB;

/*==============================================================*/
/* Table: DEPARTAMENTO                                          */
/*==============================================================*/
create table DEPARTAMENTO
(
   DEPARTAMENTO_ID      int not null auto_increment,
   DEP_NOMBRE           varchar(50),
   primary key (DEPARTAMENTO_ID)
)
ENGINE = InnoDB;

/*==============================================================*/
/* Table: EPS                                                   */
/*==============================================================*/
create table EPS
(
   EPS_ID               int not null auto_increment,
   EPS_NOMBRE           varchar(50),
   primary key (EPS_ID)
)
ENGINE = InnoDB;

/*==============================================================*/
/* Table: GENERO                                                */
/*==============================================================*/
create table GENERO
(
   GENERO_ID            int not null auto_increment,
   GEN_NOMBRE           varchar(50),
   primary key (GENERO_ID)
)
ENGINE = InnoDB;

/*==============================================================*/
/* Table: HORARIO                                               */
/*==============================================================*/
create table HORARIO
(
   HORARIO_ID           int not null auto_increment,
   HOR_NOMBRE           varchar(50),
   HORA_INICIO          time,
   HORA_FIN             time,
   primary key (HORARIO_ID)
)
ENGINE = InnoDB;

/*==============================================================*/
/* Table: MEDIDA                                                */
/*==============================================================*/
create table MEDIDA
(
   MEDIDA_ID            int not null auto_increment,
   UNIDAD_ID            int,
   MEDIDA_NOMBRE        varchar(50),
   primary key (MEDIDA_ID)
);

/*==============================================================*/
/* Table: MUNICIPIO                                             */
/*==============================================================*/
create table MUNICIPIO
(
   MUNICIPIO_ID         int not null auto_increment,
   DEPARTAMENTO_ID      int,
   NOMBRE               varchar(50),
   primary key (MUNICIPIO_ID)
)
ENGINE = InnoDB;

/*==============================================================*/
/* Table: OCUPACION                                             */
/*==============================================================*/
create table OCUPACION
(
   OCUPACION_ID         int not null auto_increment,
   OCU_NOMBRE           varchar(50),
   primary key (OCUPACION_ID)
)
ENGINE = InnoDB;

/*==============================================================*/
/* Table: PERFIL                                                */
/*==============================================================*/
create table PERFIL
(
   PERFIL_ID            int not null auto_increment,
   PER_NOMBRE           varchar(50),
   VALOR                int,
   primary key (PERFIL_ID)
)
ENGINE = InnoDB;

/*==============================================================*/
/* Table: PERSONA                                               */
/*==============================================================*/
create table PERSONA
(
   NUMERODOCUMENTO      varchar(20) not null,
   MUNICIPIO_ID         int,
   GENERO_ID            int,
   TIPODOCUMENTO_ID     int,
   PERFIL_ID            int,
   EPS_ID               int,
   OCUPACION_ID         int,
   HORARIO_ID           int,
   BIOTIPO_ID           int,
   NOMBRES              varchar(50),
   APELLIDOS            varchar(50),
   FECHA_NACIMIENTO     date,
   DIRECCION            varchar(100),
   TELEFONOPERSONAL     varchar(20),
   TELEFONOACUDIENTE    varchar(20),
   ESTADOCIVIL          varchar(20),
   FECHA_INGRESO        date,
   OBJETIVO             varchar(250),
   FOTOGRAFIA           varchar(100),
   CORREOELECTRONICO    varchar(60),
   GRUPOSANGUINEO       varchar(10),
   OBSERVACIONES        varchar(250),
   primary key (NUMERODOCUMENTO)
)
ENGINE = InnoDB;

/*==============================================================*/
/* Table: REGISTRODEMEDIDA                                      */
/*==============================================================*/
create table REGISTRODEMEDIDA
(
   REGISTRO_ID          int not null auto_increment,
   FECHA                date,
   NUMERODOCUMENTO      varchar(20),
   MEDIDA_ID            int,
   VALOR                varchar(20),
   primary key (REGISTRO_ID)
)
ENGINE = InnoDB;

/*==============================================================*/
/* Table: TIPODOCUMENTO                                         */
/*==============================================================*/
create table TIPODOCUMENTO
(
   TIPODOCUMENTO_ID     int not null auto_increment,
   TIP_NOMBRE           varchar(50),
   primary key (TIPODOCUMENTO_ID)
)
ENGINE = InnoDB;

/*==============================================================*/
/* Table: UNIDADDEMEDIDA                                        */
/*==============================================================*/
create table UNIDADDEMEDIDA
(
   UNIDAD_ID            int not null auto_increment,
   NOMBRE               varchar(50),
   primary key (UNIDAD_ID)
)
ENGINE = InnoDB;

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   NUMERODOCUMENTO      varchar(20) not null,
   NOMBREUSUARIO        varchar(80),
   CONTRASENA           varchar(50),
   primary key (NUMERODOCUMENTO)
)
ENGINE = InnoDB;

alter table CARTERA add constraint FK_REFERENCE_1 foreign key (CONCEPTO_ID)
      references CONCEPTOCARTERA (CONCEPTO_ID) on delete restrict on update restrict;

alter table CARTERA add constraint FK_REFERENCE_5 foreign key (NUMERODOCUMENTO)
      references PERSONA (NUMERODOCUMENTO) on delete restrict on update restrict;

alter table DEFICIENCIASDEPERSONA add constraint FK_REFERENCE_16 foreign key (NUMERODOCUMENTO)
      references PERSONA (NUMERODOCUMENTO) on delete restrict on update restrict;

alter table DEFICIENCIASDEPERSONA add constraint FK_REFERENCE_17 foreign key (DEFICIENCIA_ID)
      references DEFICIENCIASCORPORALES (DEFICIENCIA_ID) on delete restrict on update restrict;

alter table MEDIDA add constraint FK_REFERENCE_18 foreign key (UNIDAD_ID)
      references UNIDADDEMEDIDA (UNIDAD_ID) on delete restrict on update restrict;

alter table MUNICIPIO add constraint FK_REFERENCE_2 foreign key (DEPARTAMENTO_ID)
      references DEPARTAMENTO (DEPARTAMENTO_ID) on delete restrict on update restrict;

alter table PERSONA add constraint FK_REFERENCE_11 foreign key (PERFIL_ID)
      references PERFIL (PERFIL_ID) on delete restrict on update restrict;

alter table PERSONA add constraint FK_REFERENCE_12 foreign key (EPS_ID)
      references EPS (EPS_ID) on delete restrict on update restrict;

alter table PERSONA add constraint FK_REFERENCE_13 foreign key (OCUPACION_ID)
      references OCUPACION (OCUPACION_ID) on delete restrict on update restrict;

alter table PERSONA add constraint FK_REFERENCE_14 foreign key (HORARIO_ID)
      references HORARIO (HORARIO_ID) on delete restrict on update restrict;

alter table PERSONA add constraint FK_REFERENCE_15 foreign key (BIOTIPO_ID)
      references BIOTIPO (BIOTIPO_ID) on delete restrict on update restrict;

alter table PERSONA add constraint FK_REFERENCE_4 foreign key (MUNICIPIO_ID)
      references MUNICIPIO (MUNICIPIO_ID) on delete restrict on update restrict;

alter table PERSONA add constraint FK_REFERENCE_7 foreign key (GENERO_ID)
      references GENERO (GENERO_ID) on delete restrict on update restrict;

alter table PERSONA add constraint FK_REFERENCE_8 foreign key (TIPODOCUMENTO_ID)
      references TIPODOCUMENTO (TIPODOCUMENTO_ID) on delete restrict on update restrict;

alter table REGISTRODEMEDIDA add constraint FK_REFERENCE_19 foreign key (MEDIDA_ID)
      references MEDIDA (MEDIDA_ID) on delete restrict on update restrict;

alter table REGISTRODEMEDIDA add constraint FK_REFERENCE_6 foreign key (NUMERODOCUMENTO)
      references PERSONA (NUMERODOCUMENTO) on delete restrict on update restrict;

alter table USUARIO add constraint FK_REFERENCE_10 foreign key (NUMERODOCUMENTO)
      references PERSONA (NUMERODOCUMENTO) on delete restrict on update restrict;

