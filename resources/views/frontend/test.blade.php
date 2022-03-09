<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<div id="content">
     <h3>Hello, this is a H3 tag</h3>

    <p>a pararaph</p>
</div>
<div id="editor"></div>
<button id="cmd">Generate PDF</button>
<form method="post" action="/test">
    @csrf
<label for="sum">Sum of text box onkeyup JS</label><br/>
<input type="number" id="txt1" placeholder="1st" name="quantity[]"  onkeyup1="sum();" />
<input type="number" id="txt2" placeholder="2nd" name="price[]"  onkeyup1="sum();" /> =
<input type="number" id="txt3" name="total[]" readonly/>
<hr/>
<label for="sum">multiply of text box onkeyup JS</label><br/>
<input type="number" id="txt4" placeholder="1st" name="quantity[]"  onkeyup1="multiply();" />
<input type="number" id="txt5" placeholder="2nd " name="price[]"  onkeyup1="multiply();" /> =
<input type="number" id="txt6" name="total[]" readonly/>
<hr/>
<input type="submit" value="submit">
</form>
<script>
    // const { jsPDF } = window.jspdf;
    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $('#cmd').click(function () {
        alert('test');
        doc.fromHTML($('#content').html(), 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });

        doc.save('sample-file.pdf');
    });

$(document).ready(function(){
    //readHTML();
    // const { jsPDF } = window.jspdf;
    //         // Default export is a4 paper, portrait, using millimeters for units
    // const doc = new jsPDF();
    //  doc.fromHTML($('#content').html(), 15, 15, {
        // 'width': 170,
        //         'elementHandlers': specialElementHandlers
        // });
    // doc.save("a4.pdf");
        $('#txt2').keyup(function(){
            var val1 = $('#txt1').val();
            var val2 = $('#txt2').val();
            var val3=parseInt(val1)+parseInt(val2);
           $('#txt3').val(val3);
        });

        $('#txt5').keyup(function(){
            var val4 = $('#txt4').val();
            var val5 = $('#txt5').val();
            var val6=parseInt(val4)*parseInt(val5);
           $('#txt6').val(val6);
        });
});



    function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt3').value = result;
            }
        }
        function multiply() {
            var txtFirstNumberValue = document.getElementById('txt4').value;
            var txtSecondNumberValue = document.getElementById('txt5').value;
            var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt6').value = result;
            }
        }

        function readHTML() {
	// get the HTML source file path
	var path = document.getElementById("text");
	var contents;
	$("#error-message").html("");
	$("#fileUpload").css("border", "#a6a6a6 1px solid");
	if ($(path).length != 0) {
		var r = new FileReader();
		r.onload = function(e) {
			// read HTML file content
			contents = e.target.result;
			// show JavaScript PDF preview
			$(".preview").show();
			$("#temp-target").html(contents);

			$(".btn-preview").hide();
			$(".btn-generate").show();
		}
		r.readAsText(path);
	} else {
		$("#error-message").html("required.").show();
		$("#fileUpload").css("border", "#d96557 1px solid");
	}
}

function converHTMLFileToPDF() {
	const { jsPDF } = window.jspdf;
	var doc = new jsPDF('l', 'mm', [1200, 1210]);

	var pdfjs = document.querySelector('#temp-target');

	// Convert HTML to PDF in JavaScript
	doc.html(pdfjs, {
		callback: function(doc) {
			doc.save("output.pdf");
		},
		x: 10,
		y: 10
	});
}
</script>
