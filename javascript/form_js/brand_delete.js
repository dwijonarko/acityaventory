$(document).ready(function() {
    $(".delbutton").click(function(){
        var element = $(this);
        var del_id = element.attr("id");
        var info = 'id=' + del_id;
        
        if(confirm("Anda yakin akan menghapus?")){
          $.ajax({
            type: "POST",
            url : base_url+"brand/delete",
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
        var id = edit.attr("id");
        var brand_name = edit.attr("name");
        var desc = edit.attr("desc");
        
        $('#brand_id').val(id);
        $('#brand_name').val(brand_name);
        $('#desc').val(desc);
        
    });
})
