$(document).ready(function() {
    
    $(".delbutton").click(function(){
        var element = $(this);
        var del_id = element.attr("id");
        var info = 'id=' + del_id;
        
        if(confirm("Anda yakin akan menghapus?")){
          $.ajax({
            type: "POST",
            url : base_url+'warehouse/delete',
            data: info,
            success: function(){
            }
          });

        $(this).parents(".record").animate({ opacity: "hide" }, "slow");
        }

      return false;
    });
 
    $(".editbutton").click(function(){
        $('#form_input').slideDown(1000);
        var edit = $(this);
        
        var id          = edit.attr("id");
        var warehouse_name  = edit.attr("name");
        var code        = edit.attr("code");
        var address     = edit.attr("address");
        var phone       = edit.attr("phone");
        var desc        = edit.attr("desc");
               
        $('#warehouse_id').val(id);
        $('#warehouse_name').val(warehouse_name);
        $('#code').val(code);
        $('#address').val(address);
        $('#phone').val(phone);
        $('#desc').val(desc);
        
        
    });
})
