/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.32-MariaDB : Database - innovatesisperu_v1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`innovatesisperu_v1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `innovatesisperu_v1`;

/*Table structure for table `blog` */

DROP TABLE IF EXISTS `blog`;

CREATE TABLE `blog` (
  `ID_BLOG` int(11) NOT NULL AUTO_INCREMENT,
  `PORTADA_BLOG` varchar(500) DEFAULT NULL,
  `TITULO` varchar(255) DEFAULT NULL,
  `DESCRIPCION` longtext DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT NULL,
  `FECHA_MODIFICACION` datetime DEFAULT NULL,
  `FECHA_ELIMINACION` datetime DEFAULT NULL,
  `FECHA_RESTAURACION` timestamp NULL DEFAULT NULL,
  `AUTOR` varchar(45) NOT NULL,
  `COMENTARIO` text NOT NULL,
  `ESTADO` varchar(45) DEFAULT NULL,
  `ID_EMPRESA` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_BLOG`),
  KEY `ID_EMPRESA` (`ID_EMPRESA`),
  CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `empresa` (`ID_EMPRESA`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `blog` */

insert  into `blog`(`ID_BLOG`,`PORTADA_BLOG`,`TITULO`,`DESCRIPCION`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`AUTOR`,`COMENTARIO`,`ESTADO`,`ID_EMPRESA`) values (1,'Asesoramiento_de_Tesis_50.jpg','Asesoria de tesis','<h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><span style=\"font-family: \"Courier New\";\">Cómo redactar las recomendaciones de una tesis [Método fácil]</span></h1><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Te enseño cómo redactar las recomendaciones de una <a href=\"https://miasesordetesis.com/definicion-de-tesis-universitaria/\" style=\"-webkit-tap-highlight-color: transparent; color: rgb(233, 30, 99); text-decoration: none; transition: all 0.3s ease 0s;\">tesis</a>, de una manera fácil y rápida.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Si después de mucho sacrificio has llegado a la parte final de tu tesis y tienes los capítulos terminados, pero te faltan las conclusiones y recomendaciones y no sabes cómo hacerlas, este artículo es para ti. En este artículo trataré de las recomendaciones. Y si quieres aprender acerca de las conclusiones, puedes hacer click <a href=\"https://miasesordetesis.com/conclusiones-de-una-tesis/\" style=\"-webkit-tap-highlight-color: transparent; color: rgb(233, 30, 99); text-decoration: none; transition: all 0.3s ease 0s;\">aquí</a>.</p></h1><h2 class=\"has-accent-color has-text-color\" style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(233, 30, 99); margin-bottom: 15px; font-size: 37px;\">Qué contiene la sección Recomendaciones<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h2><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Es una de las partes finales de una tesis que<strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\"> contiene las sugerencias emitidas por el autor o los autore</strong>s de una tesis, relacionadas a acciones que podrían realizar personas u organizaciones en función de los hallazgos y resultados de su investigación.</p></h1><h2 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 37px;\"><span class=\"ez-toc-section\" id=\"%C2%BFEs_indispensable_tener_recomendaciones_en_mi_tesis\" ez-toc-data-id=\"#¿Es_indispensable_tener_recomendaciones_en_mi_tesis\" style=\"-webkit-tap-highlight-color: transparent;\"></span><span class=\"tadv-color\" style=\"-webkit-tap-highlight-color: transparent; color: rgb(233, 30, 99);\">¿Es indispensable tener recomendaciones en mi tesis?</span><span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h2><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">En general, las tesis contienen recomendaciones y se presentan en la sección denominada “Conclusiones y recomendaciones”. En muchos casos es una exigencia explícita de la universidad y por lo tanto se debe incluir. Sin embargo, no necesariamente todo trabajo de investigación debe recomendación alguna.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Por otra parte, en algunos casos, en realidad pocos, las conclusiones y recomendaciones se redactan sin hacer distinción una de la otra.</p></h1><h2 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 37px;\"><span class=\"ez-toc-section\" id=\"Clasificacion_de_las_recomendaciones\" ez-toc-data-id=\"#Clasificacion_de_las_recomendaciones\" style=\"-webkit-tap-highlight-color: transparent;\"></span><span class=\"tadv-color\" style=\"-webkit-tap-highlight-color: transparent; color: rgb(233, 30, 99);\">Clasificación de las recomendaciones</span><span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h2><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Las recomendaciones de una tesis pueden clasificarse en metodológicas, académicas y prácticas.</p></h1><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"A_Recomendaciones_metodologicas\" ez-toc-data-id=\"#A_Recomendaciones_metodologicas\" style=\"-webkit-tap-highlight-color: transparent;\"></span>A. Recomendaciones metodológicas<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Son recomendaciones relacionadas con la metodología utilizada en el estudio, en diferentes aspectos tales como: enfoque, alcance, diseño, unidad de investigación, población, selección y aplicación de instrumentos, desarrollo de instrumentos. Para que sean aplicados en otros estudios o para que en estudios similares se apliquen metodologías diferentes.</p></h1><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"B_Recomendaciones_academicas\" ez-toc-data-id=\"#B_Recomendaciones_academicas\" style=\"-webkit-tap-highlight-color: transparent;\"></span>B. Recomendaciones académicas<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Son sugerencias relacionadas a la importancia de <strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">seguir investigando el tema desarrollado </strong>en tu tesis, explicando las razones. Específicamente se trata de temas de:</p><ul style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 30px; line-height: 1.618; font-size: 18px; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><li style=\"-webkit-tap-highlight-color: transparent;\">Relacionadas a <strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">una brecha o vacío de conocimiento</strong> encontrado en la investigación, para los siguientes casos:<ul style=\"-webkit-tap-highlight-color: transparent; line-height: 1.618;\"><li style=\"-webkit-tap-highlight-color: transparent;\">Es posible que se haya encontrado un cierto ángulo en la literatura y observe que todavía no se ha investigado otro ángulo con la literatura.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Se han identificado nuevos vacíos en los conocimientos o nuevos problemas de la práctica y proponer nuevas interrogantes para la investigación.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Explicar la necesidad de llenar ciertos vacíos que quizás no pueda cubrir en este momento por cualquier motivo</li></ul></li></ul><ul style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 30px; line-height: 1.618; font-size: 18px; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><li style=\"-webkit-tap-highlight-color: transparent;\">Cuando en la investigación no se pudo abordar todos los puntos principales de su tema.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Cuando la investigación no ha sido tan profunda y se recomienda hacerlo más a fondo en un estudio posterior.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Se han encontrado puntos en su investigación que no estaban dentro del alcance de su investigación.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Se presentan y discuten las acciones que los futuros investigadores deberían tomar como resultado de su Proyecto.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Se necesita una i<strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">nvestigación adicional</strong> para facilitar el avance de un estudio. Sus planes de investigación podrían incluir un análisis de los métodos de estudio que podrían funcionar en el futuro y qué puntos sobre un tema podrían revisarse en dichos estudios.</li></ul></h1><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"C_Recomendaciones_practicas\" ez-toc-data-id=\"#C_Recomendaciones_practicas\" style=\"-webkit-tap-highlight-color: transparent;\"></span>C. Recomendaciones prácticas<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Si tu investigación es aplicada a una empresa, organización, sector económico, etc.; es importante considerar en las recomendaciones propuestas enfocadas en ese sujeto de estudio, tanto para incluir nuevos elementos de interés para la solución de la problemática abordada, como para desarrollar mejoras o correcciones o ajustes en algunos aspectos. También para implementar la solución propuesta.</p></h1><h2 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 37px;\"><span class=\"ez-toc-section\" id=\"%C2%BFDe_donde_extraer_las_recomendaciones_de_una_tesis\" ez-toc-data-id=\"#¿De_donde_extraer_las_recomendaciones_de_una_tesis\" style=\"-webkit-tap-highlight-color: transparent;\"></span><span class=\"tadv-color\" style=\"-webkit-tap-highlight-color: transparent; color: rgb(233, 30, 99);\">¿De dónde extraer las recomendaciones de una tesis?</span><span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h2><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">En general, las recomendaciones <strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">nunca deben surgir de la nada</strong>, y pueden ser extraídas o creadas de tres fuentes:</p></h1><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"A_De_las_conclusiones\" ez-toc-data-id=\"#A_De_las_conclusiones\" style=\"-webkit-tap-highlight-color: transparent;\"></span>A. De las conclusiones<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">De cada conclusión podría obtenerse una recomendación.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Ejemplo:</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Objetivo general:</strong> Elaborar un plan de negocio de comida saludable y determinar su viabilidad.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Conclusión: </strong>Se elaboró el plan de negocio para el restaurante especializado en comida saludable, y se determino su viabilidad comercial, técnica y financiera.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Recomendación:</strong> Dada las condiciones favorables del entorno, y el hecho de tener una idea de negocio única en el mercado y con una alta demanda potencial, se recomienda implementar el negocio en el plazo más breve posible.</p></h1><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"B_De_los_hallazgos\" ez-toc-data-id=\"#B_De_los_hallazgos\" style=\"-webkit-tap-highlight-color: transparent;\"></span>B. De los hallazgos<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Se podría vincular cada una de sus recomendaciones con el hallazgo que las respalda, para resaltar la conexión directa entre la evaluación y la acción. Para ello, puedes utilizar <strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">una tabla de dos columnas</strong>: el hallazgo y la recomendación respectiva.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Ejemplo: Marketing de contenidos en la decisión de compra online de entradas para el cine.</strong></p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Objetivo específico:</strong> Determinar si existe influencia del marketing de contenidos en la etapa de venta de la decisión de compra online de entradas para el cine.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Hallazgo:</strong> En la etapa de venta, el hecho que reciba contenido actualizado, relevante y de calidad en las redes sociales no hace que su experiencia sea buena para la mayoría de los millennials. Asimismo, las estrategias de interacción en las redes sociales no inducen a efectuar la compra. En ambos casos la explicación <strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">puede estar en el hecho que no se necesitan de estas estrategia</strong>s porque muchos de ellos<br style=\"-webkit-tap-highlight-color: transparent;\">ya decidieron qué película ver y adónde ir desde que tuvieron conocimiento de la película y por lo tanto no les interesa la información que reciben de los cines, o también a que el contenido no es relevante o de calidad para ellos.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Recomendación:</strong> Profundizar el estudio acerca de la influencia del marketing de contenidos en la etapa de venta de la decisión de compra online de entradas y verificar si efectivamente no se necesitan de esta estrategia.</p></h1><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"C_De_las_limitaciones\" ez-toc-data-id=\"#C_De_las_limitaciones\" style=\"-webkit-tap-highlight-color: transparent;\"></span>C. De las limitaciones<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Otra forma de generar recomendaciones <strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">es considerar las limitaciones que quedaron al final del estudio.</strong> ¿Qué limitaciones encontraste? ¿Pudiste tener éxito con lo que te propusiste? Lo más probable es que no lo fuera así, por causas ajenas y que no podías controlar, lo que pudo ocasionar el desvío de los resultados. Por ello, podrías generar recomendaciones a partir de estas limitaciones.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">El propósito de este tipo de recomendaciones es permitir que futuros investigadores continúen la investigación que no pudiste continuar.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Ejemplo: Impacto de la calidad de servicio en la lealtad de los clientes.</strong></p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Objetivo general:</strong> Analizar la relación entre la calidad de servicio y la lealtad de los clientes.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Limitación:</strong> Por razones de fuerza mayor solamente se pudo lograr encuestar al 50% de la cantidad de personas definida como muestra, por ello los resultados presentados, si bien brindan información que se puede tener en cuenta, pero no son confiables.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Recomendación:</strong> Desarrollar un trabajo con los mismos objetivos pero asegurándose de lograr encuestar a la cantidad definida como muestra.</p></h1><h2 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 37px;\"><span class=\"ez-toc-section\" id=\"Pautas_para_redactar_las_recomendaciones_de_una_tesis\" ez-toc-data-id=\"#Pautas_para_redactar_las_recomendaciones_de_una_tesis\" style=\"-webkit-tap-highlight-color: transparent;\"></span><span class=\"tadv-color\" style=\"-webkit-tap-highlight-color: transparent; color: rgb(233, 30, 99);\">Pautas para redactar las recomendaciones de una tesis</span><span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h2><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"Aspectos_de_fondo\" ez-toc-data-id=\"#Aspectos_de_fondo\" style=\"-webkit-tap-highlight-color: transparent;\"></span>Aspectos de fondo<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><ul style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 30px; line-height: 1.618; font-size: 18px; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><li style=\"-webkit-tap-highlight-color: transparent;\">Para redactar las recomendaciones, es muy útil considera r los tipos de recomendaciones mencionados en el acápite clasificación de las recomendaciones y analizar cuáles de ellos se pueden aplicar para su tesis.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Asegúrate de tener recomendaciones claras que sean fáciles de seguir y que se puedan utilizar correctamente.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Mientras escribas las recomendaciones, observa lo que has obtenido en tu estudio y, al mismo tiempo, piensa en las posibles ideas para estudios de investigación posteriores.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Explica los beneficios. Siempre puedes mencionar los beneficios de estudios adicionales en tu campo. Habla acerca de cómo los estudios futuros podrían usarse para corregir problemas con la investigación actual que has completado.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Al escribir las recomendaciones, puedes hablar sobre los pasos que se deben seguir en futuros estudios. Estos incluyen pasos que son necesarios para implementar acciones particulares que desea seguir. También se puede explicar acerca de cualquier recurso que se requiera en el proceso.</li></ul></h1><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"Aspectos_de_forma\" ez-toc-data-id=\"#Aspectos_de_forma\" style=\"-webkit-tap-highlight-color: transparent;\"></span>Aspectos de forma<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><ul style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 30px; line-height: 1.618; font-size: 18px; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><li style=\"-webkit-tap-highlight-color: transparent;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Deben escribirse en orden de prioridad</strong>. Las más importantes para los tomadores de decisiones deben ir primero. Sin embargo, si las recomendaciones son de igual importancia, entonces deben venir en la secuencia en que se aborda el tema en la investigación.</li><li style=\"-webkit-tap-highlight-color: transparent;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Extensión de las recomendaciones</strong>. En general, la sección recomendaciones puede tener una extensión aproximada de una página.</li><li style=\"-webkit-tap-highlight-color: transparent;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Ubicación de las recomendaciones. </strong>En general, suele incluirse después de las conclusiones. Pero, podría variar, si en la guía de presentación de tesis de la universidad indican otra ubicación.</li><li style=\"-webkit-tap-highlight-color: transparent;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">El uso de viñetas ofrece una </strong><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">mayor </strong>claridad en lugar de utilizar párrafos largos.</li></ul></h1><h2 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 37px;\"><span class=\"ez-toc-section\" id=\"Pasos_para_redactar_recomendaciones\" ez-toc-data-id=\"#Pasos_para_redactar_recomendaciones\" style=\"-webkit-tap-highlight-color: transparent;\"></span><span class=\"tadv-color\" style=\"-webkit-tap-highlight-color: transparent; color: rgb(233, 30, 99);\">Pasos para redactar recomendaciones</span><span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h2><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"Paso_1_Hacer_la_lista_inicial_de_recomendaciones\" ez-toc-data-id=\"#Paso_1_Hacer_la_lista_inicial_de_recomendaciones\" style=\"-webkit-tap-highlight-color: transparent;\"></span>Paso 1: Hacer la lista inicial de recomendaciones<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">En este paso, siguiendo las pautas de los tipos de recomendaciones y de dónde extraerlas, se debe formular recomendaciones, de la siguiente manera:</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">A. De acuerdo al tipo de recomendaciones</strong></p><figure class=\"wp-block-image size-large\" style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 1em; max-width: 100%; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px;\"><picture style=\"-webkit-tap-highlight-color: transparent;\"><source srcset=\"https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-tipos-1024x198.jpg.webp 1024w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-tipos-300x58.jpg.webp 300w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-tipos-768x149.jpg.webp 768w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-tipos.jpg.webp 1339w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" type=\"image/webp\" style=\"-webkit-tap-highlight-color: transparent;\"><img loading=\"lazy\" width=\"1024\" height=\"198\" src=\"https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-tipos-1024x198.jpg\" alt=\"\" class=\"wp-image-1775 webpexpress-processed\" srcset=\"https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-tipos-1024x198.jpg 1024w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-tipos-300x58.jpg 300w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-tipos-768x149.jpg 768w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-tipos.jpg 1339w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"-webkit-tap-highlight-color: transparent; border: 0px; max-width: 100%; height: auto;\"></picture></figure><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">B. Según el origen de las recomendaciones</strong></p><figure class=\"wp-block-image size-large\" style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 1em; max-width: 100%; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px;\"><picture style=\"-webkit-tap-highlight-color: transparent;\"><source srcset=\"https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-origen-1024x198.jpg.webp 1024w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-origen-300x58.jpg.webp 300w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-origen-768x149.jpg.webp 768w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-origen.jpg.webp 1339w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" type=\"image/webp\" style=\"-webkit-tap-highlight-color: transparent;\"><img loading=\"lazy\" width=\"1024\" height=\"198\" src=\"https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-origen-1024x198.jpg\" alt=\"\" class=\"wp-image-1776 webpexpress-processed\" srcset=\"https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-origen-1024x198.jpg 1024w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-origen-300x58.jpg 300w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-origen-768x149.jpg 768w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-origen.jpg 1339w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"-webkit-tap-highlight-color: transparent; border: 0px; max-width: 100%; height: auto;\"></picture></figure></h1><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"Paso_2_Seleccionar_las_recomendaciones_mas_importantes\" ez-toc-data-id=\"#Paso_2_Seleccionar_las_recomendaciones_mas_importantes\" style=\"-webkit-tap-highlight-color: transparent;\"></span>Paso 2: Seleccionar las recomendaciones más importantes<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">En esta etapa, para seleccionar las recomendaciones más adecuadas, te sugiero seguir las siguientes pautas:</p><ol style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 30px; line-height: 1.618; font-size: 18px; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><li style=\"-webkit-tap-highlight-color: transparent;\">Ordena las recomendaciones según prioridades, de mayor a menor.</li><li style=\"-webkit-tap-highlight-color: transparent;\">De la lista ordenada, analiza cuáles de ellas pueden ser las recomendaciones de mayor valor. Para ello puedes utilizar los siguientes criterios de evaluación: valor para la comunidad académica, novedad del tema, actualidad del tema, necesidad e importancia de su estudio, etc.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Selecciona al menos 4 recomendaciones</li></ol><figure class=\"wp-block-image size-large\" style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 1em; max-width: 100%; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px;\"><picture style=\"-webkit-tap-highlight-color: transparent;\"><source srcset=\"https://miasesordetesis.com/wp-content/uploads/2023/03/prioridades-1-1024x241.jpg.webp 1024w, https://miasesordetesis.com/wp-content/uploads/2023/03/prioridades-1-300x71.jpg.webp 300w, https://miasesordetesis.com/wp-content/uploads/2023/03/prioridades-1-768x181.jpg.webp 768w, https://miasesordetesis.com/wp-content/uploads/2023/03/prioridades-1.jpg.webp 1339w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" type=\"image/webp\" style=\"-webkit-tap-highlight-color: transparent;\"><img loading=\"lazy\" width=\"1024\" height=\"241\" src=\"https://miasesordetesis.com/wp-content/uploads/2023/03/prioridades-1-1024x241.jpg\" alt=\"\" class=\"wp-image-1780 webpexpress-processed\" srcset=\"https://miasesordetesis.com/wp-content/uploads/2023/03/prioridades-1-1024x241.jpg 1024w, https://miasesordetesis.com/wp-content/uploads/2023/03/prioridades-1-300x71.jpg 300w, https://miasesordetesis.com/wp-content/uploads/2023/03/prioridades-1-768x181.jpg 768w, https://miasesordetesis.com/wp-content/uploads/2023/03/prioridades-1.jpg 1339w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"-webkit-tap-highlight-color: transparent; border: 0px; max-width: 100%; height: auto;\"></picture></figure></h1><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"Paso_3_Redactar_las_recomendaciones\" ez-toc-data-id=\"#Paso_3_Redactar_las_recomendaciones\" style=\"-webkit-tap-highlight-color: transparent;\"></span>Paso 3: Redactar las recomendaciones<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Ahora, cada una de las recomendaciones seleccionadas debes redactarla siguiendo las pautas presentadas antes.</p></h1><h2 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 37px;\"><span class=\"ez-toc-section\" id=\"Conclusion\" ez-toc-data-id=\"#Conclusion\" style=\"-webkit-tap-highlight-color: transparent;\"></span><span class=\"tadv-color\" style=\"-webkit-tap-highlight-color: transparent; color: rgb(233, 30, 99);\">Conclusión</span><span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h2><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><span style=\"-webkit-tap-highlight-color: transparent; font-size: revert; color: initial;\">Las recomendaciones de una tesis constituyen la última parte y muy importante de la tesis en la que se presentan las sugerencias del autor, relacionadas a acciones que podrían realizar personas u organizaciones.</span></p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Pueden ser de tipo metodológico, académico y práctico. Pueden ser obtenidas de las conclusiones, de los hallazgos y de las limitaciones el estudio.</p></h1><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><span style=\"font-family: \"Comic Sans MS\";\"><font color=\"#ff0000\"><br></font></span></h1>','2024-03-30 09:47:25','2024-04-05 10:19:09','2024-04-02 13:24:03','2024-04-02 13:25:01','MariaM','Este es mi primer post','Activo',1);
insert  into `blog`(`ID_BLOG`,`PORTADA_BLOG`,`TITULO`,`DESCRIPCION`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`AUTOR`,`COMENTARIO`,`ESTADO`,`ID_EMPRESA`) values (2,'Cómo_redactar_las_recomendaciones_de_una_tesis_[Método_fácil]_58.jpg','Cómo redactar las recomendaciones de una tesis [Método fácil]','<h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><span style=\"font-family: \"Courier New\";\">Cómo redactar las recomendaciones de una tesis [Método fácil]</span></h1><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Te enseño cómo redactar las recomendaciones de una <a href=\"https://miasesordetesis.com/definicion-de-tesis-universitaria/\" style=\"-webkit-tap-highlight-color: transparent; color: rgb(233, 30, 99); text-decoration: none; transition: all 0.3s ease 0s;\">tesis</a>, de una manera fácil y rápida.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Si después de mucho sacrificio has llegado a la parte final de tu tesis y tienes los capítulos terminados, pero te faltan las conclusiones y recomendaciones y no sabes cómo hacerlas, este artículo es para ti. En este artículo trataré de las recomendaciones. Y si quieres aprender acerca de las conclusiones, puedes hacer click <a href=\"https://miasesordetesis.com/conclusiones-de-una-tesis/\" style=\"-webkit-tap-highlight-color: transparent; color: rgb(233, 30, 99); text-decoration: none; transition: all 0.3s ease 0s;\">aquí</a>.</p></h1><h2 class=\"has-accent-color has-text-color\" style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(233, 30, 99); margin-bottom: 15px; font-size: 37px;\">Qué contiene la sección Recomendaciones<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h2><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Es una de las partes finales de una tesis que<strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\"> contiene las sugerencias emitidas por el autor o los autore</strong>s de una tesis, relacionadas a acciones que podrían realizar personas u organizaciones en función de los hallazgos y resultados de su investigación.</p></h1><h2 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 37px;\"><span class=\"ez-toc-section\" id=\"%C2%BFEs_indispensable_tener_recomendaciones_en_mi_tesis\" ez-toc-data-id=\"#¿Es_indispensable_tener_recomendaciones_en_mi_tesis\" style=\"-webkit-tap-highlight-color: transparent;\"></span><span class=\"tadv-color\" style=\"-webkit-tap-highlight-color: transparent; color: rgb(233, 30, 99);\">¿Es indispensable tener recomendaciones en mi tesis?</span><span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h2><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">En general, las tesis contienen recomendaciones y se presentan en la sección denominada “Conclusiones y recomendaciones”. En muchos casos es una exigencia explícita de la universidad y por lo tanto se debe incluir. Sin embargo, no necesariamente todo trabajo de investigación debe recomendación alguna.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Por otra parte, en algunos casos, en realidad pocos, las conclusiones y recomendaciones se redactan sin hacer distinción una de la otra.</p></h1><h2 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 37px;\"><span class=\"ez-toc-section\" id=\"Clasificacion_de_las_recomendaciones\" ez-toc-data-id=\"#Clasificacion_de_las_recomendaciones\" style=\"-webkit-tap-highlight-color: transparent;\"></span><span class=\"tadv-color\" style=\"-webkit-tap-highlight-color: transparent; color: rgb(233, 30, 99);\">Clasificación de las recomendaciones</span><span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h2><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Las recomendaciones de una tesis pueden clasificarse en metodológicas, académicas y prácticas.</p></h1><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"A_Recomendaciones_metodologicas\" ez-toc-data-id=\"#A_Recomendaciones_metodologicas\" style=\"-webkit-tap-highlight-color: transparent;\"></span>A. Recomendaciones metodológicas<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Son recomendaciones relacionadas con la metodología utilizada en el estudio, en diferentes aspectos tales como: enfoque, alcance, diseño, unidad de investigación, población, selección y aplicación de instrumentos, desarrollo de instrumentos. Para que sean aplicados en otros estudios o para que en estudios similares se apliquen metodologías diferentes.</p></h1><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"B_Recomendaciones_academicas\" ez-toc-data-id=\"#B_Recomendaciones_academicas\" style=\"-webkit-tap-highlight-color: transparent;\"></span>B. Recomendaciones académicas<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Son sugerencias relacionadas a la importancia de <strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">seguir investigando el tema desarrollado </strong>en tu tesis, explicando las razones. Específicamente se trata de temas de:</p><ul style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 30px; line-height: 1.618; font-size: 18px; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><li style=\"-webkit-tap-highlight-color: transparent;\">Relacionadas a <strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">una brecha o vacío de conocimiento</strong> encontrado en la investigación, para los siguientes casos:<ul style=\"-webkit-tap-highlight-color: transparent; line-height: 1.618;\"><li style=\"-webkit-tap-highlight-color: transparent;\">Es posible que se haya encontrado un cierto ángulo en la literatura y observe que todavía no se ha investigado otro ángulo con la literatura.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Se han identificado nuevos vacíos en los conocimientos o nuevos problemas de la práctica y proponer nuevas interrogantes para la investigación.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Explicar la necesidad de llenar ciertos vacíos que quizás no pueda cubrir en este momento por cualquier motivo</li></ul></li></ul><ul style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 30px; line-height: 1.618; font-size: 18px; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><li style=\"-webkit-tap-highlight-color: transparent;\">Cuando en la investigación no se pudo abordar todos los puntos principales de su tema.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Cuando la investigación no ha sido tan profunda y se recomienda hacerlo más a fondo en un estudio posterior.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Se han encontrado puntos en su investigación que no estaban dentro del alcance de su investigación.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Se presentan y discuten las acciones que los futuros investigadores deberían tomar como resultado de su Proyecto.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Se necesita una i<strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">nvestigación adicional</strong> para facilitar el avance de un estudio. Sus planes de investigación podrían incluir un análisis de los métodos de estudio que podrían funcionar en el futuro y qué puntos sobre un tema podrían revisarse en dichos estudios.</li></ul></h1><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"C_Recomendaciones_practicas\" ez-toc-data-id=\"#C_Recomendaciones_practicas\" style=\"-webkit-tap-highlight-color: transparent;\"></span>C. Recomendaciones prácticas<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Si tu investigación es aplicada a una empresa, organización, sector económico, etc.; es importante considerar en las recomendaciones propuestas enfocadas en ese sujeto de estudio, tanto para incluir nuevos elementos de interés para la solución de la problemática abordada, como para desarrollar mejoras o correcciones o ajustes en algunos aspectos. También para implementar la solución propuesta.</p></h1><h2 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 37px;\"><span class=\"ez-toc-section\" id=\"%C2%BFDe_donde_extraer_las_recomendaciones_de_una_tesis\" ez-toc-data-id=\"#¿De_donde_extraer_las_recomendaciones_de_una_tesis\" style=\"-webkit-tap-highlight-color: transparent;\"></span><span class=\"tadv-color\" style=\"-webkit-tap-highlight-color: transparent; color: rgb(233, 30, 99);\">¿De dónde extraer las recomendaciones de una tesis?</span><span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h2><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">En general, las recomendaciones <strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">nunca deben surgir de la nada</strong>, y pueden ser extraídas o creadas de tres fuentes:</p></h1><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"A_De_las_conclusiones\" ez-toc-data-id=\"#A_De_las_conclusiones\" style=\"-webkit-tap-highlight-color: transparent;\"></span>A. De las conclusiones<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">De cada conclusión podría obtenerse una recomendación.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Ejemplo:</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Objetivo general:</strong> Elaborar un plan de negocio de comida saludable y determinar su viabilidad.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Conclusión: </strong>Se elaboró el plan de negocio para el restaurante especializado en comida saludable, y se determino su viabilidad comercial, técnica y financiera.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Recomendación:</strong> Dada las condiciones favorables del entorno, y el hecho de tener una idea de negocio única en el mercado y con una alta demanda potencial, se recomienda implementar el negocio en el plazo más breve posible.</p></h1><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"B_De_los_hallazgos\" ez-toc-data-id=\"#B_De_los_hallazgos\" style=\"-webkit-tap-highlight-color: transparent;\"></span>B. De los hallazgos<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Se podría vincular cada una de sus recomendaciones con el hallazgo que las respalda, para resaltar la conexión directa entre la evaluación y la acción. Para ello, puedes utilizar <strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">una tabla de dos columnas</strong>: el hallazgo y la recomendación respectiva.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Ejemplo: Marketing de contenidos en la decisión de compra online de entradas para el cine.</strong></p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Objetivo específico:</strong> Determinar si existe influencia del marketing de contenidos en la etapa de venta de la decisión de compra online de entradas para el cine.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Hallazgo:</strong> En la etapa de venta, el hecho que reciba contenido actualizado, relevante y de calidad en las redes sociales no hace que su experiencia sea buena para la mayoría de los millennials. Asimismo, las estrategias de interacción en las redes sociales no inducen a efectuar la compra. En ambos casos la explicación <strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">puede estar en el hecho que no se necesitan de estas estrategia</strong>s porque muchos de ellos<br style=\"-webkit-tap-highlight-color: transparent;\">ya decidieron qué película ver y adónde ir desde que tuvieron conocimiento de la película y por lo tanto no les interesa la información que reciben de los cines, o también a que el contenido no es relevante o de calidad para ellos.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Recomendación:</strong> Profundizar el estudio acerca de la influencia del marketing de contenidos en la etapa de venta de la decisión de compra online de entradas y verificar si efectivamente no se necesitan de esta estrategia.</p></h1><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"C_De_las_limitaciones\" ez-toc-data-id=\"#C_De_las_limitaciones\" style=\"-webkit-tap-highlight-color: transparent;\"></span>C. De las limitaciones<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Otra forma de generar recomendaciones <strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">es considerar las limitaciones que quedaron al final del estudio.</strong> ¿Qué limitaciones encontraste? ¿Pudiste tener éxito con lo que te propusiste? Lo más probable es que no lo fuera así, por causas ajenas y que no podías controlar, lo que pudo ocasionar el desvío de los resultados. Por ello, podrías generar recomendaciones a partir de estas limitaciones.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">El propósito de este tipo de recomendaciones es permitir que futuros investigadores continúen la investigación que no pudiste continuar.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Ejemplo: Impacto de la calidad de servicio en la lealtad de los clientes.</strong></p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Objetivo general:</strong> Analizar la relación entre la calidad de servicio y la lealtad de los clientes.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Limitación:</strong> Por razones de fuerza mayor solamente se pudo lograr encuestar al 50% de la cantidad de personas definida como muestra, por ello los resultados presentados, si bien brindan información que se puede tener en cuenta, pero no son confiables.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Recomendación:</strong> Desarrollar un trabajo con los mismos objetivos pero asegurándose de lograr encuestar a la cantidad definida como muestra.</p></h1><h2 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 37px;\"><span class=\"ez-toc-section\" id=\"Pautas_para_redactar_las_recomendaciones_de_una_tesis\" ez-toc-data-id=\"#Pautas_para_redactar_las_recomendaciones_de_una_tesis\" style=\"-webkit-tap-highlight-color: transparent;\"></span><span class=\"tadv-color\" style=\"-webkit-tap-highlight-color: transparent; color: rgb(233, 30, 99);\">Pautas para redactar las recomendaciones de una tesis</span><span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h2><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"Aspectos_de_fondo\" ez-toc-data-id=\"#Aspectos_de_fondo\" style=\"-webkit-tap-highlight-color: transparent;\"></span>Aspectos de fondo<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><ul style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 30px; line-height: 1.618; font-size: 18px; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><li style=\"-webkit-tap-highlight-color: transparent;\">Para redactar las recomendaciones, es muy útil considera r los tipos de recomendaciones mencionados en el acápite clasificación de las recomendaciones y analizar cuáles de ellos se pueden aplicar para su tesis.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Asegúrate de tener recomendaciones claras que sean fáciles de seguir y que se puedan utilizar correctamente.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Mientras escribas las recomendaciones, observa lo que has obtenido en tu estudio y, al mismo tiempo, piensa en las posibles ideas para estudios de investigación posteriores.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Explica los beneficios. Siempre puedes mencionar los beneficios de estudios adicionales en tu campo. Habla acerca de cómo los estudios futuros podrían usarse para corregir problemas con la investigación actual que has completado.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Al escribir las recomendaciones, puedes hablar sobre los pasos que se deben seguir en futuros estudios. Estos incluyen pasos que son necesarios para implementar acciones particulares que desea seguir. También se puede explicar acerca de cualquier recurso que se requiera en el proceso.</li></ul></h1><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"Aspectos_de_forma\" ez-toc-data-id=\"#Aspectos_de_forma\" style=\"-webkit-tap-highlight-color: transparent;\"></span>Aspectos de forma<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><ul style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 30px; line-height: 1.618; font-size: 18px; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><li style=\"-webkit-tap-highlight-color: transparent;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Deben escribirse en orden de prioridad</strong>. Las más importantes para los tomadores de decisiones deben ir primero. Sin embargo, si las recomendaciones son de igual importancia, entonces deben venir en la secuencia en que se aborda el tema en la investigación.</li><li style=\"-webkit-tap-highlight-color: transparent;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Extensión de las recomendaciones</strong>. En general, la sección recomendaciones puede tener una extensión aproximada de una página.</li><li style=\"-webkit-tap-highlight-color: transparent;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">Ubicación de las recomendaciones. </strong>En general, suele incluirse después de las conclusiones. Pero, podría variar, si en la guía de presentación de tesis de la universidad indican otra ubicación.</li><li style=\"-webkit-tap-highlight-color: transparent;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">El uso de viñetas ofrece una </strong><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">mayor </strong>claridad en lugar de utilizar párrafos largos.</li></ul></h1><h2 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 37px;\"><span class=\"ez-toc-section\" id=\"Pasos_para_redactar_recomendaciones\" ez-toc-data-id=\"#Pasos_para_redactar_recomendaciones\" style=\"-webkit-tap-highlight-color: transparent;\"></span><span class=\"tadv-color\" style=\"-webkit-tap-highlight-color: transparent; color: rgb(233, 30, 99);\">Pasos para redactar recomendaciones</span><span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h2><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"Paso_1_Hacer_la_lista_inicial_de_recomendaciones\" ez-toc-data-id=\"#Paso_1_Hacer_la_lista_inicial_de_recomendaciones\" style=\"-webkit-tap-highlight-color: transparent;\"></span>Paso 1: Hacer la lista inicial de recomendaciones<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">En este paso, siguiendo las pautas de los tipos de recomendaciones y de dónde extraerlas, se debe formular recomendaciones, de la siguiente manera:</p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">A. De acuerdo al tipo de recomendaciones</strong></p><figure class=\"wp-block-image size-large\" style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 1em; max-width: 100%; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px;\"><picture style=\"-webkit-tap-highlight-color: transparent;\"><source srcset=\"https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-tipos-1024x198.jpg.webp 1024w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-tipos-300x58.jpg.webp 300w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-tipos-768x149.jpg.webp 768w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-tipos.jpg.webp 1339w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" type=\"image/webp\" style=\"-webkit-tap-highlight-color: transparent;\"><img loading=\"lazy\" width=\"1024\" height=\"198\" src=\"https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-tipos-1024x198.jpg\" alt=\"\" class=\"wp-image-1775 webpexpress-processed\" srcset=\"https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-tipos-1024x198.jpg 1024w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-tipos-300x58.jpg 300w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-tipos-768x149.jpg 768w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-tipos.jpg 1339w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"-webkit-tap-highlight-color: transparent; border: 0px; max-width: 100%; height: auto;\"></picture></figure><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"-webkit-tap-highlight-color: transparent; font-weight: bold;\">B. Según el origen de las recomendaciones</strong></p><figure class=\"wp-block-image size-large\" style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 1em; max-width: 100%; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px;\"><picture style=\"-webkit-tap-highlight-color: transparent;\"><source srcset=\"https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-origen-1024x198.jpg.webp 1024w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-origen-300x58.jpg.webp 300w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-origen-768x149.jpg.webp 768w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-origen.jpg.webp 1339w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" type=\"image/webp\" style=\"-webkit-tap-highlight-color: transparent;\"><img loading=\"lazy\" width=\"1024\" height=\"198\" src=\"https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-origen-1024x198.jpg\" alt=\"\" class=\"wp-image-1776 webpexpress-processed\" srcset=\"https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-origen-1024x198.jpg 1024w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-origen-300x58.jpg 300w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-origen-768x149.jpg 768w, https://miasesordetesis.com/wp-content/uploads/2023/03/recomendaciones-origen.jpg 1339w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"-webkit-tap-highlight-color: transparent; border: 0px; max-width: 100%; height: auto;\"></picture></figure></h1><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"Paso_2_Seleccionar_las_recomendaciones_mas_importantes\" ez-toc-data-id=\"#Paso_2_Seleccionar_las_recomendaciones_mas_importantes\" style=\"-webkit-tap-highlight-color: transparent;\"></span>Paso 2: Seleccionar las recomendaciones más importantes<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">En esta etapa, para seleccionar las recomendaciones más adecuadas, te sugiero seguir las siguientes pautas:</p><ol style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 30px; line-height: 1.618; font-size: 18px; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><li style=\"-webkit-tap-highlight-color: transparent;\">Ordena las recomendaciones según prioridades, de mayor a menor.</li><li style=\"-webkit-tap-highlight-color: transparent;\">De la lista ordenada, analiza cuáles de ellas pueden ser las recomendaciones de mayor valor. Para ello puedes utilizar los siguientes criterios de evaluación: valor para la comunidad académica, novedad del tema, actualidad del tema, necesidad e importancia de su estudio, etc.</li><li style=\"-webkit-tap-highlight-color: transparent;\">Selecciona al menos 4 recomendaciones</li></ol><figure class=\"wp-block-image size-large\" style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 1em; max-width: 100%; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px;\"><picture style=\"-webkit-tap-highlight-color: transparent;\"><source srcset=\"https://miasesordetesis.com/wp-content/uploads/2023/03/prioridades-1-1024x241.jpg.webp 1024w, https://miasesordetesis.com/wp-content/uploads/2023/03/prioridades-1-300x71.jpg.webp 300w, https://miasesordetesis.com/wp-content/uploads/2023/03/prioridades-1-768x181.jpg.webp 768w, https://miasesordetesis.com/wp-content/uploads/2023/03/prioridades-1.jpg.webp 1339w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" type=\"image/webp\" style=\"-webkit-tap-highlight-color: transparent;\"><img loading=\"lazy\" width=\"1024\" height=\"241\" src=\"https://miasesordetesis.com/wp-content/uploads/2023/03/prioridades-1-1024x241.jpg\" alt=\"\" class=\"wp-image-1780 webpexpress-processed\" srcset=\"https://miasesordetesis.com/wp-content/uploads/2023/03/prioridades-1-1024x241.jpg 1024w, https://miasesordetesis.com/wp-content/uploads/2023/03/prioridades-1-300x71.jpg 300w, https://miasesordetesis.com/wp-content/uploads/2023/03/prioridades-1-768x181.jpg 768w, https://miasesordetesis.com/wp-content/uploads/2023/03/prioridades-1.jpg 1339w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"-webkit-tap-highlight-color: transparent; border: 0px; max-width: 100%; height: auto;\"></picture></figure></h1><h3 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 32px;\"><span class=\"ez-toc-section\" id=\"Paso_3_Redactar_las_recomendaciones\" ez-toc-data-id=\"#Paso_3_Redactar_las_recomendaciones\" style=\"-webkit-tap-highlight-color: transparent;\"></span>Paso 3: Redactar las recomendaciones<span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h3><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Ahora, cada una de las recomendaciones seleccionadas debes redactarla siguiendo las pautas presentadas antes.</p></h1><h2 style=\"-webkit-tap-highlight-color: transparent; font-family: Roboto, Helvetica, Arial, sans-serif; line-height: 1.618; color: rgb(60, 72, 88); margin-bottom: 15px; font-size: 37px;\"><span class=\"ez-toc-section\" id=\"Conclusion\" ez-toc-data-id=\"#Conclusion\" style=\"-webkit-tap-highlight-color: transparent;\"></span><span class=\"tadv-color\" style=\"-webkit-tap-highlight-color: transparent; color: rgb(233, 30, 99);\">Conclusión</span><span class=\"ez-toc-section-end\" style=\"-webkit-tap-highlight-color: transparent;\"></span></h2><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\"><span style=\"-webkit-tap-highlight-color: transparent; font-size: revert; color: initial;\">Las recomendaciones de una tesis constituyen la última parte y muy importante de la tesis en la que se presentan las sugerencias del autor, relacionadas a acciones que podrían realizar personas u organizaciones.</span></p><p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 15px; font-size: 18px; line-height: 1.618; color: rgb(60, 72, 88); font-family: Roboto, Helvetica, Arial, sans-serif;\">Pueden ser de tipo metodológico, académico y práctico. Pueden ser obtenidas de las conclusiones, de los hallazgos y de las limitaciones el estudio.</p></h1><h1 class=\"hestia-title entry-title\" style=\"-webkit-tap-highlight-color: transparent; margin-top: 20px; margin-bottom: 10px; line-height: 1.4; word-break: break-word; overflow-wrap: break-word;\"><span style=\"font-family: \"Comic Sans MS\";\"><font color=\"#ff0000\"><br></font></span></h1>','2024-04-05 10:12:48','2024-04-05 10:52:37',NULL,NULL,'MariaM','este es mi segundo post','Activo',1);
insert  into `blog`(`ID_BLOG`,`PORTADA_BLOG`,`TITULO`,`DESCRIPCION`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`AUTOR`,`COMENTARIO`,`ESTADO`,`ID_EMPRESA`) values (10,'Probando_Un_Nuevo_Blog_96.jpg','Probando Un Nuevo Blog','Prueba','2024-04-20 08:02:17',NULL,'2024-04-27 17:33:10','2024-04-27 17:44:23','EdwarsIB','Este es un blog de prueba','Activo',1);

/*Table structure for table `comentarios` */

DROP TABLE IF EXISTS `comentarios`;

CREATE TABLE `comentarios` (
  `ID_COMENTARIO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_BLOG` int(11) NOT NULL,
  `COMENTARIO` text NOT NULL,
  `FECHA_CREACION` timestamp NULL DEFAULT NULL,
  `FECHA_MODIFICACION` timestamp NULL DEFAULT NULL,
  `FECHA_ELIMINACION` timestamp NULL DEFAULT NULL,
  `FECHA_RESTAURACION` timestamp NULL DEFAULT NULL,
  `ESTADO` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_COMENTARIO`),
  KEY `FK_USUARIO_COMENT` (`ID_USUARIO`),
  KEY `FK_BLOG_COMENT` (`ID_BLOG`),
  CONSTRAINT `FK_BLOG_COMENT` FOREIGN KEY (`ID_BLOG`) REFERENCES `blog` (`ID_BLOG`),
  CONSTRAINT `FK_USUARIO_COMENT` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `comentarios` */

insert  into `comentarios`(`ID_COMENTARIO`,`ID_USUARIO`,`ID_BLOG`,`COMENTARIO`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`) values (1,1,1,'ESTE ES EL PRIMER COMENTARIO DEL POST ','2024-04-16 12:32:07',NULL,NULL,NULL,'Activo');
insert  into `comentarios`(`ID_COMENTARIO`,`ID_USUARIO`,`ID_BLOG`,`COMENTARIO`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`) values (2,3,1,'MUY BUEN APORTE...','2024-04-16 16:17:06',NULL,NULL,NULL,'Activo');
insert  into `comentarios`(`ID_COMENTARIO`,`ID_USUARIO`,`ID_BLOG`,`COMENTARIO`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`) values (10,13,10,'NUEVO COMENTARIO,Actualizado.','2024-04-20 12:15:22','2024-04-20 14:29:39','2024-04-20 15:03:43',NULL,'Inactivo');
insert  into `comentarios`(`ID_COMENTARIO`,`ID_USUARIO`,`ID_BLOG`,`COMENTARIO`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`) values (11,13,10,'OTRO COMENTARIO','2024-04-20 12:18:24',NULL,'2024-04-20 15:03:38',NULL,'Inactivo');
insert  into `comentarios`(`ID_COMENTARIO`,`ID_USUARIO`,`ID_BLOG`,`COMENTARIO`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`) values (12,7,10,'funciona','2024-04-20 15:05:05',NULL,'2024-04-20 15:06:09',NULL,'Inactivo');
insert  into `comentarios`(`ID_COMENTARIO`,`ID_USUARIO`,`ID_BLOG`,`COMENTARIO`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`) values (13,7,10,'nuevo comentario','2024-04-20 15:06:26',NULL,'2024-04-20 15:06:30',NULL,'Inactivo');
insert  into `comentarios`(`ID_COMENTARIO`,`ID_USUARIO`,`ID_BLOG`,`COMENTARIO`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`) values (14,7,10,'funciona esto','2024-04-20 15:06:43',NULL,'2024-04-20 15:06:48',NULL,'Inactivo');
insert  into `comentarios`(`ID_COMENTARIO`,`ID_USUARIO`,`ID_BLOG`,`COMENTARIO`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`) values (15,7,10,'funciona','2024-04-20 15:07:04',NULL,'2024-04-20 15:07:30',NULL,'Inactivo');
insert  into `comentarios`(`ID_COMENTARIO`,`ID_USUARIO`,`ID_BLOG`,`COMENTARIO`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`) values (16,7,10,'nuevo comentario, actualizado','2024-04-20 15:10:05','2024-04-20 15:33:33','2024-04-20 15:33:40',NULL,'Activo');
insert  into `comentarios`(`ID_COMENTARIO`,`ID_USUARIO`,`ID_BLOG`,`COMENTARIO`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`) values (17,6,10,'Todo lo veo conforme','2024-04-22 11:49:59',NULL,'2024-04-27 18:48:47',NULL,'Inactivo');
insert  into `comentarios`(`ID_COMENTARIO`,`ID_USUARIO`,`ID_BLOG`,`COMENTARIO`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`) values (18,3,2,'oki doky','2024-04-27 17:44:02',NULL,NULL,NULL,'Activo');
insert  into `comentarios`(`ID_COMENTARIO`,`ID_USUARIO`,`ID_BLOG`,`COMENTARIO`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`) values (19,6,10,'claro','2024-04-27 18:48:58',NULL,'2024-04-27 18:49:20',NULL,'Inactivo');
insert  into `comentarios`(`ID_COMENTARIO`,`ID_USUARIO`,`ID_BLOG`,`COMENTARIO`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`) values (20,6,10,'si tu lo dices','2024-04-27 18:49:29',NULL,NULL,NULL,'Activo');
insert  into `comentarios`(`ID_COMENTARIO`,`ID_USUARIO`,`ID_BLOG`,`COMENTARIO`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`) values (21,6,10,'realizamos otro comentario','2024-04-27 18:53:35',NULL,NULL,NULL,'Activo');

/*Table structure for table `empresa` */

DROP TABLE IF EXISTS `empresa`;

CREATE TABLE `empresa` (
  `ID_EMPRESA` int(11) NOT NULL AUTO_INCREMENT,
  `LOGO_EMPRESA` varchar(500) DEFAULT NULL,
  `RUC` varchar(15) DEFAULT NULL,
  `RAZON_SOCIAL` varchar(50) DEFAULT NULL,
  `ACTIVIDAD_ECONOMICA` varchar(500) DEFAULT NULL,
  `ACERCADE` text DEFAULT NULL,
  `DETALLES` text DEFAULT NULL,
  `DIRECCION` varchar(45) DEFAULT NULL,
  `TELEFONO` varchar(15) DEFAULT NULL,
  `CORREO` varchar(45) DEFAULT NULL,
  `S_FACEBOOK` varchar(45) DEFAULT NULL,
  `S_INSTAGRAM` varchar(45) DEFAULT NULL,
  `S_LINKEDIN` varchar(45) DEFAULT NULL,
  `S_TIKTOK` varchar(45) DEFAULT NULL,
  `S_YOUTUBE` varchar(80) DEFAULT NULL,
  `ESLOGAN` varchar(100) DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT NULL,
  `FECHA_MODIFICACION` datetime DEFAULT NULL,
  `FECHA_ELIMINIACION` datetime DEFAULT NULL,
  `FECHA_RESTAURACION` timestamp NULL DEFAULT NULL,
  `ESTADO` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_EMPRESA`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `empresa` */

insert  into `empresa`(`ID_EMPRESA`,`LOGO_EMPRESA`,`RUC`,`RAZON_SOCIAL`,`ACTIVIDAD_ECONOMICA`,`ACERCADE`,`DETALLES`,`DIRECCION`,`TELEFONO`,`CORREO`,`S_FACEBOOK`,`S_INSTAGRAM`,`S_LINKEDIN`,`S_TIKTOK`,`S_YOUTUBE`,`ESLOGAN`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINIACION`,`FECHA_RESTAURACION`,`ESTADO`) values (1,'logo.png','20610582568','INNOVA TESIS PERU E.I.R.L.',NULL,'En Innova Tesis Perú, nos enorgullecemos de ser líderes en el campo de la consultoría de tesis, brindando servicios excepcionales a estudiantes universitarios que buscan alcanzar el éxito académico en sus investigaciones. Con un equipo de expertos altamente capacitados y una pasión por la excelencia, estamos comprometidos a proporcionar un apoyo integral y personalizado a nuestros clientes en cada etapa de su proceso de tesis.Desarrollo del marco teórico,\nDiseño de la metodología de investigación,\nRecopilación y análisis de datos,\nRedacción y revisión de la tesis,\nPreparación de presentaciones y defensa oral,\nRevisión de formato y estilo,\nConsultoría personalizada,\nSoporte continuo y seguimiento,\nSeminarios y talleres.','En Innova Tesis Perú, nos enorgullecemos de ser líderes en el campo de la consultoría de tesis, brindando servicios excepcionales a estudiantes universitarios que buscan alcanzar el éxito académico en sus investigaciones. Con un equipo de expertos altamente capacitados y una pasión por la excelencia, estamos comprometidos a proporcionar un apoyo integral y personalizado a nuestros clientes en cada etapa de su proceso de tesis.','CAL.CAPITAN ORBEGOZO NRO. 19 LAMBAYEQUE - LAM','979 416 721','innovatesisp@gmail.com','https://www.facebook.com/innovatesisperu',NULL,NULL,'https://www.tiktok.com/@innovatesisperu?_t=8j',NULL,NULL,'2024-03-29 10:51:52',NULL,NULL,NULL,'Activo');

/*Table structure for table `equipo` */

DROP TABLE IF EXISTS `equipo`;

CREATE TABLE `equipo` (
  `ID_EQUIPO` int(11) NOT NULL AUTO_INCREMENT,
  `TITULO` varchar(45) DEFAULT NULL,
  `DESCRIPCION` text DEFAULT NULL,
  `FECHA_CREACION` timestamp NULL DEFAULT NULL,
  `FECHA_MODIFICACION` timestamp NULL DEFAULT NULL,
  `FECHA_ELIMINACION` timestamp NULL DEFAULT NULL,
  `FECHA_RESTAURACION` timestamp NULL DEFAULT NULL,
  `ESTADO` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_EQUIPO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `equipo` */

insert  into `equipo`(`ID_EQUIPO`,`TITULO`,`DESCRIPCION`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`) values (1,'Conoce a Nuestro Equipo','En nuestra organización, creemos firmemente que el éxito surge del talento, la diversidad y el compromiso de nuestro equipo. Cada miembro de nuestro equipo aporta una experiencia única y un conjunto de habilidades que enriquecen nuestra cultura y nos ayudan a alcanzar nuestros objetivos.','2024-03-29 10:51:52',NULL,NULL,NULL,'Estado');

/*Table structure for table `promociones` */

DROP TABLE IF EXISTS `promociones`;

CREATE TABLE `promociones` (
  `ID_PROMOCION` int(11) NOT NULL AUTO_INCREMENT,
  `FOTO_PROMOCION` varchar(100) DEFAULT NULL,
  `FOTO2` varchar(100) NOT NULL,
  `FOTO3` varchar(100) NOT NULL,
  `TITULO` varchar(45) DEFAULT NULL,
  `DESCRIPCION` longtext DEFAULT NULL,
  `PRECIO` decimal(10,2) DEFAULT NULL,
  `FECHA_INICIO_PROMOCION` datetime DEFAULT NULL,
  `FECHA_FIN_PROMOCION` datetime DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT NULL,
  `FECHA_MODIFICACION` datetime DEFAULT NULL,
  `FECHA_ELIMINACION` datetime DEFAULT NULL,
  `FECHA_RESTAURACION` timestamp NULL DEFAULT NULL,
  `ESTADO` varchar(45) DEFAULT NULL,
  `ESTADO_PROMO` varchar(45) DEFAULT NULL,
  `ID_SERVICIO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_PROMOCION`),
  KEY `ID_SERVICIO` (`ID_SERVICIO`),
  CONSTRAINT `promociones_ibfk_1` FOREIGN KEY (`ID_SERVICIO`) REFERENCES `servicios` (`ID_SERVICIO`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `promociones` */

insert  into `promociones`(`ID_PROMOCION`,`FOTO_PROMOCION`,`FOTO2`,`FOTO3`,`TITULO`,`DESCRIPCION`,`PRECIO`,`FECHA_INICIO_PROMOCION`,`FECHA_FIN_PROMOCION`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`,`ESTADO_PROMO`,`ID_SERVICIO`) values (1,'Asesoramiento_de_Tesis_98.jpg','Asesoramiento_de_Tesis_7.jpg','pooo_84.jpg','Asesoramiento de Tesis','Super Promocion',150.00,'2024-04-07 00:01:00','2024-04-12 12:00:00','2024-03-30 09:26:06','2024-04-10 19:33:06','2024-04-12 16:07:36','2024-04-12 16:11:36','Activo','Finalizado',1);
insert  into `promociones`(`ID_PROMOCION`,`FOTO_PROMOCION`,`FOTO2`,`FOTO3`,`TITULO`,`DESCRIPCION`,`PRECIO`,`FECHA_INICIO_PROMOCION`,`FECHA_FIN_PROMOCION`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`,`ESTADO_PROMO`,`ID_SERVICIO`) values (3,'Promocion_Prueba_62.jpg','Promocion_Prueba_37.jpg','Promocion_Prueba_42.jpg','Promocion Prueba','Nueva Promo',180.50,'2024-04-08 00:01:00','2024-04-17 23:59:00','2024-04-12 15:38:59','2024-04-12 15:46:29',NULL,NULL,'Activo','Finalizado',4);
insert  into `promociones`(`ID_PROMOCION`,`FOTO_PROMOCION`,`FOTO2`,`FOTO3`,`TITULO`,`DESCRIPCION`,`PRECIO`,`FECHA_INICIO_PROMOCION`,`FECHA_FIN_PROMOCION`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`,`ESTADO_PROMO`,`ID_SERVICIO`) values (4,'Asesoría_integral_de_tesis_-_Tecnicos_72.jpg','Asesoría_integral_de_tesis_-_Tecnicos_29.jpg','Asesoría_integral_de_tesis_-_Tecnicos_44.jpg','Asesoría integral de tesis - Tecnicos','nueva promo',999.99,'2024-04-08 00:05:00','2024-04-12 12:52:00','2024-04-12 15:49:03',NULL,NULL,NULL,'Activo','Finalizado',1);
insert  into `promociones`(`ID_PROMOCION`,`FOTO_PROMOCION`,`FOTO2`,`FOTO3`,`TITULO`,`DESCRIPCION`,`PRECIO`,`FECHA_INICIO_PROMOCION`,`FECHA_FIN_PROMOCION`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`,`ESTADO_PROMO`,`ID_SERVICIO`) values (5,'universitarios_15.jpg','universitarios_77.jpg','universitarios_91.jpg','universitarios','prueba',354.00,'2024-04-07 16:35:00','2024-04-13 16:36:00','2024-04-12 16:36:09',NULL,NULL,NULL,'Activo','Finalizado',1);

/*Table structure for table `reply_coment` */

DROP TABLE IF EXISTS `reply_coment`;

CREATE TABLE `reply_coment` (
  `id_reply` int(11) NOT NULL AUTO_INCREMENT,
  `USUARIO` varchar(45) NOT NULL,
  `ID_COMENTARIO` int(11) NOT NULL,
  `COMENTARIO` text NOT NULL,
  `FECHA_CREACION` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ESTADO` varchar(45) NOT NULL,
  PRIMARY KEY (`id_reply`),
  KEY `FK_REPLY_COMENT` (`ID_COMENTARIO`),
  CONSTRAINT `FK_REPLY_COMENT` FOREIGN KEY (`ID_COMENTARIO`) REFERENCES `comentarios` (`ID_COMENTARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `reply_coment` */

insert  into `reply_coment`(`id_reply`,`USUARIO`,`ID_COMENTARIO`,`COMENTARIO`,`FECHA_CREACION`,`ESTADO`) values (1,'AntoniaR',1,'COMO DICES??','2024-01-16 14:38:44','Activo');
insert  into `reply_coment`(`id_reply`,`USUARIO`,`ID_COMENTARIO`,`COMENTARIO`,`FECHA_CREACION`,`ESTADO`) values (2,'CristhianIB',1,'LO QUE ESTAS LLEYENDO','2024-04-16 12:12:02','Activo');
insert  into `reply_coment`(`id_reply`,`USUARIO`,`ID_COMENTARIO`,`COMENTARIO`,`FECHA_CREACION`,`ESTADO`) values (3,'AntoniaR',1,'PERO ESTAS EQUIVOCADO','2024-04-16 12:12:19','Activo');
insert  into `reply_coment`(`id_reply`,`USUARIO`,`ID_COMENTARIO`,`COMENTARIO`,`FECHA_CREACION`,`ESTADO`) values (4,'AntoniaR',1,'pinche bug','2024-04-16 17:49:03','Activo');
insert  into `reply_coment`(`id_reply`,`USUARIO`,`ID_COMENTARIO`,`COMENTARIO`,`FECHA_CREACION`,`ESTADO`) values (5,'AntoniaR',16,'Si es verdad...','2024-04-23 12:38:40','Activo');
insert  into `reply_coment`(`id_reply`,`USUARIO`,`ID_COMENTARIO`,`COMENTARIO`,`FECHA_CREACION`,`ESTADO`) values (6,'DannaeR',16,'te respondo a tu comentario','2024-04-22 11:46:16','Inactivo');
insert  into `reply_coment`(`id_reply`,`USUARIO`,`ID_COMENTARIO`,`COMENTARIO`,`FECHA_CREACION`,`ESTADO`) values (7,'DannaeR',16,'OTRO COMENTARIO...ACTUALIZADO','2024-04-22 11:50:11','Inactivo');
insert  into `reply_coment`(`id_reply`,`USUARIO`,`ID_COMENTARIO`,`COMENTARIO`,`FECHA_CREACION`,`ESTADO`) values (8,'EdwarsIB',17,'Correcto Todo esta donde debe estar','2024-04-23 12:40:40','Activo');
insert  into `reply_coment`(`id_reply`,`USUARIO`,`ID_COMENTARIO`,`COMENTARIO`,`FECHA_CREACION`,`ESTADO`) values (10,'DannaeR',16,'como?','2024-04-27 18:48:13','Inactivo');
insert  into `reply_coment`(`id_reply`,`USUARIO`,`ID_COMENTARIO`,`COMENTARIO`,`FECHA_CREACION`,`ESTADO`) values (11,'DannaeR',2,'tienes razon','2024-04-27 19:27:05','Activo');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `ID_ROL` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(45) DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT NULL,
  `FECHA_MODIFICACION` datetime DEFAULT NULL,
  `FECHA_ELIMINACION` datetime DEFAULT NULL,
  `FECHA_RESTAURACION` timestamp NULL DEFAULT NULL,
  `ESTADO` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_ROL`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `roles` */

insert  into `roles`(`ID_ROL`,`DESCRIPCION`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`) values (1,'Cliente','2024-03-29 10:51:52',NULL,'2024-04-27 16:02:03','2024-04-27 16:02:08','Activo');
insert  into `roles`(`ID_ROL`,`DESCRIPCION`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`) values (2,'Administrador','2024-03-29 10:51:52',NULL,'2024-04-27 14:09:09','2024-04-27 14:09:16','Activo');
insert  into `roles`(`ID_ROL`,`DESCRIPCION`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`) values (3,'Asesor','2024-03-29 10:51:52',NULL,NULL,NULL,'Activo');
insert  into `roles`(`ID_ROL`,`DESCRIPCION`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`) values (4,'Fundador','2024-03-29 10:51:52',NULL,NULL,NULL,'Activo');
insert  into `roles`(`ID_ROL`,`DESCRIPCION`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`) values (5,'RRHH','2024-03-29 10:51:52','2024-04-08 12:18:49','2024-04-27 12:57:31','2024-04-27 13:00:12','Activo');

/*Table structure for table `servicio_consumido` */

DROP TABLE IF EXISTS `servicio_consumido`;

CREATE TABLE `servicio_consumido` (
  `ID_SERVICIO_CONSUMIDO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_SERVICIO` int(11) DEFAULT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `FECHA_AQUICICION` datetime DEFAULT NULL,
  `ESTADO` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_SERVICIO_CONSUMIDO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `servicio_consumido` */

/*Table structure for table `servicios` */

DROP TABLE IF EXISTS `servicios`;

CREATE TABLE `servicios` (
  `ID_SERVICIO` int(11) NOT NULL AUTO_INCREMENT,
  `PORTADA_SERVICIO` varchar(100) DEFAULT NULL,
  `NOMBRE_SERVICIO` varchar(45) DEFAULT NULL,
  `DESCRIPCION` longtext DEFAULT NULL,
  `PRECIO` decimal(10,2) DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT NULL,
  `FECHA_MODIFICACION` datetime DEFAULT NULL,
  `FECHA_ELIMINACION` datetime DEFAULT NULL,
  `FECHA_RESTAURACION` timestamp NULL DEFAULT NULL,
  `ESTADO` varchar(45) DEFAULT NULL,
  `ID_EMPRESA` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_SERVICIO`),
  KEY `ID_EMPRESA` (`ID_EMPRESA`),
  CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `empresa` (`ID_EMPRESA`),
  CONSTRAINT `servicios_ibfk_2` FOREIGN KEY (`ID_BLOG`) REFERENCES `blog` (`ID_BLOG`),
  CONSTRAINT `servicios_ibfk_3` FOREIGN KEY (`ID_PROMOCION`) REFERENCES `promociones` (`ID_PROMOCION`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `servicios` */

insert  into `servicios`(`ID_SERVICIO`,`PORTADA_SERVICIO`,`NOMBRE_SERVICIO`,`DESCRIPCION`,`PRECIO`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`,`ID_EMPRESA`) values (1,'Asesoría_integral_de_tesis-titulación_28.jpg','Asesoría integral de tesis - Universitarios','Propuesta de tema de tesis (opcional – de acuerdo a requerimiento).\r\nEntregables/ avances de acuerdo a programación.\r\nCorrecciones hasta el término del curso.\r\nnuevo.',350.00,'2024-03-30 09:22:48','2024-04-05 09:57:36','2024-04-02 13:16:16','2024-04-02 13:16:39','Activo',1);
insert  into `servicios`(`ID_SERVICIO`,`PORTADA_SERVICIO`,`NOMBRE_SERVICIO`,`DESCRIPCION`,`PRECIO`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`,`ID_EMPRESA`) values (2,'Asesoría_integral_de_tesis_-_Universitarios_59.jpg','Asesoría integral de tesis - Tecnicos','Propuesta de tema de tesis (opcional – de acuerdo a requerimiento).\r\nEntregables/ avances de acuerdo a programación.\r\nCorrecciones hasta el término del curso.\r\nnuevo actualizacion.',350.00,'2024-03-31 16:14:53','2024-04-05 10:03:41',NULL,NULL,'Activo',1);
insert  into `servicios`(`ID_SERVICIO`,`PORTADA_SERVICIO`,`NOMBRE_SERVICIO`,`DESCRIPCION`,`PRECIO`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`,`ID_EMPRESA`) values (3,'Correcciones_37.jpg','Revisión de formato APA','levantamiento de observaciones, acorde a las especificaciones brindadas por el docente o asesor de la investigación.',350.00,'2024-03-31 16:18:22',NULL,NULL,NULL,'Activo',1);
insert  into `servicios`(`ID_SERVICIO`,`PORTADA_SERVICIO`,`NOMBRE_SERVICIO`,`DESCRIPCION`,`PRECIO`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`,`ID_EMPRESA`) values (4,'Preparación_para_la_sustentación_59.jpg','Preparación para la sustentación','(diapositivas y pautas), a través de sesiones virtuales de guía y orientación.',250.00,'2024-03-31 16:20:05',NULL,'2024-04-02 13:31:24','2024-04-02 13:55:22','Activo',1);

/*Table structure for table `testimonios` */

DROP TABLE IF EXISTS `testimonios`;

CREATE TABLE `testimonios` (
  `ID_TESTIMONIO` int(11) DEFAULT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_SERVICIO` int(11) DEFAULT NULL,
  `COMENTARIO` longtext DEFAULT NULL,
  `FECHA_PUBLICACION` datetime DEFAULT NULL,
  `FECHA_MODIFICACION` datetime DEFAULT NULL,
  `FECHA_ELIMINACION` datetime DEFAULT NULL,
  `FECHA_RESTAURACION` timestamp NULL DEFAULT NULL,
  `ESTADO` varchar(45) DEFAULT NULL,
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_SERVICIO` (`ID_SERVICIO`),
  CONSTRAINT `testimonios_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  CONSTRAINT `testimonios_ibfk_2` FOREIGN KEY (`ID_SERVICIO`) REFERENCES `servicios` (`ID_SERVICIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `testimonios` */

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `FOTO_PERFIL` varchar(500) DEFAULT NULL,
  `DNI` varchar(8) DEFAULT NULL,
  `NOMBRE` varchar(45) DEFAULT NULL,
  `APELLIDO` varchar(45) DEFAULT NULL,
  `SEXO` varchar(45) DEFAULT NULL,
  `FECHA_NACIMIENTO` date DEFAULT NULL,
  `ESTADO_CIVIL` varchar(45) DEFAULT NULL,
  `DIRECCION` varchar(60) DEFAULT NULL,
  `CORREO` varchar(50) DEFAULT NULL,
  `PROFESION` varchar(45) DEFAULT NULL,
  `CURRICULUM` varchar(100) DEFAULT NULL,
  `INFO_ADICIONAL` text DEFAULT NULL,
  `NUM_TELEFONICO` varchar(15) DEFAULT NULL,
  `USUARIO` varchar(45) DEFAULT NULL,
  `CONTRASENA` varchar(500) DEFAULT NULL,
  `S_TWITTER` text DEFAULT NULL,
  `S_FACEBOOK` text DEFAULT NULL,
  `S_INSTAGRAM` text DEFAULT NULL,
  `S_LINKEDIN` text DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT NULL,
  `FECHA_MODIFICACION` datetime DEFAULT NULL,
  `FECHA_ELIMINACION` datetime DEFAULT NULL,
  `FECHA_RESTAURACION` timestamp NULL DEFAULT NULL,
  `ESTADO` varchar(45) DEFAULT NULL,
  `USUARIO_CREADOR` varchar(100) DEFAULT NULL,
  `USUARIO_MODIFICADOR` varchar(100) DEFAULT NULL,
  `USUARIO_ELIMINADOR` varchar(100) DEFAULT NULL,
  `USUARIO_DALTA` varchar(100) DEFAULT NULL,
  `ID_ROL` int(11) DEFAULT NULL,
  `ID_EMPRESA` int(11) DEFAULT NULL,
  `ID_EQUIPO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  KEY `ID_ROL` (`ID_ROL`),
  KEY `ID_EMPRESA` (`ID_EMPRESA`),
  KEY `usuario_ibfk_3` (`ID_EQUIPO`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_ROL`) REFERENCES `roles` (`ID_ROL`),
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `empresa` (`ID_EMPRESA`),
  CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`ID_EQUIPO`) REFERENCES `equipo` (`ID_EQUIPO`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `usuario` */

insert  into `usuario`(`ID_USUARIO`,`FOTO_PERFIL`,`DNI`,`NOMBRE`,`APELLIDO`,`SEXO`,`FECHA_NACIMIENTO`,`ESTADO_CIVIL`,`DIRECCION`,`CORREO`,`PROFESION`,`CURRICULUM`,`INFO_ADICIONAL`,`NUM_TELEFONICO`,`USUARIO`,`CONTRASENA`,`S_TWITTER`,`S_FACEBOOK`,`S_INSTAGRAM`,`S_LINKEDIN`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`,`USUARIO_CREADOR`,`USUARIO_MODIFICADOR`,`USUARIO_ELIMINADOR`,`USUARIO_DALTA`,`ID_ROL`,`ID_EMPRESA`,`ID_EQUIPO`) values (1,'CristhianIB_26.jpg','45787214','CRISTHIAN','INFANTE BURE','Masculino','1998-04-25','Soltero(a)','Piura','cristhian.infante117@gmail.com','Desarrollo de Sistemas','','','486513206','CristhianIB','$2y$10$gZFhmlnYOcPVWRKyHdJE1.bGSGIFPvt.ksjCA9QT/NsRAHciM3lBm','','','','','2024-03-30 08:58:25','2024-04-05 11:59:04',NULL,NULL,'Activo','CristhianIB',NULL,NULL,NULL,2,1,1);
insert  into `usuario`(`ID_USUARIO`,`FOTO_PERFIL`,`DNI`,`NOMBRE`,`APELLIDO`,`SEXO`,`FECHA_NACIMIENTO`,`ESTADO_CIVIL`,`DIRECCION`,`CORREO`,`PROFESION`,`CURRICULUM`,`INFO_ADICIONAL`,`NUM_TELEFONICO`,`USUARIO`,`CONTRASENA`,`S_TWITTER`,`S_FACEBOOK`,`S_INSTAGRAM`,`S_LINKEDIN`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`,`USUARIO_CREADOR`,`USUARIO_MODIFICADOR`,`USUARIO_ELIMINADOR`,`USUARIO_DALTA`,`ID_ROL`,`ID_EMPRESA`,`ID_EQUIPO`) values (2,'Maria_73.png','89732132','Maria','Melendres Guarnizo','Femenino','2000-04-08','Conviviente','Piura','MariaMelendrez@gmail.com','Contadora','Maria_42.pdf','','987513235','MariaM','$2y$10$E1RdixWchuCkxiVMwj21L.n2pc5hlTpUk12Qm93ujrl65d7/wLvwe','','','','','2024-03-30 09:02:31','2024-04-06 15:26:56',NULL,NULL,'Activo','CristhianIB',NULL,NULL,NULL,3,1,1);
insert  into `usuario`(`ID_USUARIO`,`FOTO_PERFIL`,`DNI`,`NOMBRE`,`APELLIDO`,`SEXO`,`FECHA_NACIMIENTO`,`ESTADO_CIVIL`,`DIRECCION`,`CORREO`,`PROFESION`,`CURRICULUM`,`INFO_ADICIONAL`,`NUM_TELEFONICO`,`USUARIO`,`CONTRASENA`,`S_TWITTER`,`S_FACEBOOK`,`S_INSTAGRAM`,`S_LINKEDIN`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`,`USUARIO_CREADOR`,`USUARIO_MODIFICADOR`,`USUARIO_ELIMINADOR`,`USUARIO_DALTA`,`ID_ROL`,`ID_EMPRESA`,`ID_EQUIPO`) values (3,'EDWARS_53.jpg','78874531','EDWARS','INFANTE BURE','Masculino','2024-04-02','Soltero(a)','Piura','Edwars18@gmail.com','SOMMA','EDWARS_58.pdf','','486513206','EdwarsIB','$2y$10$E1RdixWchuCkxiVMwj21L.n2pc5hlTpUk12Qm93ujrl65d7/wLvwe',NULL,NULL,NULL,NULL,'2024-03-30 12:51:34','2024-04-12 18:14:40','2024-04-02 14:29:18','2024-04-02 14:29:30','Activo','CristhianIB',NULL,NULL,NULL,3,1,1);
insert  into `usuario`(`ID_USUARIO`,`FOTO_PERFIL`,`DNI`,`NOMBRE`,`APELLIDO`,`SEXO`,`FECHA_NACIMIENTO`,`ESTADO_CIVIL`,`DIRECCION`,`CORREO`,`PROFESION`,`CURRICULUM`,`INFO_ADICIONAL`,`NUM_TELEFONICO`,`USUARIO`,`CONTRASENA`,`S_TWITTER`,`S_FACEBOOK`,`S_INSTAGRAM`,`S_LINKEDIN`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`,`USUARIO_CREADOR`,`USUARIO_MODIFICADOR`,`USUARIO_ELIMINADOR`,`USUARIO_DALTA`,`ID_ROL`,`ID_EMPRESA`,`ID_EQUIPO`) values (4,'AntoniaR_47.jpg','25482465','ANTONIA','ROMERO CRUZ','Femenino','1998-04-10','Soltero(a)','Sullana - Piura','RomeroCruz@gmail.com','Diseño','','','651321387','AntoniaR','$2y$10$fz8W3zpGI66gtVt9ksjjDu6tFwLy63jIGFJdIa1VBXRT.fG7/wD9u','','','','','2024-03-30 14:25:19','2024-04-05 09:37:45',NULL,NULL,'Activo','CristhianIB',NULL,NULL,NULL,2,1,1);
insert  into `usuario`(`ID_USUARIO`,`FOTO_PERFIL`,`DNI`,`NOMBRE`,`APELLIDO`,`SEXO`,`FECHA_NACIMIENTO`,`ESTADO_CIVIL`,`DIRECCION`,`CORREO`,`PROFESION`,`CURRICULUM`,`INFO_ADICIONAL`,`NUM_TELEFONICO`,`USUARIO`,`CONTRASENA`,`S_TWITTER`,`S_FACEBOOK`,`S_INSTAGRAM`,`S_LINKEDIN`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`,`USUARIO_CREADOR`,`USUARIO_MODIFICADOR`,`USUARIO_ELIMINADOR`,`USUARIO_DALTA`,`ID_ROL`,`ID_EMPRESA`,`ID_EQUIPO`) values (6,'predefinido.png','89761321','Dannae','Ruiz Infante','Femenino','2001-04-12','Soltero(a)','Paita','DannaeRuiz@gmail.com','Desarollador de Software',NULL,'','984651325','DannaeR','$2y$10$KIvPXunVvJEh2jRmh5bSfu/LD2EpBkfunfa04KlC6.POnltzdFUoW','','','','','2024-04-02 15:11:41','2024-04-12 18:28:48','2024-04-20 09:08:00','2024-04-20 09:38:50','Activo','EdwarsIB',NULL,'EdwarsIB','EdwarsIB',1,1,1);
insert  into `usuario`(`ID_USUARIO`,`FOTO_PERFIL`,`DNI`,`NOMBRE`,`APELLIDO`,`SEXO`,`FECHA_NACIMIENTO`,`ESTADO_CIVIL`,`DIRECCION`,`CORREO`,`PROFESION`,`CURRICULUM`,`INFO_ADICIONAL`,`NUM_TELEFONICO`,`USUARIO`,`CONTRASENA`,`S_TWITTER`,`S_FACEBOOK`,`S_INSTAGRAM`,`S_LINKEDIN`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`,`USUARIO_CREADOR`,`USUARIO_MODIFICADOR`,`USUARIO_ELIMINADOR`,`USUARIO_DALTA`,`ID_ROL`,`ID_EMPRESA`,`ID_EQUIPO`) values (7,'predefinido.png',NULL,'Maria Fernanda','Campoverde Abad','Femenino','2000-06-15','Soltero(a)',NULL,'MaferCampo@gmail.com','Diseñadora',NULL,NULL,'897351687','MariaC','$2y$10$4H3bzLZzbASxPmnvh7188.lWuomiVogS0t4dDmU0Pf/zGojHfEm.G',NULL,NULL,NULL,NULL,'2024-04-02 15:26:14',NULL,'2024-04-20 09:08:23','2024-04-20 09:39:29','Activo','MariaM',NULL,'MariaM','MariaM',1,1,1);
insert  into `usuario`(`ID_USUARIO`,`FOTO_PERFIL`,`DNI`,`NOMBRE`,`APELLIDO`,`SEXO`,`FECHA_NACIMIENTO`,`ESTADO_CIVIL`,`DIRECCION`,`CORREO`,`PROFESION`,`CURRICULUM`,`INFO_ADICIONAL`,`NUM_TELEFONICO`,`USUARIO`,`CONTRASENA`,`S_TWITTER`,`S_FACEBOOK`,`S_INSTAGRAM`,`S_LINKEDIN`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`,`USUARIO_CREADOR`,`USUARIO_MODIFICADOR`,`USUARIO_ELIMINADOR`,`USUARIO_DALTA`,`ID_ROL`,`ID_EMPRESA`,`ID_EQUIPO`) values (12,'predefinido.png','61321687','YESICA VERONICA','RAMOS GUERRERO','Femenino','2000-04-12','Soltero(a)','Piura','Yesica@gmail.com','Diseño','','','987462135','YESICARG','$2y$10$ZntpVGI1llObdkG03m6vK.clgGEBvB8ukFJnhfQF60.itusyZjsU2','','','','','2024-04-13 12:58:52','2024-04-13 13:14:41','2024-04-20 10:18:54','2024-04-27 17:47:45','Activo','EdwarsIB',NULL,'EdwarsIB','EdwarsIB',1,1,1);
insert  into `usuario`(`ID_USUARIO`,`FOTO_PERFIL`,`DNI`,`NOMBRE`,`APELLIDO`,`SEXO`,`FECHA_NACIMIENTO`,`ESTADO_CIVIL`,`DIRECCION`,`CORREO`,`PROFESION`,`CURRICULUM`,`INFO_ADICIONAL`,`NUM_TELEFONICO`,`USUARIO`,`CONTRASENA`,`S_TWITTER`,`S_FACEBOOK`,`S_INSTAGRAM`,`S_LINKEDIN`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`,`USUARIO_CREADOR`,`USUARIO_MODIFICADOR`,`USUARIO_ELIMINADOR`,`USUARIO_DALTA`,`ID_ROL`,`ID_EMPRESA`,`ID_EQUIPO`) values (13,'predefinido.png','04412417','MARTIN ALBERTO','VIZCARRA CORNEJO','Masculino','1985-12-12','Soltero(a)','Lima','Vizcarra@gmail.com','Arquitecto','','','974612264','MARTINVC','$2y$10$KIvPXunVvJEh2jRmh5bSfu/LD2EpBkfunfa04KlC6.POnltzdFUoW','','','','','2024-04-13 13:04:42',NULL,'2024-04-20 09:09:21','2024-04-20 09:37:24','Activo','MariaM',NULL,'CristhianIB','CristhianIB',1,1,1);
insert  into `usuario`(`ID_USUARIO`,`FOTO_PERFIL`,`DNI`,`NOMBRE`,`APELLIDO`,`SEXO`,`FECHA_NACIMIENTO`,`ESTADO_CIVIL`,`DIRECCION`,`CORREO`,`PROFESION`,`CURRICULUM`,`INFO_ADICIONAL`,`NUM_TELEFONICO`,`USUARIO`,`CONTRASENA`,`S_TWITTER`,`S_FACEBOOK`,`S_INSTAGRAM`,`S_LINKEDIN`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`,`USUARIO_CREADOR`,`USUARIO_MODIFICADOR`,`USUARIO_ELIMINADOR`,`USUARIO_DALTA`,`ID_ROL`,`ID_EMPRESA`,`ID_EQUIPO`) values (15,'predefinido.png','06256217','DINA ERCILIA','BOLUARTE ZEGARRA','Femenino','1986-12-05','Casado(a)','Lima','DinaBZ@gmail.com','Abogada','','','894321324','DinaBZ','$2y$10$KIvPXunVvJEh2jRmh5bSfu/LD2EpBkfunfa04KlC6.POnltzdFUoW','','','','','2024-04-14 08:49:33','2024-04-14 08:57:37','2024-04-20 10:16:22','2024-04-20 10:16:36','Activo','EdwarsIB','EdwarsIB','CristhianIB','CristhianIB',1,1,1);
insert  into `usuario`(`ID_USUARIO`,`FOTO_PERFIL`,`DNI`,`NOMBRE`,`APELLIDO`,`SEXO`,`FECHA_NACIMIENTO`,`ESTADO_CIVIL`,`DIRECCION`,`CORREO`,`PROFESION`,`CURRICULUM`,`INFO_ADICIONAL`,`NUM_TELEFONICO`,`USUARIO`,`CONTRASENA`,`S_TWITTER`,`S_FACEBOOK`,`S_INSTAGRAM`,`S_LINKEDIN`,`FECHA_CREACION`,`FECHA_MODIFICACION`,`FECHA_ELIMINACION`,`FECHA_RESTAURACION`,`ESTADO`,`USUARIO_CREADOR`,`USUARIO_MODIFICADOR`,`USUARIO_ELIMINADOR`,`USUARIO_DALTA`,`ID_ROL`,`ID_EMPRESA`,`ID_EQUIPO`) values (16,'predefinido.png','71530841','JOEL ARMANDO','CHOZO NORIEGA','Masculino','1992-12-15','Soltero(a)','CAL.CAPITAN ORBEGOZO LOTE. 19 LAMBAYEQUE - LAMBAYEQUE - LAMB','f5solution.cix@gmail.com','ING. Sistemas','','','992058366','JoelCN','$2y$10$hmfAJl7O/z3ZZAJvY9GXZe7CVFEzeD2bVvoGoXs07h2/EywB8X87K','','','','','2024-04-30 12:33:42',NULL,NULL,NULL,'Activo','CristhianIB',NULL,NULL,NULL,2,1,1);

/*!50106 set global event_scheduler = 1*/;

/* Event structure for event `actualizar_promociones` */

/*!50106 DROP EVENT IF EXISTS `actualizar_promociones`*/;

DELIMITER $$

/*!50106 CREATE DEFINER=`root`@`localhost` EVENT `actualizar_promociones` ON SCHEDULE EVERY 1 SECOND STARTS '2024-04-09 19:31:03' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    CALL actualizar_estado_promociones();
END */$$
DELIMITER ;

/* Event structure for event `actualiza_estado_vigente_promo` */

/*!50106 DROP EVENT IF EXISTS `actualiza_estado_vigente_promo`*/;

DELIMITER $$

/*!50106 CREATE DEFINER=`root`@`localhost` EVENT `actualiza_estado_vigente_promo` ON SCHEDULE EVERY 1 SECOND STARTS '2024-04-09 19:31:03' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
	    Call actualizar_estado_promociones_vigente();
	END */$$
DELIMITER ;

/* Procedure structure for procedure `actualizar_estado_promociones` */

/*!50003 DROP PROCEDURE IF EXISTS  `actualizar_estado_promociones` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_estado_promociones`()
BEGIN
    UPDATE promociones
    SET ESTADO_PROMO = 'Finalizado'
    WHERE FECHA_FIN_PROMOCION < CURRENT_TIMESTAMP() AND ESTADO_PROMO = 'Vigente';
END */$$
DELIMITER ;

/* Procedure structure for procedure `actualizar_estado_promociones_vigente` */

/*!50003 DROP PROCEDURE IF EXISTS  `actualizar_estado_promociones_vigente` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_estado_promociones_vigente`()
BEGIN
    UPDATE promociones
    SET ESTADO_PROMO = 'Vigente'
    WHERE FECHA_FIN_PROMOCION > CURRENT_TIMESTAMP() AND ESTADO_PROMO = 'Finalizado';
END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_ActualizarBlog` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_ActualizarBlog` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_ActualizarBlog`(IN `B_ID` INT, IN `B_FOTO` VARCHAR(500), IN `B_TITULO` VARCHAR(255), IN `B_DESCRIPCION` LONGTEXT)
BEGIN
    DECLARE FECHA_ACTUAL DATETIME;
    SET FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
    
    UPDATE BLOG
	SET	
    PORTADA_BLOG = B_FOTO,
    TITULO = B_TITULO,
    DESCRIPCION = B_DESCRIPCION, 
    FECHA_MODIFICACION = FECHA_ACTUAL
    WHERE ID_BLOG = B_ID;
END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_ActualizarEmpresa` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_ActualizarEmpresa` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_ActualizarEmpresa`(
    IN E_ID INT,
    IN E_LOGO VARCHAR(500),    
    IN E_RAZONSOCIAL VARCHAR(50),
    IN E_ACTIVIDADECONOMICA TEXT,
    IN E_ACERCADE TEXT,
    IN E_DIRECCION VARCHAR(45),
    IN E_TELEFONO VARCHAR(9),
    IN E_CORREO VARCHAR(45),    
    IN E_SFACEBOOK VARCHAR(150),
    IN E_SINSTAGRAM VARCHAR(150),
    IN E_SLINKEDIN VARCHAR(150),    
    IN E_STIKTOK VARCHAR(150),
    IN E_SYOUTUBE VARCHAR(150)
)
BEGIN
    DECLARE FECHA_ACTUAL DATETIME;
    SET FECHA_ACTUAL = NOW();  
    
    UPDATE empresa
    SET 
        LOGO_EMPRESA = E_LOGO,
        RAZON_SOCIAL = E_RAZONSOCIAL,
        ACTIVIDAD_ECONOMICA = E_ACTIVIDADECONOMICA,
        ACERCADE = E_ACERCADE,
        DIRECCION = E_DIRECCION,
        TELEFONO = E_TELEFONO,
        CORREO = E_CORREO,
        S_FACEBOOK = E_SFACEBOOK,
        S_INSTAGRAM = E_SINSTAGRAM,
        S_LINKEDIN = E_SLINKEDIN,
        S_TIKTOK = E_STIKTOK,
        S_YOUTUBE = E_SYOUTUBE,
        FECHA_MODIFICACION = FECHA_ACTUAL
        WHERE ID_EMPRESA=E_ID;

END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_ActualizarPass` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_ActualizarPass` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_ActualizarPass`(IN `ID` INT, IN `CLAVE` VARCHAR(500))
BEGIN
   UPDATE USUARIO
	SET	
    CONTRASENA = CLAVE
    WHERE ID_USUARIO = ID;
END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_ActualizarPerfilCliente` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_ActualizarPerfilCliente` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_ActualizarPerfilCliente`(
    IN U_ID_USUARIO INT,
    IN U_FOTO_PERFIL VARCHAR(450),
    IN U_SEXO VARCHAR(45),
    in U_FECHA_NACIMIENTO DATETIME,
    IN U_ESTADO_CIVIL VARCHAR(45),
    IN U_DIRECCION VARCHAR(80),
    IN U_CORREO VARCHAR(80),
    IN U_PROFESION VARCHAR(50),
    IN U_INFOADI TEXT,
    IN U_NUM_TELEFONICO VARCHAR(11)
    )
BEGIN
    DECLARE U_FECHA_ACTUAL DATETIME;
    SET U_FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
	UPDATE usuario
	SET	
    FOTO_PERFIL = U_FOTO_PERFIL,
    SEXO = U_SEXO, 
    FECHA_NACIMIENTO=U_FECHA_NACIMIENTO,
    ESTADO_CIVIL=U_ESTADO_CIVIL,
    DIRECCION = U_DIRECCION, 
    CORREO = U_CORREO, 
    PROFESION = U_PROFESION,
    INFO_ADICIONAL = U_INFOADI, 
    NUM_TELEFONICO = U_NUM_TELEFONICO,
    FECHA_MODIFICACION = U_FECHA_ACTUAL
    WHERE ID_USUARIO = U_ID_USUARIO;

    END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_ActualizarPerfilUsuarios` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_ActualizarPerfilUsuarios` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_ActualizarPerfilUsuarios`(
    IN U_ID_USUARIO INT,
    IN U_FOTO_PERFIL VARCHAR(450),
    IN U_SEXO VARCHAR(45),
    IN U_FECHA_NACIMIENTO DATETIME,
    IN U_ESTADO_CIVIL VARCHAR(45),
    IN U_DIRECCION VARCHAR(80),
    IN U_CORREO VARCHAR(80),
    IN U_PROFESION VARCHAR(50),
    IN U_CURRICULUM VARCHAR(450),
    IN U_INFOADI TEXT,
    IN U_NUM_TELEFONICO VARCHAR(11),
    IN U_TWITTER VARCHAR(45),
    IN U_FACEBOOK VARCHAR(45),
    IN U_INSTAGRAM VARCHAR(45),
    IN U_LINKEDIN VARCHAR(45)
    )
BEGIN
    DECLARE U_FECHA_ACTUAL DATETIME;
    SET U_FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
	UPDATE usuario
	SET	
    FOTO_PERFIL = U_FOTO_PERFIL,
    SEXO = U_SEXO, 
    FECHA_NACIMIENTO = U_FECHA_NACIMIENTO,
    ESTADO_CIVIL=U_ESTADO_CIVIL,
    DIRECCION = U_DIRECCION, 
    CORREO = U_CORREO, 
    PROFESION = U_PROFESION,
    CURRICULUM =  U_CURRICULUM,
    INFO_ADICIONAL = U_INFOADI, 
    NUM_TELEFONICO = U_NUM_TELEFONICO, 
    S_TWITTER = U_TWITTER , 
    S_FACEBOOK = U_FACEBOOK, 
    S_INSTAGRAM = U_INSTAGRAM, 
    S_LINKEDIN = U_INSTAGRAM,
    FECHA_MODIFICACION = U_FECHA_ACTUAL
    WHERE ID_USUARIO = U_ID_USUARIO;

    END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_ActualizarPromocion` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_ActualizarPromocion` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_ActualizarPromocion`(
    in P_ID INT,
    IN P_FOTO_PROMOCION VARCHAR(500),
    IN P_FOTO2 VARCHAR(500),
    IN P_FOTO3 VARCHAR(500),
    IN P_TITULO VARCHAR(45),
    IN P_PRECIO DECIMAL(10,2),
    IN P_DESCRIPCION LONGTEXT,
    IN P_FECHA_INICIO_PROMOCION datetime,
    IN P_FECHA_FIN_PROMOCION datetime,
    IN P_ID_SERVICIO INT
    
)
BEGIN
    DECLARE FECHA_ACTUAL DATETIME;
    SET FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
    
    UPDATE PROMOCIONES
	SET	
    FOTO_PROMOCION=P_FOTO_PROMOCION,
    FOTO2=P_FOTO2,
    FOTO3=P_FOTO3,
    TITULO=P_TITULO,
    PRECIO=P_PRECIO,
    DESCRIPCION=P_DESCRIPCION,
    FECHA_INICIO_PROMOCION=P_FECHA_INICIO_PROMOCION,
    FECHA_FIN_PROMOCION=P_FECHA_FIN_PROMOCION,
    FECHA_MODIFICACION=FECHA_ACTUAL,
    ID_SERVICIO=P_ID_SERVICIO
    WHERE ID_PROMOCION = P_ID;
END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_ActualizarRol` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_ActualizarRol` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_ActualizarRol`(IN `ID` INT, IN `nombre` VARCHAR(45))
BEGIN
DECLARE R_FECHA_ACTUAL DATETIME;
    SET R_FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
   UPDATE ROLES
	SET	
    DESCRIPCION = nombre,
    FECHA_MODIFICACION=R_FECHA_ACTUAL
    WHERE ID_ROL = ID;
END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_ActualizarServicio` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_ActualizarServicio` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_ActualizarServicio`(
    IN S_ID INT,
    IN S_FOTO VARCHAR(500),
    IN S_NOMBRE VARCHAR(45),
    IN S_DESCRIPCION LONGTEXT,
    IN S_PRECIO DECIMAL(10,2)
)
BEGIN
    DECLARE FECHA_ACTUAL DATETIME;
    SET FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
    
    UPDATE SERVICIOS
    SET
    PORTADA_SERVICIO=S_FOTO,
    NOMBRE_SERVICIO=S_NOMBRE,
    DESCRIPCION=S_DESCRIPCION,
    PRECIO=S_PRECIO,
    FECHA_MODIFICACION=FECHA_ACTUAL
    WHERE ID_SERVICIO=S_ID;
    
END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_ActualizarUsuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_ActualizarUsuario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_ActualizarUsuario`(
    in U_ID_USUARIO int,
    IN U_FOTO_PERFIL VARCHAR(450),
    IN U_DNI VARCHAR(8),
    IN U_NOMBRE VARCHAR(45),
    IN U_APELLIDO VARCHAR(45),
    IN U_SEXO VARCHAR(45),
    IN U_FECHA_NACIMIENTO DATETIME,
    IN U_ESTADO_CIVIL VARCHAR(45),
    IN U_DIRECCION VARCHAR(80),
    IN U_CORREO VARCHAR(80),
    IN U_PROFESION VARCHAR(50),
    IN U_CURRICULUM VARCHAR(450),
    IN U_INFOADI TEXT,
    IN U_NUM_TELEFONICO VARCHAR(11),
    IN U_USUARIO VARCHAR(45),
    IN U_CONTRASENA VARCHAR(500),
    IN U_TWITTER VARCHAR(45),
    IN U_FACEBOOK VARCHAR(45),
    IN U_INSTAGRAM VARCHAR(45),
    IN U_LINKEDIN VARCHAR(45),
    IN U_ID_ROL VARCHAR(45),
    IN U_USERMOD VARCHAR(100)
    
)
BEGIN
    DECLARE U_FECHA_ACTUAL DATETIME;
    SET U_FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
	update usuario
	set	
    FOTO_PERFIL = U_FOTO_PERFIL,
    DNI = U_DNI,
    NOMBRE = U_NOMBRE, 
    APELLIDO = U_APELLIDO, 
    SEXO = U_SEXO, 
    FECHA_NACIMIENTO = U_FECHA_NACIMIENTO,
    ESTADO_CIVIL=U_ESTADO_CIVIL,
    DIRECCION = U_DIRECCION, 
    CORREO = U_CORREO, 
    PROFESION = U_PROFESION,
    CURRICULUM =  U_CURRICULUM,
    INFO_ADICIONAL = U_INFOADI, 
    NUM_TELEFONICO = U_NUM_TELEFONICO, 
    USUARIO = U_USUARIO, 
    CONTRASENA = U_CONTRASENA, 
    S_TWITTER = U_TWITTER , 
    S_FACEBOOK = U_FACEBOOK, 
    S_INSTAGRAM = U_INSTAGRAM, 
    S_LINKEDIN = U_INSTAGRAM,
    FECHA_MODIFICACION = U_FECHA_ACTUAL,
    ID_ROL = U_ID_ROL,
    USUARIO_MODIFICADOR = U_USERMOD
    where ID_USUARIO = U_ID_USUARIO;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_Actualizar_Comentario` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_Actualizar_Comentario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_Actualizar_Comentario`(
IN C_IDCOMEN INT,
IN C_COMENTARIO TEXT
)
BEGIN
		DECLARE C_FECHA_ACTUAL DATETIME;
		SET C_FECHA_ACTUAL = NOW();
		update COMENTARIOS set
		COMENTARIO=C_COMENTARIO,
		FECHA_MODIFICACION=C_FECHA_ACTUAL
		WHERE ID_COMENTARIO=C_IDCOMEN;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_Actualizar_Reply_Comentario` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_Actualizar_Reply_Comentario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_Actualizar_Reply_Comentario`(
IN RC_IDCOMENTARIO INT,
IN RC_COMENTARIO TEXT
)
BEGIN
		DECLARE RC_FECHA_ACTUAL DATETIME;
		SET RC_FECHA_ACTUAL = NOW();
		update reply_coment set
		COMENTARIO=RC_COMENTARIO
		WHERE id_reply = RC_IDCOMENTARIO;


	END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_AltaPromocion` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_AltaPromocion` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_AltaPromocion`(
    in P_ID INT
    
)
BEGIN
    DECLARE FECHA_ACTUAL DATETIME;
    SET FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
    
    UPDATE PROMOCIONES
	SET	
	ESTADO='Activo',
	FECHA_RESTAURACION=FECHA_ACTUAL
    WHERE ID_PROMOCION = P_ID;
END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_AltaRol` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_AltaRol` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_AltaRol`(IN `ID` INT)
BEGIN
DECLARE R_FECHA_ACTUAL DATETIME;
    SET R_FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
   UPDATE ROLES
	SET	
    ESTADO = 'Activo',
    FECHA_RESTAURACION=R_FECHA_ACTUAL
    WHERE ID_ROL = ID;
END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_BajaPromocion` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_BajaPromocion` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_BajaPromocion`(
    in P_ID INT
    
)
BEGIN
    DECLARE FECHA_ACTUAL DATETIME;
    SET FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
    
    UPDATE PROMOCIONES
	SET	
	ESTADO='Inactivo',
	FECHA_ELIMINACION=FECHA_ACTUAL
    WHERE ID_PROMOCION = P_ID;
END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_BajaRol` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_BajaRol` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_BajaRol`(IN `ID` INT)
BEGIN
DECLARE R_FECHA_ACTUAL DATETIME;
    SET R_FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
   UPDATE ROLES
	SET	
    ESTADO = 'Inactivo',
    FECHA_ELIMINACION=R_FECHA_ACTUAL
    WHERE ID_ROL = ID;
END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_DarAltaBlog` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_DarAltaBlog` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_DarAltaBlog`(
    in B_ID INT
)
BEGIN
    DECLARE FECHA_ACTUAL DATETIME;
    SET FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
    
    UPDATE BLOG
	SET	
    ESTADO='Activo',
    FECHA_RESTAURACION = FECHA_ACTUAL
    WHERE ID_BLOG = B_ID;
END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_DarAltaServicio` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_DarAltaServicio` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_DarAltaServicio`(
    IN S_ID INT
)
BEGIN
    DECLARE FECHA_ACTUAL DATETIME;
    SET FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
    
    UPDATE SERVICIOS
    SET
    FECHA_RESTAURACION=FECHA_ACTUAL,
    ESTADO='Activo'
    WHERE ID_SERVICIO=S_ID;
    
END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_DARALTAUsuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_DARALTAUsuario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_DARALTAUsuario`(
     IN U_ID_USUARIO INT,
     IN U_USUARIO_ALTA VARCHAR(100)
)
BEGIN
    DECLARE U_FECHA_ACTUAL DATETIME;
    SET U_FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
	UPDATE usuario
	SET
    ESTADO='Activo',
    FECHA_RESTAURACION=U_FECHA_ACTUAL,
    USUARIO_DALTA=U_USUARIO_ALTA
    WHERE ID_USUARIO = U_ID_USUARIO;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_DarBajaBlog` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_DarBajaBlog` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_DarBajaBlog`(
    in B_ID INT
)
BEGIN
    DECLARE FECHA_ACTUAL DATETIME;
    SET FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
    
    UPDATE BLOG
	SET	
    ESTADO='Inactivo',
    FECHA_ELIMINACION = FECHA_ACTUAL
    WHERE ID_BLOG = B_ID;
END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_DarBajaServicio` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_DarBajaServicio` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_DarBajaServicio`(
    IN S_ID INT
)
BEGIN
    DECLARE FECHA_ACTUAL DATETIME;
    SET FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
    
    UPDATE SERVICIOS
    SET
    ESTADO='Inactivo',
    FECHA_ELIMINACION=FECHA_ACTUAL
    WHERE ID_SERVICIO=S_ID;
    
END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_DARBAJAUsuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_DARBAJAUsuario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_DARBAJAUsuario`(
     IN U_ID_USUARIO INT,
     IN USUARIO_BAJA VARCHAR(100)
)
BEGIN
    DECLARE U_FECHA_ACTUAL DATETIME;
    SET U_FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
	UPDATE usuario
	SET
    ESTADO='Inactivo',
    FECHA_ELIMINACION=U_FECHA_ACTUAL,
    USUARIO_ELIMINADOR=USUARIO_BAJA
    WHERE ID_USUARIO = U_ID_USUARIO;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_Delete_Reply_Comentario` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_Delete_Reply_Comentario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_Delete_Reply_Comentario`(
IN RC_IDCOMENTARIO INT
)
BEGIN
		update reply_coment set
		ESTADO='Inactivo'
		WHERE id_reply = RC_IDCOMENTARIO;


	END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_Eliminar_Comentario` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_Eliminar_Comentario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_Eliminar_Comentario`(
IN C_IDCOMEN INT
)
BEGIN
		DECLARE C_FECHA_ACTUAL DATETIME;
		SET C_FECHA_ACTUAL = NOW();
		update COMENTARIOS set
		ESTADO='Inactivo',
		FECHA_ELIMINACION=C_FECHA_ACTUAL
		WHERE ID_COMENTARIO=C_IDCOMEN;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_Ingresar_Comentario` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_Ingresar_Comentario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_Ingresar_Comentario`(
in C_IDUSUARIO INT,
IN C_IDBLOG INT,
IN C_COMENTARIO TEXT
)
BEGIN
		DECLARE C_FECHA_ACTUAL DATETIME;
		SET C_FECHA_ACTUAL = NOW();
		INSERT INTO COMENTARIOS(ID_COMENTARIO,ID_USUARIO,ID_BLOG,COMENTARIO,FECHA_CREACION,FECHA_MODIFICACION,FECHA_ELIMINACION,FECHA_RESTAURACION,ESTADO)
		VALUES(NULL,C_IDUSUARIO,C_IDBLOG,C_COMENTARIO,C_FECHA_ACTUAL,NULL,NULL,NULL,'Activo');

	END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_Ingresar_Reply_Comentario` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_Ingresar_Reply_Comentario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_Ingresar_Reply_Comentario`(
IN RC_IDCOMENTARIO INT,
IN RC_COMENTARIO TEXT,
IN RC_USUARIOLOGG VARCHAR(45)
)
BEGIN
		DECLARE RC_FECHA_ACTUAL DATETIME;
		SET RC_FECHA_ACTUAL = NOW();
		INSERT INTO reply_coment(id_reply, USUARIO, ID_COMENTARIO, COMENTARIO, FECHA_CREACION, ESTADO)
				VALUES (NULL, RC_USUARIOLOGG, RC_IDCOMENTARIO, RC_COMENTARIO, RC_FECHA_ACTUAL, 'Activo');


	END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_InsertarBlog` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_InsertarBlog` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_InsertarBlog`(
IN B_FOTO VARCHAR(500),
IN B_NOMBRE VARCHAR(255),
IN B_DESCRIPCION LONGTEXT,
in B_COMENTARIO TEXT,
IN B_AUTOR VARCHAR(45))
BEGIN
    DECLARE FECHA_ACTUAL DATETIME;
    SET FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
    
    INSERT INTO BLOG(PORTADA_BLOG, TITULO, DESCRIPCION, FECHA_CREACION, FECHA_MODIFICACION, FECHA_ELIMINACION,FECHA_RESTAURACION,AUTOR,COMENTARIO, ESTADO,ID_EMPRESA) 
    VALUES (B_FOTO, B_NOMBRE, B_DESCRIPCION, FECHA_ACTUAL, NULL, NULL,NULL,B_AUTOR,B_COMENTARIO, 'Activo', 1);
END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_InsertarCliente` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_InsertarCliente` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_InsertarCliente`(
    IN U_NOMBRE VARCHAR(45),/**/
    IN U_APELLIDO VARCHAR(45),/**/
    IN U_SEXO VARCHAR(45),/**/
    IN U_FECHANACIMIENTO DATETIME,/**/
    IN U_CORREO VARCHAR(80),/**/
    IN U_NUM_TELEFONICO VARCHAR(11),/**/
    IN U_USUARIO VARCHAR(45),/**/
    IN U_CONTRASENA VARCHAR(500)/**/
)
BEGIN
    DECLARE U_FECHA_ACTUAL DATETIME;
    SET U_FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
    
    INSERT INTO usuario(FOTO_PERFIL, DNI, NOMBRE, APELLIDO, SEXO, FECHA_NACIMIENTO, ESTADO_CIVIL, DIRECCION, CORREO, PROFESION, CURRICULUM, INFO_ADICIONAL, NUM_TELEFONICO, USUARIO, CONTRASENA, S_TWITTER, S_FACEBOOK, S_INSTAGRAM, S_LINKEDIN, FECHA_CREACION, FECHA_MODIFICACION, FECHA_ELIMINACION, ESTADO, ID_ROL, ID_EMPRESA, ID_EQUIPO) 
    VALUES('predefinido.png', null, U_NOMBRE, U_APELLIDO, U_SEXO, U_FECHANACIMIENTO, NULL, NULL, U_CORREO, NULL, NULL,NULL, U_NUM_TELEFONICO, U_USUARIO, U_CONTRASENA, NULL, NULL, NULL, NULL,U_FECHA_ACTUAL, NULL, NULL, 'Activo', '1', '1','1');
END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_InsertarPromocion` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_InsertarPromocion` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_InsertarPromocion`(
    IN P_FOTO VARCHAR(500),
    IN P_FOTO2 VARCHAR(500),
    IN P_FOTO3 VARCHAR(500),
    IN P_TITULO_PROMOCION VARCHAR(45),
    in P_PRECIO DECIMAL(10,2),
    IN P_DESCRIPCION LONGTEXT,
    IN P_FECHA_INICIO DATETIME,
    IN P_FECHA_FIN DATETIME,
    in P_ID_SERVICIO INT
)
BEGIN
    DECLARE FECHA_ACTUAL DATETIME;
    SET FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
    
    INSERT INTO PROMOCIONES(FOTO_PROMOCION, FOTO2, FOTO3, TITULO, DESCRIPCION,PRECIO, FECHA_INICIO_PROMOCION, FECHA_FIN_PROMOCION, FECHA_CREACION, FECHA_MODIFICACION, FECHA_ELIMINACION,FECHA_RESTAURACION, ESTADO,ESTADO_PROMO, ID_SERVICIO) 
    VALUES (P_FOTO,P_FOTO2,P_FOTO3,P_TITULO_PROMOCION,P_DESCRIPCION,P_PRECIO,P_FECHA_INICIO,P_FECHA_FIN,FECHA_ACTUAL,NULL,NULL,NULL,'Activo','Vigente',P_ID_SERVICIO);
END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_InsertarServicio` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_InsertarServicio` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_InsertarServicio`(
    IN S_FOTO VARCHAR(500),
    IN S_NOMBRE VARCHAR(45),
    IN S_DESCRIPCION LONGTEXT,
    IN S_PRECIO DECIMAL(10,2)
)
BEGIN
    DECLARE FECHA_ACTUAL DATETIME;
    SET FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
    
    INSERT INTO SERVICIOS(PORTADA_SERVICIO, NOMBRE_SERVICIO, DESCRIPCION, PRECIO, FECHA_CREACION, FECHA_MODIFICACION, FECHA_ELIMINACION,FECHA_RESTAURACION, ESTADO, ID_EMPRESA) 
    VALUES (S_FOTO, S_NOMBRE, S_DESCRIPCION, S_PRECIO, FECHA_ACTUAL, NULL, NULL,NULL, 'Activo', 1);
END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_InsertarUsuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_InsertarUsuario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_InsertarUsuario`(
    IN U_FOTO_PERFIL VARCHAR(450),
    IN U_DNI VARCHAR(8),
    IN U_NOMBRE VARCHAR(45),
    IN U_APELLIDO VARCHAR(45),
    IN U_SEXO VARCHAR(45),
    IN U_FECHA_NACIMIENTO DATETIME,
    IN U_ESTADO_CIVIL VARCHAR(45),
    IN U_DIRECCION VARCHAR(80),
    IN U_CORREO VARCHAR(80),
    IN U_PROFESION VARCHAR(50),
    IN U_CURRICULUM VARCHAR(450),
    IN U_INFOADI TEXT,
    IN U_NUM_TELEFONICO VARCHAR(11),
    IN U_USUARIO VARCHAR(45),
    IN U_CONTRASENA VARCHAR(500),
    IN U_TWITTER VARCHAR(45),
    IN U_FACEBOOK VARCHAR(45),
    IN U_INSTAGRAM VARCHAR(45),
    IN U_LINKEDIN VARCHAR(45),
    IN U_ID_ROL VARCHAR(45),
    in U_USERCREATOR VARCHAR(100)
)
BEGIN
    DECLARE U_FECHA_ACTUAL DATETIME;
    SET U_FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
    
    INSERT INTO usuario(FOTO_PERFIL, DNI, NOMBRE, APELLIDO, SEXO, FECHA_NACIMIENTO, ESTADO_CIVIL, DIRECCION, CORREO, PROFESION, CURRICULUM, INFO_ADICIONAL, NUM_TELEFONICO, USUARIO, CONTRASENA, S_TWITTER, S_FACEBOOK, S_INSTAGRAM, S_LINKEDIN, FECHA_CREACION, FECHA_MODIFICACION, FECHA_ELIMINACION, ESTADO, USUARIO_CREADOR, ID_ROL, ID_EMPRESA, ID_EQUIPO) 
    VALUES(U_FOTO_PERFIL, U_DNI, U_NOMBRE, U_APELLIDO, U_SEXO, U_FECHA_NACIMIENTO, U_ESTADO_CIVIL,U_DIRECCION, U_CORREO, U_PROFESION, U_CURRICULUM,U_INFOADI, U_NUM_TELEFONICO, U_USUARIO, U_CONTRASENA, U_TWITTER, U_FACEBOOK, U_INSTAGRAM, U_LINKEDIN,U_FECHA_ACTUAL, NULL, NULL, 'Activo', U_USERCREATOR, U_ID_ROL, '1','1');
END */$$
DELIMITER ;

/* Procedure structure for procedure `Procedimiento_RegistrarRol` */

/*!50003 DROP PROCEDURE IF EXISTS  `Procedimiento_RegistrarRol` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Procedimiento_RegistrarRol`(IN `R_Descripcion` varchar(45))
BEGIN
DECLARE R_FECHA_ACTUAL DATETIME;
    SET R_FECHA_ACTUAL = NOW();  -- Utiliza NOW() para obtener la fecha y hora actual
   INSERT INTO ROLES(ID_ROL,DESCRIPCION,FECHA_CREACION,FECHA_MODIFICACION,FECHA_ELIMINACION,FECHA_RESTAURACION,ESTADO)
	      VALUES(NULL,R_Descripcion,R_FECHA_ACTUAL,NULL,NULL,NULL,'Activo');
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
