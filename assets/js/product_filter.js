$(document).ready(function () {

    filters_data();
    function filters_data() {
        var action ='fetch_data';
       var minimum_price = $('#hidden_minimum_price').val();
       var maximum_price = $('#hidden_maximum_price').val();
        var sous_cat = get_filter('sous_cate');



        $.ajax({
           url:'_functions/fetch_data_product.php',
           method:'post',
           data:{
               action:action,
               minimum_price:minimum_price,
               maximum_price:maximum_price,
               sous_cat:sous_cat

           },
           success:function(data_result){
              $('.filter_data').html(data_result);
           }



        });
    }

    filter_by_sous_cat();
    function filter_by_sous_cat() {
        var action="fetch_data_by_sous_cat";
        var sous_cat = get_filter('sous_cate');
        $.ajax({
           url:'_functions/fetch_data_product.php',
           type: 'post',
           data:{
               id:$('.id_cats').val(),
               action:action,
               sous_cat:sous_cat
           },
            success:function(data_result){
            $('.filter_data_by_sous_cate').html(data_result);
        }


        });
    }

    /*******sous category filter*****************/
    function get_filter(classname){
        var filter = [];

        $('.'+classname+':checked').each(function () {
            filter.push($(this).val());
        });

        return filter;

    }

    //checkbox
    $('.common_selector').click(function(){

        filter_by_sous_cat();
        filters_data();
    });
















});