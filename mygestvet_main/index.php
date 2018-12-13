<?php
include_once "config_exemploassinatura.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Exemplo assinatura</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/signature/css/signature-pad.css">
</head>
<body style="background-color:white;">
	<div class="col-lg-12">
		<h4>Exemplo Assinatura</h4><br>
		<div class="col-lg-6 offset-lg-3">
			<div>
				<label>Nome</label>
				<input type="text" id="nome">
			</div>
		</div>
		<br>
		<div class="col-lg-6 offset-lg-3" style='height:300px;' id="assinatura">
	        <div id='signature-pad' class='m-signature-pad'>
	            <div class='m-signature-pad--body'>
	                <canvas></canvas>
	            </div>
	            <div class='m-signature-pad--footer'>
	            	<div class='description'>Assinatura</div>
	                <div class='left'>
	                  	<button type='button' class='button clear' data-action='clear'>Limpar</button>
	                </div>
	                <div class='right'>
	                  	<button style='visibility: hidden;' data-action='save-png'></button>
	                  	<button type='button' class='button save' data-action='save-svg'>Guardar</button>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class='clearfix'></div><br><br>
	    <div class='col-lg-6' id='tab'>

		</div>
    </div>
    <div id="modalimg" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body" id="img">

            </div>
          </div>
        </div>
      </div>
</body>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="assets/signature/js/signature_pad.js"></script>
<script>
	function loadsig(){
	    var wrapper = document.getElementById("signature-pad"),
	    clearButton = wrapper.querySelector("[data-action=clear]"),
	    savePNGButton = wrapper.querySelector("[data-action=save-png]"),
	    saveSVGButton = wrapper.querySelector("[data-action=save-svg]"),
	    canvas = wrapper.querySelector("canvas"),
	    signaturePad;
	    // Adjust canvas coordinate space taking into account pixel ratio,
	    // to make it look crisp on mobile devices.
	    // This also causes canvas to be cleared.
	    function resizeCanvas() {
	        // When zoomed out to less than 100%, for some very strange reason,
	        // some browsers report devicePixelRatio as less than 1
	        // and only part of the canvas is cleared then.
	        var ratio =  Math.max(window.devicePixelRatio || 1, 1);
	        canvas.width = canvas.offsetWidth * ratio;
	        canvas.height = canvas.offsetHeight * ratio;
	        canvas.getContext("2d").scale(ratio, ratio);
	    }

	    window.onresize = resizeCanvas;
	    resizeCanvas();

	    signaturePad = new SignaturePad(canvas);

	    clearButton.addEventListener("click", function (event) {
	        signaturePad.clear();
	    });

	    savePNGButton.addEventListener("click", function (event) {
	        if (signaturePad.isEmpty()) {
	            if(document.getElementById('lang').innerHTML == 1){
	                alert("Forneça a assinatura primeiro.");
	            }else{
	                alert("S'il vous plaît fournir la signature d'abord.");
	            }
	        } else {
	            window.open(signaturePad.toDataURL());
	        }
	    });

	    saveSVGButton.addEventListener("click", function (event) {
	        if (signaturePad.isEmpty()) {
	            if(document.getElementById('lang').innerHTML == 1){
	                alert("Forneça a assinatura primeiro.");
	            }else{
	                alert("S'il vous plaît fournir la signature d'abord.");
	            }
	        } else {
	            //window.open(signaturePad.toDataURL('image/svg+xml'));

	            var assinatura = signaturePad.toDataURL('image/svg+xml');

                $.ajax({
                    type: 'POST',
                    url: 'assidb.php?op=1',
                    data: {sig:assinatura,nome:$('#nome').val()},
                    success: function(data) {
                        var info = JSON.parse(data);
                        if(info['val'] == 1){
                        	alert(info['msg']);
                        	loadInfo();
                        }else{
                        	alert(into['msg']);
                        }
                    }
                });

	            signaturePad.clear();
	            $("#nome").val("");
	        }
	    });
	    //$('head').append('<link rel="stylesheet" type="text/css" href="js/plugins/signature/css/signature-pad.css">');
	}

	function loadInfo(){
		$.ajax({
            type: 'POST',
            url: 'assidb.php?op=2',
            data: {},
            success: function(data) {
                var info = JSON.parse(data);
                $("#tab").html(info['msg']);
            }
        });
	}
	function remAssi(id){
	    $.ajax({
            type: 'POST',
            url: 'assidb.php?op=3',
            data: {id:id},
            success: function(data) {
                var info = JSON.parse(data);
               	if(info['val'] == 1){
	              	alert(info['msg']);
	              	loadInfo();
	          	}else{
	              	alert(info['msg']);
	          	}
            }
        });
	}

	function showImg(id){
	    $.ajax({
            type: 'POST',
            url: 'assidb.php?op=4',
            data: {id:id},
            success: function(data) {
                var info = JSON.parse(data);
                $("#img").html("<img style='width:100%;' src='"+info['msg']+"'>");
            }
        });
	    $("#modalimg").modal("show");
	}
	document.addEventListener("DOMContentLoaded", function(event) {
		loadInfo();
		loadsig();
	});
</script>
</html>