$(document).ready(function () {
    $('.msg_commentaire').hide();
    let message = true;
    let rating = true;
    $('#rating-value').on('blur',function () {
        if($(this).val() == ''){
            rating = true;
            alert("Donnez votre avis s'il vous plaît");
            return false;
        }else{
            rating = false;

        }


    });

$('#message').on('blur',function () {

  if($(this).val() == ''){
      message = true;
      $('.msg_commentaire').fadeIn(500);
      return false;
  }else{
      message = false;
      $('.msg_commentaire').fadeOut(500);
  }
});


$('#comment_product').on('submit',function (e) {
  e.preventDefault();

  if(message === true || rating === true){
      $('#message,#rating-value').blur();
  }else{


      //insert into rating table
      $.ajax({
         url:'_functions/commentaire_ajax.php',
         method:'post',
         data:{
             message:$('#message').val(),
             rating:$('#rating-value').val(),
             p_id:$('#id_product').val(),
             cust_id:$('#cust_id').val(),
             action:'add_commentaire'
         },
          success:function () {
              Swal.fire({
                  icon: 'success',
                  title: 'La note a bien été envoyée.',
                  text: false,
                  showConfirmButton: false,
                  timer: 3000,
                  allowOutsideClick: false

              }).then(function(){
                  window.location = 'product_details.php?id='+$('#id_product').val();

              });
          }


      });


  }

});

/*****************blog comment*************************************************************************/
/********************************************************************************/
    $('.msg_commentaire_blog').hide();
var message_blog = true;
var rating_blog = true;
    $('#rating-value_blog').on('blur',function () {
        if($(this).val() == ''){
            rating_blog = true;
            alert("Donnez votre avis s'il vous plaît");
            return false;
        }else{
            rating_blog = false;

        }


    });
    $('#message_blog').on('blur',function () {

        if($(this).val() == ''){
            message_blog = true;
            $('.msg_commentaire_blog').fadeIn(500);
            return false;
        }else{
            message_blog = false;
            $('.msg_commentaire_blog').fadeOut(500);
        }
    });

    $('#comment_blog').on('submit',function (e) {
        e.preventDefault();

        if(message_blog === true || rating_blog === true){
            $('#message_blog,#rating-value_blog').blur();
        }else{

            //insert into rating table
            $.ajax({
                url:'_functions/commentaire_ajax.php',
                method:'post',
                data:{
                    message:$('#message_blog').val(),
                    rating:$('#rating-value_blog').val(),
                    p_id:$('#id_blog').val(),
                    cust_id:$('#cust_id').val(),
                    action:'add_commentaire_blog'
                },
                success:function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'La note a bien été envoyée.',
                        text: false,
                        showConfirmButton: false,
                        timer: 3000,
                        allowOutsideClick: false

                    }).then(function(){
                        window.location = 'blog-details.php?id='+$('#id_blog').val();

                    });
                }


            });


        }

    });


});