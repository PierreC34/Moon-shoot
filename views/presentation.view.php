<?php
ob_start();
?>
<!-- width 100vw et height 100vh -->
<div class="div-principale-presentation-1">
    <section class="section-principale-presentation-1">
        <article class="article-principal-presentation-1">
            <h1 class="h1-biographie text-center">Biographie</h1>
            <p class="p-biographie">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est hic blanditiis consequuntur ipsum. Sed accusantium, maxime aperiam repellat reprehenderit libero. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente, ducimus quas quaerat ratione officia hic non magnam commodi eaque possimus! Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, ipsa possimus. Ut quaerat recusandae repellat reiciendis enim, quia nostrum quidem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam laudantium minima ad voluptatum dolore pariatur fugiat reprehenderit a? Quam, perferendis?</p>
        </article>
        <article class="article-principal-presentation-2 mt-3 text-center">
            <a href="<?= URL ?>galerie"><button class="boutton-presentation-1" type="button">Voir la galerie</button></a>
            <button class="boutton-presentation-2" type="button">Prendre rendez-vous</button>
        </article>
    </section>
</div>

<?php
$title = "Accueil";
$content = ob_get_clean();
require_once "template.view.php";
