$('#submit').click(function(){
      $('#measure_name').attr("disabled",true);
      $('#desc').attr("disabled",true);

      var form_data = {
        id: $('#measure_id').val(),
        measure_name: $('#measure_name').val(),
        desc: $('#desc').val(),
        ajax:1
      };
      
      $.ajax({
        url  : base_url+"measure/submit",
        type : 'POST',
        data : form_data,
        success: function(response){
           var message = response.indexOf('Error');
           if(message < 0){
            $('#measure_id').val(''),
            $('#measure_name').val(''),
            $('#desc').val(''),
            $('#form_show').html(response)
           }else{
            $('#growl').html(response)
           }
	        $('#measure_name').attr("disabled",false);
      		$('#desc').attr("disabled",false);
        }
      });
       
    return false;
});
