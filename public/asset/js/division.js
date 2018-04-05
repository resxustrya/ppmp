function get_current_source_fund(el) {
    var url = $(el).data('link');
    $("#select_item_modal").modal("show");
    $("#select_item_modal .modal-dialog").html('');
    
    $.get(url,function(data){
        $("#select_item_modal .modal-dialog").html(data);
        $(".side-loading").hide();
    });
}
