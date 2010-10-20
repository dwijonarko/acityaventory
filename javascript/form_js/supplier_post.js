$('#submit').click(function(){
      
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
            $('#form_show').html(response)
           }else{
            $('#growl').html(response)
           }
        }
      });
       
    return false;
});
