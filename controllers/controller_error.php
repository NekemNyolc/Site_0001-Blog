<?php

################################################################################
#                                                                              #
#                               Error controller                               #
#                                                                              #
################################################################################

/**
 * Views -----------------------------------------------------------------------
 */
// ./views/body.php (from controller_user and controller_main)

/**
 * Error handler ---------------------------------------------------------------
 */
$view = new Body();

switch ($_GET['errorpage']) {
    case 'fail_profile':
    case 'fail_login':
    case 'fail_registration':
    case 'fail_bloglist':
    case 'fail_gamelist':
        $view->PageError("Maybe database or network error!");
        break;

    case 'fail_post':
        $view->PageError("Posting failed, maybe database error!");
        break;

    case 'fail_password':
        $view->PageError("Incorrect e-mail or password!");
        break;

    case 'fail_password_twice':
        $view->PageError("Passwords do not match!");
        break;

    case 'fail_password_old':
        $view->PageError("This isn't the old password!");
        break;

    case 'success':
        $view->PageSuccess("Successful.");
        break;

    default:
        $view->PageError("I don't know what to say...");
        break;
}

################################################################################
#
#                                   Uses
#
# .\controllers\controller_main.php
# .\controllers\controller_user.php
#

?>