$(document).ready(function(){
    $('#form_input').hide();
    
    $(".datepicker").datepicker({dateFormat:'dd-mm-yy'});
    
    $('#hide').click(function(){
        if ($('#form_input').is(':visible')) {
          $('#form_input').slideUp(1000);
        } else {
          $('#form_input').slideDown(1000);
        }
        return false;
    });
});
        


function addNotice(notice) {
    $('<div class="notice"></div>')
    .append('<div class="skin"></div>')
    .append('<a href="#" class="close" style="color:white;">x</a>')
    .append($('<div class="content"></div>').html($(notice)))
    .hide()
    .appendTo('#growl')
    .fadeIn(1200);
}
$('#growl')
    .find('.close')
    .live('click', function() {    
        $(this)
            .closest('.notice')
            .animate({
                border: 'none',
                height: 0,
                marginBottom: 0,
                marginTop: '-6px',
                opacity: 0,
                paddingBottom: 0,
                paddingTop: 0,
                queue: false
            }, 1000, function() {
                 $(this).remove();
            });
            
            return false;
     });
