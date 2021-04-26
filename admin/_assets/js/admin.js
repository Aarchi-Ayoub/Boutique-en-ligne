$(document).ready(function () {
var nameEmpty = true;
var phoneEmpty = true;
var countryEmpty = true;
var adressEmpty = true;
var cityEmpty = true;
var stateEmpty = true;
var zipEmpty = true;
var passEmpty = true;
var retpassEmpty = true;
var uploadEmpty = true;
var emailEmpty = true; var chekEmptyemail = emailEmpty = true;

    $('#email_admin').keyup(function () {
        //1 - check email if valid or no (complete)
        //2- check if email already exist oor no

        if($(this).val() == ""){
            emailEmpty = true;

            $(".emailEmpty").html("<p class='text-danger' style='font-size:12px '>L'e-mail ne peut pas être vide</p>");

            return false;
        }else{

            $(".emailEmpty").html("<p class='text-danger' style='font-size:12px '></p>");
            if(validateEmail()){
                $.ajax({
                    url:'_functions_ajax/admin_crud.php',
                    method:'post',
                    data:{
                        action:"check_email_ifExist_admin",
                        email : $('#email_admin').val()
                    },
                    success:function(data_result){
                        if(data_result == 0){
                            $(".emailEmpty").html("<p class='text-success' style='font-size:12px '>Adresse e-mail valable</p>");
                            chekEmptyemail = emailEmpty = false;

                        }else{
                            $(".emailEmpty").html("<p class='text-danger' style='font-size:12px '> email address already exist</p>");
                            chekEmptyemail = emailEmpty = true;

                        }

                    }

                });



            }else{
                // if the email is not validated
                // set border red
                $(".emailEmpty").html("<p class='text-danger' style='font-size:12px '> ne semble pas être une adresse e-mail valide..</p>");
                // $('.phone').css('margin-top','-28px');
                chekEmptyemail = emailEmpty = true;


            }



        }//end



    });
    function validateEmail(){
        // get value of input email
        var email=$("#email_admin").val();
        // use regular expression
        var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
        if(reg.test(email)){
            return true;

        }else{
            return false;
        }

    }

    $('#name_admin').on('blur',function () {
        if($(this).val() == ""){
            nameEmpty = true;
            $('.nameEmpty').html("<p class='text-danger'>Le nom ne peut pas être vide</p>");
            return false;
        }else{
            $('.nameEmpty').html("<p class='text-danger'></p>");
            nameEmpty = false;
        }

    });
    $('#phone_admin').on('blur',function () {
        if($(this).val() == ""){
            phoneEmpty = true;
            $('.phoneEmpty').html("<p class='text-danger'>Le téléphone ne peut pas être vide</p>");
            return false;
        }else{
            $('.phoneEmpty').html("<p class='text-danger'></p>");
            phoneEmpty = false;
        }

    });
    $('#country_admin').on('blur',function () {
        if($(this).val() == ""){
            countryEmpty = true;
            $('.countryEmpty').html("<p class='text-danger'>Le pays ne peut pas être vide</p>");
            return false;
        }else{
            $('.countryEmpty').html("<p class='text-danger'></p>");
            countryEmpty = false;
        }

    });
    $('#adress_admin').on('blur',function () {
        if($(this).val() == ""){
            adressEmpty = true;
            $('.adressEmpty').html("<p class='text-danger'>L'adresse ne peut pas être vide</p>");
            return false;
        }else{
            $('.adressEmpty').html("<p class='text-danger'></p>");
            adressEmpty = false;
        }

    });
    $('#city_admin').on('blur',function () {
        if($(this).val() == ""){
            cityEmpty = true;
            $('.cityEmpty').html("<p class='text-danger'>La ville ne peut pas être vide</p>");
            return false;
        }else{
            $('.cityEmpty').html("<p class='text-danger'></p>");
            cityEmpty = false;
        }

    });
    $('#state_admin').on('blur',function () {
        if($(this).val() == ""){
            stateEmpty = true;
            $('.stateEmpty').html("<p class='text-danger'>Province ne peut pas être vide</p>");
            return false;
        }else{
            $('.stateEmpty').html("<p class='text-danger'></p>");
            stateEmpty = false;
        }

    });
    $('#zip_admin').on('blur',function () {
        if($(this).val() == ""){
            zipEmpty = true;
            $('.zipEmpty').html("<p class='text-danger'>Le code postal ne peut pas être vide</p>");
            return false;
        }else{
            $('.zipEmpty').html("<p class='text-danger'></p>");
            zipEmpty = false;
        }

    });
    $('#pass_admin').keyup(function () {
        if($(this).val() ==  ""){
           passEmpty = true;
            $(".passEmpty").html("<p class='text-danger' style='font-size:12px '>le mot de passe ne peut pas être vide</p>");
            return false;
        }else{

            $(".passEmpty").html("<p class='text-danger' style='font-size:12px '></p>");
             passEmpty = false;
        }

    });

    $('#repass_admin').keyup(function () {
        if($(this).val() ==  ""){

            retpassEmpty = true;
            $(".repassEmpty").html("<p class='text-danger' style='font-size:12px '>Le mot de passe de nouveau ne peut pas être vide</p>");
            return false;
        }else{
            $(".repassEmpty").html("<p class='text-danger' style='font-size:12px '></p>");
            if($('#pass_admin').val() == $('#repass_admin').val()){

                retpassEmpty = false;
                $(".repassEmpty").html("<p class='text-success' style='font-size:12px '>identique</p>");
            }else{
                retpassEmpty = true;
                $(".repassEmpty").html("<p class='text-danger' style='font-size:12px '>Le mot de passe ne correspond pas</p>");
            }


        }


    });

    let ext = '';
    $('#photo_admin').on('blur',function () {
        /*
          1- testing value
          2- testing allowed extension
          3-test img size
        */
        if($(this).val() == ""){
          $('#photoEmpty').html("<p class='text-danger' style='font-size:12px '>L'image ne peut pas être vide</p>");
            uploadEmpty = true;
            return false;

        }else{
            ext = $('#photo_admin').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(ext,['jpg','png','jpeg']) == -1){
                //image not allowed ex:txt

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'autorisé seulement (jpg,png,jpeg)'
                }).then((result)=>{
                    if(result.value){
                        $('#photo_admin').val('');
                    }
                });


                $('#photo_admin').val('');
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
                            $('#photo_admin').val('');
                        }

                    });
                    $('#photo_admin').val('');
                    uploadEmpty = true;
                    return  false;

                }else{
                   uploadEmpty=false;
                    $('#photoEmpty').html("<p class='text-danger' style='font-size:12px '></p>");
                    return  true;

                }

            }
        }

    });


    $('#form_add_admin').on('submit',function (e) {
          e.preventDefault();

        if(nameEmpty === true || phoneEmpty === true || countryEmpty === true || adressEmpty === true || cityEmpty === true ||
            stateEmpty === true || zipEmpty === true || passEmpty === true || retpassEmpty === true || uploadEmpty === true ||
            chekEmptyemail === true){

         $('#name_admin,#phone_admin,#country_admin,#adress_admin,#city_admin,#state_admin,#zip_admin,#photo_admin').blur();

         $('#email_admin,#pass_admin,#repass_admin').keyup();

        }else{

            let data = new FormData();
            data.append('file',$('#photo_admin')[0].files[0]);
            data.append('email',$('#email_admin').val());
            data.append('name',$('#name_admin').val());
            data.append('companyname',$('#cname_admin').val());
            data.append('telcust',$('#phone_admin').val());
            data.append('custaddress',$('#adress_admin').val());
            data.append('country',$('#country_admin').val());
            data.append('city',$('#city_admin').val());
            data.append('state',$('#state_admin').val());
            data.append('zipcode',$('#zip_admin').val());
            data.append('password',$('#pass_admin').val());
            data.append('action','inscription_admin');


            $.ajax({
                url:'_functions_ajax/admin_crud.php',
                type:'post',
                data:data,
                processData:false,
                contentType:false,
                success:function (result) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Admin ajouter avec succés.',
                        text: false,
                        showConfirmButton: false,
                        timer: 3000,
                        allowOutsideClick: false

                    }).then(function(){
                        window.location = 'admin-add.php';

                    });
                }


            });





        }




    });

/*******************************************************/
    $('.enabled_admin').on('click',function (e) {
        e.preventDefault();
        let user_id = $(this).attr('id');

        Swal.fire({
            title : "Êtes-vous sûr ?",
            text : "L'enregistrement sera activé ?",
            icon : "warning",
            showCancelButton:true,
            confirmButtonColor:'#3085d6',
            cancelButtonColor:'#d33',
            confirmButtonText:'Oui, activé '
        }).then((result) => {
            if(result.value){
                $.ajax({
                    url:'_functions_ajax/admin_crud.php',
                    method:'post',
                    data:{
                        id:user_id,
                        action:'switch_to_enabled_admin'

                    },

                    success:function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Activé avec succès',
                            text: false,
                            showConfirmButton: false,
                            timer: 1600,
                            allowOutsideClick: false

                        }).then(function(){
                            window.location = 'admin.php';

                        });
                    }

                });

            }

        });


    });
    $('.disabled_admin').on('click',function (e) {
        e.preventDefault();
        let user_id = $(this).attr('id');


        Swal.fire({
            title : "Êtes-vous sûr ?",
            text : "L'enregistrement sera désactivé ?",
            icon : "warning",
            showCancelButton:true,
            confirmButtonColor:'#3085d6',
            cancelButtonColor:'#d33',
            confirmButtonText:'Oui, désactivé '
        }).then((result) => {
            if(result.value){
                $.ajax({
                    url:'_functions_ajax/admin_crud.php',
                    type:'POST',
                    data:{
                        id:user_id,
                        action:'switch_to_Disabled_admin'

                    },
                    success:function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Désactivé avec succès',
                            text: false,
                            showConfirmButton: false,
                            timer: 1600,
                            allowOutsideClick: false

                        }).then(function(){
                            window.location = 'admin.php';

                        });
                    }

                });

            }

        });


    });
    $('.delete_admin').on('click',function (e) {
        e.preventDefault();
        let user_id = $(this).attr('id');


        Swal.fire({
            title : "Êtes-vous sûr ?",
            text : "L'enregistrement sera supprimé ?",
            icon : "warning",
            showCancelButton:true,
            confirmButtonColor:'#3085d6',
            cancelButtonColor:'#d33',
            confirmButtonText:'Oui, supprimez-le'
        }).then((result) => {
            if(result.value){
                $.ajax({
                    url:'_functions_ajax/admin_crud.php',
                    type:'POST',
                    data:{
                        id:user_id,
                        action:'delete_admin'

                    },
                    success:function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Supprimé avec succès',
                            text: false,
                            showConfirmButton: false,
                            timer: 1600,
                            allowOutsideClick: false

                        }).then(function(){
                            window.location = 'admin.php';

                        });
                    }

                });

            }

        });


    });

    /********************ediit*****************************************************/
    var nameEditEmpty = true;
    var phoneEditEmpty = true;
    var countryEditEmpty = true;
    var adressEditEmpty = true;
    var cityEditEmpty = true;
    var stateEditEmpty = true;
    var zipEditEmpty = true;

    $('#name_admin_edit').on('blur',function () {
        if($(this).val() == ""){
            nameEditEmpty = true;
            $('.nameEmpty_edit').html("<p class='text-danger'>Le nom ne peut pas être vide</p>");
            return false;
        }else{
            $('.nameEmpty_edit').html("<p class='text-danger'></p>");
            nameEditEmpty = false;
        }

    });
    $('#phone_admin_edit').on('blur',function () {
        if($(this).val() == ""){
            phoneEditEmpty = true;
            $('.phoneEmpty_edit').html("<p class='text-danger'>Le téléphone ne peut pas être vide</p>");
            return false;
        }else{
            $('.phoneEmpty_edit').html("<p class='text-danger'></p>");
            phoneEditEmpty = false;
        }

    });
    $('#country_admin_edit').on('blur',function () {
        if($(this).val() == ""){
            countryEditEmpty = true;
            $('.countryEmpty_edit').html("<p class='text-danger'>Le pays ne peut pas être vide</p>");
            return false;
        }else{
            $('.countryEmpty_edit').html("<p class='text-danger'></p>");
            countryEditEmpty = false;
        }

    });
    $('#adress_admin_edit').on('blur',function () {
        if($(this).val() == ""){
            adressEditEmpty = true;
            $('.adressEmpty_edit').html("<p class='text-danger'>L'adresse ne peut pas être vide</p>");
            return false;
        }else{
            $('.adressEmpty_edit').html("<p class='text-danger'></p>");
            adressEditEmpty = false;
        }

    });
    $('#city_admin_edit').on('blur',function () {
        if($(this).val() == ""){
            cityEditEmpty = true;
            $('.cityEmpty_edit').html("<p class='text-danger'>La ville ne peut pas être vide</p>");
            return false;
        }else{
            $('.cityEmpty_edit').html("<p class='text-danger'></p>");
            cityEditEmpty = false;
        }

    });
    $('#state_admin_edit').on('blur',function () {
        if($(this).val() == ""){
            stateEditEmpty = true;
            $('.stateEmpty_edit').html("<p class='text-danger'>Province ne peut pas être vide</p>");
            return false;
        }else{
            $('.stateEmpty_edit').html("<p class='text-danger'></p>");
            stateEditEmpty = false;
        }

    });
    $('#zip_admin_edit').on('blur',function () {
        if($(this).val() == ""){
            zipEditEmpty = true;
            $('.zipEmpty_edit').html("<p class='text-danger'>Code Postal ne peut pas être vide</p>");
            return false;
        }else{
            $('.zipEmpty_edit').html("<p class='text-danger'></p>");
            zipEditEmpty = false;
        }

    });

    $('#form_edit_admin').on('submit',function (e) {
        e.preventDefault();

        if(nameEditEmpty === true || phoneEditEmpty === true || countryEditEmpty === true || adressEditEmpty === true || cityEditEmpty === true ||
            stateEditEmpty === true || zipEditEmpty === true ){

            $('#name_admin_edit,#phone_admin_edit,#country_admin_edit,#adress_admin_edit,#city_admin_edit,#state_admin_edit,#zip_admin_edit').blur();


        }else{

            let data = new FormData();
            data.append('name_edit',$('#name_admin_edit').val());
            data.append('companyname_edit',$('#cname_admin_edit').val());
            data.append('telcust_edit',$('#phone_admin_edit').val());
            data.append('custaddress_edit',$('#adress_admin_edit').val());
            data.append('country_edit',$('#country_admin_edit').val());
            data.append('city_edit',$('#city_admin_edit').val());
            data.append('state_edit',$('#state_admin_edit').val());
            data.append('zipcode_edit',$('#zip_admin_edit').val());
            data.append('id',$('#id_admin').val());
            data.append('action','edit_admin');


            $.ajax({
                url:'_functions_ajax/admin_crud.php',
                type:'post',
                data:data,
                processData:false,
                contentType:false,
                success:function (result) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Admin modifier avec succés.',
                        text: false,
                        showConfirmButton: false,
                        timer: 3000,
                        allowOutsideClick: false

                    }).then(function(){
                        window.location = 'admin.php';

                    });
                }


            });





        }




    });


    /***************************************** edit password admin****************************************************************/
    var chekOldEmpty = true;  var global_oldempty = chekOldEmpty = true;
    var newpassEmpty = true;


    $('#ad_passwords').on('keyup',function () {
        if($(this).val() == ''){
            chekOldEmpty = true;
            $('.password_feesbackss').html("<p class='text-danger'> L'ancien mot de passe ne peut pas être vide</p>");
            return false;
        }else{
            $('.password_feesbackss').html("<p class='text-danger'></p>");
            $.ajax({
                url:'_functions_ajax/admin_crud.php',
                type:'post',
                data:{
                    pass:$('#ad_passwords').val(),
                    action:'check_old_pass_ad'
                },

                success:function (res) {

                    if(res == 'not the seem'){
                        //is not the seem in db
                        $('.password_feesbackss').html("<p class='text-danger' style='font-size: 13px'> Mot de passe incorrect </p>");
                        global_oldempty = chekOldEmpty = true;
                    }else{
                        $('.password_feesbackss').html("<p class='text-success' style='font-size: 13px'> Correcte </p>");

                        global_oldempty = chekOldEmpty = false;
                    }

                }



            });





        }


    });
    $('#new_passwords_ad').on('keyup',function () {
        if($(this).val() == ''){
            newpassEmpty = true;
            $('.new_passwordfeesbackss').html("<p class='text-danger'>le nouveau mot de passe ne peut pas être vide</p>");
            return false;

        }else{

            newpassEmpty = false;

            $('.new_passwordfeesbackss').html("<p class='text-danger'></p>");
        }
    });

    $('#form_edit_pass_admin_profile').on('submit',function (e) {
        e.preventDefault();

        if(global_oldempty === true || newpassEmpty === true){

            $('#ad_passwords,#new_passwords_ad').keyup();
        }else{

            let  data = new FormData();
            data.append('newPass',$('#new_passwords_ad').val());
            data.append('action','new_pasword_update_ad');
            $.ajax({
                url:'_functions_ajax/admin_crud.php',
                type:'post',
                data:data,
                processData:false,
                contentType:false,
                success:function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Mot de passe modifier avec succès.',
                        text: false,
                        showConfirmButton: false,
                        timer: 3000,
                        allowOutsideClick: false

                    }).then(function(){
                        window.location = 'index.php';

                    });
                }
            });




        }

    });




});//end