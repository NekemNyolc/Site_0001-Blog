<?php

################################################################################
#																			   #
# 				This controller controls the logged out state.				   #
#																			   #
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
include './models/user.class.php';

/**
 * Actions ---------------------------------------------------------------------
 */
// Login button pressed
if (isset($_POST['cmd_login']))
{
	$user = new User();
	$user->LoginUser();
}

// Registration button pressed
if (isset($_POST['cmd_register']))
{
	$user = new User();
	$user->RegisterUser();
}

/**
 * Site Structure --------------------------------------------------------------
 */
if (isset($_GET['site']))
{
	if ($_GET['site'] == "home")
	{
		// Homepage
		$view = new Header();
		$view->LoggedOutHeader();
		$view = new Body();
		$view->PageIndex();
	}
	elseif ($_GET['site'] == "login")
	{
		// Login page
		$view = new Header();
		$view->LoggedOutHeader();
		$view = new Forms();
		$view->LoginForm();
	}
	elseif ($_GET['site'] == "registration")
	{
		// Registration page
		$view = new Header();
		$view->LoggedOutHeader();
		$view = new Forms();
		$view->RegistrationForm();
	}
	elseif ($_GET['site'] == "about")
	{
		// About page
		$view = new Header();
		$view->LoggedOutHeader();
		$view = new Body();
		$view->PageAbout();
	}
	else
	{
		// Homepage
		$view = new Header();
		$view->LoggedOutHeader();
		$view = new Body();
		$view->PageIndex();
	}
}
elseif (isset($_GET['errorpage']))
{
	/**
	 * Error pages -------------------------------------------------------------
	 */
	$view = new Header();
	$view->LoggedOutHeader();
    include './controllers/controller_error.php';
}
else
{
	/**
	 * Else --------------------------------------------------------------------
	 */
	// Homepage
	$view = new Header();
	$view->LoggedOutHeader();
	$view = new Body();
	$view->PageIndex();
}

################################################################################
#
#                                   Uses
#
# .\index.php
#

?>