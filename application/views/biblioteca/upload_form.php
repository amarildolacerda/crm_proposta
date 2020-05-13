<html>
    <head>
        <title>Upload Form</title>
    </head>
    <body>

        <?php echo $error; ?>

        <?php echo form_open_multipart('biblioteca/do_upload'); ?>

        <input type="file" name="arquivo" size="20" />

        <br /><br />

        <input type="submit" value="upload" />

    </form>

</body>
</html>