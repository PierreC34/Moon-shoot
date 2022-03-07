<?php
ob_start();
?>
<div class="div-principale-moonshootattoo-1">
    <h1>Moon shoot tattoo</h1>
</div>

<?php
$title = "moonshoottattoo";
$content = ob_get_clean();
require_once "template.view.php";
