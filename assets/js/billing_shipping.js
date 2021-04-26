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
    $('#fir_bill').on('blur',function () {
        if($(this).val() == ''){
            fir_bill = true;
            $('.msg_fir_bill').html("<p class='text-danger'>Le prénom ne peut pas être vide</p>");
            return false;

        }else{
            fir_bill = false;
            $('.msg_fir_bill').html("<p class='text-danger'></p>");

        }

    });
    $('#company_bil').on('blur',function () {
        if($(this).val() == ''){
            company_bill = true;
            $('.msg_company_bill').html("<p class='text-danger'>le nom ne peut pas être vide</p>");
            return false;

        }else{
            company_bill = false;
            $('.msg_company_bill').html("<p class='text-danger'></p>");

        }

    });
    $('#phone_bil').on('blur',function () {
        if($(this).val() == ''){
            phone_bill = true;
            $('.msg_phone_bill').html("<p class='text-danger'>Le téléphone ne peut pas être vide</p>");
            return false;

        }else{
            phone_bill = false;
            $('.msg_phone_bill').html("<p class='text-danger'></p>");

        }

    });
    $('#coun_bill').on('blur',function () {
        if($(this).val() == ''){
            country_bill = true;
            $('.msg_coun_bill').html("<p class='text-danger'>Le pays ne peut pas être vide</p>");
            return false;

        }else{
            country_bill = false;
            $('.msg_coun_bill').html("<p class='text-danger'></p>");

        }

    });
    $('#street_bill').on('blur',function () {
        if($(this).val() == ''){
            street_bill = true;
            $('.msg_street_bill').html("<p class='text-danger'>l'adresse ne peut pas être vide</p>");
            return false;

        }else{
            street_bill = false;
            $('.msg_street_bill').html("<p class='text-danger'></p>");

        }

    });
    $('#town_bill').on('blur',function () {
        if($(this).val() == ''){
            town_bill = true;
            $('.msg_town_bill').html("<p class='text-danger'>La ville ne peut pas être vide</p>");
            return false;

        }else{
            town_bill = false;
            $('.msg_town_bill').html("<p class='text-danger'></p>");

        }

    });
    $('#state_bill').on('blur',function () {
        if($(this).val() == ''){
            state_bill = true;
            $('.msg_stat_bill').html("<p class='text-danger'>La province ne peut pas être vide</p>");
            return false;

        }else{
            state_bill = false;
            $('.msg_stat_bill').html("<p class='text-danger'></p>");

        }

    });
    $('#zip_bill').on('blur',function () {
        if($(this).val() == ''){
            zip_bill = true;
            $('.msg_zip_bill').html("<p class='text-danger'>Le code postal ne peut pas être vide</p>");
            return false;

        }else{
            zip_bill = false;
            $('.msg_zip_bill').html("<p class='text-danger'></p>");

        }

    });


/************shipping**************/
$('#fir_ship').on('blur',function () {
    if($(this).val() == ''){
        fir_ship = true;
        $('.msg_fir_ship').html("<p class='text-danger'>Le prénom ne peut pas être vide</p>");
        return false;

    }else{
        fir_ship = false;
        $('.msg_fir_ship').html("<p class='text-danger'></p>");

    }

});
$('#company_ship').on('blur',function () {
        if($(this).val() == ''){
            company_ship = true;
            $('.msg_company_ship').html("<p class='text-danger'>le nom ne peut pas être vide</p>");
            return false;

        }else{
            company_ship = false;
            $('.msg_company_ship').html("<p class='text-danger'></p>");

        }

    });
$('#phone_ship').on('blur',function () {
        if($(this).val() == ''){
            phone_ship = true;
            $('.msg_phone_ship').html("<p class='text-danger'>Le téléphone ne peut pas être vide</p>");
            return false;

        }else{
            phone_ship = false;
            $('.msg_phone_ship').html("<p class='text-danger'></p>");

        }

    });
$('#coun_ship').on('blur',function () {
        if($(this).val() == ''){
            country_ship = true;
            $('.msg_coun_ship').html("<p class='text-danger'>Le pays ne peut pas être vide</p>");
            return false;

        }else{
            country_ship = false;
            $('.msg_coun_ship').html("<p class='text-danger'></p>");

        }

    });
$('#street_ship').on('blur',function () {
        if($(this).val() == ''){
            street_ship = true;
            $('.msg_street_ship').html("<p class='text-danger'>l'adresse ne peut pas être vide</p>");
            return false;

        }else{
            street_ship = false;
            $('.msg_street_ship').html("<p class='text-danger'></p>");

        }

    });
$('#town_ship').on('blur',function () {
        if($(this).val() == ''){
            town_ship = true;
            $('.msg_town_ship').html("<p class='text-danger'>La ville ne peut pas être vide</p>");
            return false;

        }else{
            town_ship = false;
            $('.msg_town_ship').html("<p class='text-danger'></p>");

        }

    });
$('#state_ship').on('blur',function () {
        if($(this).val() == ''){
            state_ship = true;
            $('.msg_stat_ship').html("<p class='text-danger'>La province ne peut pas être vide</p>");
            return false;

        }else{
            state_ship = false;
            $('.msg_stat_ship').html("<p class='text-danger'></p>");

        }

    });
$('#zip_ship').on('blur',function () {
        if($(this).val() == ''){
            zip_ship = true;
            $('.msg_zip_ship').html("<p class='text-danger'>Le code postal ne peut pas être vide</p>");
            return false;

        }else{
            zip_ship = false;
            $('.msg_zip_ship').html("<p class='text-danger'></p>");

        }

    });



$('#form_add_billing_shipping').on('submit',function (e) {
 e.preventDefault();
 let data = new FormData();

   if(fir_bill === true || company_bill === true || phone_bill === true || country_bill === true || street_bill === true || town_bill === true || state_bill === true || zip_bill === true || fir_ship === true || company_ship === true || phone_ship === true || country_ship === true || street_ship === true || town_ship === true || state_ship === true || zip_ship === true){

     $('#fir_bill,#company_bil,#phone_bil,#coun_bill,#street_bill,#town_bill,#state_bill,#zip_bill,#fir_ship,#company_ship,#phone_ship,#coun_ship,#street_ship,#town_ship,#state_ship,#zip_ship').blur();



   }else{

       data.append('fir_bill',$('#fir_bill').val());
       data.append('company_bil',$('#company_bil').val());
       data.append('phone_bil',$('#phone_bil').val());
       data.append('coun_bill',$('#coun_bill').val());
       data.append('street_bill',$('#street_bill').val());
       data.append('town_bill',$('#town_bill').val());
       data.append('state_bill',$('#state_bill').val());
       data.append('zip_bill',$('#zip_bill').val());

       data.append('fir_ship',$('#fir_ship').val());
       data.append('company_ship',$('#company_ship').val());
       data.append('phone_ship',$('#phone_ship').val());
       data.append('coun_ship',$('#coun_ship').val());
       data.append('street_ship',$('#street_ship').val());
       data.append('town_ship',$('#town_ship').val());
       data.append('state_ship',$('#state_ship').val());
       data.append('zip_ship',$('#zip_ship').val());
       data.append('cust_id',$('#cust_id').val());
       data.append('action','add_billing_shipping');

       $.ajax({
           url:'_functions/billing_shipping_ajax.php',
           type:'post',
           data:data,
           processData:false,
           contentType:false,
           success:function () {
               Swal.fire({
                   icon: 'success',
                   title: 'Soumis avec succès.',
                   text: false,
                   showConfirmButton: false,
                   timer: 3000,
                   allowOutsideClick: false

               }).then(function(){
                   window.location = 'checkout.php';

               });
           }



       });





   }

});






});