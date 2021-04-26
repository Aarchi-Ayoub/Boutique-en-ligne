$(document).ready(function () {

    let colorEmpty = true;
    let colornameEditEmpty = true;

    $('#color_name').on('blur',function () {
        if($(this).val() == ""){
            colorEmpty = true;
            $('.colorEmpty').html("<p class='text-danger'>La couleur ne peut pas être vide</p>");
            return false;
        }else{
            colorEmpty = false;
        }

    });

    $('#form_color').on('submit',function (e) {
        e.preventDefault();
        let data = new FormData();
        if(colorEmpty == true){
            $('#color_name').blur();
            return false;
        }else{
            //check the size if exist
            data.append('color_name',$('#color_name').val());
            data.append('action','check_colorif_exist');
            $.ajax({
                url:'_functions_ajax/color_crud.php',
                method:'post',
                data:data,
                processData:false,
                contentType:false,
                success:function (result_check) {
                    if(result_check == 1){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Le nom de la couleur existe déjà.'
                        }).then((result)=>{
                            if(result.value){
                                $('#color_name').val('');
                            }
                        });
                    }else{
                        // insert new Size name

                        $.ajax({
                            url:'_functions_ajax/color_crud.php',
                            method:'post',
                            data:{
                                color_name: $('#color_name').val(),
                                action:'insert_color'
                            },
                            success:function (re) {

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Couleur ajoutée avec succès',
                                    text: false,
                                    showConfirmButton: false,
                                    timer: 1600,
                                    allowOutsideClick: false

                                }).then(function(){
                                    $('#color_name').val('');
                                });



                            }


                        });


                    }
                }





            });







        }

    });


    $('#color_name_edit').on('blur',function () {
        if($(this).val() == ""){
            colornameEditEmpty = true;
            $('.colorEmptyEdit').html("<p class='text-danger'>La couleur ne peut pas être vide</p>");
            return false;
        }else{
            $('.colorEmptyEdit').html("<p class='text-danger'></p>");
            colornameEditEmpty = false;
        }

    });


    $('#form_color_edit').on('submit',function (e) {
        e.preventDefault();

        if(colornameEditEmpty == true){
            $('#color_name_edit').blur();
        }else{

            $.ajax({
                url:'_functions_ajax/color_crud.php',
                method:'post',
                data:{
                    color_name: $('#color_name_edit').val(),
                    id:$('#id_color').val(),
                    action: 'check_color_Exist'
                },
                success:function (res) {

                    if(res == "exist"){

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Le nom de la couleur existe déjà.'
                        });
                    }else{

                        $.ajax({
                            url:'_functions_ajax/color_crud.php',
                            method:'post',
                            data:{
                                color_name: $('#color_name_edit').val(),
                                id:$('#id_color').val(),
                                action: 'update_color'
                            },
                            success:function () {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Color  Modifier avec succés',
                                    text: false,
                                    showConfirmButton: false,
                                    timer: 1600,
                                    allowOutsideClick: false

                                });

                            }



                        });
                    }


                }
            });
        }
    });

    /****************************Delete**************/
    $("body").on("click",'.delete_color',function (e) {
        e.preventDefault();

        var del_id_color = $(this).attr('id');

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
                    url:'_functions_ajax/color_crud.php',
                    type:'POST',
                    data:{
                        del_id_color:del_id_color,
                        action:'Delete_color'

                    },
                    cache:false,
                    success:function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Couleur supprimée avec succès',
                            text: false,
                            showConfirmButton: false,
                            timer: 1600,
                            allowOutsideClick: false

                        }).then(function(){
                            window.location = 'color.php';

                        });
                    }

                });

            }

        });

    });


});