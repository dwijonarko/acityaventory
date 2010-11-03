$('#submit').click(function(){
      $('#brand_name').attr("disabled",true);
      $('#desc').attr("disabled",true);
      
      var form_data = {
        id: $('#brand_id').val(),
        brand_name: $('#brand_name').val(),
        desc: $('#desc').val(),
        ajax:1
      };

      $.ajax({
        url  : base_url+"brand/submit",
        type : 'POST',
        data : form_data,
        
        success: function(response){
           var message = response.indexOf('Error');
           if(message < 0){
            $('#brand_id').val(''),
            $('#brand_name').val(''),
            $('#desc').val('')
            $('#brand_name').attr("disabled",false);
      		$('#desc').attr("disabled",false);
            $('#form_show').html(response)
           }else{
            $('#growl').html(response)
           }
        }
      });
      
      return false;
});
