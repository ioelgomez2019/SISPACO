/*
 Navicat Premium Data Transfer

 Source Server         : host
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : db_tienda_v6

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 10/05/2024 01:41:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for acc_estrategica
-- ----------------------------
DROP TABLE IF EXISTS `acc_estrategica`;
CREATE TABLE `acc_estrategica`  (
  `idaccestr` int NOT NULL AUTO_INCREMENT,
  `accionestr` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `codigoaei` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `obj_estrategico_idobjestr` int NOT NULL,
  PRIMARY KEY (`idaccestr`) USING BTREE,
  INDEX `fk_acc_estrategica_obj_estrategico1_idx`(`obj_estrategico_idobjestr` ASC) USING BTREE,
  CONSTRAINT `fk_acc_estrategica_obj_estrategico1` FOREIGN KEY (`obj_estrategico_idobjestr`) REFERENCES `obj_estrategico` (`idobjestr`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for actividad
-- ----------------------------
DROP TABLE IF EXISTS `actividad`;
CREATE TABLE `actividad`  (
  `idcodigo_act` int NOT NULL AUTO_INCREMENT,
  `nombre_act` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `programa_pre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `codigo_pp` int NOT NULL,
  `desc_act_ope` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `desc_cua_met` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `responsable` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `registropoi_idregistro` int NOT NULL,
  `programa_pre_idprograma_pre` int NOT NULL,
  PRIMARY KEY (`idcodigo_act`) USING BTREE,
  INDEX `fk_actividad_registropoi1_idx`(`registropoi_idregistro` ASC) USING BTREE,
  INDEX `fk_actividad_programa_pre1_idx`(`programa_pre_idprograma_pre` ASC) USING BTREE,
  CONSTRAINT `fk_actividad_programa_pre1` FOREIGN KEY (`programa_pre_idprograma_pre`) REFERENCES `programa_pre` (`idprograma_pre`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_actividad_registropoi1` FOREIGN KEY (`registropoi_idregistro`) REFERENCES `registropoi` (`idregistro`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for centro_costo
-- ----------------------------
DROP TABLE IF EXISTS `centro_costo`;
CREATE TABLE `centro_costo`  (
  `idcentrocosto` int NOT NULL,
  `nomcentrocosto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int NULL DEFAULT NULL,
  PRIMARY KEY (`idcentrocosto`) USING BTREE,
  UNIQUE INDEX `NomCentroCosto`(`nomcentrocosto` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for cuadro_necesidades
-- ----------------------------
DROP TABLE IF EXISTS `cuadro_necesidades`;
CREATE TABLE `cuadro_necesidades`  (
  `idNecesidad` int NOT NULL AUTO_INCREMENT,
  `requerimiento` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `espe_gas_cod` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `espe_gas_nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `unidad_med` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `cantidad` int NOT NULL,
  `costo_unitario` float NOT NULL,
  `gastoMES` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `actividad_codActividad` int NOT NULL,
  `insumos_idrequerimientos` int NOT NULL,
  PRIMARY KEY (`idNecesidad`) USING BTREE,
  INDEX `fk_cuadro_necesidades_actividad1_idx`(`actividad_codActividad` ASC) USING BTREE,
  INDEX `fk_cuadro_necesidades_insumos1_idx`(`insumos_idrequerimientos` ASC) USING BTREE,
  CONSTRAINT `fk_cuadro_necesidades_actividad1` FOREIGN KEY (`actividad_codActividad`) REFERENCES `actividad` (`idcodigo_act`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_cuadro_necesidades_insumos1` FOREIGN KEY (`insumos_idrequerimientos`) REFERENCES `insumos` (`idrequerimientos`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for detalle_temp
-- ----------------------------
DROP TABLE IF EXISTS `detalle_temp`;
CREATE TABLE `detalle_temp`  (
  `iddetalle_temp` int NOT NULL AUTO_INCREMENT,
  `Precio` decimal(11, 2) NOT NULL,
  `cantidad` int NOT NULL,
  `token` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `insumos_CodInsumo` int NOT NULL,
  PRIMARY KEY (`iddetalle_temp`) USING BTREE,
  INDEX `fk_detalle_temp_insumos1_idx`(`insumos_CodInsumo` ASC) USING BTREE,
  CONSTRAINT `fk_detalle_temp_insumos1` FOREIGN KEY (`insumos_CodInsumo`) REFERENCES `insumos2` (`CodInsumo`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for indicadoraei
-- ----------------------------
DROP TABLE IF EXISTS `indicadoraei`;
CREATE TABLE `indicadoraei`  (
  `idindicadoraei` int NOT NULL AUTO_INCREMENT,
  `nombreaei` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `acc_estrategica_idaccestr` int NOT NULL,
  PRIMARY KEY (`idindicadoraei`) USING BTREE,
  INDEX `fk_indicadoraei_acc_estrategica1_idx`(`acc_estrategica_idaccestr` ASC) USING BTREE,
  CONSTRAINT `fk_indicadoraei_acc_estrategica1` FOREIGN KEY (`acc_estrategica_idaccestr`) REFERENCES `acc_estrategica` (`idaccestr`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for indicadoroei
-- ----------------------------
DROP TABLE IF EXISTS `indicadoroei`;
CREATE TABLE `indicadoroei`  (
  `idindicadoroei` int NOT NULL AUTO_INCREMENT,
  `nombreoei` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `obj_estrategico_idobjestr` int NOT NULL,
  PRIMARY KEY (`idindicadoroei`) USING BTREE,
  INDEX `fk_indicadoroei_obj_estrategico1_idx`(`obj_estrategico_idobjestr` ASC) USING BTREE,
  CONSTRAINT `fk_indicadoroei_obj_estrategico1` FOREIGN KEY (`obj_estrategico_idobjestr`) REFERENCES `obj_estrategico` (`idobjestr`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for insumos
-- ----------------------------
DROP TABLE IF EXISTS `insumos`;
CREATE TABLE `insumos`  (
  `idrequerimientos` int NOT NULL AUTO_INCREMENT,
  `requerimiento` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `espe_identificador` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `espe_nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `unid_medida` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `costo_uni` float NULL DEFAULT NULL,
  PRIMARY KEY (`idrequerimientos`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for insumos2
-- ----------------------------
DROP TABLE IF EXISTS `insumos2`;
CREATE TABLE `insumos2`  (
  `CodInsumo` int NOT NULL AUTO_INCREMENT,
  `CatProducto` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `DesProducto` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `UnidadMed` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `costoUnitario` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `EspGasto` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`CodInsumo`) USING BTREE,
  UNIQUE INDEX `EspGasto`(`EspGasto` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for modulo
-- ----------------------------
DROP TABLE IF EXISTS `modulo`;
CREATE TABLE `modulo`  (
  `idmodulo` bigint NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int NOT NULL DEFAULT 1,
  PRIMARY KEY (`idmodulo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for obj_estrategico
-- ----------------------------
DROP TABLE IF EXISTS `obj_estrategico`;
CREATE TABLE `obj_estrategico`  (
  `idobjestr` int NOT NULL AUTO_INCREMENT,
  `nomobjestr` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `codoe` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`idobjestr`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permisos
-- ----------------------------
DROP TABLE IF EXISTS `permisos`;
CREATE TABLE `permisos`  (
  `idpermiso` bigint NOT NULL AUTO_INCREMENT,
  `rolid` bigint NOT NULL,
  `moduloid` bigint NOT NULL,
  `r` int NOT NULL DEFAULT 0,
  `w` int NOT NULL DEFAULT 0,
  `u` int NOT NULL DEFAULT 0,
  `d` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`idpermiso`) USING BTREE,
  INDEX `rolid`(`rolid` ASC) USING BTREE,
  INDEX `moduloid`(`moduloid` ASC) USING BTREE,
  CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulo` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 434 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for persona
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona`  (
  `idpersona` bigint NOT NULL AUTO_INCREMENT,
  `identificacion` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombres` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellidos` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefono` bigint NOT NULL,
  `email_user` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `nit` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombrefiscal` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `direccionfiscal` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `rolid` bigint NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT 1,
  `area` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`idpersona`) USING BTREE,
  INDEX `rolid`(`rolid` ASC) USING BTREE,
  CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for programa_pre
-- ----------------------------
DROP TABLE IF EXISTS `programa_pre`;
CREATE TABLE `programa_pre`  (
  `idprograma_pre` int NOT NULL AUTO_INCREMENT,
  `nombre_pp` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cod_pp` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`idprograma_pre`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for registropoi
-- ----------------------------
DROP TABLE IF EXISTS `registropoi`;
CREATE TABLE `registropoi`  (
  `idregistro` int NOT NULL AUTO_INCREMENT,
  `centrocosto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `objestrinst` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `codigooe` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `indicadoroe` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `unidmedidaoe` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `metaoe` int NOT NULL,
  `accestrinst` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `codigoae` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `indicadorae` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `unidmedidaae` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `metaae` int NOT NULL,
  `persona_idpersona` bigint NOT NULL,
  `centro_costo_idcentrocosto` int NOT NULL,
  `obj_estrategico_idobjestr` int NOT NULL,
  `acc_estrategica_idaccestr` int NOT NULL,
  PRIMARY KEY (`idregistro`) USING BTREE,
  INDEX `fk_registropoi_persona1_idx`(`persona_idpersona` ASC) USING BTREE,
  INDEX `fk_registropoi_centro_costo1_idx`(`centro_costo_idcentrocosto` ASC) USING BTREE,
  INDEX `fk_registropoi_obj_estrategico1_idx`(`obj_estrategico_idobjestr` ASC) USING BTREE,
  INDEX `fk_registropoi_acc_estrategica1_idx`(`acc_estrategica_idaccestr` ASC) USING BTREE,
  CONSTRAINT `fk_registropoi_acc_estrategica1` FOREIGN KEY (`acc_estrategica_idaccestr`) REFERENCES `acc_estrategica` (`idaccestr`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_registropoi_centro_costo1` FOREIGN KEY (`centro_costo_idcentrocosto`) REFERENCES `centro_costo` (`idcentrocosto`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_registropoi_obj_estrategico1` FOREIGN KEY (`obj_estrategico_idobjestr`) REFERENCES `obj_estrategico` (`idobjestr`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_registropoi_persona1` FOREIGN KEY (`persona_idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rol
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol`  (
  `idrol` bigint NOT NULL AUTO_INCREMENT,
  `nombrerol` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int NOT NULL DEFAULT 1,
  PRIMARY KEY (`idrol`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for unidad_medidaaei
-- ----------------------------
DROP TABLE IF EXISTS `unidad_medidaaei`;
CREATE TABLE `unidad_medidaaei`  (
  `idunidad_medidaaei` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `indicadoraei_idindicadoraei` int NOT NULL,
  PRIMARY KEY (`idunidad_medidaaei`) USING BTREE,
  UNIQUE INDEX `indicadoraei_idindicadoraei_UNIQUE`(`indicadoraei_idindicadoraei` ASC) USING BTREE,
  INDEX `fk_unidad_medidaaei_indicadoraei1_idx`(`indicadoraei_idindicadoraei` ASC) USING BTREE,
  CONSTRAINT `fk_unidad_medidaaei_indicadoraei1` FOREIGN KEY (`indicadoraei_idindicadoraei`) REFERENCES `indicadoraei` (`idindicadoraei`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for unidad_medidaoei
-- ----------------------------
DROP TABLE IF EXISTS `unidad_medidaoei`;
CREATE TABLE `unidad_medidaoei`  (
  `idunidad_medidaoei` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `indicadoroei_idindicadoroei` int NOT NULL,
  PRIMARY KEY (`idunidad_medidaoei`) USING BTREE,
  UNIQUE INDEX `indicadoroei_idindicadoroei_UNIQUE`(`indicadoroei_idindicadoroei` ASC) USING BTREE,
  INDEX `fk_unidad_medidaoei_indicadoroei1_idx`(`indicadoroei_idindicadoroei` ASC) USING BTREE,
  CONSTRAINT `fk_unidad_medidaoei_indicadoroei1` FOREIGN KEY (`indicadoroei_idindicadoroei`) REFERENCES `indicadoroei` (`idindicadoroei`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
