<?php

################################################################################
#                                                                              #
#                             Main navigation panels                           #
#                                                                              #
################################################################################

class Header
{

    public function LoggedInHeader()
    {
        ?>
        <nav class="navbar navbar-expand-sm bg-dark sticky-top">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-warning" 
                       href="index.php?profile">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning"
                       href="index.php?blog=create">Create</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning"
                       href="index.php?blog=show">Blogs</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning"
                       href="index.php?userlist">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning"
                       href="index.php?logout">Logout</a>
                </li>
            </ul>
        </nav>
        <?php
    }

    public function LoggedOutHeader()
    {
        ?>
        <nav class="navbar navbar-expand-sm bg-dark sticky-top">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-warning" 
                       href="index.php?site=home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning" 
                       href="index.php?site=login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning" 
                       href="index.php?site=registration">Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning" 
                       href="index.php?site=about">About</a>
                </li>
            </ul>
        </nav>
        <?php
    }

}

################################################################################
#
#                                   Uses
#
# .\controllers\controller_main.php
# .\controllers\controller_user.php
#

?>