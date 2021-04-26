$(document).ready(function () {
    var emailLoginEmpty = true;
    var emailPassEmpty = true;

$('#email_login').on('blur',function () {
if($(this).val() == ''){
    $('.msg_error1').html("<p class='text-danger'>L'e-mail ne peut pas être vide</p>");
    emailLoginEmpty = true;
    return false;
}else{
    $('.msg_error1').html("<p class='text-danger'></p>");
    emailLoginEmpty = false;
}
});

    $('#pass_login').on('blur',function () {
        if($(this).val() == ''){
            $('.msg_error2').html("<p class='text-danger'>Le mot de passe ne peut pas être vide</p>");
            emailPassEmpty = true;
            return false;
        }else{
            $('.msg_error2').html("<p class='text-danger'></p>");
            emailPassEmpty = false;
        }
    });
$('#form_login').on('submit',function (e) {
  e.preventDefault();
  let data  = new FormData();

  if(emailLoginEmpty === true || emailPassEmpty === true){

      $('#email_login,#pass_login').blur();
      return false;
  }else{
      data.append('email',$('#email_login').val());
      data.append('pass',$('#pass_login').val());
      data.append('action','check_email');
      $.ajax({
          url:'_functions/register_ajax.php',
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
                             $('#email_login').val('');
                         }
                     });
                 }

                 if(data_result == 1){
                     $.ajax({
                         url:'_functions/register_ajax.php',
                         type:'post',
                         data:{
                             email:$('#email_login').val(),
                             pass:$('#pass_login').val(),
                             action:"check_password"
                         },

                         success:function (result_pass) {
                              if(result_pass == "not match"){
                                  Swal.fire({
                                      icon: 'error',
                                      title: 'Oops...',
                                      text: 'Le mot de passe ne correspond pas.'
                                  }).then((result)=>{
                                      if(result.value){
                                          $('#pass_login').val('');
                                      }
                                  });
                              }else{
                                $.ajax({
                                    url:'_functions/register_ajax.php',
                                    type:'post',
                                    data:{
                                        email:$('#email_login').val(),
                                        action:"check_Status"
                                    },
                                    success:function (result_status) {

                                        if(result_status == "status 0"){



                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: 'Désolé! Votre compte est inactif. Veuillez contacter l\'administrateur.'
                                            });
                                        }else{
                                            window.location = 'index.php';

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