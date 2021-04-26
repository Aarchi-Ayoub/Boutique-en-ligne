
<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="footer-left">
                    <div class="footer-logo">
                        <a href="#"><img src="assets/img/img_static_index/logo-white.png" alt="" width="150px"></a>
                    </div>
                    <ul>
                        <li>Addresse: 50 avenue france Rabat</li>
                        <li>Téléphone: +30.25.13.14</li>
                        <li>Email: FitnessLand@gmail.com</li>
                    </ul>
                    <div class="footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="footer-widget">
                    <h5>Information</h5>
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="blog.php">Article</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="footer-widget">
                    <h5>Mon compte</h5>
                    <ul>
                        <li><a href="login.php">Mon compte</a></li>
                        <li><a href="shopping-cart.php">Panier</a></li>
                        <li><a href="shop.php">Boutique</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="copyright-reserved">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Js Plugins -->
<script src="assets/js/jquery-3.5.1.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.countdown.min.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
<script src="assets/js/jquery.zoom.min.js"></script>
<script src="assets/js/jquery.dd.min.js"></script>
<script src="assets/js/jquery.slicknav.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/rating.js"></script>
<script src="assets/js/select2.full.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/jquery-ui.js"></script>
<script src="assets/js/sweetalert2.js"></script>
<script src="assets/js/product_filter.js"></script>
<script src="assets/js/register.js"></script>
<script src="assets/js/login.js"></script>
<script src="assets/js/commentaire.js"></script>
<script src="assets/js/billing_shipping.js"></script>
<script src="assets/js/dashbord.js"></script>
<script src="assets/js/contact.js"></script>

<script>
    $('.select2').select2();
    //rating in comments product
    var ratingSection       = $('.rating-section');
    ratingSection.rating();


    function isInputNumber(evt) {
        var char = String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(char))){
            evt.preventDefault();
        }
    }

    $(document).ready(function () {
        advFieldsStatus = $('#advFieldsStatus').val();

        $('#paypal_form').hide();
       $('#advFieldsStatus').on('change',function() {
            advFieldsStatus = $('#advFieldsStatus').val();
            if ( advFieldsStatus == '' ) {
                $('#paypal_form').hide();
              } else if ( advFieldsStatus == 'PayPal' ) {
                $('#paypal_form').show();
               } else if ( advFieldsStatus == 'Stripe' ) {
                $('#paypal_form').hide();
               } else if ( advFieldsStatus == 'Bank Deposit' ) {
                $('#paypal_form').hide();
                }
        });
    });

    const stars=document.querySelector(".ratings").children;
    const ratingValue=document.querySelector("#rating-value");
    let index;

    for(let i=0; i<stars.length; i++){
        stars[i].addEventListener("mouseover",function(){
            // console.log(i)
            for(let j=0; j<stars.length; j++){
                stars[j].classList.remove("fa-star");
                stars[j].classList.add("fa-star-o");
            }
            for(let j=0; j<=i; j++){
                stars[j].classList.remove("fa-star-o");
                stars[j].classList.add("fa-star");
            }
        })
        stars[i].addEventListener("click",function(){
            ratingValue.value=i+1;
            index=i;
        })
        stars[i].addEventListener("mouseout",function(){

            for(let j=0; j<stars.length; j++){
                stars[j].classList.remove("fa-star");
                stars[j].classList.add("fa-star-o");
            }
            for(let j=0; j<=index; j++){
                stars[j].classList.remove("fa-star-o");
                stars[j].classList.add("fa-star");
            }
        })
    }




</script>

<script>
    const starss=document.querySelector(".ratingss").children;
    const ratingValue_blog=document.querySelector("#rating-value_blog");
    let indexs;

    for(let i=0; i<starss.length; i++){
        starss[i].addEventListener("mouseover",function(){
            // console.log(i)
            for(let j=0; j<starss.length; j++){
                starss[j].classList.remove("fa-star");
                starss[j].classList.add("fa-star-o");
            }
            for(let j=0; j<=i; j++){
                starss[j].classList.remove("fa-star-o");
                starss[j].classList.add("fa-star");
            }
        })
        starss[i].addEventListener("click",function(){
            ratingValue_blog.value=i+1;
            indexs=i;
        })
        starss[i].addEventListener("mouseout",function(){

            for(let j=0; j<starss.length; j++){
                starss[j].classList.remove("fa-star");
                starss[j].classList.add("fa-star-o");
            }
            for(let j=0; j<=indexs; j++){
                starss[j].classList.remove("fa-star-o");
                starss[j].classList.add("fa-star");
            }
        })
    }


</script>


</body>

</html>
