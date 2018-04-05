function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

$(document).ready(function(){
    
    var container1 = document.getElementById('container1');

    var hot1;

    hot1 = new Handsontable(container1, {
        startRows: 8,
        startCols: 6,
        rowHeaders: true,
        colWidths : [450,100,100,200,200],
        colHeaders: true,
        fillHandle: {
    		autoInsertRow: false,
		},
        colHeaders: ['Item Description/ General Specification','Unit', 'Quantity', 'Unit Cost','Total Amount'],
        cells: function(r,c, prop) {
            var cellProperties = {};
            if (c === 0 || c === 1 || c === 3 || c === 4) cellProperties.readOnly = true;
            return cellProperties;
        },
        afterChange : function(change,source){
        
            if(source == 'edit') {

                var tempdata = this.getData();
                var ok = false;
                var total;
                for(var i = 0; i < tempdata.length; i++)
                {
                    try{
                        var qty = tempdata[i][2].toString().replace(/,/g, '');
                        var amt = tempdata[i][3].toString().replace(/,/g, '');
                        
                        if(isNaN(qty) == false) {
                            total = qty * amt;
                            tempdata[i][2] = numberWithCommas(qty);
                            tempdata[i][4] = numberWithCommas(total.toFixed(2));
                        } else {
                            tempdata[i][2] = null;
                            tempdata[i][4] = null;
                        }
                    }catch(err) {
                        console.log(err.message);
                    }
                }
                this.loadData(tempdata);
                
                    var url = $("#container1").data('save');
                    var tabledata = hot1.getData();
                    for(var i = 0; i < tabledata.length; i++)
                    {
                        try {
                            if(tabledata[i][2]) {
                                tabledata[i][2] = tabledata[i][2].toString().replace(/,/g, '');
                            } else {
                                tabledata[i][2] = 0;
                            }
                        }catch(err) {
                            console.log(err.message);
                        }
                    }
                    console.log(tabledata);
                    var postdata = {
                        data : JSON.stringify(tabledata)
                    };
                    $.post(url,postdata , function (res) {
                            console.log(res);
                    });
            }
        }
    });
    var url = $("#container1").data('get');
    $.get(url,function(resdata){
        var data = JSON.parse(resdata);
        hot1.loadData(data);
    });


    var container2 = document.getElementById('container2');

    var hot2;

    hot2 = new Handsontable(container2, {
        startRows: 8,
        startCols: 5,
        rowHeaders: true,
        colWidths : [450,100,100,200,200],
        colHeaders: true,
        fillHandle: {
    		autoInsertRow: false,
        },
        colHeaders: ['Item Description/ General Specification','Unit', 'Quantity', 'Unit Cost','Total Amount'],
        cells: function(r,c, prop) {
            var cellProperties = {};
            if (c === 0 || c === 1 || c === 3 || c === 4) cellProperties.readOnly = true;
            return cellProperties;
        },
        afterChange : function(change,source){

            if(source == 'edit') {
                var tempdata = this.getData();
                var ok = false;
                var total;
                for(var i = 0; i < tempdata.length; i++)
                {
                    try {
                        var qty = tempdata[i][2].toString().replace(/,/g, '');
                        var amt = tempdata[i][3].toString().replace(/,/g, '');
                        
                        if(isNaN(qty) == false) {
                            total = qty * amt;
                            tempdata[i][2] = numberWithCommas(qty);
                            tempdata[i][4] = numberWithCommas(total.toFixed(2));
                        } else {
                            tempdata[i][2] = null;
                            tempdata[i][4] = null;
                        }
                    }catch(err) {
                        console.log(err.message);
                    }
                }
                this.loadData(tempdata);
                try {
                    var url = $("#container2").data('save');
                    var tabledata = hot2.getData();
                    for(var i = 0; i < tabledata.length; i++)
                    {
                        try {
                            if(tabledata[i][2]) {
                                tabledata[i][2] = tabledata[i][2].toString().replace(/,/g, '');
                            } else {
                                tabledata[i][2] = 0;
                            }
                        }catch(err) {
                            console.log(err.message);
                        }
                    }
                    console.log(tabledata);
                    var postdata = {
                        data : JSON.stringify(tabledata)
                    };
                    $.post(url,postdata , function (res) {
                            console.log(res);
                    });
                } catch (err) {
                    console.log(err.message);
                }
            }
        }
    });

    var url = $("#container2").data('get');
    $.get(url,function(resdata){
        var data = JSON.parse(resdata);
        hot2.loadData(data);
    });

    var container3 = document.getElementById('container3');
    var hot3;

    hot3 = new Handsontable(container3, {
        startRows: 8,
        startCols: 4,
        rowHeaders: true,
        colWidths : [450,100,100,200,200],
        colHeaders: true,
        fillHandle: {
    		autoInsertRow: false,
		},
        colHeaders: ['Item Description/ General Specification','Unit', 'Quantity', 'Unit Cost','Total Amount'],
        cells: function(r,c, prop) {
            var cellProperties = {};
            if (c === 0 || c === 1 || c === 3 || c === 4) cellProperties.readOnly = true;
            return cellProperties;
        },
        afterChange : function(change,source){

            if(source == 'edit') {
                var tempdata = this.getData();
                var ok = false;
                var total;
                for(var i = 0; i < tempdata.length; i++)
                {
                    try {
                        var qty = tempdata[i][2].toString().replace(/,/g, '');
                        var amt = tempdata[i][3].toString().replace(/,/g, '');
                        
                        if(isNaN(qty) == false) {
                            total = qty * amt;
                            tempdata[i][2] = numberWithCommas(qty);
                            tempdata[i][4] = numberWithCommas(total.toFixed(2));
                        } else {
                            tempdata[i][2] = null;
                            tempdata[i][4] = null;
                        }
                    }catch(err) {
                        console.log(err.message);
                    }
                }
                this.loadData(tempdata);
                try {
                    var url = $("#container3").data('save');
                    var tabledata = hot3.getData();
                    for(var i = 0; i < tabledata.length; i++)
                    {
                        try {
                            if(tabledata[i][2]) {
                                tabledata[i][2] = tabledata[i][2].toString().replace(/,/g, '');
                            } else {
                                tabledata[i][2] = 0;
                            }
                        }catch(err) {
                            console.log(err.message);
                        }
                    }
                    console.log(tabledata);
                    var postdata = {
                        data : JSON.stringify(tabledata)
                    };
                    $.post(url,postdata , function (res) {
                            console.log(res);
                    });
                } catch (err) {
                    console.log(err.message);
                }
            }
        }
    });

    var url = $("#container3").data('get');
    $.get(url,function(resdata){
        var data = JSON.parse(resdata);
        hot3.loadData(data);
    });

    // container 4

    var container4 = document.getElementById('container4');

    var hot4;

    hot4 = new Handsontable(container4, {
        startRows: 8,
        startCols: 4,
        rowHeaders: true,
        colWidths : [1,450,100,100,200,200],
        colHeaders: true,
        contextMenu: true,
        fillHandle: {
            autoInsertRow: false,
        },
        colHeaders: ['ID','Item Description/ General Specification','Unit', 'Quantity', 'Unit Cost','Total Amount'],
        cells: function(r,c, prop) {
            var cellProperties = {};
            if (c=== 0 || c === 5) cellProperties.readOnly = true;
            return cellProperties;
        },
        afterChange : function(change,source){
            if(source == 'edit') {
                var tempdata = this.getData();
                var ok = false;
                var total;
                for(var i = 0; i < tempdata.length; i++)
                {
                    var qty = tempdata[i][3];
                    var amt = tempdata[i][4];
                    var item = tempdata[i][1];
                    var unit = tempdata[i][2];
                    if(!item){
                        ok = false;
                    }
                    if(!unit){
                        ok = false;
                    }
                    if(qty) {
                        try {
                            if(isNaN(parseFloat(qty.replace(/,/g, ''))) == false) {
                                ok = true;
                                tempdata[i][3] = numberWithCommas(parseFloat(qty.replace(/,/g, '')));
                            } else {
                                ok = false;
                                tempdata[i][3] = null;
                                tempdata[i][4] = null;
                                //showNotification("alert-danger", "Quantity input is not numeric", "top", "center", null, null);
                            }
                        }catch(err) {
                            ok = false;
                            console.log("If qty " + err.message);
                        }
                    } else {
                        ok = false;
                        console.log("Qty :" + qty);
                    }
                    if(amt) {
                        try {
                            if(isNaN(parseFloat(amt.replace(/,/g, ''))) == false) {
                                ok = true;
                                tempdata[i][4] = numberWithCommas(parseFloat(amt.replace(/,/g, '')));
                            } else {
                                ok = false;
                                tempdata[i][4] = null;
                                tempdata[i][5] = null;
                                //showNotification("alert-danger", "Amount input is not numeric", "top", "center", null, null);
                            }
                        }catch(err) {
                            ok = false;
                            console.log("If amt " + err.message);
                        }
                    } else {
                        ok = false;
                        console.log("Amt :" + amt);
                    }
                    if(ok)
                    {
                        try {
                            var total = parseFloat(qty.replace(/,/g, '')) * parseFloat(amt.replace(/,/g, ''));
                            if(total) {
                                tempdata[i][5] = numberWithCommas(total);
                            } else {
                                tempdata[i][5] = null;
                            }
                        }catch(err) {
                            console.log("If ok :" + err.message);
                        }
                    } else {
                        console.log('Number errors');
                    }
                }
                this.loadData(tempdata);
                if(ok){
                    var url = $("#container4").data('save');
                    var tabledata = hot4.getData();
                    for(var i = 0; i < tabledata.length; i++)
                    {
                        try {
                            tabledata[i][3] = parseFloat(tabledata[i][3].replace(/,/g, ''));
                        } catch(err) {
                            console.log("Quantity is empty.");
                        }
                        try {
                            tabledata[i][4] = parseFloat(tabledata[i][4].replace(/,/g, ''));
                        }catch(err) {
                            console.log("Amount is empty.");
                        }
                    }
                    
                    var postdata = {
                        data : JSON.stringify(tabledata)
                    };
                    $('#saving_changes').modal({
                        backdrop: 'static',
                        keyboard: false,
                        show: true
                    });
                    $.post(url, postdata, function (res) {
                        $('#saving_changes').modal("hide");
                    });
                }
            }
        },
        beforeRemoveRow : function(index,amount) {
            var items = this.getData();
            var url = $("#container4").data('delete');

            var row_item = items[index];
            var postdata = {
                data : JSON.stringify(row_item)
            };
            $.post(url, postdata, function (res) {
                console.log(res);
            });
            if(items.length == 1) {
                var item = array('','','','','');
                this.loadData(items);
            }
        }
    });

    var url = $("#container4").data('get');
    $.get(url,function(resdata){
        var data = JSON.parse(resdata);
        hot4.loadData(data);
    });
    //end of container 4
    

    var container5 = document.getElementById('container5');
    
    var hot5;

    hot5 = new Handsontable(container5, {
        startRows: 8,
        startCols: 4,
        rowHeaders: true,
        colWidths : [450,100,100,200,200],
        colHeaders: true,
        fillHandle: {
            autoInsertRow: false,
        },
        colHeaders: ['Item Description/ General Specification','Unit', 'Quantity', 'Unit Cost','Total Amount'],
        cells: function(r,c, prop) {
            var cellProperties = {};
            if (c === 0 || c === 1 || c === 3 || c === 4) cellProperties.readOnly = true;
            return cellProperties;
        },
        afterChange : function(change,source){

            if(source == 'edit') {
                var tempdata = this.getData();
                var ok = false;
                var total;
                for(var i = 0; i < tempdata.length; i++)
                {
                    var qty = tempdata[i][2].toString().replace(/,/g, '');
                    var amt = tempdata[i][3].toString().replace(/,/g, '');
                    
                    if(isNaN(qty) == false) {
                        total = qty * amt;
                        tempdata[i][2] = numberWithCommas(qty);
                        tempdata[i][4] = numberWithCommas(total.toFixed(2));
                    } else {
                        tempdata[i][2] = null;
                        tempdata[i][4] = null;
                    }
                }
                this.loadData(tempdata);
                try {
                    var url = $("#container5").data('save');
                    var tabledata = hot5.getData();
                    for(var i = 0; i < tabledata.length; i++)
                    {
                        try {
                            if(tabledata[i][2]) {
                                tabledata[i][2] = tabledata[i][2].toString().replace(/,/g, '');
                            } else {
                                tabledata[i][2] = 0;
                            }
                        }catch(err) {
                            console.log(err.message);
                        }
                    }
                    console.log(tabledata);
                    var postdata = {
                        data : JSON.stringify(tabledata)
                    };
                    $.post(url,postdata , function (res) {
                            console.log(res);
                    });
                } catch (err) {
                    console.log(err.message);
                }
            }
        }
    });

    var url = $("#container5").data('get');
    $.get(url,function(resdata){
        var data = JSON.parse(resdata);
        hot5.loadData(data);
    });


    var container6 = document.getElementById('container6');
    var hot6;
    hot6 = new Handsontable(container6, {
        startRows: 8,
        startCols: 4,
        rowHeaders: true,
        colWidths : [2,450,100,100,200,200],
        colHeaders: true,
        contextMenu: true,
        fillHandle: {
            autoInsertRow: false,
        },
        colHeaders: ['ID','Item Description/ General Specification','Unit', 'Quantity', 'Unit Cost','Total Amount'],
        cells: function(r,c, prop) {
            var cellProperties = {};
            if (c === 5 || c === 0) cellProperties.readOnly = true;
            return cellProperties;
        },
        afterChange : function(change,source){
            if(source == 'edit') {
                var tempdata = this.getData();
                var ok = false;
                for(var i = 0; i < tempdata.length; i++)
                {
                    var qty = tempdata[i][3];
                    var amt = tempdata[i][4];
                    var item = tempdata[i][1];
                    var unit = tempdata[i][2];
                    if(!item) {
                        ok = false;
                    }
                    if(!unit) {
                        ok = false;
                    }
                    if(qty) {
                        try {
                            if(isNaN(parseFloat(qty.replace(/,/g, ''))) == false) {
                                ok = true;
                                tempdata[i][3] = numberWithCommas(parseFloat(qty.replace(/,/g, '')));
                            } else {
                                ok = false;
                                tempdata[i][3] = null;
                                tempdata[i][5] = null;
                                //showNotification("alert-danger", "Quantity input is not numeric", "top", "center", null, null);
                            }
                        }catch(err) {
                            ok = false;
                            console.log("If qty " + err.message);
                        }
                    } else {
                        ok = false;
                        console.log("Qty :" + qty);
                    }

                    if(amt) {
                        try {
                            if(isNaN(parseFloat(amt.replace(/,/g, ''))) == false) {
                                ok = true;
                                tempdata[i][4] = numberWithCommas(parseFloat(amt.replace(/,/g, '')));
                            } else {
                                ok = false;
                                tempdata[i][4] = null;
                                tempdata[i][5] = null;
                                //showNotification("alert-danger", "Amount input is not numeric", "top", "center", null, null);
                            }
                        }catch(err) {
                            ok = false;
                            console.log("If amt " + err.message);
                        }
                    } else {
                        ok = false;
                        console.log("Amt :" + amt);
                    }
                    
                    if(ok)
                    {
                        try {
                            var total = parseFloat(qty.replace(/,/g, '')) * parseFloat(amt.replace(/,/g, ''));
                            if(total) {
                                tempdata[i][5] = numberWithCommas(total.toFixed(2));
                            } else {
                                tempdata[i][5] = null;
                            }
                        }catch(err) {
                            console.log("If ok :" + err.message);
                        }
                    } else {
                        console.log('Number errors');
                    }
                }
                this.loadData(tempdata);
                if(ok) {
                    var url = $("#container6").data('save');
                
                    var resdata = this.getData();
                    for(var i = 0; i < resdata.length; i++) {
                        try {
                            resdata[i][3] = parseFloat(resdata[i][3].replace(/,/g, ''));
                        } catch(err) {
                            console.log("Quantity is empty.");
                        }
                        try {
                            resdata[i][4] = parseFloat(resdata[i][4].replace(/,/g, ''));
                        }catch(err) {
                            console.log("Amount is empty.");
                        }
                    }
                    var postdata = {
                        data: JSON.stringify(resdata)
                    };
                   
                    $.post(url, postdata, function (res) {
                        $('#saving_changes').modal("hide");
                    });
                }
            }
        },
        beforeRemoveRow : function(index,amount) {
            var items = this.getData();
            var url = $("#container6").data('delete');
           
            var row_item = items[index];
            var postdata = {
                data : JSON.stringify(row_item)
                
            };
            $.post(url, postdata, function (res) {
                console.log(res);
            });
            if(items.length == 1) {
                var item = ['','','','','',''];
                this.loadData(items);
            }
        }
    });

    var url = $("#container6").data('get');
    $.get(url,function(resdata){
        var data = JSON.parse(resdata);
        hot6.loadData(data);
    });

    var container7 = document.getElementById('container7');
    var hot7;
    hot7 = new Handsontable(container7, {
        startRows: 8,
        startCols: 4,
        rowHeaders: true,
        colWidths : [450,100,100,200,200],
        colHeaders: true,
        fillHandle: {
            autoInsertRow: false,
        },
        colHeaders: ['Item Description/ General Specification','Unit', 'Quantity', 'Unit Cost','Total Amount'],
        cells: function(r,c, prop) {
            var cellProperties = {};
            if (c== 0 || c == 1 || c == 3 || c == 4) cellProperties.readOnly = true;
            return cellProperties;
        },
        afterChange : function(change,source){

            if(source == 'edit') {
                var tempdata = this.getData();
                var ok = false;
                var total;
                for(var i = 0; i < tempdata.length; i++)
                {
                    var qty = tempdata[i][2].toString().replace(/,/g, '');
                    var amt = tempdata[i][3].toString().replace(/,/g, '');
                    
                    if(isNaN(qty) == false) {
                        total = qty * amt;
                        tempdata[i][2] = numberWithCommas(qty);
                        tempdata[i][4] = numberWithCommas(total.toFixed(2));
                    } else {
                        tempdata[i][2] = null;
                        tempdata[i][4] = null;
                    }
                }
                this.loadData(tempdata);
                
                try {
                    var url = $("#container7").data('save');
                    var tabledata = hot7.getData();
                    for(var i = 0; i < tabledata.length; i++)
                    {
                        try {
                            if(tabledata[i][2]) {
                                tabledata[i][2] = tabledata[i][2].toString().replace(/,/g, '');
                            } else {
                                tabledata[i][2] = 0;
                            }
                        }catch(err) {
                            console.log(err.message);
                        }
                    }
                    console.log(tabledata);
                    var postdata = {
                        data : JSON.stringify(tabledata)
                    };
                    
                    $.post(url, postdata, function (res) {
                        
                    });
                } catch (err) {
                    console.log(err.message);
                }
            }
        }
    });

    var url = $("#container7").data('get');
    $.get(url,function(resdata){
        var data = JSON.parse(resdata);
        hot7.loadData(data);
    });



    var container8 = document.getElementById('container8');
    var hot8;
    hot8 = new Handsontable(container8, {
        startRows: 8,
        startCols: 4,
        rowHeaders: true,
        colWidths : [450,100,100,200,200],
        colHeaders: true,
        fillHandle: {
            autoInsertRow: false,
        },
        colHeaders: ['Item Description/ General Specification','Unit', 'Quantity', 'Unit Cost','Total Amount'],
        cells: function(r,c, prop) {
            var cellProperties = {};
            if (c== 0 || c == 1 || c == 3 || c == 4) cellProperties.readOnly = true;
            return cellProperties;
        },
        afterChange : function(change,source){

            if(source == 'edit') {
                var tempdata = this.getData();
                var ok = false;
                var total;
                for(var i = 0; i < tempdata.length; i++)
                {
                    var qty = tempdata[i][2].toString().replace(/,/g, '');
                    var amt = tempdata[i][3].toString().replace(/,/g, '');
                    
                    if(isNaN(qty) == false) {
                        total = qty * amt;
                        tempdata[i][2] = numberWithCommas(qty);
                        tempdata[i][4] = numberWithCommas(total.toFixed(2));
                    } else {
                        tempdata[i][2] = null;
                        tempdata[i][4] = null;
                    }
                }
                this.loadData(tempdata);

                try {
                    var url = $("#container8").data('save');
                    var tabledata = hot8.getData();
                    for(var i = 0; i < tabledata.length; i++)
                    {
                        try {
                            if(tabledata[i][2]) {
                                tabledata[i][2] = tabledata[i][2].toString().replace(/,/g, '');
                            } else {
                                tabledata[i][2] = 0;
                            }
                        }catch(err) {
                            console.log(err.message);
                        }
                    }
                    console.log(tabledata);
                    var postdata = {
                        data : JSON.stringify(tabledata)
                    };
                    $.post(url,postdata , function (res) {
                            console.log(res);
                    });
                } catch (err) {
                    console.log(err.message);
                }
            }
        }
    });

    var url = $("#container8").data('get');
    $.get(url,function(resdata){
        var data = JSON.parse(resdata);
        hot8.loadData(data);
    });



    
});

function get_current_budget(el) {
    var url = $(el).data('link');
    $("#select_item_modal .modal-dialog").html('');
    $(".side-loading").show();
    $("#select_item_modal").modal("show");
    
    $.get(url,function(data){
        $("#select_item_modal .modal-dialog").html(data);
        $(".side-loading").hide();
    });
    
}


function get_current_source_fund(el) {
    var url = $(el).data('link');
    $("#select_item_modal").modal("show");
    $("#select_item_modal .modal-dialog").html('');
    
    $.get(url,function(data){
        $("#select_item_modal .modal-dialog").html(data);
        $(".side-loading").hide();
    });
    
}
