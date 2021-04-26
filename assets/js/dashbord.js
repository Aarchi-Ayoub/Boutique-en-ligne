$(document).ready(function () {

    var usernameEmpty = true; /* global is : */   var chekEmptyusername = usernameEmpty;
    var telEmpty = true; /* global is : */   var chekEmptytel = telEmpty;
    var addresEmpty = true; /* global is : */   var chekEmptyaddres = addresEmpty;
    var cityEmpty = true; /* global is : */   var chekEmptyCity = cityEmpty;
    var countryEmpty = true; /* global is : */   var chekEmptyCountry = countryEmpty;
    var stateEmpty = true; /* global is : */   var chekEmptystate= stateEmpty;
    var zipEmpty = true; /* global is : */   var chekEmptyzip= zipEmpty;
    var uploadEmpty = true;



    $('#tel_custs').keyup(function () {
        if($(this).val() == ''){
            $('.em').css('margin-top','-20px');
            chekEmptytel = telEmpty = true;
            $(".tel_feesbacks").html("<p class='text-danger' style='font-size:12px '>Le téléphone ne peut pas être vide</p>");

            return false;

        }else{
            chekEmptytel = telEmpty = false;
            $(".tel_feesbacks").html("<p class='text-danger' style='font-size:12px '></p>");
            $('.em').css('margin-top','-0px');

        }


    });

    $('#cust_addresss').keyup(function () {
        if($(this).val() ==  ""){
            $('.im').css('margin-top','-27px');
            chekEmptyaddres= addresEmpty = true;
            $(".address_feesbacks").html("<p class='text-danger' style='font-size:12px '>L'adresse ne peut pas être vide</p>");
            return false;
        }else{
            $('.im').css('margin-top','-0px');
            $(".address_feesbacks").html("<p class='text-danger' style='font-size:12px '></p>");
            chekEmptyaddres = addresEmpty = false;
        }

    });

    $('#cust_countrys').keyup(function () {
        if($(this).val() ==  ""){
            $('.ci').css('margin-top','-27px');
            chekEmptyCountry= countryEmpty = true;
            $(".country_feesbacks").html("<p class='text-danger' style='font-size:12px '>Le pays ne peut pas être vide</p>");
            return false;
        }else{
            $(".country_feesbacks").html("<p class='text-danger' style='font-size:12px '></p>");
            chekEmptyCountry = countryEmpty = false;
            $('.ci').css('margin-top','-0px');
        }

    });
    $('#cust_citys').keyup(function () {
        if($(this).val() ==  ""){
            $('.cou').css('margin-top','-27px');
            chekEmptyCity= cityEmpty = true;
            $(".city_feesbacks").html("<p class='text-danger' style='font-size:12px '>La ville ne peut pas être vide</p>");
            return false;
        }else{
            $('.cou').css('margin-top','-0px');
            $(".city_feesbacks").html("<p class='text-danger' style='font-size:12px '></p>");
            chekEmptyCity= cityEmpty =  false;
        }

    });

    $('#cust_states').keyup(function () {
        if($(this).val() ==  ""){
            $('.zi').css('margin-top','-27px');
            chekEmptystate= stateEmpty = true;
            $(".state_feesbacks").html("<p class='text-danger' style='font-size:12px '>Province ne peut pas être vide</p>");
            return false;
        }else{
            $('.zi').css('margin-top','-0px');
            $(".state_feesbacks").html("<p class='text-danger' style='font-size:12px '></p>");
            chekEmptystate= stateEmpty =  false;
        }

    });
    $('#cust_zip_codes').keyup(function () {
        if($(this).val() ==  ""){
            $('.st').css('margin-top','-27px');
            chekEmptyzip= zipEmpty = true;
            $(".zip_feesbacks").html("<p class='text-danger' style='font-size:12px '>Le code postal ne peut pas être vide</p>");
            return false;
        }else{
            $('.st').css('margin-top','-0px');

            $(".zip_feesbacks").html("<p class='text-danger' style='font-size:12px '></p>");
            chekEmptyzip= zipEmpty=  false;
        }

    });

    let ext = '';
    $('#user_photos').on('blur',function () {
        /*
          1- testing value
          2- testing allowed extension
          3-test img size
        */
        if($(this).val() == ""){
            $('.ad').css('margin-top','-27px');
            $('#img_feesbacks').html("<p class='text-danger' style='font-size:12px '>L'image ne peut pas être vide</p>");
            uploadEmpty = true;
            return false;

        }else{
            ext = $('#user_photos').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(ext,['jpg','png','jpeg']) == -1){
                //image not allowed ex:txt

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'autorisé seulement (jpg,png,jpeg)'
                }).then((result)=>{
                    if(result.value){
                        $('#user_photos').val('');
                    }
                });


                $('#user_photos').val('');
                uploadEmpty = true;
                return  false;

            }else{

                let imgsize=(this.files[0].size);
                if(imgsize > 1000000){//octet
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'image plus grande que 1 MB!'

                    }).then((result)=>{
                        if(result.value){
                            $('#user_photos').val('');
                        }

                    });
                    $('#user_photos').val('');
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



    $('#form_updateProfileCustomer').on('submit',function (e) {
        e.preventDefault();
        let data = new FormData();
        if($('#user_photos').val() == ''){

            if(chekEmptytel === true || chekEmptyaddres === true || chekEmptyCity === true || chekEmptyCountry === true || chekEmptystate=== true || chekEmptyzip=== true){
                $('#tel_custs,#cust_addresss,#cust_countrys,#cust_citys,#cust_states,#cust_zip_codes').keyup();
            }else{

                data.append('companynames',$('#company_name_custs').val());
                data.append('telcusts',$('#tel_custs').val());
                data.append('custaddresss',$('#cust_addresss').val());
                data.append('countrys',$('#cust_countrys').val());
                data.append('citys',$('#cust_citys').val());
                data.append('states',$('#cust_states').val());
                data.append('zipcodes',$('#cust_zip_codes').val());
                data.append('action','update_profile_customer_without_photos');


                $.ajax({
                    url:'_functions/dashbord_ajax.php',
                    type:'post',
                    data:data,
                    processData:false,
                    contentType:false,
                    success:function (result) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Votre profil est modifier avec succés.',
                            text: false,
                            showConfirmButton: false,
                            timer: 3000,
                            allowOutsideClick: false

                        }).then(function(){
                            window.location = 'dashbord.php';

                        });
                    }


                });

            }


        }

        if($('#user_photos').val() != ''){
            if(chekEmptytel === true || chekEmptyaddres === true || chekEmptyCity === true || chekEmptyCountry === true || chekEmptystate=== true || chekEmptyzip=== true || uploadEmpty === true){
                $('#tel_custs,#cust_addresss,#cust_countrys,#cust_citys,#cust_states,#cust_zip_codes').keyup();
                $('#user_photos').blur();

            }else{

                data.append('file',$('#user_photos')[0].files[0]);
                data.append('companynames',$('#company_name_custs').val());
                data.append('telcusts',$('#tel_custs').val());
                data.append('custaddresss',$('#cust_addresss').val());
                data.append('countrys',$('#cust_countrys').val());
                data.append('citys',$('#cust_citys').val());
                data.append('states',$('#cust_states').val());
                data.append('zipcodes',$('#cust_zip_codes').val());
                data.append('action','update_profile_customer_with_photos');


                $.ajax({
                    url:'_functions/dashbord_ajax.php',
                    type:'post',
                    data:data,
                    processData:false,
                    contentType:false,
                    success:function (result) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Votre profil est modifier avec succés.',
                            text: false,
                            showConfirmButton: false,
                            timer: 3000,
                            allowOutsideClick: false

                        }).then(function(){
                            window.location = 'dashbord.php';

                        });
                    }


                });


            }



        }

    });


    /**********************biling shipping ******************************************************/
    $(document).ready(function () {
        let fir_bill = true;
        let company_bill = true;
        let phone_bill = true;
        let country_bill = true;
        let street_bill = true;
        let town_bill = true;
        let state_bill = true;
        let zip_bill = true;

        let fir_ship = true;
        let company_ship = true;
        let phone_ship = true;
        let country_ship = true;
        let street_ship = true;
        let town_ship = true;
        let state_ship = true;
        let zip_ship = true;
        $('#fir_bills').on('blur',function () {
            if($(this).val() == ''){
                fir_bill = true;
                $('.msg_fir_bills').html("<p class='text-danger'>Le prénom ne peut pas être vide</p>");
                return false;

            }else{
                fir_bill = false;
                $('.msg_fir_bills').html("<p class='text-danger'></p>");

            }

        });
        $('#company_bils').on('blur',function () {
            if($(this).val() == ''){
                company_bill = true;
                $('.msg_company_bills').html("<p class='text-danger'>Le nom  ne peut pas être vide</p>");
                return false;

            }else{
                company_bill = false;
                $('.msg_company_bills').html("<p class='text-danger'></p>");

            }

        });
        $('#phone_bils').on('blur',function () {
            if($(this).val() == ''){
                phone_bill = true;
                $('.msg_phone_bills').html("<p class='text-danger'>Le téléphone ne peut pas être vide</p>");
                return false;

            }else{
                phone_bill = false;
                $('.msg_phone_bills').html("<p class='text-danger'></p>");

            }

        });
        $('#coun_bills').on('blur',function () {
            if($(this).val() == ''){
                country_bill = true;
                $('.msg_coun_bills').html("<p class='text-danger'>Le pays ne peut pas être vide</p>");
                return false;

            }else{
                country_bill = false;
                $('.msg_coun_bills').html("<p class='text-danger'></p>");

            }

        });
        $('#street_bills').on('blur',function () {
            if($(this).val() == ''){
                street_bill = true;
                $('.msg_street_bills').html("<p class='text-danger'>L'Adresse ne peut pas être vide</p>");
                return false;

            }else{
                street_bill = false;
                $('.msg_street_bills').html("<p class='text-danger'></p>");

            }

        });
        $('#town_bills').on('blur',function () {
            if($(this).val() == ''){
                town_bill = true;
                $('.msg_town_bills').html("<p class='text-danger'>La ville ne peut pas être vide</p>");
                return false;

            }else{
                town_bill = false;
                $('.msg_town_bills').html("<p class='text-danger'></p>");

            }

        });
        $('#state_bills').on('blur',function () {
            if($(this).val() == ''){
                state_bill = true;
                $('.msg_stat_bills').html("<p class='text-danger'>Province ne peut pas être vide</p>");
                return false;

            }else{
                state_bill = false;
                $('.msg_stat_bills').html("<p class='text-danger'></p>");

            }

        });
        $('#zip_bills').on('blur',function () {
            if($(this).val() == ''){
                zip_bill = true;
                $('.msg_zip_bills').html("<p class='text-danger'>Le Code postal ne peut pas être vide</p>");
                return false;

            }else{
                zip_bill = false;
                $('.msg_zip_bills').html("<p class='text-danger'></p>");

            }

        });


        /************shipping**************/
        $('#fir_ships').on('blur',function () {
            if($(this).val() == ''){
                fir_ship = true;
                $('.msg_fir_ships').html("<p class='text-danger'>Prénom ne peut pas être vide</p>");
                return false;

            }else{
                fir_ship = false;
                $('.msg_fir_ships').html("<p class='text-danger'></p>");

            }

        });
        $('#company_ships').on('blur',function () {
            if($(this).val() == ''){
                company_ship = true;
                $('.msg_company_ships').html("<p class='text-danger'>Nom ne peut pas être vide</p>");
                return false;

            }else{
                company_ship = false;
                $('.msg_company_ships').html("<p class='text-danger'></p>");

            }

        });
        $('#phone_ships').on('blur',function () {
            if($(this).val() == ''){
                phone_ship = true;
                $('.msg_phone_ships').html("<p class='text-danger'>Le téléphone ne peut pas être vide</p>");
                return false;

            }else{
                phone_ship = false;
                $('.msg_phone_ships').html("<p class='text-danger'></p>");

            }

        });
        $('#coun_ships').on('blur',function () {
            if($(this).val() == ''){
                country_ship = true;
                $('.msg_coun_ships').html("<p class='text-danger'>Le Pays ne peut pas être vide</p>");
                return false;

            }else{
                country_ship = false;
                $('.msg_coun_ships').html("<p class='text-danger'></p>");

            }

        });
        $('#street_ships').on('blur',function () {
            if($(this).val() == ''){
                street_ship = true;
                $('.msg_street_ships').html("<p class='text-danger'>L' Adresse ne peut pas être vide</p>");
                return false;

            }else{
                street_ship = false;
                $('.msg_street_ships').html("<p class='text-danger'></p>");

            }

        });
        $('#town_ships').on('blur',function () {
            if($(this).val() == ''){
                town_ship = true;
                $('.msg_town_ships').html("<p class='text-danger'>La ville ne peut pas être vide</p>");
                return false;

            }else{
                town_ship = false;
                $('.msg_town_ships').html("<p class='text-danger'></p>");

            }

        });
        $('#state_ships').on('blur',function () {
            if($(this).val() == ''){
                state_ship = true;
                $('.msg_stat_ships').html("<p class='text-danger'>Province ne peut pas être vide</p>");
                return false;

            }else{
                state_ship = false;
                $('.msg_stat_ships').html("<p class='text-danger'></p>");

            }

        });
        $('#zip_ships').on('blur',function () {
            if($(this).val() == ''){
                zip_ship = true;
                $('.msg_zip_ships').html("<p class='text-danger'>Le Code postal ne peut pas être vide</p>");
                return false;

            }else{
                zip_ship = false;
                $('.msg_zip_ships').html("<p class='text-danger'></p>");

            }

        });



        $('#form_update_billing_shipping').on('submit',function (e) {
            e.preventDefault();
            let data = new FormData();

            if(fir_bill === true || company_bill === true || phone_bill === true || country_bill === true || street_bill === true || town_bill === true || state_bill === true || zip_bill === true || fir_ship === true || company_ship === true || phone_ship === true || country_ship === true || street_ship === true || town_ship === true || state_ship === true || zip_ship === true){

                $('#fir_bills,#company_bils,#phone_bils,#coun_bills,#street_bills,#town_bills,#state_bills,#zip_bills,#fir_ships,#company_ships,#phone_ships,#coun_ships,#street_ships,#town_ships,#state_ships,#zip_ships').blur();



            }else{

                data.append('fir_bills',$('#fir_bills').val());
                data.append('company_bils',$('#company_bils').val());
                data.append('phone_bils',$('#phone_bils').val());
                data.append('coun_bills',$('#coun_bills').val());
                data.append('street_bills',$('#street_bills').val());
                data.append('town_bills',$('#town_bills').val());
                data.append('state_bills',$('#state_bills').val());
                data.append('zip_bills',$('#zip_bills').val());

                data.append('fir_ships',$('#fir_ships').val());
                data.append('company_ships',$('#company_ships').val());
                data.append('phone_ships',$('#phone_ships').val());
                data.append('coun_ships',$('#coun_ships').val());
                data.append('street_ships',$('#street_ships').val());
                data.append('town_ships',$('#town_ships').val());
                data.append('state_ships',$('#state_ships').val());
                data.append('zip_ships',$('#zip_ships').val());
                data.append('action','update_billing_shipping');

                $.ajax({
                    url:'_functions/dashbord_ajax.php',
                    type:'post',
                    data:data,
                    processData:false,
                    contentType:false,
                    success:function () {
                        Swal.fire({
                            icon: 'success',
                            title: 'Facturation et expédition modifier avec succès.',
                            text: false,
                            showConfirmButton: false,
                            timer: 3000,
                            allowOutsideClick: false

                        }).then(function(){
                            window.location = 'dashbord.php';

                        });
                    }
                });





            }

        });

        /*********************************Password********************************************************/

    var chekOldEmpty = true;  var global_oldempty = chekOldEmpty = true;
    var newpassEmpty = true;


    $('#cust_passwords').on('keyup',function () {
       if($(this).val() == ''){
           chekOldEmpty = true;
           $('.password_feesbacks').html("<p class='text-danger'> L'ancien mot de passe ne peut pas être vide</p>");
           return false;
       }else{
           $.ajax({
               url:'_functions/dashbord_ajax.php',
               type:'post',
               data:{
                   pass:$('#cust_passwords').val(),
                   action:'check_old_pass'
               },

               success:function (res) {

                   if(res == 'not the seem'){
                       //is not the seem in db
                       $('.password_feesbacks').html("<p class='text-danger' style='font-size: 13px'> Mot de passe incorrect </p>");
                       global_oldempty = chekOldEmpty = true;
                   }else{
                       $('.password_feesbacks').html("<p class='text-success' style='font-size: 13px'> Correcte </p>");

                       global_oldempty = chekOldEmpty = false;
                   }

               }



           });





       }


    });
    $('#new_passwords').on('keyup',function () {
      if($(this).val() == ''){
          newpassEmpty = true;
          $('.new_passwordfeesbacks').html("<p class='text-danger'>le nouveau mot de passe ne peut pas être vide</p>");
          return false;

      }else{
          newpassEmpty = false;

          $('.new_passwordfeesbacks').html("<p class='text-danger'></p>");
      }
    });

    $('#form_update_password').on('submit',function (e) {
        e.preventDefault();

        if(global_oldempty === true || newpassEmpty === true){

            $('#new_passwords,#cust_passwords').keyup();
        }else{

            let  data = new FormData();
            data.append('newPass',$('#new_passwords').val());
            data.append('action','new_pasword_update');
            $.ajax({
                url:'_functions/dashbord_ajax.php',
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
                        window.location = 'dashbord.php';

                    });
                }
            });




        }

    });







    });




});