<?php
$obj         = ucfwp_get_queried_object();
$exclude_nav = get_field( 'page_header_exclude_nav', $obj );

$default_header_setting = ucfwp_get_theme_mod_or_default( 'default_header_setting' );
$bg_class               = ucfwp_get_default_header_bg_class( $default_header_setting );
?>

<div class="header-default mb-0 d-flex flex-column <?php echo $bg_class; ?>">
    <div class="header-media-background-wrap">
        <div class="header-media-background media-background-container">
            <?php
            if ( $default_header_setting === 'predefined' ) {
                $customizer_selection = ucfwp_get_theme_mod_or_default( 'predefined_default_header' );
                $header_srcs          = ucfwp_get_default_header_predefined_background_picture_srcs( $customizer_selection );

                echo ucfwp_get_media_background_picture( $header_srcs );

            } elseif ( $default_header_setting === 'upload-custom' ) {
                // TODO: set the background image to what the user uploaded as the background (both desktop and mobile)
                // get the image that they uploaded
            }
            ?>
            <picture class="media-background-picture">
                <source srcset="<?php echo $temp_default_header_img_xs; ?>" media="(max-width: 575px)">
                <img class="media-background object-fit-cover" src="<?php echo $temp_default_header_img; ?>" alt="">
            </picture>
        </div>
    </div>

    <?php
    // Display the site nav

    // TODO: Add functionality to pass in a param into ucfwp_get_nav_markup that updates 
    // the header-gradient styles and the color of the nav links if the $bg_class is 'bg-secondary'
    if ( ! $exclude_nav ) { echo ucfwp_get_nav_markup(); }
    ?>

    <?php
    // Display the inner header contents
    ?>
    <div class="header-content">
        <div class="header-content-flexfix">
            <?php echo ucfwp_get_header_content_markup(); ?>
        </div>
    </div>
</div>
