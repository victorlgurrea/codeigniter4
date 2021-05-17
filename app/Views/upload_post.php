

<div class="s-featured">
    <div class="row">
        <div class="col-full">
            <form method="post" action="" enctype="multipart/form-data">

                    <label for="title">Título</label>
                    <input type="text" id="title" name="title" placeholder="Título">



                    <label for="intro">Intro</label>
                    <input type="text" id="intro" name="intro" placeholder="Intro">


                    <label for="content">Contenido</label>
                    <textarea id="editor" name="content" placeholder="Contenido..."></textarea><br>

                    <label for="categories">Categoría</label>
                    <select name="category">
                        <?php foreach($categories as $category) { ?>
                            <option value="<?php echo $category['id'] ?>" ><?php echo $category['name'] ?></option>
                        <?php } ?>
                    </select>
                    <label for="content">Tags</label>
                    <input type="text" name="tags">

                <input type="file" name="banner"><br>
                <div class="text-center">
                    <input type="submit" name="" class="btn btn--primary" value="Enviar">
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script>
$(document).ready(function() {
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        });
});

</script>