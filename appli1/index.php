<?php
ob_start();
?>
<h1>Bienvenu sur le site qui liste les provinces et les térritoires de la RDC</h1>
<?php
$content = ob_get_clean();
include("template.php");