<?php

################################################################################
#                                                                              #
#                This controller controls the logged in state.                 #
#                                                                              #
################################################################################

/**
 * Views -----------------------------------------------------------------------
 */
include './views/header.php';
include './views/forms.php';
include './views/body.php';

/**
 * Objects ---------------------------------------------------------------------
 */
include './models/blog.class.php';
include './models/game.class.php';
include './models/user.class.php';

/**
 * Actions ---------------------------------------------------------------------
 */
// Creating a blog post
if (isset($_POST['cmd_create']))
{
    $blog = new Blog();
    $blog->SubmitPost(
        $_POST['input_title'],
        $_POST['input_content'],
        $_POST['input_tags'],
        $_POST['input_game']
    );
}

// Deleting a blog post
if (isset($_POST['cmd_delete']))
{
    
}

// Searching for a post
if (isset($_POST['cmd_search_post']))
{
    // Navigation
    $view = new Header();
    $view->LoggedInHeader();

    // Ask database for games
    $game = new Game();
    $games = $game->GetGameList();

    // Search bar
    $view = new Forms();
    $view->SearchPostForm($games);

    // Ask database for all blog posts
    $blog = new Blog();
    $blogList = $blog->GetPosts(
        $_POST['input_game'],
        $_POST['input_username'],
        $_POST['input_tags']
    );

    // Show the posts
    $view = new Body();
    $view->PageBlogList($blogList);
    exit();
}

// Updating profile data
if (isset($_POST['cmd_profile']))
{
    if ($_POST['input_password_old'] != null &&
        $_POST['input_password'] != null &&
        $_POST['input_password_x'] != null &&
        $_POST['input_password'] == $_POST['input_password_x'])
    {
        // Modify password too
        $user = new User();
        $user->UpdateUserData(
            $_POST['input_username'],
            $_POST['input_email'],
            $_POST['input_realname'],
            $_POST['input_password_old'],
            $_POST['input_password'],
            true
        );
    }
    elseif ($_POST['input_password_old'] != null &&
            $_POST['input_password'] != null &&
            $_POST['input_password_x'] != null &&
            $_POST['input_password'] != $_POST['input_password_x'])
    {
        // The password and repeat password don't match
        header("Location: index.php?errorpage=fail_password_twice");
        exit();
    }
    else
    {
        // Skip password modification
    }
    $user = new User();
    $user->UpdateUserData(
        $_POST['input_username'],
        $_POST['input_email'],
        $_POST['input_realname'],
        "",
        "",
        false
    );
}

/**
 * Site structure --------------------------------------------------------------
 */
if (isset($_GET['profile']))
{
    /**
     * Profile -----------------------------------------------------------------
     */
    if ($_GET['profile'] == "modify")
    {
        // Navigation
        $view = new Header();
        $view->LoggedInHeader();

        // Database
        $user = new User();
        $userData = $user->SelectBasicData();

        // Body
        $view = new Forms();
        $view->ProfileEditForm(
            $userData['username'],
            $userData['email'],
            $userData['realname']
        );
    }
    else
    {
        // Navigation
        $view = new Header();
        $view->LoggedInHeader();

        // Database
        $user = new User();
        $userData = $user->SelectBasicData();

        // Body
        $view = new Body();
        $view->PageProfile(
            $userData['username'], 
            $userData['email'], 
            $userData['realname']
        );
    }
}
elseif (isset($_GET['blog']))
{
    /**
     * Blogs -------------------------------------------------------------------
     */
    if ($_GET['blog'] == "create")
    {
        // Post creation form

        // Navigation
        $view = new Header();
        $view->LoggedInHeader();

        // Ask database for games
        $game = new Game();
        $games = $game->GetGameList();

        // Show the blog creation form
        $view = new Forms();
        $view->BlogCreateForm($games);
    }
    elseif ($_GET['blog'] == "show")
    {
        // List of blogs

        // Navigation
        $view = new Header();
        $view->LoggedInHeader();

        // Ask database for games
        $game = new Game();
        $games = $game->GetGameList();

        // Search bar
        $view = new Forms();
        $view->SearchPostForm($games);

        // Ask database for all blog posts
        $blog = new Blog();
        $blogList = $blog->GetAllPost();

        // Show the posts
        $view = new Body();
        $view->PageBlogList($blogList);
    }
    else
    {
        // Some blog categories with flat design
        
        // Navigation
        $view = new Header();
        $view->LoggedInHeader();
    }
}
elseif (isset($_GET['userlist']))
{
    /**
     * User list ---------------------------------------------------------------
     */
    // Navigation
    $view = new Header();
    $view->LoggedInHeader();
}
elseif (isset($_GET['errorpage']))
{
    /**
     * Error pages -------------------------------------------------------------
     */
    $view = new Header();
    $view->LoggedInHeader();
    include './controllers/controller_error.php';
}
elseif (isset($_GET['logout']))
{
    unset($_SESSION['username']);
    session_destroy();
    header("Location: index.php?site=home");
    exit();
}
else
{
    /**
     * Else --------------------------------------------------------------------
     */
    // Navigation
    $view = new Header();
    $view->LoggedInHeader();

    // Database
    $user = new User();
    $userData = $user->SelectBasicData();

    // Body
    $view = new Body();
    $view->PageProfile(
        $userData['username'], 
        $userData['email'], 
        $userData['realname']
    );
}

################################################################################
#
#                                   Uses
#
# .\index.php
#

?>