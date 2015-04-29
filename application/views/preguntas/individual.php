<script type="text/javascript">
	$(document).ready(function() {
		$("div[id^='resp']").css( "cursor", "pointer" );
		$("#showAnswers").click(function() {
			$("div[id^='respCorrect']").css( "color", "green" );
			$("div[id^='respWrong']").css( "color", "red" );			
		});
		$("#hideAnswers").click(function() {
			$("div[id^='respCorrect']").css( "color", "black" );
			$("div[id^='respWrong']").css( "color", "black" );	
		});

	});

	function setRespuesta(value,correcta){
		$("#id_respuesta").val(value);
		$("#id_respuesta_f").val(value);
		if(correcta==1){
			$("div[id^='respCorrect']").css( "color", "green" );
			$("div[id^='respWrong']").css( "color", "red" );			
			$("#respondeBien").css( "display", "block" );	
			$("#respondeMal").css( "display", "none" );	
			$("#noResponde").css( "display", "none" );				
		}else{
			$("div[id^='respCorrect']").css( "color", "green" );
			$("div[id^='respWrong']").css( "color", "red" );
			$("#respondeBien").css( "display", "none" );	
			$("#respondeMal").css( "display", "block" );	
			$("#noResponde").css( "display", "none" );	
		}

		setTimeout(function () {
	        formSiguiente.submit();
	    }, 1000); 
	}
</script>
<div id = "main-content">
	<div class = "container">	
		<div style = "display:block" id = "noResponde"><br /></div>
		<div style = "display:none" id = "respondeBien" class = "alert alert-success fade in">CORRECTO</div>
		<div style = "display:none" id = "respondeMal"  class = "alert alert-error fade in">INCORRECTO</div>

				<p>
					<strong><?php echo $pregunta->id.") ".$pregunta->pregunta; ?></strong>
				</p>
		<?php
			foreach($respuestas as $r){
				if($r->correcta == 1){
					echo "<div id = 'respCorrect' name = 'respCorrect' onclick='setRespuesta(".$r->id.",".$r->correcta.");'>";
				}else{
					echo "<div id = 'respWrong' name = 'respWrong' onclick='setRespuesta(".$r->id.",".$r->correcta.");'>";
				}
				echo " - ".$r->respuesta;
				echo "</div>";
				echo "<br />";
			}
		?>
		<?php 
			echo form_open('preguntas/unaPregunta', array('id'=>'formSiguiente')); 
		?>
			<input type = "hidden" id = "total" name = "total" value = "<?php echo $total; ?>" />
			<input type = "hidden" id = "correctas" name = "correctas" value = "<?php echo $correctas; ?>" />
			<input type = "hidden" id = "filtro" name = "filtro" value = "<?php echo $filtro; ?>" />
			<input type = "hidden" id = "id_pregunta" name = "id_pregunta" value = "<?php echo $pregunta->id; ?>" />
			<input type = "hidden" id = "id_respuesta" name = "id_respuesta" value = "" />
		<?php 
			echo form_submit(array(
				'value'=>'Siguiente',
				'id' => 'boton_siguiente',
				'class'=>'login-btn',
				'style' => 'display:none'
			)); 
		?>
		<br />
		<?php 
			echo form_close();
			echo form_open('preguntas/finalizarPreguntados'); 
		?>
			<input type = "hidden" id = "total_f" name = "total_f" value = "<?php echo $total; ?>" />
			<input type = "hidden" id = "correctas_f" name = "correctas_f" value = "<?php echo $correctas; ?>" />
			<input type = "hidden" id = "filtro_f" name = "filtro_f" value = "<?php echo $filtro; ?>" />
			<input type = "hidden" id = "id_pregunta_f" name = "id_pregunta_f" value = "<?php echo $pregunta->id; ?>" />
			<input type = "hidden" id = "id_respuesta_f" name = "id_respuesta_f" value = "" />

		<?php 
			echo form_submit(array(
				'value'=>'Finalizar',
				'id' => 'boton_finalizar',
				"class"=>"btn btn-large"
			)); 
			echo form_close();
		?>
		<br />
		<?php echo anchor('preguntas/index/', "Menu");?>
	</div>
</div>
