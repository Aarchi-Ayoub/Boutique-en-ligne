$(document).ready(function () {
    $('#image  .msg').hide();
    $('#product_name  .msg').hide();
    $('#sous_cat_name  .msg').hide();
    $('#top_cat_name  .msg').hide();
    $('#p_price  .msg').hide();
    $('#quantity  .msg').hide();
    $('#size_top  .msg').hide();
    $('#color_top  .msg').hide();


    var product_nameEmpty = true;//true = empty field
    var top_catEmpty = true;//true = empty field
    var sous_catEmpty = true;//true = empty field
    var cuurent_priceEmpty = true;//true = empty field
    var quantityEmpty = true;//true = empty field
    var sizeEmpty = true;//true = empty field
    var colorEmpty = true;//true = empty field
    var uploadEmpty = true;//true = empty field
    var descEmpty = true;//true = empty field
    var desc_shortEmpty = true;//true = empty field
    var featureEmpty = true;//true = empty field
    $('.hidden_box').css('display','none');
    /*
          get sous category
      */
    $(".top-cat").on('change',function(){
        var    id=$(this).val();
        var action = "charge_sous_cat";

        if(id == 2){
            $('.hidden_box').css('display','block');
        }else{
            $('#size').val('');
            $('#color').val('');
            $('.hidden_box').css('display','none');
        }
        $.ajax
        ({
            type: "POST",
            url: "_functions_ajax/product_crud.php",
            data: {
                id:id,
                action:action
            },
            cache: false,
            success: function(html_data)
            {
                $(".sous-cat").html(html_data);
            }
        });
    });

    $('#tcat_id').on('change',function(){
        if($(this).val() == ''){//error

            $("#top_cat_name").addClass('has-error');
            $('#top_cat_name #for_econ').addClass('glyphicon-remove');
            $("#top_cat_name").removeClass('has-success');
            $('#top_cat_name #for_econ').removeClass('glyphicon-ok');
            $('#top_cat_name  .msg').fadeIn(500);
            top_catEmpty = true;
            //add sous cat when value of tcat is empty
            $("#sous_cat_name").addClass('has-error');
            $('#sous_cat_name #for_econ').addClass('glyphicon-remove');
            $("#sous_cat_name").removeClass('has-success');
            $('#sous_cat_name #for_econ').removeClass('glyphicon-ok');
            $('#sous_cat_name  .msg').fadeIn(500);
            sous_catEmpty = true;

        }else{
            $("#top_cat_name").addClass('has-success');
            $('#top_cat_name #for_econ').addClass('glyphicon-ok');

            $("#top_cat_name").removeClass('has-error');
            $('#top_cat_name #for_econ').removeClass('glyphicon-remove');
            $('#top_cat_name .msg').fadeOut(500);
            top_catEmpty=false;
        }


    });
    $('#scat_id').on('change',function(){
        if($(this).val() == ''){//error

            $("#sous_cat_name").addClass('has-error');
            $('#sous_cat_name #for_econ').addClass('glyphicon-remove');
            $("#sous_cat_name").removeClass('has-success');
            $('#sous_cat_name #for_econ').removeClass('glyphicon-ok');
            $('#sous_cat_name  .msg').fadeIn(500);
            sous_catEmpty = true;
        }else{
            $("#sous_cat_name").addClass('has-success');
            $('#sous_cat_name #for_econ').addClass('glyphicon-ok');
            $("#sous_cat_name").removeClass('has-error');
            $('#sous_cat_name #for_econ').removeClass('glyphicon-remove');
            $('#sous_cat_name .msg').fadeOut(500);
            sous_catEmpty = false;
        }
    });


    $('#p_name').on('keyup',function(){
        if($(this).val().length <3){//error
            $("#product_name").addClass('has-error');
            $('#product_name #for_econ').addClass('glyphicon-remove');
            $("#product_name").removeClass('has-success');
            $('#product_name #for_econ').removeClass('glyphicon-ok');
            $('#product_name  .msg').fadeIn(500);
            product_nameEmpty = true;

        }else{
            $("#product_name").addClass('has-success');
            $('#product_name #for_econ').addClass('glyphicon-ok');
            $("#product_name").removeClass('has-error');
            $('#product_name #for_econ').removeClass('glyphicon-remove');
            $('#product_name .msg').fadeOut(500);
            product_nameEmpty = false;

        }
    });

    $('#p_current_price').on('keyup',function(){
        if($(this).val().length <1){//error
            $("#p_price").addClass('has-error');
            $('#p_price #for_econ').addClass('glyphicon-remove');
            $("#p_price").removeClass('has-success');
            $('#p_price #for_econ').removeClass('glyphicon-ok');
            $('#p_price  .msg').fadeIn(500);
            cuurent_priceEmpty = true;
        }else{
            $("#p_price").addClass('has-success');
            $('#p_price #for_econ').addClass('glyphicon-ok');
            $("#p_price").removeClass('has-error');
            $('#p_price #for_econ').removeClass('glyphicon-remove');
            $('#p_price .msg').fadeOut(500);
            cuurent_priceEmpty = false;
        }
    });

    $('#qty').on('keyup',function(){
        if($(this).val().length <1){//error
            $("#quantity").addClass('has-error');
            $('#quantity #for_econ').addClass('glyphicon-remove');
            $("#quantity").removeClass('has-success');
            $('#quantity #for_econ').removeClass('glyphicon-ok');
            $('#quantity  .msg').fadeIn(500);
            quantityEmpty = true;
        }else{
            $("#quantity").addClass('has-success');
            $('#quantity #for_econ').addClass('glyphicon-ok');
            $("#quantity").removeClass('has-error');
            $('#quantity #for_econ').removeClass('glyphicon-remove');
            $('#quantity .msg').fadeOut(500);
            quantityEmpty = false;
        }
    });



    $('#size').on('change',function () {
           if($(this).val() == null || $(this).val()== ''){
               $("#size_top").addClass('has-error');
               $('#size_top #for_econ').addClass('glyphicon-remove');
               $("#size_top").removeClass('has-success');
               $('#size_top #for_econ').removeClass('glyphicon-ok');
               $('#size_top  .msg').fadeIn(500);
               sizeEmpty = true;

           }else{
               $("#size_top").addClass('has-success');
               $('#size_top #for_econ').addClass('glyphicon-ok');
               $("#size_top").removeClass('has-error');
               $('#size_top #for_econ').removeClass('glyphicon-remove');
               $('#size_top .msg').fadeOut(500);
               sizeEmpty = false;

           }
    });

    $('#color').on('change',function () {
        if($(this).val() == null || $(this).val()== ''){
            $("#color_top").addClass('has-error');
            $('#color_top #for_econ').addClass('glyphicon-remove');
            $("#color_top").removeClass('has-success');
            $('#color_top #for_econ').removeClass('glyphicon-ok');
            $('#color_top  .msg').fadeIn(500);
            colorEmpty = true;
        }else{
            $("#color_top").addClass('has-success');
            $('#color_top #for_econ').addClass('glyphicon-ok');
            $("#color_top").removeClass('has-error');
            $('#color_top #for_econ').removeClass('glyphicon-remove');
            $('#color_top .msg').fadeOut(500);
            colorEmpty = false;
        }
    });

    $('.p_description').on('keyup',function(){
        var count = $('.p_description').val();
        if(count.length < 20){//error
            $("#desc_top").addClass('has-error');
            $('#desc_top #for_econ').addClass('glyphicon-remove');
            $("#desc_top").removeClass('has-success');
            $('#desc_top #for_econ').removeClass('glyphicon-ok');
            $('#desc_top .msg_text').text(count.length + "mots");

            descEmpty = true;
        }else{
            $("#desc_top").addClass('has-success');
            $('#desc_top #for_econ').addClass('glyphicon-ok');
            $("#desc_top").removeClass('has-error');
            $('#desc_top #for_econ').removeClass('glyphicon-remove');
            $('#desc_top .msg_text').text(count.length + "mots");
            descEmpty = false;
        }
    });

    $('.p_short_description').on('keyup',function(){
        var count = $('.p_short_description').val();
        if(count.length < 10){//error
            $("#desc_short_top").addClass('has-error');
            $('#desc_short_top #for_econ').addClass('glyphicon-remove');
            $("#desc_short_top").removeClass('has-success');
            $('#desc_short_top #for_econ').removeClass('glyphicon-ok');
            $('#desc_short_top .msg_text').text(count.length + "mots");

            desc_shortEmpty = true;
        }else{
            $("#desc_short_top").addClass('has-success');
            $('#desc_short_top #for_econ').addClass('glyphicon-ok');
            $("#desc_short_top").removeClass('has-error');
            $('#desc_short_top #for_econ').removeClass('glyphicon-remove');
            $('#desc_short_top .msg_text').text(count.length + "mots");

            desc_shortEmpty = false;
        }
    });

    $('.p_feature').on('keyup',function(){
        var count = $('.p_feature').val();
        if(count.length < 10){//error
            $("#feature_top").addClass('has-error');
            $('#feature_top #for_econ').addClass('glyphicon-remove');
            $("#feature_top").removeClass('has-success');
            $('#feature_top #for_econ').removeClass('glyphicon-ok');
            $('#feature_top .msg_text').text(count.length + "mots");

            featureEmpty = true;
        }else{
            $("#feature_top").addClass('has-success');
            $('#feature_top #for_econ').addClass('glyphicon-ok');
            $("#feature_top").removeClass('has-error');
            $('#feature_top #for_econ').removeClass('glyphicon-remove');
            $('#feature_top .msg_text').text(count.length + "mots");

            featureEmpty = false;
        }
    });


    let ext = '';
    $('#p_photo').on('blur',function () {
        /*
          1- testing value
          2- testing allowed extension
          3-test img size
        */
          if($(this).val() == ""){
              $("#image").addClass('has-error');
              $('#image #for_econ').addClass('glyphicon-remove');
              $("#image").removeClass('has-success');
              $('#image #for_econ').removeClass('glyphicon-ok');
              $('#image  .msg').fadeIn(500);
              uploadEmpty = true;
              return false;

          }else{
              ext = $('#p_photo').val().split('.').pop().toLowerCase();
              if(jQuery.inArray(ext,['jpg','png','jpeg']) == -1){
                  //image not allowed ex:txt

                  Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'extension non autorisée!'
                  }).then((result)=>{
                      if(result.value){
                          $('#p_photo').val('');
                      }
                  });

                  $('#p_photo').val('');
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
                              $('#p_photo').val('');
                          }

                      });
                      $('#p_photo').val('');
                      uploadEmpty = true;
                      return  false;

                  }else{
                      $("#image").addClass('has-success');
                      $('#image #for_econ').addClass('glyphicon-ok');
                      $("#image").removeClass('has-error');
                      $('#image #for_econ').removeClass('glyphicon-remove');
                      $('#image .msg').fadeOut(500);

                      uploadEmpty=false;
                      return  true;

                  }

              }
          }

    });


$('#form_add_product').on('submit',function (e) {
    e.preventDefault();
    let data = new FormData;

    if($('#tcat_id').val() == 2){

        if(uploadEmpty === true ||   sizeEmpty === true || colorEmpty === true || product_nameEmpty === true
            || top_catEmpty === true || sous_catEmpty === true || cuurent_priceEmpty === true
            || quantityEmpty === true || descEmpty === true || desc_shortEmpty === true || featureEmpty === true){
            $('#size,#tcat_id,#scat_id,#color').change();
            $('#qty,#p_current_price,#p_name,.p_description,.p_short_description,.p_feature').keyup();
            $('#p_photo').blur();
        }else{

            data.append('file',$('#p_photo')[0].files[0]);
            data.append('tcat_id',$('#tcat_id').val());
            data.append('scat_id',$('#scat_id').val());
            data.append('productname',$('#p_name').val());
            data.append('p_old_price',$('#p_old_price').val());
            data.append('p_current_price',$('#p_current_price').val());
            data.append('qty',$('#qty').val());
            data.append('size',$('#size').val());
            data.append('color',$('#color').val());
            data.append('p_description',$('.p_description').val());
            data.append('p_short_description',$('.p_short_description').val());
            data.append('p_feature',$('.p_feature').val());
            data.append('p_feature_select',$('#p_is_feature').val());
            data.append('p_active_select',$('#p_is_active').val());
            data.append('action','add_product');
            $.ajax({
                url:'_functions_ajax/product_crud.php',
                type:'post',
                data:data,
                processData:false,
                contentType:false,
                success:function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'produit ajouté avec succès',
                        text: false,
                        showConfirmButton: false,
                        timer: 1600,
                        allowOutsideClick: false

                    }).then(function(){
                        window.location = 'product-add.php';
                    });
                }
            });
        }

    }




        if($('#tcat_id').val() != 2){
            if(uploadEmpty === true ||  product_nameEmpty === true || top_catEmpty === true || sous_catEmpty === true ||
                cuurent_priceEmpty === true || quantityEmpty === true || descEmpty === true || desc_shortEmpty === true|| featureEmpty === true ){

                $('#qty,#p_current_price,#p_name,.p_description,.p_short_description,.p_feature').keyup();
                $('#tcat_id,#scat_id').change();
                $('#p_photo').blur();
            }else{

                data.append('file',$('#p_photo')[0].files[0]);
                data.append('tcat_id',$('#tcat_id').val());
                data.append('scat_id',$('#scat_id').val());
                data.append('productname',$('#p_name').val());
                data.append('p_old_price',$('#p_old_price').val());
                data.append('p_current_price',$('#p_current_price').val());
                data.append('qty',$('#qty').val());
                data.append('size',$('#size').val());
                data.append('color',$('#color').val());
                data.append('p_description',$('.p_description').val());
                data.append('p_short_description',$('.p_short_description').val());
                data.append('p_feature',$('.p_feature').val());
                data.append('p_feature_select',$('#p_is_feature').val());
                data.append('p_active_select',$('#p_is_active').val());
                data.append('action','add_product');

                $.ajax({
                    url:'_functions_ajax/product_crud.php',
                    type:'post',
                    data:data,
                    processData:false,
                    contentType:false,
                    success:function () {
                        Swal.fire({
                            icon: 'success',
                            title: 'produit ajouté avec succès',
                            text: false,
                            showConfirmButton: false,
                            timer: 1600,
                            allowOutsideClick: false
    
                        }).then(function(){
                            window.location = 'product-add.php';
    
                        });
                    }
                });
            }
        }
});

/**** Delete********************************************************/

$("body").on("click",'.delete_product',function (e) {
    e.preventDefault();

    var del_id = $(this).attr('id');

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
                url:'_functions_ajax/product_crud.php',
                type:'POST',
                data:{
                    del_id:del_id,
                    action:'delete_product'

                },
                cache:false,
                success:function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'produit supprimé avec succès',
                        text: false,
                        showConfirmButton: false,
                        timer: 1600,
                        allowOutsideClick: false

                    }).then(function(){
                        window.location = 'product.php';

                    });
                }

            });

        }

    });

});







});