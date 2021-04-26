<?php
require_once('..'.DIRECTORY_SEPARATOR. '_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');
?>
<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>cpanel Authentification</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
       <link rel="stylesheet" href="_assets/css/font-awesome.min.css">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../assets/css/all.css">
    <link rel="stylesheet" href="../assets/css/style_login_register.css">
    <link rel="stylesheet" href="_assets/css/sweetalert2.min.css">
</head>

<body>
<div class="logo_in_login">
    <img src="../assets/img/img_static_index/logo-black.png" >

</div>


<div class="tabs">
    <div class="list-group pull-right" id="list-tab" role="tablist">

        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home"></a>

    </div>
</div>



<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">

        <img class="wave" src="../assets/img/img_static_index/wave.svg">
        <div class="container">


            <div class="img">
                <img src="../assets/img/img_static_index/bg2.svg">
            </div>

            <div class="login-content active" id="login">
                <form action="#" method="post" id="form_login_to_dash">
                    <img src="../assets/img/img_static_index/avatar.svg">

                    <div class="input-div one">
                        <div class="i">

                        </div>
                        <div class="div">
                            <h5>Email</h5>
                            <input type="email" class="input" id="email">

                        </div>

                    </div>
                    <span class="msg_eror_email"></span>
                    <div class="input-div pass">
                        <div class="i">

                        </div>
                        <div class="div">
                            <h5>Mot de passe</h5>
                            <input type="password" class="input" id="pass">

                        </div>

                    </div>
                    <span class="msg_eror_pass"></span>
                     <input type="submit" class="btn btn_login" value="S'identifier">
                </form>
            </div>


        </div>
    </div>


</div>
</div>

</div>

<script src="_assets/js/jquery.js"></script>
<script src="_assets/js/popper.min.js"></script>
<script src="_assets/js/bootstrap.js"></script>
<script src="_assets/js/sweetalert2.js"></script>

<script src="_assets/js/admin_login.js"></script>
<script type="text/javascript">
    const inputs = document.querySelectorAll(".input");


    function addcl(){
        let parent = this.parentNode.parentNode;
        parent.classList.add("focus");
    }

    function remcl(){
        let parent = this.parentNode.parentNode;
        if(this.value == ""){
            parent.classList.remove("focus");
        }
    }


    inputs.forEach(input => {
        input.addEventListener("focus", addcl);
        input.addEventListener("blur", remcl);
    });




</script>


</body>
</html>