$(document).ready(function () {

    let topcatEmpty = true;
    let topcatEditEmpty = true;
    $('#tcat_name').on('blur',function () {
        if($(this).val() == ""){
            topcatEmpty = true;
            $('.top_catEmpty').html("<p class='text-danger'>La catégorie ne peut pas être vide</p>");
            return false;
        }else{
            $('.top_catEmpty').html("<p class='text-danger'></p>");
            topcatEmpty = false;
        }

    });

    $('#form_add_top_cat').on('submit',function (e) {
        e.preventDefault();
        let data = new FormData();
        if(topcatEmpty == true){
            $('#tcat_name').blur();
            return false;
        }else{
            //check the size if exist
            data.append('top_cat_name',$('#tcat_name').val());
            data.append('action','check_top_catif_exist');
            $.ajax({
                url:'_functions_ajax/category_crud.php',
                method:'post',
                data:data,
                processData:false,
                contentType:false,
                success:function (result_check) {
                    if(result_check == 1){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Le nom de la catégorie existe déjà.'
                        }).then((result)=>{
                            if(result.value){
                                $('#tcat_name').val('');
                            }
                        });
                    }else{
                        // insert new Size name

                        $.ajax({
                            url:'_functions_ajax/category_crud.php',
                            method:'post',
                            data:{
                                top_cat_name: $('#tcat_name').val(),
                                show_menu:$('#show_menu').val(),
                                action:'insert_top_cat'
                            },
                            success:function (re) {

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Catégorie ajoutée avec succès',
                                    text: false,
                                    showConfirmButton: false,
                                    timer: 1600,
                                    allowOutsideClick: false

                                }).then(function(){
                                    $('#tcat_name').val('');
                                });



                            }


                        });


                    }
                }





            });







        }

    });

    $('#tcat_name_edit').on('blur',function () {
        if($(this).val() == ""){
            topcatEditEmpty = true;
            $('.TopcatEmptyEdit').html("<p class='text-danger'>La catégorie ne peut pas être vide</p>");
            return false;
        }else{
            $('.TopcatEmptyEdit').html("<p class='text-danger'></p>");
            topcatEditEmpty = false;
        }

    });

    $('#form_edit_top_cat').on('submit',function (e) {
        e.preventDefault();

        if(topcatEditEmpty == true){
            $('#tcat_name_edit').blur();
        }else{

            $.ajax({
                url:'_functions_ajax/category_crud.php',
                method:'post',
                data:{
                    top_cat_name: $('#tcat_name_edit').val(),
                    id:$('#edit_top_cat').val(),
                    action: 'check_topcat_Exist'
                },
                success:function (res) {

                    if(res == "exist"){

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Le nom de la catégorie existe déjà.'
                        });
                    }else{

                        $.ajax({
                            url:'_functions_ajax/category_crud.php',
                            method:'post',
                            data:{
                                top_cat_name: $('#tcat_name_edit').val(),
                                id:$('#edit_top_cat').val(),
                                show_on_menu:$('#show_on_menu_edit').val(),
                                action: 'update_topcat'
                            },
                            success:function () {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Catégorie modifier avec succès',
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
    $("body").on("click",'.delete_top_cat',function (e) {
        e.preventDefault();

        var del_id_top_cat = $(this).attr('id');

        Swal.fire({
            title : "Êtes-vous sûr ?",
            text : "L'enregistrement sera supprimé ?",
            icon : "warning",
            showCancelButton:true,
            confirmButtonColor:'#3085d6',
            cancelButtonColor:'#d33',
            confirmButtonText:'Yes , Delete it'
        }).then((result) => {
            if(result.value){
                $.ajax({
                    url:'_functions_ajax/category_crud.php',
                    type:'POST',
                    data:{
                        del_id_top_cat:del_id_top_cat,
                        action:'Delete_top_cat'

                    },
                    cache:false,
                    success:function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Catégorie supprimée avec succès',
                            text: false,
                            showConfirmButton: false,
                            timer: 1600,
                            allowOutsideClick: false

                        }).then(function(){
                            window.location = 'top-category.php';

                        });
                    }

                });

            }

        });

    });


    //////////////////**********************sous cat********************************//////////
    $('#top_cat_name_sous_cat_edit  .msg ').hide();
    $('#sous_cats  .msg_sous ').hide();
    $('#top_cat_name_sous_cat_add  .msg_add ').hide();
    $('#sous_cats_add  .msg_sous_add ').hide();

   let  top_catin_add_SousCatEmpty = true;//empty
    let sous_catin_add_SousCatEmpty = true;
    let  top_catin_edit_SousCatEmpty = true;//empty
    let sous_catin_edit_SousCatEmpty = true;

    $('#tcat_in_souscat_add').on('change',function(){
        if($(this).val() == ''){//error

            $("#top_cat_name_sous_cat_add").addClass('has-error');
            $('#top_cat_name_sous_cat_add #for_econ').addClass('glyphicon-remove');
            $("#top_cat_name_sous_cat_add").removeClass('has-success');
            $('#top_cat_name_sous_cat_add #for_econ').removeClass('glyphicon-ok');
            $('#top_cat_name_sous_cat_add  .msg_add').fadeIn(500);
            top_catin_add_SousCatEmpty = true;

        }else{
            $("#top_cat_name_sous_cat_add").addClass('has-success');
            $('#top_cat_name_sous_cat_add #for_econ').addClass('glyphicon-ok');

            $("#top_cat_name_sous_cat_add").removeClass('has-error');
            $('#top_cat_name_sous_cat_add #for_econ').removeClass('glyphicon-remove');
            $('#top_cat_name_sous_cat_add .msg_add').fadeOut(500);
            top_catin_add_SousCatEmpty=false;
        }


    });

    $('#scat_name_inSouscat_add').on('blur',function () {
        if($(this).val() == ''){
            $('#sous_cats_add .msg_sous_add').fadeIn(500);
            sous_catin_add_SousCatEmpty = true;
        }else{
            $('#sous_cats_add .msg_sous_add').fadeOut(500);

            sous_catin_add_SousCatEmpty = false;
        }
    })

    $('#form_sous_cat_add').on('submit',function (e) {
        e.preventDefault();
        if(top_catin_add_SousCatEmpty === true ||  sous_catin_add_SousCatEmpty === true){
            $('#tcat_in_souscat_add').change();
            $('#scat_name_inSouscat_add').blur();
        }else{


            $.ajax({
                url:'_functions_ajax/category_crud.php',
                method:'post',
                data:{
                    tcatinsous_cat_add:$('#tcat_in_souscat_add').val(),
                    scatinsous_cat_add:$('#scat_name_inSouscat_add').val(),
                    action:'add_in_souscat'
                },
                success:function () {

                    Swal.fire({
                        icon: 'success',
                        title: ' Sous-catégorie ajoutée avec succès',
                        text: false,
                        showConfirmButton: false,
                        timer: 1600,
                        allowOutsideClick: false

                    }).then(function(){
                        window.location = 'sous-category-add.php';
                    });
                }



            });





        }
    });


/*********Update****************/
    $('#tcat_in_souscat_edit').on('change',function(){
        if($(this).val() == ''){//error

            $("#top_cat_name_sous_cat_edit").addClass('has-error');
            $('#top_cat_name_sous_cat_edit #for_econ').addClass('glyphicon-remove');
            $("#top_cat_name_sous_cat_edit").removeClass('has-success');
            $('#top_cat_name_sous_cat_edit #for_econ').removeClass('glyphicon-ok');
            $('#top_cat_name_sous_cat_edit  .msg').fadeIn(500);
            top_catin_edit_SousCatEmpty = true;

        }else{
            $("#top_cat_name_sous_cat_edit").addClass('has-success');
            $('#top_cat_name_sous_cat_edit #for_econ').addClass('glyphicon-ok');

            $("#top_cat_name_sous_cat_edit").removeClass('has-error');
            $('#top_cat_name_sous_cat_edit #for_econ').removeClass('glyphicon-remove');
            $('#top_cat_name_sous_cat_edit .msg').fadeOut(500);
            top_catin_edit_SousCatEmpty=false;
        }


    });

    $('#scat_name_inSouscat').on('blur',function () {
      if($(this).val() == ''){
          $('#sous_cats .msg_sous').fadeIn(500);
          sous_catin_edit_SousCatEmpty = true;
      }else{
          $('#sous_cats .msg_sous').fadeOut(500);

          sous_catin_edit_SousCatEmpty = false;
      }
    })

    $('#form_sous_cat_edit').on('submit',function (e) {
       e.preventDefault();
            if(top_catin_edit_SousCatEmpty === true ||  sous_catin_edit_SousCatEmpty === true){
                $('#tcat_in_souscat_edit').change();
                $('#scat_name_inSouscat').blur();
            }else{


                $.ajax({
                    url:'_functions_ajax/category_crud.php',
                    method:'post',
                    data:{
                        tcatinsous_cat:$('#tcat_in_souscat_edit').val(),
                        scatinsous_cat:$('#scat_name_inSouscat').val(),
                        id:$('#request_id').val(),
                        action:'update_in_souscat'
                    },
                    success:function () {

                        Swal.fire({
                            icon: 'success',
                            title: ' Sous-catégorie modifier avec succès',
                            text: false,
                            showConfirmButton: false,
                            timer: 1600,
                            allowOutsideClick: false

                        }).then(function(){
                            window.location = 'sous-category-edit.php?id='+$('#request_id').val();
                        });
                    }



                });





            }
    });

/***********Delete****************/

    $("body").on("click",'.delete_sous_cate',function (e) {
        e.preventDefault();

        var delete_id_sous_cate = $(this).attr('id');

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
                    url:'_functions_ajax/category_crud.php',
                    type:'POST',
                    data:{
                        delete_id_sous_cat:delete_id_sous_cate,
                        action:'delete_id_sous_cate'

                    },
                    cache:false,
                    success:function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Catégorie supprimée avec succès',
                            text: false,
                            showConfirmButton: false,
                            timer: 1600,
                            allowOutsideClick: false

                        }).then(function(){
                            window.location = 'sous-category.php';

                        });
                    }

                });

            }

        });

    });



});