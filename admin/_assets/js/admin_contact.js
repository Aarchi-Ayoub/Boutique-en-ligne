$(document).ready(function () {
    $('.delete_comment').on('click',function (e) {
        e.preventDefault();
        let delete_id = $(this).attr('id');


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
                    url:'_functions_ajax/contact_crud.php',
                    type:'POST',
                    data:{
                        id:delete_id,
                        action:'delete_comment'

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
                            window.location = 'contact.php';

                        });
                    }

                });

            }

        });


    });
});