<?php session_start(); ?>

    <link rel="stylesheet" type="text/css" href="../../styles/main.css">
    <link rel="stylesheet" type="text/css" href="../../styles/login.css">
    <title>Sign In</title>
    <body>
    <div class="container">
        <div class="singIn">
            <form action="../../../private/auth/forgot_pass_post.php" method="post" class="form__singIn">
                <div class="form__group">
                    <input type="email" name="email" placeholder="Email" >
                    <label for="" class="error"></label>
                </div>
                <div class="form__group">
                    <input type="submit">
                </div>
                <div class="errors">
                    <?php
                    if(isset($_SESSION['errors'])){
                        foreach ($_SESSION['errors'] as $error) {
                            echo "<p>" . $error .  "</p>";
                        }
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
    </body>
    </html>

<?php unset($_SESSION['errors'] );?>