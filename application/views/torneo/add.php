<script src="ajax/ajxTorneo.js"></script>

<!--<script>
	$('#editor').group({
		init: testData,
		save: function(state) {
			$('#cuadrosGenerados').empty().group({
				init: state
			})
		}
	})
</script>-->
<script type="text/javascript">
	if($('#registroR').length){

		$('#registroR').validate({
			rules:{
				torneo:{
					required:true,
					minlength:10,
					maxlength:30
				},

				fechainicioR:{
					required:true,
				},
				fechafinalR:{
					required:true,
				},

			},
			highlight:function(element) {
				$(element).parents('.form-group').addClass('has-error has-feedback');
			},
			unhighlight: function(element) {
				$(element).parents('.form-group').removeClass('has-error');
			}
		});
	}
       if($('#editarT').length){

		$('#editarT').validate({
			rules:{
				torneoE:{
					required:true,
					minlength:10,
					maxlength:30
				},

				fechainicioE:{
					required:true,
				},
				fechafinalE:{
					required:true,
				},

			},
			highlight:function(element) {
				$(element).parents('.form-group').addClass('has-error has-feedback');
			},
			unhighlight: function(element) {
				$(element).parents('.form-group').removeClass('has-error');
			}
		});
	}
</script>
</body>
</html>