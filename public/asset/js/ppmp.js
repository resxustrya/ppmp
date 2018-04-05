/**
 * Created by hahahehe on 8/29/2017.
 */

function showItem(el)
{
    if($("#ppmpitems tbody tr").length == 0){
        selectExpenseCode();
        return;
    }

    $("#txt_srcfunds").parents('.form-line').removeClass("error");
    $('#select_item_modal').modal('show');
    $('#select_item_modal .modal-body').html('');
    $('#select_item_modal .side-loading').show();
    var ppcode = $("#selected_ppcode").data('id');
    var data = {
      ppcode : ppcode
    };
    var url = $(el).data('link') + "?v=select";
    setTimeout(function(){
        $.get(url,data,function(data){
            $('#select_item_modal .modal-body').html(data);
            $('#select_item_modal .side-loading').hide();
        });
    },1000);


}

function getselected()
{

    var codes = [];
    $('#myTable tr').each(function () {
        var el = $(this).find('td:eq(0)');
        var input = el.find('input');
        var ok = false;
        var srcfunds = $("#txt_srcfunds").val();
        if(input.is(':checked')) {
            var code = $(this).find('td:eq(2)').text().trim();
            var desc = $(this).find('td:eq(1)').text().trim();
            var unit = $(this).find('td:eq(3)').text().trim();
            var html = "";

            $('#ppmpitems tbody tr').each(function(index, data){

                var ex_code = $(data).find('td:eq(0)').text().trim();
                codes.push(ex_code);
            });

            for(var i = 0; i < codes.length;i++)
            {
                if (codes[i] == code)
                {
                    ok = true;
                }
            }
            if(ok == false) {
                html += "<tr id='"+ code +"'>";
                html += "<td>" + code + "</td>";
                html += "<td>" + desc + "</td>";
                html += "<td><strong id='quantity"+code+"'></strong> </td>";
                html += "<td><input type='text' name='unit[]' value='"+ unit +"' required class='numberonly form-control' readonly /></td>";
                html += "<td><strong id='amount"+code+"'></strong></td>";
                html += "<td>" +
                    "<input type='hidden' name='code[]' value='"+ code +"' required class='numberonly form-control' placeholder='0'/>" +
                    "<input type='hidden' name='item-desc[]' value='"+ desc +"' required class='numberonly form-control' placeholder='0'/>" +
                    "<input type='number' id='q1qty"+code+"' name='q1qty[]' required class='numberonly form-control' onblur='computeQtyAmount(this,"+code+");' placeholder='0'/>" +
                    "</td>";
                html += "<td><input type='number' id='q1unitcost"+code+"' name='q1unitcost[]' required class='numberonly form-control' onblur='computeQtyAmount(this,"+code+");' placeholder='0.00'/></td>";
                html += "<td><input type='number' id='q2qty"+code+"' name='q2qty[]' required class='numberonly form-control' onblur='computeQtyAmount(this,"+code+");' placeholder='0'/></td>";
                html += "<td><input type='number' id='q2unitcost"+code+"' name='q2unitcost[]' required class='numberonly form-control' onblur='computeQtyAmount(this,"+code+");' placeholder='0.0'/></td>";
                html += "<td><input type='number' id='q3qty"+code+"' name='q3qty[]' required class='numberonly form-control' onkeyup='computeQtyAmount(this,"+code+");' placeholder='0' /></td>";
                html += "<td><input type='number' id='q3unitcost"+code+"' name='q3unitcost[]' required class='numberonly form-control' onblur='computeQtyAmount(this,"+code+");' placeholder='0.0'/></td>";
                html += "<td><input type='number' id='q4qty"+code+"' name='q4qty[]' required class='numberonly form-control' onkeyup='computeQtyAmount(this,"+code+");' placeholder='0' /></td>";
                html += "<td><input type='number' id='q4unitcost"+code+"'name='q4unitcost[]' required class='numberonly form-control' onblur='computeQtyAmount(this,"+code+");' placeholder='0.0'/></td>";
                html += "<td><a href='javascript:void(0);' data-id='" + code + "' onclick='removeEl(this);'> <span style='cursor: hand;' class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>";
                html += "</tr>";


                $("#ppmpitems tbody").append(html);
                $('.next_code').show();
            } else {
                showNotification("alert-danger","Item code : " + code + " already exist.", "bottom", "center", null, null);

            }

        }
    });
}

function submit()
{

    $('#ppmpitems').submit();
}



function computeQtyAmount(el,code)
{
    var value = parseFloat($(el).val());
    var formated = value.toFixed(2);
    if(isNaN(formated)) {
        $(el).val('');
    } else {
        $(el).val(formated);
    }


    var q1qty = $("#q1qty"+code).val().trim() != '' ?  $("#q1qty"+code).val().trim() : 0.00;
    var q1unitcost = $("#q1unitcost"+code).val().trim() != '' ? $("#q1unitcost"+code).val().trim() : 0.00;
    var q2qty = $("#q2qty"+code).val().trim() != '' ? $("#q2qty"+code).val().trim() : 0.00;
    var q2unitcost = $("#q2unitcost"+code).val().trim() != '' ? $("#q2unitcost"+code).val().trim() : 0.00;
    var q3qty = $("#q3qty"+code).val().trim() != '' ? $("#q3qty"+code).val().trim() : 0.00;
    var q3unitcost = $("#q3unitcost"+code).val().trim() != '' ? $("#q3unitcost"+code).val().trim() : 0.00;
    var q4qty = $("#q4qty"+code).val().trim() != '' ? $("#q4qty"+code).val().trim() : 0.00;
    var q4unitcost = $("#q4unitcost"+code).val().trim() != '' ? $("#q4unitcost"+code).val().trim() : 0.00;


    var totalqty = parseFloat(parseFloat(q1qty) + parseFloat(q2qty) + parseFloat(q3qty) + parseFloat(q4qty));
    $("#quantity"+code).text(totalqty.toFixed(2));
    var totalunitcost = parseFloat(parseFloat(q1unitcost) + parseFloat(q2unitcost) + parseFloat(q3unitcost) + parseFloat(q4unitcost));

    var totalamount = totalqty * totalunitcost;

    $("#amount"+code).text(totalamount.toFixed(2));



}
function setSrcFunds(el)
{
    var val = $(el).val();
    $(".srcfunds").val(val);

}

function selectExpenseCode()
{

    $('.a').removeClass('hidden');
    $('#select_expense_code').modal({
        backdrop : 'dynamic',
        show : true
    });
}

function removeEl(el)
{
    $(el).closest( 'tr').remove();
}

$("#btn_hide").click(function(){
    $('.left_hide').hide();
    $("#btn_hide").hide();
    $("#btn_show").removeClass("hidden").css("margin-left","0px");
    $("section.content").css("margin-left","60px");
    $("#leftsidebar").css("width","60px");
    $("#main").hide();
    $("#btn_hide").css("margin-left","0px");
});

$("#btn_show").click(function(){
    $("#btn_show").addClass("hidden").css("margin-left","30px");
    $("section.content").css("margin-left","210px");
    $("#leftsidebar").css("width","210px");
    $("#main").show();
    $("#btn_hide").css("margin-left","30px");
    $('.left_hide').show();
    $("#btn_hide").show();
});


