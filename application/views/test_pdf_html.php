<div id="content">
    <h3>Sample h3 tag</h3>
    <p>Sample pararaph</p>
</div>
<div id="editor"></div>
<button id="cmd">Generate PDF</button>
<!--Add External Libraries - JQuery and jspdf 
check out url - https://scotch.io/@nagasaiaytha/generate-pdf-from-html-using-jquery-and-jspdf
-->
<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>


<style type="text/css">
	h3
	{
	  border:1px solid black;
	}
</style>



<script type="text/javascript">
	var doc = new jsPDF();
	var specialElementHandlers = {
	    '#editor': function (element, renderer) {
	        return true;
	    }
	};

	$('#cmd').click(function () {   
	    doc.fromHTML($('#content').html(), 15, 15, {
	        'width': 170,
	            'elementHandlers': specialElementHandlers
	    });
	    doc.save('sample-file.pdf');
	});

	// This code is collected but useful, click below to jsfiddle link.

</script>