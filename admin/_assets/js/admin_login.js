$(document).ready(function () {

    var emailLoginEmpty = true;
    var PassEmpty = true;

    $('#email').on('blur',function () {
        if($(this).val() == ''){
            $('.msg_eror_email').html("<p class='text-danger'>L'e-mail ne peut pas être vide</p>");
            emailLoginEmpty = true;
            return false;
        }else{
            $('.msg_eror_email').html("<p class='text-danger'></p>");
            emailLoginEmpty = false;
        }
    });

    $('#pass').on('blur',function () {
        if($(this).val() == ''){
            $('.msg_eror_pass').html("<p class='text-danger'>Le mot de passe ne peut pas être vide</p>");
            PassEmpty = true;
            return false;
        }else{
            $('.msg_eror_pass').html("<p class='text-danger'></p>");
            PassEmpty = false;
        }
    });
    $('#form_login_to_dash').on('submit',function (e) {
        e.preventDefault();
        let data  = new FormData();

        if(emailLoginEmpty === true || PassEmpty === true){

            $('#email,#pass').blur();
            return false;
        }else{
            data.append('email',$('#email').val());
            data.append('pass',$('#pass').val());
            data.append('action','check_email_bef_dash');
            $.ajax({
                url:'_functions_ajax/login_crud.php',
                type:'post',
                data:data,
                processData:false,
                contentType:false,
                success:function (data_result) {
                    if (data_result == 0 ){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'L\'adresse de messagerie ne correspond pas.'
                        }).then((result)=>{
                            if(result.value){
                                $('#email').val('');
                            }
                        });
                    }

                    if(data_result == 1){
                        $.ajax({
                            url:'_functions_ajax/login_crud.php',
                            type:'post',
                            data:{
                                email:$('#email').val(),
                                pass:$('#pass').val(),
                                action:"check_password_bef_dash"
                            },

                            success:function (result_pass) {
                                if(result_pass == "not match"){
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Le mot de passe ne correspond pas.'
                                    }).then((result)=>{
                                        if(result.value){
                                            $('#pass').val('');
                                        }
                                    });
                                }else{
                                    $.ajax({
                                        url:'_functions_ajax/login_crud.php',
                                        type:'post',
                                        data:{
                                            email:$('#email').val(),
                                            action:"check_Status_bef_dash"
                                        },
                                        success:function (result_status) {

                                            if(result_status == "status 0"){
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: 'Désolé! Votre compte est inactif. Veuillez contacter votre super administrateur.'
                                                });
                                            }else{
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Connexion réussie .',
                                                    text: false,
                                                    showConfirmButton: false,
                                                    timer: 3000,
                                                    allowOutsideClick: false

                                                }).then(function(){
                                                    window.location = 'index.php';

                                                });




                                            }
                                        }


                                    });



                                }
                            }

                        });





                    }
                }

            });



        }

    });



});