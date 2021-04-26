$(document).ready(function () {
    /********************ediit profile*****************************************************/
    var nameEdit_profileEmpty = true;
    var phoneEdit_profileEmpty = true;
    var countryEdit_profileEmpty = true;
    var adressEdit_profileEmpty = true;
    var cityEdit_profileEmpty = true;
    var stateEdit_profileEmpty = true;
    var zipEdit_profileEmpty = true;
    var uploadEmpty_profile = true;

    $('#name_admin_edit_profile').on('blur',function () {
        if($(this).val() == ""){
            nameEdit_profileEmpty = true;
            $('.nameEmpty_edit_profile').html("<p class='text-danger'>Le nom ne peut pas être vide</p>");
            return false;
        }else{
            $('.nameEmpty_edit_profile').html("<p class='text-danger'></p>");
            nameEdit_profileEmpty = false;
        }

    });
    $('#phone_admin_edit_profile').on('blur',function () {
        if($(this).val() == ""){
            phoneEdit_profileEmpty = true;
            $('.phoneEmpty_edit_profile').html("<p class='text-danger'>Le téléphone ne peut pas être vide</p>");
            return false;
        }else{
            $('.phoneEmpty_edit_profile').html("<p class='text-danger'></p>");
            phoneEdit_profileEmpty = false;
        }

    });
    $('#country_admin_edit_profile').on('blur',function () {
        if($(this).val() == ""){
            countryEdit_profileEmpty = true;
            $('.countryEmpty_edit_profile').html("<p class='text-danger'>Le pays ne peut pas être vide</p>");
            return false;
        }else{
            $('.countryEmpty_edit_profile').html("<p class='text-danger'></p>");
            countryEdit_profileEmpty = false;
        }

    });
    $('#adress_admin_edit_profile').on('blur',function () {
        if($(this).val() == ""){
            adressEdit_profileEmpty = true;
            $('.adressEmpty_edit_profile').html("<p class='text-danger'>L'adresse ne peut pas être vide</p>");
            return false;
        }else{
            $('.adressEmpty_edit_profile').html("<p class='text-danger'></p>");
            adressEdit_profileEmpty = false;
        }

    });
    $('#city_admin_edit_profile').on('blur',function () {
        if($(this).val() == ""){
            cityEdit_profileEmpty = true;
            $('.cityEmpty_edit_profile').html("<p class='text-danger'>La ville ne peut pas être vide</p>");
            return false;
        }else{
            $('.cityEmpty_edit_profile').html("<p class='text-danger'></p>");
            cityEdit_profileEmpty = false;
        }

    });
    $('#state_admin_edit_profile').on('blur',function () {
        if($(this).val() == ""){
            stateEdit_profileEmpty = true;
            $('.stateEmpty_edit_profile').html("<p class='text-danger'>Province ne peut pas être vide</p>");
            return false;
        }else{
            $('.stateEmpty_edit_profile').html("<p class='text-danger'></p>");
            stateEdit_profileEmpty = false;
        }

    });
    $('#zip_admin_edit_profile').on('blur',function () {
        if($(this).val() == ""){
            zipEdit_profileEmpty = true;
            $('.zipEmpty_edit_profile').html("<p class='text-danger'>Code Postal ne peut pas être vide</p>");
            return false;
        }else{
            $('.zipEmpty_edit_profile').html("<p class='text-danger'></p>");
            zipEdit_profileEmpty = false;
        }

    });

    let ext = '';
    $('#photo_admin_new_profile').on('blur',function () {
        /*
          1- testing value
          2- testing allowed extension
          3-test img size
        */
        if($(this).val() == ""){
            uploadEmpty_profile = true;
            return false;

        }else{
            ext = $('#photo_admin_new_profile').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(ext,['jpg','png','jpeg']) == -1){
                //image not allowed ex:txt

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'extension non autorisée!'
                }).then((result)=>{
                    if(result.value){
                        $('#photo_admin_new_profile').val('');
                    }
                });

                $('#photo_admin_new_profile').val('');
                uploadEmpty_profile = true;
                return  false;

            }else{

                let imgsize=(this.files[0].size);
                if(imgsize > 1000000){//octet
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'image supérieure à 1 Mo!'

                    }).then((result)=>{
                        if(result.value){
                            $('#photo_admin_new_profile').val('');
                        }

                    });
                    $('#photo_admin_new_profile').val('');
                    uploadEmpty_profile = true;
                    return  false;

                }else{
                    uploadEmpty_profile=false;
                    return  true;

                }

            }
        }

    });
    
    

    $('#form_edit_admin_profile').on('submit',function (e) {
        e.preventDefault();

       if($('#photo_admin_new_profile').val() == '' ){


           if(nameEdit_profileEmpty === true || phoneEdit_profileEmpty === true || countryEdit_profileEmpty === true || adressEdit_profileEmpty === true || cityEdit_profileEmpty === true ||
               stateEdit_profileEmpty === true || zipEdit_profileEmpty === true ){
               $('#name_admin_edit_profile,#phone_admin_edit_profile,#country_admin_edit_profile,#adress_admin_edit_profile,#city_admin_edit_profile,#state_admin_edit_profile,#zip_admin_edit_profile').blur();
           }else{

               let data = new FormData();
               data.append('name_edit_profile',$('#name_admin_edit_profile').val());
               data.append('companyname_edit_profile',$('#cname_admin_edit_profile').val());
               data.append('telcust_edit_profile',$('#phone_admin_edit_profile').val());
               data.append('custaddress_edit_profile',$('#adress_admin_edit_profile').val());
               data.append('country_edit_profile',$('#country_admin_edit_profile').val());
               data.append('city_edit_profile',$('#city_admin_edit_profile').val());
               data.append('state_edit_profile',$('#state_admin_edit_profile').val());
               data.append('zipcode_edit_profile',$('#zip_admin_edit_profile').val());
               data.append('email_edit_profile',$('#email_admin_edit_profile').val());
               data.append('action','edit_admin_profile');


               $.ajax({
                   url:'_functions_ajax/admin_crud.php',
                   type:'post',
                   data:data,
                   processData:false,
                   contentType:false,
                   success:function (result) {

                       Swal.fire({
                           icon: 'success',
                           title: 'le profil est modifier.',
                           text: false,
                           showConfirmButton: false,
                           timer: 3000,
                           allowOutsideClick: false

                       }).then(function(){
                           window.location = 'profile_edit.php?email='+$('#email_admin_edit_profile').val();

                       });
                   }


               });





           }





       }else{

           if(nameEdit_profileEmpty === true || phoneEdit_profileEmpty === true || countryEdit_profileEmpty === true || adressEdit_profileEmpty === true || cityEdit_profileEmpty === true ||
               stateEdit_profileEmpty === true || zipEdit_profileEmpty === true || uploadEmpty_profile === true){
               $('#name_admin_edit_profile,#phone_admin_edit_profile,#country_admin_edit_profile,#adress_admin_edit_profile,#city_admin_edit_profile,#state_admin_edit_profile,#zip_admin_edit_profile,#photo_admin_new_profile').blur();
           }else{
               let data = new FormData();
               data.append('photo_edit_profile',$('#photo_admin_new_profile')[0].files[0]);
               data.append('name_edit_profile',$('#name_admin_edit_profile').val());
               data.append('companyname_edit_profile',$('#cname_admin_edit_profile').val());
               data.append('telcust_edit_profile',$('#phone_admin_edit_profile').val());
               data.append('custaddress_edit_profile',$('#adress_admin_edit_profile').val());
               data.append('country_edit_profile',$('#country_admin_edit_profile').val());
               data.append('city_edit_profile',$('#city_admin_edit_profile').val());
               data.append('state_edit_profile',$('#state_admin_edit_profile').val());
               data.append('zipcode_edit_profile',$('#zip_admin_edit_profile').val());
               data.append('email_edit_profile',$('#email_admin_edit_profile').val());
               data.append('action','edit_admin_profile_with_photo');


               $.ajax({
                   url:'_functions_ajax/admin_crud.php',
                   type:'post',
                   data:data,
                   processData:false,
                   contentType:false,
                   success:function (result) {

                       Swal.fire({
                           icon: 'success',
                           title: 'le profil est modifier.',
                           text: false,
                           showConfirmButton: false,
                           timer: 3000,
                           allowOutsideClick: false

                       }).then(function(){
                           window.location = 'profile_edit.php?email='+$('#email_admin_edit_profile').val();

                       });
                   }


               });





           }












       }








    });
});