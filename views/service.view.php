<?php
ob_start();
?>
<div class="div-principale-service-1 m-auto">
    <div class="vardump-service">
        <?php
        var_dump($_SESSION);
        ?>
    </div>
</div>

<?php
$title = "service";
$content = ob_get_clean();
require_once "template.view.php";
