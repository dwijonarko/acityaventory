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
		
		var form_data = { //get value from input
		    id: $('#brand_id').val(),
		    brand_name: $('#brand_name').val(),
		    desc: $('#desc').val(),
		    ajax:1
      	};
		addNotice("<p>Message</p><p>Data successfully inserted</p>");
     	return false;
     	*/
	});
}) 

