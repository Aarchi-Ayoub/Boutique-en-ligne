$(document).ready(function () {

    $('.make_completed_payment_status').on('click',function (e) {
        e.preventDefault();
        let payment_id = $(this).attr('id');

        Swal.fire({
            title : "Êtes-vous sûr ?",
            text : "L'enregistrement sera mis à jour ?",
            icon : "warning",
            showCancelButton:true,
            confirmButtonColor:'#3085d6',
            cancelButtonColor:'#d33',
            confirmButtonText:'Oui, modifier'
        }).then((result) => {
            if(result.value){
                $.ajax({
                    url:'_functions_ajax/pay_order_crud.php',
                    method:'post',
                    data:{
                        id:payment_id,
                        action:'check_order'

                    },

                    success:function(re) {
                       if(re == 0){
                           window.location = 'logout.php';
                       }else{
                           $.ajax({
                               url:'_functions_ajax/pay_order_crud.php',
                               method:'post',
                               data:{
                                   id:payment_id,
                                   action:'check_payment_status'

                               },
                               success:function () {
                                   Swal.fire({
                                       icon: 'success',
                                       title: 'Paiement terminé',
                                       text: false,
                                       showConfirmButton: false,
                                       timer: 1600,
                                       allowOutsideClick: false

                                   }).then(function(){
                                       window.location = 'order.php';

                                   });

                               }



                           });







                       }

                    }

                });

            }

        });


    });
    $('.make_completed_shipping_status').on('click',function (e) {
        e.preventDefault();
        let payment_id = $(this).attr('id');

        Swal.fire({
            title : "Êtes-vous sûr ?",
            text : "L'enregistrement sera mis à jour ?",
            icon : "warning",
            showCancelButton:true,
            confirmButtonColor:'#3085d6',
            cancelButtonColor:'#d33',
            confirmButtonText:'Oui , modifier'
        }).then((result) => {
            if(result.value){
                $.ajax({
                    url:'_functions_ajax/pay_order_crud.php',
                    method:'post',
                    data:{
                        id:payment_id,
                        action:'check_order_shipping'

                    },

                    success:function(re) {
                        if(re == 0){
                            window.location = 'logout.php';
                        }else{
                            $.ajax({
                                url:'_functions_ajax/pay_order_crud.php',
                                method:'post',
                                data:{
                                    id:payment_id,
                                    action:'check_shipping_status'

                                },
                                success:function () {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Expédition terminée',
                                        text: false,
                                        showConfirmButton: false,
                                        timer: 1600,
                                        allowOutsideClick: false

                                    }).then(function(){
                                        window.location = 'order.php';

                                    });

                                }



                            });







                        }

                    }

                });

            }

        });


    });
    $('.delete_order').on('click',function (e) {
        e.preventDefault();
        let payment_id = $(this).attr('id');

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
                    url:'_functions_ajax/pay_order_crud.php',
                    method:'post',
                    data:{
                        id:payment_id,
                        action:'delete_order_check'

                    },

                    success:function(re) {
                        if(re == 0){
                            window.location = 'logout.php';
                        }else{
                            $.ajax({
                                url:'_functions_ajax/pay_order_crud.php',
                                method:'post',
                                data:{
                                    id:payment_id,
                                    action:'delete_order'

                                },
                                success:function () {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Commande supprimée avec succès',
                                        text: false,
                                        showConfirmButton: false,
                                        timer: 1600,
                                        allowOutsideClick: false

                                    }).then(function(){
                                        window.location = 'order.php';

                                    });

                                }



                            });







                        }

                    }

                });

            }

        });


    });



});