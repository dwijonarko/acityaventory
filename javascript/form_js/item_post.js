$('#submit').click(function(){
      
      if($('#status_id').attr('checked')){
        status_id_val = '1';      
      }else{
        status_id_val ='0';
      }
      
      $('#item_name').attr("disabled",true);
      $('#code').attr("disabled",true);
      $('#sell_price').attr("disabled",true);
      $('#min_stock').attr("disabled",true);
      $('#desc').attr("disabled",true);
      
      var form_data = {
        id              : $('#item_id').val(),
        item_name       : $('#item_name').val(),
        code            : $('#code').val(),
        sell_price      : $('#sell_price').val(),
        brand_id        : $('#brand_id').val(),
        measure_id      : $('#measure_id').val(),
        group_id        : $('#group_id').val(),
        min_stock       : $('#min_stock').val(),
        status_id       : status_id_val,
        desc            : $('#desc').val(),
        ajax            : 1
      };
      
      
      $.ajax({
        url  : base_url+"item/submit",
        type : 'POST',
        data : form_data,
        success: function(response){
           var message = response.indexOf('Error');
           if(message < 0){
            $('#item_id').val(''),
            $('#item_name').val(''),
            $('#code').val(''),
            $('#sell_price').val('0'),
            $('#brand_id').val(''),
            $('#measure_id').val(''),
            $('#group_id').val(''),
            $('#status_id').val(''),
            $('#min_stock').val('0'),
            $('#desc').val(''),
	        $('#item_name').attr("disabled",false);
      	    $('#code').attr("disabled",false);
      		$('#sell_price').attr("disabled",false);
      		$('#min_stock').attr("disabled",false);
      		$('#desc').attr("disabled",false);
            $('#form_show').html(response)
           }else{
            $('#growl').html(response)
           }
        }
        
      });
      
    return false;
});
