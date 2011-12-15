<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <title><?php echo TITLE_ADMIN ?></title>

        <link href="<?php echo base_url(CSS_JQUERY) ?>" type="text/css" rel="stylesheet"/>
        <link href="<?php echo base_url(CSS_JQGRID) ?>" type="text/css" rel="stylesheet"/>

        <script src="<?php echo base_url(JS_JQUERY) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQUERY_UI) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQGRID_I18N) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQGRID) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQUERY_BLOCK) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQUERY_UPLOAD) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_COLOR_READY) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_COLOR_GRID_CONFIG) ?>" type="text/javascript"></script>
        <script type="text/javascript">
            var base_url = "<?php echo base_url() ?>index.php";
        </script>
    </head>
    <body>
        <table id="colorGrid"></table>
        <div id="colorPager"></div>
    </body>
</html>