<?php
ob_start();
?>
<div class="div-principale-error-1">
    <section class="section-principal-error-1">
        <h1 class="message-error">ET NON GROS PAS COMME CA ! TIEN SI TU VEUT FOUINER</h1>
        <button class="btn btn-dark">
            <a target="blanck" href="https://www.linternaute.com/">Cadeaux</a>
        </button>
    </section>
</div>

<?php
$title = "Error";
$content = ob_get_clean();
require_once "template.view.php";
