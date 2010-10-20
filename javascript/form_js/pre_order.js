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
}) 

