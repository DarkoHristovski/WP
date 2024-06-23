<?php

/**
 * Header file for astorius
 *
 * @subpackage astorius
 * @since 1.0.0
 */

//$languages = icl_get_languages('skip_missing=0&orderby=code&order=desc&link_empty_to=');
//$language_switcher_html = '';
//foreach($languages as $language){
//if($language['active'] == '1'){
// continue;
//}
// if($language['language_code'] != 'de'){
//$language_switcher_html .= '<a href="'.$language['url'].'"'.($language['active'] == '1' ? ' class="active language-btn"' : ' class="language-btn"').'><span>'.strtoupper($language['language_code']).'</span></a>';
//}
//}
//if($language_switcher_html != ''){
// $language_switcher_html = '<ul>'.$language_switcher_html.'</ul>';
//}

?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <meta name="format-detection" content="telephone=no">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <?php wp_head(); ?>
    <script type="text/javascript">
        <?php
        $translations = [
            'read_more' => __('read more', 'astorius'),
            'read_less' => __('read less', 'astorius'),
            'select_fonds' => __('select fonds', 'astorius')
        ];
        ?>
        var translations = <?php echo json_encode($translations); ?>;
    </script>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="header">
        <div class="wrapper">
            <div class="header-content flex-container">
                <div class="logo">
                    <a href="<?php echo home_url(); ?>">
                        <div class="main-logo">
                          Logo
                        </div>
                    </a>
                </div>
                <div class="nav-wrapper">
                    <nav class="navigation">
                        <?php
                        $html = get_website_menu('Main');
                        echo $html;
                        ?>
                    </nav>
                    <div class="language-btn-wrapper">
                        <?php

                        ?>
                    </div>
                </div>
            </div>
            <div class="burger mobile-menu-button">
                    <span></span>
            </div>
        </div>
      
    </header>