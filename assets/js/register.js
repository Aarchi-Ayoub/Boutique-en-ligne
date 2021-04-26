$(document).ready(function () {
    var emailEmpty = true; /* global*/   var chekEmptyemail = emailEmpty;
    var usernameEmpty = true; /* global is : */   var chekEmptyusername = usernameEmpty;
    var passEmpty = true; /* global is : */   var chekEmptypass = passEmpty;
    var retpassEmpty = true; /* global is : */   var chekEmptyretpass = retpassEmpty;
    var telEmpty = true; /* global is : */   var chekEmptytel = telEmpty;
    var addresEmpty = true; /* global is : */   var chekEmptyaddres = addresEmpty;
    var cityEmpty = true; /* global is : */   var chekEmptyCity = cityEmpty;
    var stateEmpty = true; /* global is : */   var chekEmptystate= stateEmpty;
    var zipEmpty = true; /* global is : */   var chekEmptyzip= zipEmpty;
    var countryEmpty = true; /* global is : */   var chekEmptyCountry = countryEmpty;
    var uploadEmpty = true;

    $('#username_cust').keyup(function () {
        if($(this).val() == ''){
            $('.comp').css('margin-top','-27px');
            chekEmptyusername = usernameEmpty = true;
            $(".user_feesback").html("<p class='text-danger' style='font-size:12px '>Le nom d'utilisateur ne peut pas être vide</p>");
            return false;
        }else{

            $(".user_feesback").html("<p class='text-danger' style='font-size:12px '></p>");
            $.ajax({
                url:'_functions/register_ajax.php',
                method:'post',
                data:{
                    action:"check_username_ifExist",
                    username : $('#username_cust').val()
                },
                success:function(data_result_username){
                    if(data_result_username == 0){
                        $('.comp').css('margin-top','-27px');
                        $(".user_feesback").html("<p class='text-success' style='font-size:12px '>nom d'utilisateur valide</p>");
                        chekEmptyusername = usernameEmpty = false;
                    }else{
                        $('.comp').css('margin-top','-27px');
                        $(".user_feesback").html("<p class='text-danger' style='font-size:12px '> nom d'utilisateur exist déja</p>");
                        chekEmptyusername = usernameEmpty = true;

                    }

                }

            });





        }//end


    });

    $('#company_name_cust').keyup(function () {
        if($(this).val() == "") {
            $('.ful').css('margin-top', '-0px');
        }else{
            $('.ful').css('margin-top', '-0px');
        }
    });

$('#email_cust').keyup(function () {
    //1 - check email if valid or no (complete)
    //2- check if email already exist oor no

    if($(this).val() == ""){
        chekEmptyemail = emailEmpty = true;
        $('.phone').css('margin-top','-28px');
        $(".email_feesback").html("<p class='text-danger' style='font-size:12px '>e-mail ne peut pas être vide</p>");

        return false;
    }else{
        $('.phone').css('margin-top','-28px');
        $(".email_feesback").html("<p class='text-danger' style='font-size:12px '></p>");
        if(validateEmail()){
            $.ajax({
                url:'_functions/register_ajax.php',
                method:'post',
                data:{
                    action:"check_email_ifExist",
                    email : $('#email_cust').val()
                },
                success:function(data_result){
                    if(data_result == 0){
                        $(".email_feesback").html("<p class='text-success' style='font-size:12px '>Adresse e-mail valable</p>");
                        chekEmptyemail = emailEmpty = false;

                    }else{
                        $(".email_feesback").html("<p class='text-danger' style='font-size:12px '>l'Adresse e-mail exist déja</p>");
                        chekEmptyemail = emailEmpty = true;

                    }

                }

            });



        }else{
            // if the email is not validated
            // set border red
            $(".email_feesback").html("<p class='text-danger' style='font-size:12px '>ne semble pas être une adresse e-mail valide..</p>");
            // $('.phone').css('margin-top','-28px');
            chekEmptyemail = emailEmpty = true;


        }



    }//end



});
    function validateEmail(){
        // get value of input email
        var email=$("#email_cust").val();
        // use regular expression
        var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
        if(reg.test(email)){
            return true;

        }else{
            return false;
        }

    }
$('#tel_cust').keyup(function () {
       if($(this).val() == ''){
         $('.em').css('margin-top','-20px');
           chekEmptytel = telEmpty = true;
           $(".tel_feesback").html("<p class='text-danger' style='font-size:12px '>Le téléphone ne peut pas être vide</p>");

           return false;

       }else{
           chekEmptytel = telEmpty = false;
           $(".tel_feesback").html("<p class='text-danger' style='font-size:12px '></p>");
            $('.em').css('margin-top','-0px');

       }


    });

$('#cust_address').keyup(function () {
        if($(this).val() ==  ""){
            $('.im').css('margin-top','-27px');
            chekEmptyaddres= addresEmpty = true;
            $(".address_feesback").html("<p class='text-danger' style='font-size:12px '>L'adresse ne peut pas être vide</p>");
            return false;
        }else{
            $('.im').css('margin-top','-0px');
            $(".address_feesback").html("<p class='text-danger' style='font-size:12px '></p>");
            chekEmptyaddres = addresEmpty = false;
        }

 });

$('#cust_country').keyup(function () {
        if($(this).val() ==  ""){
            $('.ci').css('margin-top','-27px');
            chekEmptyCountry= countryEmpty = true;
            $(".country_feesback").html("<p class='text-danger' style='font-size:12px '>Le pays ne peut pas être vide</p>");
            return false;
        }else{
            $(".country_feesback").html("<p class='text-danger' style='font-size:12px '></p>");
            chekEmptyCountry = countryEmpty = false;
            $('.ci').css('margin-top','-0px');
        }

});
$('#cust_city').keyup(function () {
        if($(this).val() ==  ""){
            $('.cou').css('margin-top','-27px');
            chekEmptyCity= cityEmpty = true;
            $(".city_feesback").html("<p class='text-danger' style='font-size:12px '>La ville ne peut pas être vide</p>");
            return false;
        }else{
            $('.cou').css('margin-top','-0px');
            $(".city_feesback").html("<p class='text-danger' style='font-size:12px '></p>");
            chekEmptyCity= cityEmpty =  false;
        }

    });

$('#cust_state').keyup(function () {
        if($(this).val() ==  ""){
            $('.zi').css('margin-top','-27px');
            chekEmptystate= stateEmpty = true;
            $(".state_feesback").html("<p class='text-danger' style='font-size:12px '>province ne peut pas être vide</p>");
            return false;
        }else{
            $('.zi').css('margin-top','-0px');
            $(".state_feesback").html("<p class='text-danger' style='font-size:12px '></p>");
            chekEmptystate= stateEmpty =  false;
        }

    });
$('#cust_zip_code').keyup(function () {
        if($(this).val() ==  ""){
            $('.st').css('margin-top','-27px');
            chekEmptyzip= zipEmpty = true;
            $(".zip_feesback").html("<p class='text-danger' style='font-size:12px '>Le code postal ne peut pas être vide</p>");
            return false;
        }else{
            $('.st').css('margin-top','-0px');

            $(".zip_feesback").html("<p class='text-danger' style='font-size:12px '></p>");
            chekEmptyzip= zipEmpty=  false;
        }

    });


$('#cust_password').keyup(function () {
if($(this).val() ==  ""){
    $('.re_pa').css('margin-top','-27px');

    chekEmptypass = passEmpty = true;
    $(".password_feesback").html("<p class='text-danger' style='font-size:12px '>le mot de passe ne peut pas être vide</p>");
return false;
}else{
    $('.re_pa').css('margin-top','-0px');
    $(".password_feesback").html("<p class='text-danger' style='font-size:12px '></p>");
    chekEmptypass = passEmpty = false;
}

});

$('#cust_retype_password').keyup(function () {
    if($(this).val() ==  ""){
        $('.pas').css('margin-top','-27px');
        chekEmptyretpass = retpassEmpty = true;
        $(".ret_passwordfeesback").html("<p class='text-danger' style='font-size:12px '>La réinitialisation du mot de passe ne peut pas être vide</p>");
        return false;
    }else{
        $(".ret_passwordfeesback").html("<p class='text-danger' style='font-size:12px '></p>");
        if($('#cust_password').val() == $('#cust_retype_password').val()){
            $('.pas').css('margin-top','-27px');
            chekEmptyretpass = retpassEmpty = false;
            $(".ret_passwordfeesback").html("<p class='text-success' style='font-size:12px '>identique</p>");
        }else{
            $('.pas').css('margin-top','-27px');
            chekEmptyretpass = retpassEmpty = true;
            $(".ret_passwordfeesback").html("<p class='text-danger' style='font-size:12px '>Le mot de passe ne correspond pas</p>");
        }


    }


});

    let ext = '';
    $('#user_photo').on('blur',function () {
        /*
          1- testing value
          2- testing allowed extension
          3-test img size
        */
        if($(this).val() == ""){
            $('.ad').css('margin-top','-27px');
           $('#img_feesback').html("<p class='text-danger' style='font-size:12px '>L'image ne peut pas être vide/</p>");
            uploadEmpty = true;
            return false;

        }else{
            ext = $('#user_photo').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(ext,['jpg','png','jpeg']) == -1){
                //image not allowed ex:txt

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'autorisé seulement (jpg,png,jpeg)'
                }).then((result)=>{
                    if(result.value){
                        $('#user_photo').val('');
                    }
                });


                $('#user_photo').val('');
                uploadEmpty = true;
                return  false;

            }else{

                let imgsize=(this.files[0].size);
                if(imgsize > 1000000){//octet
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'image plus grande que 1 Mo!'

                    }).then((result)=>{
                        if(result.value){
                            $('#user_photo').val('');
                        }

                    });
                    $('#user_photo').val('');
                    uploadEmpty = true;
                    return  false;

                }else{
                    $('.ad').css('margin-top','-0px');
                  uploadEmpty=false;
                    return  true;

                }

            }
        }

    });

    $('#form_register').on('submit',function (e) {
        e.preventDefault();
        if(chekEmptyemail === true || chekEmptyusername === true || chekEmptypass=== true || chekEmptyretpass=== true || chekEmptytel === true ||
            chekEmptyaddres === true || chekEmptyCity === true || chekEmptyCountry === true || chekEmptystate=== true || chekEmptyzip=== true || uploadEmpty === true){

            $('#username_cust,#email_cust,#tel_cust,#cust_address,#cust_country,#cust_city,#cust_state,#cust_zip_code,#cust_password,#cust_retype_password').keyup();
            $('#user_photo').blur();
        }else{
            let data = new FormData();
            data.append('file',$('#user_photo')[0].files[0]);
            data.append('email',$('#email_cust').val());
            data.append('username',$('#username_cust').val());
            data.append('companyname',$('#company_name_cust').val());
            data.append('telcust',$('#tel_cust').val());
            data.append('custaddress',$('#cust_address').val());
            data.append('country',$('#cust_country').val());
            data.append('city',$('#cust_city').val());
            data.append('state',$('#cust_state').val());
            data.append('zipcode',$('#cust_zip_code').val());
            data.append('password',$('#cust_password').val());
            data.append('action','inscription_customer');


             $.ajax({
                 url:'_functions/register_ajax.php',
                 type:'post',
                 data:data,
                 processData:false,
                 contentType:false,
                 success:function (result) {
                         Swal.fire({
                             icon: 'success',
                             title: 'Votre inscription est terminée.',
                             text: false,
                             showConfirmButton: false,
                             timer: 3000,
                             allowOutsideClick: false

                         }).then(function(){
                             window.location = 'login.php';

                         });
                 }


             });





        }
    });




});