<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-07-24 11:34:25 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 C:\xampp\htdocs\dermalicious_dev\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2023-07-24 11:34:25 --> Unable to connect to the database
ERROR - 2023-07-24 11:59:33 --> Query error: MySQL server has gone away - Invalid query: SELECT `ms_user`.`id_user`, `email_user`, `nama_user`, `password`, `ms_role`.`id_role`, `nama_role`
FROM `ms_user`
JOIN `tbl_role_user` ON `ms_user`.`id_user` = `tbl_role_user`.`id_user`
JOIN `ms_role` ON `ms_role`.`id_role` = `tbl_role_user`.`id_role`
WHERE `ms_user`.`email_user` = 'test@mail.com'
ERROR - 2023-07-24 11:59:59 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 C:\xampp\htdocs\dermalicious_dev\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2023-07-24 11:59:59 --> Unable to connect to the database
ERROR - 2023-07-24 12:00:19 --> 404 Page Not Found: Blast-customerhtml/index
ERROR - 2023-07-24 12:16:43 --> 404 Page Not Found: Blast/blast_customer
ERROR - 2023-07-24 12:18:49 --> 404 Page Not Found: Indexhtml/index
ERROR - 2023-07-24 12:18:57 --> 404 Page Not Found: Blast_customer/index
ERROR - 2023-07-24 17:32:49 --> 404 Page Not Found: Indexhtml/index
