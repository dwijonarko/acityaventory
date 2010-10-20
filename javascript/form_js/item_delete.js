$(document).ready(function() {
    
    $(".delbutton").click(function(){
        var element = $(this);
        var del_id = element.attr("id");
        var info = 'id=' + del_id;
        
        if(confirm("Anda yakin akan menghapus?")){
          $.ajax({
            type: "POST",
            url : base_url+'item/delete',
            data: info,
            success: function(){
            }
          });

        $(this).parents(".record").animate({ opacity: "hide" }, "slow");
        }

      return false;
    });
 
    $(".editbutton").click(function(){
        var element = $(this);
        var del_id = element.attr("id");
        var info = 'id=' + del_id;
        
        $.ajax({
            type: "POST",
            url :'item/edit',    
            data: info,
            success: function(response){
                $('#form_input').html(response);
            }
        });

        $('#form_input').slideDown(1000);
    });
    
})
