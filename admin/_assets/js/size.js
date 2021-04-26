$(document).ready(function () {

    let sizeEmpty = true;
    let SizenameEditEmpty = true;
$('#size_name').on('blur',function () {
   if($(this).val() == ""){
       sizeEmpty = true;
       $('.sizeEmpty').html("<p class='text-danger'>La taille ne peut pas être vide</p>");
       return false;
   }else{
       $('.sizeEmpty').html("<p class='text-danger'></p>");
       sizeEmpty = false;
   }

});

$('#form_size').on('submit',function (e) {
    e.preventDefault();
    let data = new FormData();
  if(sizeEmpty == true){
      $('#size_name').blur();
      return false;
  }else{
      //check the size if exist
      data.append('size_name',$('#size_name').val());
      data.append('action','check_sizeif_exist');
      $.ajax({
           url:'_functions_ajax/size_crud.php',
           method:'post',
          data:data,
          processData:false,
          contentType:false,
          success:function (result_check) {
             if(result_check == 1){
                 Swal.fire({
                     icon: 'error',
                     title: 'Oops...',
                     text: 'Le nom de la taille existe déjà.'
                 }).then((result)=>{
                     if(result.value){
                         $('#size_name').val('');
                     }
                 });
             }else{
                 // insert new Size name

                     $.ajax({
                         url:'_functions_ajax/size_crud.php',
                         method:'post',
                         data:{
                             size_name: $('#size_name').val(),
                             action:'insert_size'
                         },
                        success:function (re) {

                             Swal.fire({
                                 icon: 'success',
                                 title: 'taille ajoutée avec succès',
                                 text: false,
                                 showConfirmButton: false,
                                 timer: 1600,
                                 allowOutsideClick: false

                             }).then(function(){
                                 $('#size_name').val('');
                             });



                         }


                     });


             }
          }





        });







  }

});


$('#size_name_edit').on('blur',function () {
  if($(this).val() == ""){
      SizenameEditEmpty = true;
      $('.sizeEmptyEdit').html("<p class='text-danger'>La taille ne peut pas être vide</p>");
      return false;
  }else{
      $('.sizeEmptyEdit').html("<p class='text-danger'></p>");
      SizenameEditEmpty = false;
  }

});


$('#form_size_edit').on('submit',function (e) {
    e.preventDefault();

if(SizenameEditEmpty == true){
    $('#size_name_edit').blur();
}else{

  $.ajax({
     url:'_functions_ajax/size_crud.php',
      method:'post',
      data:{
         size_name: $('#size_name_edit').val(),
          id:$('#id_edit').val(),
          action: 'check_size_Exist'
      },
      success:function (res) {

         if(res == "exist"){

             Swal.fire({
                 icon: 'error',
                 title: 'Oops...',
                 text: 'Le nom de la taille existe déjà.'
             });
         }else{

            $.ajax({
                url:'_functions_ajax/size_crud.php',
                method:'post',
                data:{
                    size_name: $('#size_name_edit').val(),
                    id:$('#id_edit').val(),
                    action: 'update_size'
                },
                success:function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'La taille modifier avec succès',
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
$("body").on("click",'.delete_size',function (e) {
    e.preventDefault();

    var del_id_size = $(this).attr('id');

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
                url:'_functions_ajax/size_crud.php',
                type:'POST',
                data:{
                    del_id_size:del_id_size,
                    action:'Delete_size'

                },
                cache:false,
                success:function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Taille supprimée avec succès',
                        text: false,
                        showConfirmButton: false,
                        timer: 1600,
                        allowOutsideClick: false

                    }).then(function(){
                        window.location = 'size.php';

                    });
                }

            });

        }

    });

});


});