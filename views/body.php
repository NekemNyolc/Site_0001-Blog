<?php

################################################################################
#                                                                              #
#                           Main part of the site                              #
#                                                                              #
################################################################################

class Body
{

    /**
     * Logged out pages --------------------------------------------------------
     */
    public function PageAbout()
    {
        ?>

        <?php
    }

    public function PageIndex()
    {
        ?>
        <div>
        
        <div class="jumbotron">
            <h1>
                Armchair Blog
            </h1>
            <p><h4>
                This is a basic blog. Nothing special. Just to show something about my web development skills. The theme of the blog is about... um... gaming. Yes... it's about games. Some basic games to show content, not only the "lorem ipsum" thing. For templates it's good but it doesn't show my personality. If I write some personal made content it's better than a template. But now let's see, why you should 
                choose us:
            </h4></p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="jumbotron">
                    <h4>I have a certification about my programming skills.</h4>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="jumbotron">
                    <h4>But I learned the most of my knowledge by myself.</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="jumbotron">
                    <h4>When I see a code, I become happy, because programming is fun and relaxing to me.</h3>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="jumbotron">
                    <h4>Of course I'm not a robot and I also like playing games, but creating something new is better than playing.</h4>
                </div>
            </div>
        </div>

        </div>
        <?php
    }

    /**
     * Logged in pages ---------------------------------------------------------
     */
    public function PageProfile(
        $username, 
        $email, 
        $realname)
    {
        ?>
        <div class="jumbotron">
            <h1>Profile</h1>
            <p>
                Username: <?php echo $username; ?>
            </p>
            <p>
                E-mail: <?php echo $email; ?>
            </p>
            <p>
                Real Name: <?php echo $realname; ?>
            </p>
            <p>
                <a class="btn btn-primary" 
                   href="index.php?profile=modify">Edit</a>
            </p>
        </div>
        <?php
    }

    public function PageBlogList($blogList)
    {
        if (is_null($blogList))
        {
            echo "No data!";
            exit();
        }
        for ($row=0; $row < count($blogList); $row++)
        {
            ?>
            <div class="card">
                <div class="card-header bg-info">
                    <h2 class="card-title text-light">
                        <strong><?php echo $blogList[$row][0]; ?></strong>
                    </h2>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <?php echo $blogList[$row][1]; ?>
                    </p>
                    <h5><strong>By:</strong> <?php echo $blogList[$row][4]; ?></h5>
                </div>
                <div class="card-footer">
                    <h6>
                        <strong>Date posted:</strong> 
                        <i class="text-secondary">
                            <?php echo $blogList[$row][2]; ?>
                        </i>
                    </h6>
                    <h6>
                        <strong>Category:</strong> 
                        <?php echo $blogList[$row][3]; ?>
                    </h6>
                    <h6>
                        <strong>Tags:</strong> 
                        <?php echo $blogList[$row][5]; ?>
                    </h6>
                </div>
            </div>
            <?php
        }
    }

    /**
     * User list ---------------------------------------------------------------
     */
    public function UserCards($userCards)
    {
        if (is_null($userCards))
        {
            echo "No data!";
            exit();
        }

        # card[0]: u_username
        # card[1]: u_email
        # card[2]: u_realname
        # card[3]: u_image
        # card[4]: u_regdate

        foreach ($userCards as $card)
        {
            if (is_null($card[3]))
            {
                $card[3] = "./images/_default.png";
            }

            ?>
            <div class="card" style="width: 300px; display: inline-block;">
                <div class="card-header bg-primary">
                    <img src="<?php echo $card[3]; ?>" style="width: 256px;">
                </div>
                <div class="card-body">
                    <p>
                        <strong>Username: </strong><?php echo $card[0]; ?>
                    </p>
                    <p>
                        <strong>E-mail: </strong><?php echo $card[1]; ?>
                    </p>
                    <p>
                        <strong>Real name: </strong><?php echo $card[2]; ?>
                    </p>
                    <p>
                        <strong>Registration date: </strong><?php echo $card[4]; ?>
                    </p>
                </div>
            </div>
            <?php
        }
    }

    /**
     * Error page --------------------------------------------------------------
     */
    public function PageError($errormessage)
    {
        ?>
        <div class="alert alert-danger">
            <h6><strong>Error!</strong> <?php echo $errormessage; ?></h6>
        </div>
        <?php
    }

    public function PageSuccess($errormessage)
    {
        ?>
        <div class="alert alert-success">
            <h6><strong>Yay!</strong> <?php echo $errormessage; ?></h6>
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