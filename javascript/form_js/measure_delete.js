$(document).ready(function() {
    $(".delbutton").click(function(){
        var element = $(this);
        var del_id = element.attr("id");
        var info = 'id=' + del_id;
        
        if(confirm("Anda yakin akan menghapus?")){
          $.ajax({
            type: "POST",
            url : base_url+'measure/delete',
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
        var measure_name = edit.attr("name");
        var desc = edit.attr("desc");
        
        $('#measure_id').val(id);
        $('#measure_name').val(measure_name);
        $('#desc').val(desc);
        
    });
})
