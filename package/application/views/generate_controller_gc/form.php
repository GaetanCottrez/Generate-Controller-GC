<?php echo doctype('html5')?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<?php $meta = array(array('name' => 'robots', 'content' => 'no-cache'), array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1'), array('name' => 'Content-type', 'content' => 'text/html; charset=utf8', 'type' => 'equiv')); ?>
		<?php echo meta($meta); ?>
		<?php
			$link = array('href' => base_url('assets/generate_controller_gc/generate_controller_gc.css'),'rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen');
			echo link_tag($link);
			$link = array('href' => base_url('assets/generate_controller_gc/flexigrid.css'),'rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen');
			echo link_tag($link);
			$link = array('href' => base_url('assets/generate_controller_gc/jquery-ui-1.10.1.custom.min.css'),'rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen');
			echo link_tag($link);
			echo script('text/javascript', base_url('assets/generate_controller_gc/jquery-1.11.1.min.js'));
			echo script('text/javascript', base_url('assets/generate_controller_gc/jquery-ui-1.10.3.custom.min.js'));
			echo script('text/javascript', base_url('assets/generate_controller_gc/jquery.form.js'));
			echo script('text/javascript', base_url('assets/generate_controller_gc/jquery.noty.js'));
			echo script('text/javascript', base_url('assets/generate_controller_gc/jquery.noty.config.js'));
			$js = '
				var validation_url = "'.$validation_url.'";
				var list_url = "'.$list_url.'";
			
				var message_alert_add_form = "'.$message_alert_form.'";
				var message_insert_error = "'.$message_insert_error.'";
				var success_list_url = "'.$success_list_url.'";
			';
			echo script('text/javascript', '', $js); 
		?>
	</head>
	<body>
<h3><?php echo $title_page; ?></h3>
<div class="ui-widget-content ui-corner-all datatables" style="padding: 10px 10px 5px 15px;">
<?php echo $form; ?>
<div class="form-content form-div">
	<div>
	<!-- Start of hidden inputs -->
						<!-- End of hidden inputs -->
					<div class="line-1px"></div>
		<div id="report-error" class="report-div error"></div>
		<div id="report-success" class="report-div success"></div>
	</div>
	<div class="buttons-box">
		<div class="form-button-box">
			<input id="save-and-go-back-button" type="button" value="<?php echo $lang['add']; ?>" class="ui-input-button ui-button ui-widget ui-state-default ui-corner-all" role="button" aria-disabled="false">
		</div>
		<div class="form-button-box">
			<input id="cancel-button" type="button" value="<?php echo $lang['cancel']; ?>" class="ui-input-button ui-button ui-widget ui-state-default ui-corner-all" role="button" aria-disabled="false">
		</div>
		<div class="form-button-box loading-box">
			<div class="small-loading_custom" id="FormLoading"><?php echo $lang['loading']; ?></div>
		</div>
		<div class="clear"></div>
	</div>
</div>
</div>

<div id="dialog-success" title="<?php echo $lang['title_success']; ?>">
<?php echo $lang['message_success']; ?>
</div>
<script type="text/javascript">
$(document).on("click",".activate_relation_n_n",function() { 
	var num =$( this ).attr("id").split('_')[5];
	$(".relation-display-"+num).toggle();
});

$(document).on("change",".relation_n_n",function() { 
	var form_data = {
		val : $(this).val(),
		ajax : '1'
	};
	
	var id =$( this ).attr("id").split('_')[1];
	
	$.ajax({
		url: "<?php echo $option_field_on_table_url; ?>",
		type: 'POST',
		async : false,
		data: form_data,
		success: function(msg) {
			$('#primary_key_controller_'+id).html(msg);
		}
	});

	$.ajax({
		url: "<?php echo $option_field_on_table_url; ?>",
		type: 'POST',
		async : false,
		data: form_data,
		success: function(msg) {
			$('#primary_key_selection_'+id).html(msg);
		}
	});

	$.ajax({
		url: "<?php echo $option_field_on_table_url; ?>",
		type: 'POST',
		async : false,
		data: form_data,
		success: function(msg) {
			$('#priority_field_relation_'+id).html(msg);
		}
	});
	
});

$(document).on("change",".selection_n_n",function() { 
	var form_data = {
		val : $(this).val(),
		ajax : '1'
	};
	
	var id =$( this ).attr("id").split('_')[1];
	
	$.ajax({
		url: "<?php echo $option_field_on_table_url; ?>",
		type: 'POST',
		async : false,
		data: form_data,
		success: function(msg) {
			$('#title_field_selection_'+id).html(msg);
		}
	});
	
});

function get_new_index(){
	var new_index = 0; 
	$( "input[name='index']" ).each(function( index ) { 
		if(parseInt($( this ).val()) > new_index) new_index = parseInt($( this ).val()); 
	});

	new_index++;
	return new_index;
}
$(function() {
	$( "#dialog-success" ).dialog({
		  autoOpen: false,
	      show: {
	        effect: "blind",
	        duration: 1000
	      },
	      hide: {
	        effect: "explode",
	        duration: 1000
	      },
	      modal: true,
	      close: function( event, ui ) {
	    	  $(location).attr('href',success_list_url);
		  },
	      buttons: {
	        Ok: function() {
	        	$(location).attr('href',success_list_url);
	        }
	      }
	});
 
});
$(function() {
    $( document ).tooltip({
      items: "[title]",
      content: function () {
          return $(this).prop('title');
      }
    });

	$('.ptogtitle').click(function(){
		if($(this).hasClass('vsble'))
		{
			$(this).removeClass('vsble');
			$('#main-table-box').slideDown("slow");
		}
		else
		{
			$(this).addClass('vsble');
			$('#main-table-box').slideUp("slow");
		}
	});

	var save_and_close = false;

	$('#save-and-go-back-button').click(function(){
		save_and_close = true;

		$('#form').trigger('submit');
	});

	$('#form').submit(function(){
		$(this).ajaxSubmit({
			url: validation_url,
			dataType: 'json',
			beforeSend: function(){
				$("#FormLoading").show();
			},
			success: function(data){
				$("#FormLoading").hide();
				if(data.success)
				{
					$('#form').ajaxSubmit({
						dataType: 'text',
						cache: 'false',
						beforeSend: function(){
							$("#FormLoading").show();
						},
						success: function(result){
							$("#FormLoading").fadeOut("slow");
							data = $.parseJSON( result );
							if(data.success)
							{
								if(save_and_close)
								{
									$( "#dialog-success" ).dialog( "open" );
									return true;
								}

								$('.field_error').removeClass('field_error');

								form_success_message(data.success_message);

								clearForm();
							}
							else
							{
								form_error_message('An error has been occured at the insert.');
							}
						}
					});
				}
				else
				{
					$('.field_error').removeClass('field_error');
					form_error_message(data.error_message);
					$.each(data.error_fields, function(index,value){
						$('#crudForm input[name='+index+']').addClass('field_error');
					});

				}
			}
		});
		return false;
	});

	$('.ui-input-button').button();
	$('.gotoListButton').button({
        icons: {
        	primary: "ui-icon-triangle-1-w"
    	}
	});

	if( $('#cancel-button').closest('.ui-dialog').length === 0 ) {

		$('#cancel-button').click(function(){
			if( confirm( message_alert_add_form ) )
			{
				window.location = list_url;
			}

			return false;
		});

	}
});
</script>
</body>
	<footer class="row-fluid"></footer>
	<?php $this->output->enable_profiler(true); ?>
</html>