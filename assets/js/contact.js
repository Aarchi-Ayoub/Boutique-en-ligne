$(document).ready(function () {
  var  nameEmpty = true;
  var  emailEmpty = true;
  var  messageEmpty = true;


    $('#contact_name').keyup(function () {
        if($(this).val() ==  ""){

            nameEmpty = true;
            $(".name_feesback").html("<p class='text-danger' style='font-size:12px '>Le nom ne peut pas être vide</p>");
            return false;
        }else{
            $(".name_feesback").html("<p class='text-danger' style='font-size:12px '></p>");
             nameEmpty = false;

        }

    });
    $('#contact_email').keyup(function () {
        if($(this).val() ==  ""){

            emailEmpty = true;
            $(".email_feesback").html("<p class='text-danger' style='font-size:12px '>L'e-mail ne peut pas être vide</p>");
            return false;
        }else{
            $(".email_feesback").html("<p class='text-danger' style='font-size:12px '></p>");
             emailEmpty = false;

        }

    });
    $('#contact_message').keyup(function () {
        if($(this).val() ==  ""){

            messageEmpty = true;
            $(".message_feesback").html("<p class='text-danger' style='font-size:12px '>Le message ne peut pas être vide</p>");
            return false;
        }else{
            $(".message_feesback").html("<p class='text-danger' style='font-size:12px '></p>");
             messageEmpty = false;

        }

    });
    $('#comment_form_add').on('submit',function (e) {
        e.preventDefault();
       if(nameEmpty === true || emailEmpty === true || messageEmpty === true){
           $('#contact_name,#contact_email,#contact_message').keyup();
       }else{
            let data = new FormData();
            data.append('name',$('#contact_name').val());
            data.append('email',$('#contact_email').val());
            data.append('message',$('#contact_message').val());
            data.append('action','add_comment');




           $.ajax({
               url:'_functions/contact_ajax.php',
               type:'post',
               data:data,
               processData:false,
               contentType:false,
               success:function (result) {

                   Swal.fire({
                       icon: 'success',
                       title: 'Votre message est envoyé avec succès.',
                       text: false,
                       showConfirmButton: false,
                       timer: 3000,
                       allowOutsideClick: false

                   }).then(function(){
                       window.location = 'contact.php';

                   });
               }


           });
       }
    });

});