<?php
/***************************************************************
 * Generate display
 ***************************************************************/

function tdfp_translation_display( $content ) {
    $options = get_option( 'tdfp_settings' );

    // Generate content
    list($translationsLinks, $linksNumber) = _tdfp_links_generation( $options );
    $translationsStyle = _tdfp_style_generation( $options, $linksNumber );

    // Display
    if ( is_front_page() && isset( $options['post_type']['homepage'] ) ||
            isset( $options['post_type'][get_post_type( get_the_ID() )] ) && !is_front_page() ) {
        if ( isset( $options['display'] ) && $options['display'] != 'none' ) {
            if ( isset( $options['display'] ) && ($options['display'] == 'top' || $options['display'] == 'both') )
                $content = $translationsLinks . $content;
            if ( isset( $options['display'] ) && ($options['display'] == 'bottom' || $options['display'] == 'both') )
                $content .= $translationsLinks;
            $content = $translationsStyle . $content;
        }
    }
    return $content;
}
add_filter( 'the_content', 'tdfp_translation_display', 99 );

function _tdfp_links_generation( $options ) {
    global $polylang;

    if ( isset( $polylang ) ) {
        // Get post translations
        $currentPostLanguage = $polylang->model->post->get_language( get_the_ID() );
        $postTranlations = $polylang->model->post->get_translations( get_the_ID() );
        if ( $currentPostLanguage && isset( $postTranlations[$currentPostLanguage->slug] ) )
            unset( $postTranlations[$currentPostLanguage->slug] );

        // Delete unpublished translation
        foreach ( $postTranlations as $postSlug => $postId ) {
            if ( get_post_status( $postId ) != 'publish' ) {
                unset( $postTranlations[$postSlug] );
            }
        }

        if ( count( $postTranlations ) > 0 ) {
            $text = (isset( $options['text'] )) ? pll__( $options['text'] ) : __( 'This page is also available in', 'tdfp-translate' );
            $links = '<span class="tdfp-translations">';
            if ( count( $postTranlations ) > 1 )
                $links .= $text;
            $i = 0;
            foreach ( $postTranlations as $slugTranslation => $idTranslation ) {
                $lang = $polylang->model->get_language( $slugTranslation );
                if ( $i > 0 )
                    $links .= ',';
                $links .= ' <a href="' . get_permalink( $idTranslation ) . '" hreflang="' . $lang->slug . '">';
                if ( count( $postTranlations ) == 1 )
                    $links .= $text . ' ';
                $links .= $lang->name . ' <img src="' . $lang->flag_url . '" alt="' . $lang->name . '"></a>';
                $i++;
            }
            $links .= '</span>';
            return array( apply_filters( 'translation-detector-links', $links ), $i );
        }
    }
    return array('', 0);
}
add_shortcode( 'translations-links-generation', 'translation-detector-links' );

function _tdfp_style_generation( $options, $linksNumber ) {
    if ( $linksNumber == 0 )
        return '';
    ob_start();
    ?>
    <style type="text/css">
        .tdfp-translations {
                -webkit-transition-duration: 0.2s;
                -webkit-transition-timing-function: ease;
                -moz-transition-property: background color;
                -moz-transition-duration: 0.2s;
                -moz-transition-timing-function: ease;
                -o-transition-property: background color;
                -o-transition-duration: 0.2s;
                -o-transition-timing-function: ease;
                transition-property: background color;
                transition-duration: 0.2s;
                transition-timing-function: ease;
            <?php if ( isset( $options['background'] ) ) { ?>
                background-color: <?php
                echo $options['background'];
            }
            ?>;
            display: inline-block;
            width: 100%;
            text-decoration: none;
            font-size: 1.05em;
            margin: 0 0 25px 0;
            text-align:center;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            <?php if ( $linksNumber > 1 ) { ?>          
                padding: 15px 25px;
            <?php } ?>
    <?php if ( isset( $options['color'] ) ) { ?>
                color: <?php echo $options['color']; ?>;
            }

            .tdfp-translations a{ 
                border: none;
                -webkit-transition-duration: 0.2s;
                -webkit-transition-timing-function: ease;
                -moz-transition-property: color;
                -moz-transition-duration: 0.2s;
                -moz-transition-timing-function: ease;
                -o-transition-property: color;
                -o-transition-duration: 0.2s;
                -o-transition-timing-function: ease;
                transition-property: color;
                transition-duration: 0.2s;
                color: <?php echo $options['color']; ?>;
            <?php } ?>
    <?php if ( $linksNumber == 1 ) { ?>     
                padding: 15px 25px; 
                display: block;
    <?php } ?>
        }
        .tdfp-translations a img {
            display: inline;
        }   
        <?php
        if ( isset( $options['hover'] ) ) {
            if ( $linksNumber > 1 ) {
                ?>
                .tdfp-translations a:hover { 
                    -webkit-transition-duration: 0.2s;
                    -webkit-transition-timing-function: ease;
                    -moz-transition-property: color;
                    -moz-transition-duration: 0.2s;
                    -moz-transition-timing-function: ease;
                    -o-transition-property: color;
                    -o-transition-duration: 0.2s;
                    -o-transition-timing-function: ease;
                    transition-property: color;
                    transition-duration: 0.2s;
                    color: <?php echo $options['hover']; ?>; 
                }
        <?php } else { ?>
                .tdfp-translations:hover {                 
                    -webkit-transition-duration: 0.2s;
                    -webkit-transition-timing-function: ease;
                    -moz-transition-property: background color;
                    -moz-transition-duration: 0.2s;
                    -moz-transition-timing-function: ease;
                    -o-transition-property: background color;
                    -o-transition-duration: 0.2s;
                    -o-transition-timing-function: ease;
                    transition-property: background color;
                    transition-duration: 0.2s;
                    background-color: <?php echo $options['hover']; ?>;
                }
            <?php } ?>
    <?php } ?>
    </style>
    <?php
    return apply_filters( 'translation-detector-style', ob_get_clean() );
}
add_shortcode( 'translations-style-generation', 'translation-detector-style' );
