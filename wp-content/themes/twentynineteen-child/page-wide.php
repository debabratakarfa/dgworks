<?php
/**
 * Template Name: Full Width Page
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen Child 1.0
 */

?>
    <!doctype html>
    <html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="profile" href="https://gmpg.org/xfn/11" />
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <div id="page" class="site">
            <div id="content" class="site-content">
                <div id="primary" class="content-area">
                    <main id="main" class="content-wrapper">
                        <h1 class="title">SUBMIT YOUR APPLICATION</h1>
                        <form class="form">
                            <div class="form__description">
                                <h2>Personal Information</h2>
                                <p>Please fill in all mandatory fields</p>
                            </div>
                            <div class="form__content">
                                <input name="first_name" class="element text" maxlength="255" size="8" value="">
                                <input name="last_name" class="element text" maxlength="255" size="8" value="">
                                <input name="email" class="element text" maxlength="255" size="8" value="">
                                <input name="phonenumber" class="element text" maxlength="255" size="8" value="">
                                <input name="country" class="element text" maxlength="255" size="8" value="">
                                <input name="dob" class="element text" maxlength="255" size="8" value="">
                            </div>
                            <div class="form__footer">
                                <input type="checkbox" placeholder="I have read and agree to the Terms and Conditions and the Privacy Policy">
                                <input id="saveForm" class="button_text" type="submit" name="submit" value="Submit">
                            </div>
                        </form>
                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
        </div><!-- #page -->

    <?php wp_footer(); ?>

    </body>
</html>
