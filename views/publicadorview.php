<?php
session_start();
$id_uss = $_SESSION['user_id'];

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<br>
<!--Borrar estos dos br-->
<br>
<form
    method="POST"
    action="./action/PublicacionAction.php"
    enctype="multipart/form-data">

    <label>Título principal</label>

        <input type="text" name="titulo">

    <label>Descripción del producto</label>
        <!-- Create the editor container -->
        <textarea name="editor1" id="editor1"></textarea>

    <input type="hidden" name="id_uss" value="<?=$id_uss;?>">

    <div class="form-group">
        <button
            type="submit"
            name="Publicacion">
            <i class="fa fa-check"></i>
            Publicar</button>
    </div>

</form>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor1');
</script>
<script src="./js/aplicaciones.js"></script>