<?php
/*
** Template to Render Social Icons on Top Bar
*/?>

<div id="social-icons" class="col-md-6">
    <?php
    for ($i = 1; $i <= 7 ; $i++) :
        $social = esc_attr(get_theme_mod('dellow_social_'.$i));
        if ( ($social != 'none') && ($social != '') ) : ?>
            <a href="<?php echo esc_url( get_theme_mod('dellow_social_url'.$i) ); ?>"><i class="social-icon fa fa-<?php echo $social; ?>"></i></a>
        <?php endif;

    endfor; ?>
</div>