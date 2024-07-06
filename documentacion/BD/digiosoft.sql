/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100432
 Source Host           : localhost:3306
 Source Schema         : digiosoft

 Target Server Type    : MySQL
 Target Server Version : 100432
 File Encoding         : 65001

 Date: 06/07/2024 16:26:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cat_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `cat_usuarios`;
CREATE TABLE `cat_usuarios`  (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contraseña` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecharegistro` date NOT NULL,
  `activo` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idusuario`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cat_usuarios
-- ----------------------------
INSERT INTO `cat_usuarios` VALUES (1, 'principal', 'Pr1ncipal.', '2024-07-05', 'S');

SET FOREIGN_KEY_CHECKS = 1;
