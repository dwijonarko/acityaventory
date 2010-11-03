$('#submit').click(function(){
      $('#group_name').attr("disabled",true);
      $('#desc').attr("disabled",true);
      
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
            $('#group_name').attr("disabled",false);
      		$('#desc').attr("disabled",false);
            $('#form_show').html(response)
           }else{
            $('#growl').html(response)
           }
        }
      });
      
     
    return false;
});
