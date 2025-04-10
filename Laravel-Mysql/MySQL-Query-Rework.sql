-- DROP TABLE IF EXISTS `laravelweb_pages`;
-- DROP TABLE IF EXISTS `laravelweb_posts`;
-- DROP TABLE IF EXISTS `laravelweb_products`;
-- DROP TABLE IF EXISTS `laravelweb_categories`;
-- DROP TABLE IF EXISTS `laravelweb_categories_posts`;
-- DROP TABLE IF EXISTS `laravelweb_tags`;
-- DROP TABLE IF EXISTS `laravelweb_tags_posts`;
-- DROP TABLE IF EXISTS `laravelweb_media`;
-- DROP TABLE IF EXISTS `laravelweb_users`;
-- DROP TABLE IF EXISTS `laravelweb_roles`;
-- DROP TABLE IF EXISTS `laravelweb_permissions`;
-- DROP TABLE IF EXISTS `laravelweb_model_has_permissions`;
-- DROP TABLE IF EXISTS `laravelweb_model_has_rolesel`;
-- DROP TABLE IF EXISTS `laravelweb_role_has_permissions`;
-- DROP TABLE IF EXISTS `laravelweb_page_meta`;
-- DROP TABLE IF EXISTS `laravelweb_post_meta`;
-- DROP TABLE IF EXISTS `laravelweb_product_meta`;

-- create database ;
-- drop database ;

-- truy xuất db mẫu (DB: Laravel-Mysql/MySQL-Database-Rework.sql)
select * from laravelweb_categories_posts;
select * from laravelweb_users lu ;
SELECT * FROM laravelweb_products LEFT JOIN laravelweb_users ON laravelweb_products.user_id = laravelweb_users.user_id;

SET SQL_SAFE_UPDATES = 0;