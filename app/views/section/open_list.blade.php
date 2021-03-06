<script>
                    
    var container{{$start}} = document.getElementById("container{{$start}}");
    var hot{{ $start }};
    
    hot{{ $start }} = new Handsontable(container{{$start}}, {
        startRows: 8,
        startCols: 4,
        rowHeaders: true,
        colWidths : [2,450,100,100,200,200],
        colHeaders: true,
        @if($code->oneline == 0)
            contextMenu: true,
        @endif
        fillHandle: {
            autoInsertRow: false,
        },
        
        colHeaders: ['ID','Item Description/ General Specification', 'Unit','Quantity', 'Unit Cost','Total Amount'],
        
        cells: function(r,c, prop) {
            var cellProperties = {};
            if ({{$code->oneline == 1 ? 'c === 1 || c === 2 || c === 3 || c === 4 || ' : ''}} c === 0 || c === 5) cellProperties.readOnly = true;
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
                    var url = $("#container{{$start}}").data('save');
                
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
                        data: JSON.stringify(resdata),
                        expense : {{ $code->id }}
                    };
                    /*
                    $('#saving_changes').modal({
                        backdrop: 'static',
                        keyboard: false,
                        show: true
                    });*/
                    $.post(url, postdata, function (res) {
                        $('#saving_changes').modal("hide");
                    });
                }
            }
        },
        beforeRemoveRow : function(index,amount) {
            var items = this.getData();
            var url = $("#container{{$start}}").data('delete');
            
            var row_item = items[index];
            var postdata = {
                data : JSON.stringify(row_item),
                expense : {{ $code->id }}
            };
            $.post(url, postdata, function (res) {
                console.log(res);
            });
            if(items.length == 1) {
                var item = [['','','','','','']];
                this.loadData(item);
            }
        }
    });

    var url = $("#container{{ $start }}").data('get');
    var ppcode = $("#container{{ $start }}").data('expense');
    var data = {
        ppcode : ppcode
    };
    $.get(url,data,function(resdata){
        hot{{ $start }}.loadData(JSON.parse(resdata));
    });
</script>