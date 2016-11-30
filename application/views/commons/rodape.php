<!-- IE10 viewport hack para Surface/desktop Windows 8 -->
<script src="<?=base_url('assets/js/plugins/ie10-viewport-bug-workaround.js')?>"></script>

<!-- jQuery -->
<script src="<?=base_url('assets/js/jquery/1.12.2.min.js')?>"></script>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?=base_url('assets/plugins/jQuery/jquery-2.2.3.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?=base_url('assets/plugins/morris/morris.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?=base_url('assets/plugins/sparkline/jquery.sparkline.min.js') ?>"></script>
<!-- jvectormap -->
<script src="<?=base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="<?=base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url('assets/plugins/knob/jquery.knob.js') ?>"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?=base_url('assets/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- datepicker -->
<script src="<?=base_url('assets/plugins/datepicker/bootstrap-datepicker.js') ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
<!-- Slimscroll -->
<script src="<?=base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?=base_url('assets/plugins/fastclick/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/dist/js/app.min.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url('assets/dist/js/pages/dashboard.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets/dist/js/demo.js') ?>"></script>
<script>
	// $("#addServ").click(function() {
	// 	$("#ClienteServ").val($("#ServicoCliente").val());
	// });


//	jQuery('#ClienteServ').ready(function(e) {
	

		if(jQuery('#ClienteServ').val().length > 0){
		
			var traceid = jQuery('#ClienteServ').val();
			var matriz = traceid.split(',');
			
			
			jQuery.each( matriz, function( key, valueDep ) {
				if(valueDep!=""){
					jQuery('<input/>').attr({ type: 'text', id: valueDep, name: 'test', value: valueDep, disabled: 'disabled',style: 'border:none;padding:5px;' }).appendTo('#servicos');
					jQuery('<input/>').attr({ type: 'button', class: 'bt-excluir',class: 'btn-danger bt-excluir',style: 'margin-right:2px;border:none;padding: 5px 10px;', name: valueDep, value: 'X'}).appendTo('#servicos');
				}
			})
		}

		jQuery('#addServ').click(function(){

			var tipodep = jQuery('#ServicoCliente').val();
			var tipodepName = jQuery('#ServicoCliente').val();
			
			tipodepName = tipodepName.replace(/\ /g,'_');

			var adddep = tipodep+',';

			var olddep = jQuery('#ClienteServ').val();

			var currentdep = adddep + olddep;

			jQuery('#ClienteServ').val(currentdep);

			jQuery('<input/>').attr({
				type: 'text',
				id: tipodepName,
				name: 'test',
				value: tipodep,
				disabled: 'disabled',
				style: 'border:none;padding:5px;'
			}).appendTo('#servicos');

			jQuery('<input/>').attr({
				type: 'button',
				class: 'btn-danger bt-excluir',
				name: tipodep,
				style: 'margin-right:2px;border:none;padding: 5px 10px;',
				value: 'X'}).appendTo('#servicos');
			// jQuery('<br />').appendTo('#dependencias');

		})	


		jQuery('body').on('click','.bt-excluir', function(){
			var del = jQuery(this).attr("name");
			var delId = del.replace(/\ /g,'_');
			delvirgula = del+',';
			var listdep = jQuery('#ClienteServ').val();

			listdep = listdep.replace(delvirgula,'');
			listdep = listdep.replace(del,'');
			jQuery('#ClienteServ').val(listdep);


			jQuery(this).remove(); //remove botão
			jQuery('#'.concat(delId)).remove(); //remove campo
			jQuery('#br'.concat(delId)).remove(); //remove campo

		})
//});
</script>
</body>
</html>
