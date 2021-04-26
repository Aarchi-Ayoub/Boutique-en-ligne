<?php
require_once('_config/config.php');
require_once(ROOT.DS.'_init'.DS.'initialize.php');
require_once(ROOT.DS.'includes'.DS.'head.php');
?>

<?php  require_once('includes/nav.php'); ?>

<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="index.php"><i class="fa fa-home"></i> Accueil</a>
                    <span>Contact</span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="contact-title">
                    <h4>Contactez-nous</h4>
                    </div>
                <div class="contact-widget">
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-location-pin"></i>
                        </div>
                        <div class="ci-text">
                            <span>Adresse:</span>
                            <p>50 avenue france Rabat</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-mobile"></i>
                        </div>
                        <div class="ci-text">
                            <span>Téléphone:</span>
                            <p>+30.25.13.14</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-email"></i>
                        </div>
                        <div class="ci-text">
                            <span>Email:</span>
                            <p>FitnessLand@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="contact-form">
                    <div class="leave-comment">
                        <h4>Laissez un commentaire</h4>
                        <p>Notre personnel vous rappellera plus tard et répondra à vos questions.</p>
                        <form action="" method="post" id="comment_form_add" class="comment-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Votre nom" id="contact_name">
                                    <span class="name_feesback"></span>
                                </div>

                                <div class="col-lg-6">
                                    <input type="email" placeholder="Votre email" id="contact_email">
                                    <span class="email_feesback"></span>
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Your message" id="contact_message"></textarea>
                                    <span class="message_feesback"></span>
                                    <button type="submit" class="site-btn">Envoyer le message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php require_once(ROOT.DS.'includes'.DS.'footer.php');?>
