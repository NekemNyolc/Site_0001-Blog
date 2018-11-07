<?php

################################################################################
#                                                                              #
#                                    Forms                                     #
#                                                                              #
################################################################################

class Forms
{

    /**
     * Basic forms -------------------------------------------------------------
     */
    public function LoginForm()
    {
        ?>
        <div class="jumbotron">
            <h1>Login</h1>
            <p>
                <form method="POST">
                    <div class="form-group">
                        <label for="input_email">E-mail:</label>
                        <input 
                            type="email" 
                            name="input_email" 
                            class="form-control" 
                            id="input_email"
                            required="true">
                    </div>
                    <div class="form-group">
                        <label for="input_password">Password:</label>
                        <input 
                            type="password" 
                            name="input_password" 
                            class="form-control" 
                            id="input_password"
                            required="true">
                    </div>
                    <div class="form-group">
                        <input 
                            type="submit" 
                            name="cmd_login" 
                            value="Login" 
                            class="btn btn-primary" 
                            id="cmd_login">
                    </div>
                </form>
            </p>
        </div>
        <?php
    }

    public function RegistrationForm()
    {
        ?>
        <div class="jumbotron">
            <h1>Registration</h1>
            <p>
                <form method="POST">
                    <div class="form-group">
                        <label for="input_username">Username:</label>
                        <input 
                            type="text" 
                            name="input_username" 
                            class="form-control" 
                            id="input_username"
                            required="true">
                    </div>
                    <div class="form-group">
                        <label for="input_password">Password:</label>
                        <input 
                            type="password" 
                            name="input_password" 
                            class="form-control" 
                            id="input_password"
                            required="true">
                    </div>
                    <div class="form-group">
                        <label for="input_password_x">Repeat Password:</label>
                        <input 
                            type="password" 
                            name="input_password_x" 
                            class="form-control" 
                            id="input_password_x" 
                            required="true">
                    </div>
                    <div class="form-group">
                        <label for="input_email">E-mail:</label>
                        <input 
                            type="email" 
                            name="input_email" 
                            class="form-control" 
                            id="input_email"
                            required="true">
                    </div>
                    <div class="form-group">
                        <label for="input_realname">Realname:</label>
                        <input 
                            type="text" 
                            name="input_realname" 
                            class="form-control" 
                            id="input_realname">
                    </div>
                    <div class="form-group">
                        <input 
                            type="submit" 
                            name="cmd_register" 
                            value="Register" 
                            class="btn btn-primary" 
                            id="cmd_register">
                    </div>
                </form>
            </p>
        </div>
        
        <?php
    }

    /**
     * Logged in forms ---------------------------------------------------------
     */
    public function ProfileEditForm(
        $username,
        $email,
        $realname)
    {
        ?>
        <div class="jumbotron">
            <h1>Profile</h1>
            <form method="POST">
                <div class="form-group">
                    <label for="input_username">Username:</label>
                    <input type="text" 
                           class="form-control" 
                           name="input_username"
                           id="input_username" 
                           value="<?php echo $username; ?>">
                </div>
                <div class="form-group">
                    <label for="input_email">E-mail:</label>
                    <input type="email" 
                           class="form-control"
                           name="input_email"
                           id="input_email"
                           value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <label for="input_realname">Real Name:</label>
                    <input type="text" 
                           class="form-control"
                           name="input_realname"
                           id="input_realname"
                           value="<?php echo $realname; ?>">
                </div>
                <div class="form-group">
                    <label for="input_password_old">Old password:</label>
                    <input type="password"
                           name="input_password_old"
                           class="form-control"
                           id="input_password_old">
                </div>
                <div class="form-group">
                    <label for="input_password">New password:</label>
                    <input type="password"
                           name="input_password"
                           class="form-control"
                           id="input_password">
                </div>
                <div class="form-group">
                    <label for="input_password_x">
                        Repeat new password:
                    </label>
                    <input type="password"
                           name="input_password_x"
                           class="form-control"
                           id="input_password_x">
                </div>
                <div class="form-group">
                    <input type="submit" 
                           class="btn btn-primary" 
                           name="cmd_profile"
                           id="cmd_profile"
                           value="Update">
                </div>
            </form>
        </div>
        <?php
    }

    public function BlogCreateForm($games)
    {
        ?>
        <div class="jumbotron">
            <h1>New post</h1>
            <p>
                <form method="POST">
                    <div class="form-group">
                        <label for="input_title">Title:</label>
                        <input type="text"
                               class="form-control"
                               name="input_title"
                               id="input_title">
                    </div>
                    <div class="form-group">
                        <label for="input_content">Content:</label>
                        <textarea class="form-control"
                                  name="input_content" 
                                  id="input_content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="input_tags">Tags:</label>
                        <input type="text"
                               class="form-control"
                               name="input_tags"
                               id="input_tags">
                    </div>
                    <div class="form-group">
                        <label for="input_game">Game:</label>
                        <select class="form-control" 
                                name="input_game" 
                                id="input_game">
                            <?php
                            foreach ($games as $game)
                            {
                                ?><option value="<?php echo $game; ?>"><?php
                                    echo $game;
                                ?></option><?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" 
                               name="cmd_create" 
                               id="cmd_create"
                               class="btn btn-primary"
                               value="Submit post">
                    </div>
                </form>
            </p>
        </div>
        <?php
    }

    /**
     * Search forms ------------------------------------------------------------
     */
    public function SearchPostForm($games)
    {
        ?>
        <div class="jumbotron bg-secondary">
            <form class="form-inline" method="POST">
                <div class="form-group">
                    <select class="form-control" 
                            id="input_game" 
                            name="input_game">
                        <option value="">All games</option>
                        <?php
                        foreach ($games as $game)
                        {
                            ?><option value="<?php echo $game; ?>"><?php
                                echo $game;
                            ?></option><?php 
                        }
                        ?>
                    </select>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input type="text" 
                           class="form-control" 
                           placeholder="Username"
                           id="input_username"
                           name="input_username">
                </div>
                <input class="form-control mr-sm-2" 
                       type="text" 
                       placeholder="Tags"
                       id="input_tags"
                       name="input_tags">
                <div class="form-group">
                    <select class="form-control"
                            id="input_order"
                            name="input_order">
                        <option value="date_new">Date (New)</option>
                        <option value="date_old">Date (old)</option>
                    </select>
                </div>
                <input type="submit" 
                       name="cmd_search_post"
                       id="cmd_search_post"
                       class="btn btn-success"
                       value="Search">
            </form>
        </div>
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