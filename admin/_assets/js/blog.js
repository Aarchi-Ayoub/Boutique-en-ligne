$(document).ready(function () {
    $('#top_cat_name_blog  .msg').hide();
    $('#title_blog  .msg').hide();
    $('#image_blog  .msg').hide();

    var top_catEmpty_blog = true;
    var titleEmpty_blog = true;
    var descEmpty_blog = true;
    var uploadEmpty_blog = true;
    $('#tcat_id_blog').on('change',function(){
        if($(this).val() == ''){//error

            $("#top_cat_name_blog").addClass('has-error');
            $('#top_cat_name_blog #for_econ').addClass('glyphicon-remove');
            $("#top_cat_name_blog").removeClass('has-success');
            $('#top_cat_name_blog #for_econ').removeClass('glyphicon-ok');
            $('#top_cat_name_blog  .msg').fadeIn(500);
            top_catEmpty_blog = true;

        }else{
            $("#top_cat_name_blog").addClass('has-success');
            $('#top_cat_name_blog #for_econ').addClass('glyphicon-ok');

            $("#top_cat_name_blog").removeClass('has-error');
            $('#top_cat_name_blog #for_econ').removeClass('glyphicon-remove');
            $('#top_cat_name_blog .msg').fadeOut(500);
            top_catEmpty_blog=false;
        }


    });

    let ext = '';
    $('#blog_photo').on('blur',function () {
        /*
          1- testing value
          2- testing allowed extension
          3-test img size
        */
        if($(this).val() == ""){
            $("#image_blog").addClass('has-error');
            $('#image_blog #for_econ').addClass('glyphicon-remove');
            $("#image_blog").removeClass('has-success');
            $('#image_blog #for_econ').removeClass('glyphicon-ok');
            $('#image_blog  .msg').fadeIn(500);
            uploadEmpty_blog = true;
            return false;

        }else{
            ext = $('#blog_photo').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(ext,['jpg','png','jpeg']) == -1){
                //image not allowed ex:txt

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'extension non autorisée!'
                }).then((result)=>{
                    if(result.value){
                        $('#blog_photo').val('');
                    }
                });

                $('#blog_photo').val('');
                uploadEmpty_blog = true;
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
                            $('#blog_photo').val('');
                        }

                    });
                    $('#blog_photo').val('');
                    uploadEmpty_blog = true;
                    return  false;

                }else{
                    $("#image_blog").addClass('has-success');
                    $('#image_blog #for_econ').addClass('glyphicon-ok');
                    $("#image_blog").removeClass('has-error');
                    $('#image_blog #for_econ').removeClass('glyphicon-remove');
                    $('#image_blog .msg').fadeOut(500);

                    uploadEmpty_blog=false;
                    return  true;

                }

            }
        }

    });

    $('#tit_blog').on('keyup',function(){
        if($(this).val().length <8){//error
            $("#title_blog").addClass('has-error');
            $('#title_blog #for_econ').addClass('glyphicon-remove');
            $("#title_blog").removeClass('has-success');
            $('#title_blog #for_econ').removeClass('glyphicon-ok');
            $('#title_blog  .msg').fadeIn(500);
            titleEmpty_blog = true;

        }else{
            $("#title_blog").addClass('has-success');
            $('#title_blog #for_econ').addClass('glyphicon-ok');
            $("#title_blog").removeClass('has-error');
            $('#title_blog #for_econ').removeClass('glyphicon-remove');
            $('#title_blog .msg').fadeOut(500);
            titleEmpty_blog = false;

        }
    });
    $('.blog_description').on('keyup',function(){
        var count = $('.blog_description').val();
        if(count.length < 20){//error
            $("#desc_blog").addClass('has-error');
            $('#desc_blog #for_econ').addClass('glyphicon-remove');
            $("#desc_blog").removeClass('has-success');
            $('#desc_blog #for_econ').removeClass('glyphicon-ok');
            $('#desc_blog .msg_text').text(count.length + "mots");

            descEmpty_blog = true;
        }else{
            $("#desc_blog").addClass('has-success');
            $('#desc_blog #for_econ').addClass('glyphicon-ok');
            $("#desc_blog").removeClass('has-error');
            $('#desc_blog #for_econ').removeClass('glyphicon-remove');
            $('#desc_blog .msg_text').text(count.length + "mots");
            descEmpty_blog = false;
        }
    });


    $('#form_add_blog').on('submit',function (e) {
        e.preventDefault();
        let data = new FormData();

        if(top_catEmpty_blog === true || titleEmpty_blog === true || descEmpty_blog === true || uploadEmpty_blog === true){
            $('#tcat_id_blog').change();
            $('#blog_photo').blur();
            $('#tit_blog,.blog_description').keyup();
        }else{
            data.append('file',$('#blog_photo')[0].files[0]);
            data.append('tit_blog',$('#tit_blog').val());
            data.append('blog_description',$('.blog_description').val());
            data.append('tcat_id_blog',$('#tcat_id_blog').val());
            data.append('p_is_active_blog',$('#p_is_active_blog').val());
            data.append('action','add_blog');

            $.ajax({
                url:'_functions_ajax/blog_crud.php',
                type:'post',
                data:data,
                processData:false,
                contentType:false,
                success:function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Article ajouté avec succès',
                        text: false,
                        showConfirmButton: false,
                        timer: 1600,
                        allowOutsideClick: false

                    }).then(function(){
                        window.location = 'blog-add.php';
                    });
                }
            });


        }
    });

    /*************************edit************************************/
    $('#top_cat_name_blog_edit  .msg').hide();
    $('#title_blog_edit  .msg').hide();
    $('#image_blog_edit  .msg').hide();

    var top_catEmpty_blog_edit = true;
    var titleEmpty_blog_edit = true;
    var descEmpty_blog_edit = true;
    var uploadEmpty_blog_edit = true;

    $('#tcat_id_blog_edit').on('change',function(){
        if($(this).val() == ''){//error

            $("#top_cat_name_blog_edit").addClass('has-error');
            $('#top_cat_name_blog_edit #for_econ').addClass('glyphicon-remove');
            $("#top_cat_name_blog_edit").removeClass('has-success');
            $('#top_cat_name_blog_edit #for_econ').removeClass('glyphicon-ok');
            $('#top_cat_name_blog_edit  .msg').fadeIn(500);
            top_catEmpty_blog_edit = true;

        }else{
            $("#top_cat_name_blog_edit").addClass('has-success');
            $('#top_cat_name_blog_edit #for_econ').addClass('glyphicon-ok');

            $("#top_cat_name_blog_edit").removeClass('has-error');
            $('#top_cat_name_blog_edit #for_econ').removeClass('glyphicon-remove');
            $('#top_cat_name_blog_edit .msg').fadeOut(500);
            top_catEmpty_blog_edit=false;
        }


    });
    $('#tit_blog_edit').on('keyup',function(){
        if($(this).val().length <8){//error
            $("#title_blog_edit").addClass('has-error');
            $('#title_blog_edit #for_econ').addClass('glyphicon-remove');
            $("#title_blog_edit").removeClass('has-success');
            $('#title_blog_edit #for_econ').removeClass('glyphicon-ok');
            $('#title_blog_edit  .msg').fadeIn(500);
            titleEmpty_blog_edit = true;

        }else{
            $("#title_blog_edit").addClass('has-success');
            $('#title_blog_edit #for_econ').addClass('glyphicon-ok');
            $("#title_blog_edit").removeClass('has-error');
            $('#title_blog_edit #for_econ').removeClass('glyphicon-remove');
            $('#title_blog_edit .msg').fadeOut(500);
            titleEmpty_blog_edit = false;

        }
    });
    $('.blog_description_edit').on('keyup',function(){
        var count = $('.blog_description_edit').val();
        if(count.length < 20){//error
            $("#desc_blog_edit").addClass('has-error');
            $('#desc_blog_edit #for_econ').addClass('glyphicon-remove');
            $("#desc_blog_edit").removeClass('has-success');
            $('#desc_blog_edit #for_econ').removeClass('glyphicon-ok');
            $('#desc_blog_edit .msg_text').text(count.length + "mots");

            descEmpty_blog_edit = true;
        }else{
            $("#desc_blog_edit").addClass('has-success');
            $('#desc_blog_edit #for_econ').addClass('glyphicon-ok');
            $("#desc_blog_edit").removeClass('has-error');
            $('#desc_blog_edit #for_econ').removeClass('glyphicon-remove');
            $('#desc_blog_edit .msg_text').text(count.length + "mots");
            descEmpty_blog_edit = false;
        }
    });


    $('#blog_photo_edit').on('blur',function () {
        /*
          1- testing value
          2- testing allowed extension
          3-test img size
        */
        if($(this).val() == ""){
            $("#image_blog_edit").addClass('has-error');
            $('#image_blog_edit #for_econ').addClass('glyphicon-remove');
            $("#image_blog_edit").removeClass('has-success');
            $('#image_blog_edit #for_econ').removeClass('glyphicon-ok');
            $('#image_blog_edit  .msg').fadeIn(500);
            uploadEmpty_blog_edit = true;
            return false;

        }else{
            ext = $('#blog_photo_edit').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(ext,['jpg','png','jpeg']) == -1){
                //image not allowed ex:txt

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'extension non autorisée!'
                }).then((result)=>{
                    if(result.value){
                        $('#blog_photo_edit').val('');
                    }
                });

                $('#blog_photo_edit').val('');
                uploadEmpty_blog_edit = true;
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
                            $('#blog_photo_edit').val('');
                        }

                    });
                    $('#blog_photo_edit').val('');
                    uploadEmpty_blog_edit = true;
                    return  false;

                }else{
                    $("#image_blog_edit").addClass('has-success');
                    $('#image_blog_edit #for_econ').addClass('glyphicon-ok');
                    $("#image_blog_edit").removeClass('has-error');
                    $('#image_blog_edit #for_econ').removeClass('glyphicon-remove');
                    $('#image_blog_edit .msg').fadeOut(500);

                    uploadEmpty_blog_edit=false;
                    return  true;

                }

            }
        }

    });

    $('#form_edit_blog').on('submit',function (e) {
        e.preventDefault();
        let data = new FormData();

        if($('#blog_photo_edit').val() == ''){
            if(top_catEmpty_blog_edit === true || titleEmpty_blog_edit === true || descEmpty_blog_edit === true){
              $('#tit_blog_edit,.blog_description_edit').keyup();
              $('#tcat_id_blog_edit').change();
            }else{
                data.append('tit_blog_edit',$('#tit_blog_edit').val());
                data.append('blog_description_edit',$('.blog_description_edit').val());
                data.append('tcat_id_blog_edit',$('#tcat_id_blog_edit').val());
                data.append('p_is_active_blog_edit',$('#p_is_active_blog_edit').val());
                data.append('id_edit_blog',$('#id_edit_blog').val());
                data.append('action','edit_blog');

                $.ajax({
                    url:'_functions_ajax/blog_crud.php',
                    type:'post',
                    data:data,
                    processData:false,
                    contentType:false,
                    success:function () {

                        Swal.fire({
                            icon: 'success',
                            title: 'Article modifier avec succès',
                            text: false,
                            showConfirmButton: false,
                            timer: 1600,
                            allowOutsideClick: false

                        }).then(function(){
                            window.location = 'blog-edit.php?id='+$('#id_edit_blog').val();
                        });
                    }
                });

            }


        }else{
            data.append('file',$('#blog_photo_edit')[0].files[0]);
            data.append('tit_blog_edit',$('#tit_blog_edit').val());
            data.append('blog_description_edit',$('.blog_description_edit').val());
            data.append('tcat_id_blog_edit',$('#tcat_id_blog_edit').val());
            data.append('p_is_active_blog_edit',$('#p_is_active_blog_edit').val());
            data.append('id_edit_blog',$('#id_edit_blog').val());
            data.append('action','edit_blog_with_photo');

            $.ajax({
                url:'_functions_ajax/blog_crud.php',
                type:'post',
                data:data,
                processData:false,
                contentType:false,
                success:function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Article modifier avec succès',
                        text: false,
                        showConfirmButton: false,
                        timer: 1600,
                        allowOutsideClick: false

                    }).then(function(){
                        window.location = 'blog-edit.php?id='+$('#id_edit_blog').val();
                    });
                }
            });






        }





    });


    /**************************Delete**************************************/
    $('.delete_blog').on('click',function (e) {
        e.preventDefault();
        let blog_id = $(this).attr('id');

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
                    url:'_functions_ajax/blog_crud.php',
                    type:'POST',
                    data:{
                        id:blog_id,
                        action:'delete_blog'

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
                            window.location = 'blog.php';

                        });
                    }

                });

            }

        });


    });




});