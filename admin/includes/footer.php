		</div>

	</div>

    <script src="_assets/js/jquery.js"></script>
        <script src="_assets/js/popper.min.js"></script>
	<script src="_assets/js/bootstrap.js"></script>
	<script src="_assets/js/jquery.dataTables.min.js"></script>
	<script src="_assets/js/dataTables.bootstrap.min.js"></script>
	<script src="_assets/js/select2.full.min.js"></script>
	<script src="_assets/js/jquery.inputmask.js"></script>
	<script src="_assets/js/jquery.inputmask.date.extensions.js"></script>
	<script src="_assets/js/jquery.inputmask.extensions.js"></script>
	<script src="_assets/js/moment.min.js"></script>
	<script src="_assets/js/bootstrap-datepicker.js"></script>
	<script src="_assets/js/icheck.min.js"></script>
	<script src="_assets/js/fastclick.js"></script>
	<script src="_assets/js/jquery.sparkline.min.js"></script>
	<script src="_assets/js/jquery.slimscroll.min.js"></script>
	<script src="_assets/js/jquery.fancybox.pack.js"></script>
	<script src="_assets/js/app.min.js"></script>
    <script src="_assets/js/clipboard.min.js"></script>
	<script src="_assets/js/summernote.js"></script>
	<script src="_assets/js/sweetalert2.js"></script>


	<script src="_assets/js/product.js"></script>
	<script src="_assets/js/product_update.js"></script>
	<script src="_assets/js/size.js"></script>
	<script src="_assets/js/color.js"></script>
	<script src="_assets/js/category.js"></script>
	<script src="_assets/js/rating.js"></script>
	<script src="_assets/js/customer.js"></script>
	<script src="_assets/js/payment_order.js"></script>
	<script src="_assets/js/admin.js"></script>
	<script src="_assets/js/admin_login.js"></script>
	<script src="_assets/js/edit_profile.js"></script>
	<script src="_assets/js/blog.js"></script>
	<script src="_assets/js/rating_blog.js"></script>
	<script src="_assets/js/admin_contact.js"></script>



	<script>
        function isInputNumber(evt) {
            var char = String.fromCharCode(evt.which);
            if(!(/[0-9]/.test(char))){
                evt.preventDefault();
            }
        }

        // editor for description in add product
		$(document).ready(function() {


	        $('#editor1').summernote({
	        	height: 300
	        });
	        $('#editor2').summernote({
	        	height: 300
	        });
	        $('#editor3').summernote({
	        	height: 300
	        });
	        $('#editor4').summernote({
	        	height: 300
	        });
	        $('#editor5').summernote({
	        	height: 300
	        });
	    });


	</script>

	<script>
	  $(function () {

	    //Initialize Select2 Elements
	    $(".select2").select2();



	    $("[data-mask]").inputmask();



	    //iCheck for checkbox and radio inputs
	    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
	      checkboxClass: 'icheckbox_minimal-blue',
	      radioClass: 'iradio_minimal-blue'
	    });
	    //Red color scheme for iCheck
	    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
	      checkboxClass: 'icheckbox_minimal-red',
	      radioClass: 'iradio_minimal-red'
	    });
	    //Flat red color scheme for iCheck
	    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
	      checkboxClass: 'icheckbox_flat-green',
	      radioClass: 'iradio_flat-green'
	    });



	    $("#example1").DataTable();
	    $('#example2').DataTable({
	      "paging": true,
	      "lengthChange": false,
	      "searching": false,
	      "ordering": true,
	      "info": true,
	      "autoWidth": false
	    });

	    $('#confirm-delete').on('show.bs.modal', function(e) {
	      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	    });
		
		$('#confirm-approve').on('show.bs.modal', function(e) {
	      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	    });
 
	  });



	</script>

	<script type="text/javascript">
		function showDiv(elem){
			if(elem.value == 0) {
		      	document.getElementById('photo_div').style.display = "none";
		      	document.getElementById('icon_div').style.display = "none";
		   	}
		   	if(elem.value == 1) {
		      	document.getElementById('photo_div').style.display = "block";
		      	document.getElementById('photo_div_existing').style.display = "block";
		      	document.getElementById('icon_div').style.display = "none";
		   	}
		   	if(elem.value == 2) {
		      	document.getElementById('photo_div').style.display = "none";
		      	document.getElementById('photo_div_existing').style.display = "none";
		      	document.getElementById('icon_div').style.display = "block";
		   	}
		}
		function showContentInputArea(elem){
		   if(elem.value == 'Full Width Page Layout') {
		      	document.getElementById('showPageContent').style.display = "block";
		   } else {
		   		document.getElementById('showPageContent').style.display = "none";
		   }
		}



        const inputs = document.querySelectorAll(".input");


        function addcl(){
            let parent = this.parentNode.parentNode;
            parent.classList.add("focus");
        }

        function remcl(){
            let parent = this.parentNode.parentNode;
            if(this.value == ""){
                parent.classList.remove("focus");
            }
        }


        inputs.forEach(input => {
            input.addEventListener("focus", addcl);
            input.addEventListener("blur", remcl);
        });




	</script>


</body>
</html>