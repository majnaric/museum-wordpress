<?php

function my_login_logo() { ?>
    <style type="text/css">
        .login{
            color:#333;
        }

        .login #login_error, .login .message, .login .success{
            border-left: 4px solid rgba(51, 51, 51, 0.233) !important;
            border-right: 4px solid rgba(51, 51, 51, 0.233) !important;
        }

         #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/login-photo.png);
		height:200px;
		width:320px;
		background-size: 320px 230px;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }

        #loginform{
            color: #333;
        }


        .login .button.wp-hide-pw .dashicons {
            color: #333;
        }

        .wp-core-ui .button-group.button-large .button, .wp-core-ui .button.button-large {
            background-color: #333;
            border: none;
        }
    </style>
    <?php }
    
    add_action( 'login_enqueue_scripts', 'my_login_logo' );


    function ourLoginTitle(){
        return get_bloginfo('name');
    }

    add_action('login_headertitle', 'ourLoginTitle');


    
    ?>