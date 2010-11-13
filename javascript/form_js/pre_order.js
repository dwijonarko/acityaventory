$(document).ready( function() {
    $("#supplier").autocomplete({
      minLength: 0,
      source: 
        function(req, add){
          $.ajax({
            url: base_url+"supplier/lookup_supplier",
              dataType: 'json',
              type: 'POST',
              data: req,
              success:    
                function(data){
                  if(data.response =="true"){
                     add(data.message);
                  }
                },
                
              });
         },
         select: 
         function(event, ui) {
            var address = ui.item.address+"\n";
            $('#address').val(address);
            $('#supplier_id').val(ui.item.id);
         },		
    });
    
    $("#submit").click(function(){
    	/*
    	not yet implemented.. nantinya buat input data pake ajax
      	$('.input_form').attr("disabled",true); //make effect disabled while post data via ajax
      	$('.input_item').attr("disabled",true); //make effect disabled while post data via ajax
		*/
		var po_number = $('#po_number').val();
		var date = $('#date').val();
		var term_date = $('#term_date').val();
		var supplier_id = $('#supplier_id').val();
		
		//addNotice("<p>Message</p><p>Data successfully inserted</p>");
     	//addNotice("<p>Message</p><p>"+ po_number +"</p><p>"+ date +"</p><p>"+ term_date +"</p><p>"+ supplier_id +"</p>");
     	//return false;
     	
	});
}) 

