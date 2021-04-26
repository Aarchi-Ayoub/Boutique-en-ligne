<?php
require_once('_config/config.php');
require_once(ROOT.DS.'_init'.DS.'initialize.php');
require_once(ROOT.DS.'includes'.DS.'head.php');
?>

<body>

    <div id="preloder">
        <div class="loader"></div>
    </div>

    <?php  require_once('includes/nav.php'); ?>

    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.php"><i class="fa fa-home"></i> Accueil</a>
                        <span>S'identifier</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>S'identifier</h2>
                        <form action="#" method="post" id="form_login">
                            <div class="group-input">
                                <label for="username">adresse e-mail *</label>
                                <input type="text" id="email_login">
                                <span class="msg_error1"></span>
                            </div>
                            <div class="group-input">
                                <label for="pass">Mot de passe *</label>
                                <input type="password" id="pass_login">
                                <span class="msg_error2"></span>
                            </div>
                            <div class="group-input gi-check">

                            </div>
                            <button type="submit" class="site-btn login-btn">Se connecter</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once(ROOT.DS.'includes'.DS.'footer.php');?>