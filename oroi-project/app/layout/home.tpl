<?php
global $config;
// @todo: create class for calling standard files
echo $html->render('standards/meta', array('config' => $config));
?>
<body>
    <div class="site">
        <div class="header-wrapper">
            <?php echo $html->render('standards/header'); ?>
        </div>
        <div class="content-wrapper">
            <div class="container">
                <div class="form-block">
                    <h2>Bereken uw Return on Investment</h2>
                    <?php echo makeReturnForm(); ?>
                </div>
            </div>
        </div>
        <div class="footer-wrapper">
            <?php echo $html->render('standards/footer', array('config' => $config)); ?>
        </div>
    </div><!--.site-->
</body>
<?php
echo $html->render('standards/bottom_scripts');