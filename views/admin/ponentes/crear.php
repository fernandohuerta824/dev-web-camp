<h2 class="dashboard__heading"><?php echo $titulo ?></h2>


<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/ponentes">
        <i class="fa-solid fa-circle-arrow-left"></i>
         Volver
    </a>
</div>
<div class="dashboard__alertas">
    <?php include __DIR__ . '/../../template/alertas.php' ?>
</div>

<div class="dashboard__formulario">

    <form method="post" class="formulario" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php' ?>

        <input class="formulario__submit" type="submit" value="Registrar Ponente">
    </form>
</div>
