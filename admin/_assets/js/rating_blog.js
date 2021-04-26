$(document).ready(function () {
    $('.enabled_rating_blog').on('click',function (e) {
        e.preventDefault();
        let rating_id = $(this).attr('id');


        Swal.fire({
            title : "Êtes-vous sûr ?",
            text : "L'enregistrement sera activé ?",
            icon : "warning",
            showCancelButton:true,
            confirmButtonColor:'#3085d6',
            cancelButtonColor:'#d33',
            confirmButtonText:'Oui, activé'
        }).then((result) => {
            if(result.value){
                $.ajax({
                    url:'_functions_ajax/rating_crud.php',
                    method:'post',
                    data:{
                        id:rating_id,
                        action:'switch_to_enabled_blog'

                    },

                    success:function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Activé avec succès',
                            text: false,
                            showConfirmButton: false,
                            timer: 1600,
                            allowOutsideClick: false

                        }).then(function(){
                            window.location = 'rating_blog.php';

                        });
                    }

                });

            }

        });


    });
    $('.disabled_rating_blog').on('click',function (e) {
        e.preventDefault();
        let rating_id = $(this).attr('id');


        Swal.fire({
            title : "Êtes-vous sûr ?",
            text : "L'enregistrement sera désactivé ?",
            icon : "warning",
            showCancelButton:true,
            confirmButtonColor:'#3085d6',
            cancelButtonColor:'#d33',
            confirmButtonText:'Oui, désactivé'
        }).then((result) => {
            if(result.value){
                $.ajax({
                    url:'_functions_ajax/rating_crud.php',
                    type:'POST',
                    data:{
                        id:rating_id,
                        action:'switch_to_Disabled_blog'

                    },
                    success:function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Désactivé avec succès',
                            text: false,
                            showConfirmButton: false,
                            timer: 1600,
                            allowOutsideClick: false

                        }).then(function(){
                            window.location = 'rating_blog.php';

                        });
                    }

                });

            }

        });


    });
    $('.delete_rating_blog').on('click',function (e) {
        e.preventDefault();
        let rating_id = $(this).attr('id');


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
                    url:'_functions_ajax/rating_crud.php',
                    type:'POST',
                    data:{
                        id:rating_id,
                        action:'delete_rating_blog'

                    },
                    success:function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Supprimé avec succès',
                            text: false,
                            showConfirmButton: false,
                            timer: 1600,
                            allowOutsideClick: false

                        }).then(function(){
                            window.location = 'rating_blog.php';

                        });
                    }

                });

            }

        });


    });



});