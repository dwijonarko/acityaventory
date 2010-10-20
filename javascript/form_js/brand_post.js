$('#submit').click(function(){
      
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
            $('#form_show').html(response)
           }else{
            $('#growl').html(response)
           }
        }
      });

    return false;
});
