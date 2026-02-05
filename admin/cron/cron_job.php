<?php
file_put_contents("C:/xampp/htdocs/ravismedia/admin/cron/cron_log.txt", 
    date("Y-m-d H:i:s") . " - Cron ran!\n", 
    FILE_APPEND
);
