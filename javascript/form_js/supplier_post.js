$('#submit').click(function(){
	$('#supplier_name').attr("disabled",true);
      $('#code').attr("disabled",true);
      $('#address').attr("disabled",true);
      $('#phone').attr("disabled",true);
      $('#desc').attr("disabled",true);
            
      var form_data = {
        id              : $('#supplier_id').val(),
        supplier_name   : $('#supplier_name').val(),
        code            : $('#code').val(),
        address         : $('#address').val(),
        phone           : $('#phone').val(),
        desc            : $('#desc').val(),
        ajax            : 1
      };
      
      $.ajax({
        url  : base_url+"/supplier/submit",
        type : 'POST',
        data : form_data,
        success: function(response){
           var message = response.indexOf('Error');
           if(message < 0){
            $('#supplier_id').val(''),
            $('#supplier_name').val(''),
            $('#code').val(''),
            $('#address').val(''),
            $('#phone').val(''),
            $('#desc').val(''),
            $('#warehouse_name').attr("disabled",false);
     		$('#code').attr("disabled",false);
			$('#address').attr("disabled",false);
			$('#phone').attr("disabled",false);
			$('#desc').attr("disabled",false);
            $('#form_show').html(response)
           }else{
            $('#growl').html(response)
           }
        }
      });
       
    return false;
});
