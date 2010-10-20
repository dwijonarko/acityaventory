$('#submit').click(function(){
      
      var form_data = {
        id: $('#group_id').val(),
        group_name: $('#group_name').val(),
        desc: $('#desc').val(),
        ajax:1
      };
     
      $.ajax({
        
        url  : base_url+'group/submit',
        type : 'POST',
        data : form_data,
        success: function(response){
           var message = response.indexOf('Error');
           if(message < 0){
            $('#group_id').val(''),
            $('#group_name').val(''),
            $('#desc').val('')
            $('#form_show').html(response)
           }else{
            $('#growl').html(response)
           }
        }
      });
      
     
    return false;
});
