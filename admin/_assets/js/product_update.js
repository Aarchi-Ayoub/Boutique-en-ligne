$(document).ready(function () {


    $('body').on('change','.top-cat_edit',function () {
          var id=$(this).val();
        if(id == 2){
            $('.hidden_box_edit').css('display','block');
        }else{
            // $('#size').val('');
            // $('#color').val('');
            $('.hidden_box_edit').css('display','none');
        }

    });



});