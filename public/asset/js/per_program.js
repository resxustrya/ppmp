var bohol_con = document.getElementById("bohol_con");
    
    var bohol;

    bohol = new Handsontable(bohol_con, {
        startRows: 8,
        startCols: 6,
        rowHeaders: true,
        colWidths : [100,450,100,100,200,200],
        colHeaders: true,
        contextMenu : true,
        fillHandle: {
            autoInsertRow: false,
        },
        colHeaders: ['ID','Item Description/ General Specification','Unit', 'Quantity', 'Unit Cost','Total Amount'],
        cells: function(r,c, prop) {
            var cellProperties = {};
            if (c === 0 || c === 5) cellProperties.readOnly = true;
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
                    var url = $("#bohol_con").data('save');
                
                    var resdata = this.getData();
                    for(var i = 0; i < resdata.length; i++) {
                        try {
                            resdata[i][3] = parseFloat(resdata[i][3].replace(/,/g, ''));
                        } catch(err) {
                            resdata[i][3] = null;
                            console.log("Quantity is empty.");
                        }
                        try {
                            resdata[i][4] = parseFloat(resdata[i][4].replace(/,/g, ''));
                        }catch(err) {
                            resdata[i][4] = null;
                            console.log("Amount is empty.");
                        }
                    }
                    var postdata = {
                        data: JSON.stringify(resdata)
                    };
                    $.post(url, postdata, function (res) {
                        console.log(res);
                    });
                }
            }
        }
    });
    
    var url = $("#bohol_con").data('get');
    $.get(url,function(resdata){
        var data = JSON.parse(resdata);
        bohol.loadData(data);
    });