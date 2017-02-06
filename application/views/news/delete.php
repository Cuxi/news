<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('news/delete'); ?>

    <label for="title">Title</label>
    <input type="input" name="title" /><br />

    <input type="submit" name="submit" value="Borra noticia." />

</form>
