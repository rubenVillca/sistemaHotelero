<!--Inicio Pie de pagina-->
<footer>
    <div class="footer">
        <h4 class="text-center text-muted">
            Copy Right Hotel - <?=date('Y')?>
            <br>
            Usuario <?= isset($_SESSION['TYPE_USER']) ? $_SESSION['TYPE_USER'] : Constants::$TYPE_USER_FREE; ?>
        </h4>
    </div>
</footer>
<!--Fin del Pie de pagina-->