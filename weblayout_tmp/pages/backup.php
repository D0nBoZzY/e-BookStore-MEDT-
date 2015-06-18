<?php
exec('mysqldump --user=root --password=root --host=localhost ebookstore > /backup/backup.sql');
?>
