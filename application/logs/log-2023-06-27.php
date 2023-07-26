<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-06-27 10:35:43 --> 404 Page Not Found: master/DataMaster/dist
ERROR - 2023-06-27 10:41:18 --> Query error: MySQL server has gone away - Invalid query: SELECT `ms_user`.`id_user`, `email_user`, `nama_user`, `password`, `ms_role`.`id_role`, `nama_role`
FROM `ms_user`
JOIN `tbl_role_user` ON `ms_user`.`id_user` = `tbl_role_user`.`id_user`
JOIN `ms_role` ON `ms_role`.`id_role` = `tbl_role_user`.`id_role`
WHERE `ms_user`.`email_user` = 'testmail.com'
