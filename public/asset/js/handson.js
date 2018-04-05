
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

$(document).ready(function(){
//PER EMPLOYEE
    var container = document.getElementById('example1');
    var hot;
    hot = new Handsontable(container, {
        startRows: 8,
        startCols: 4,
        rowHeaders: true,
        colWidths : [400,200,200,300],
        colHeaders: true,
        contextMenu: true,
        search:true,
        colHeaders: ['Item Description/ General Specification', 'Unit','Quantity', 'Unit Cost'],
        cells: function(r,c, prop) {
            var cellProperties = {};
            if (c== 2) cellProperties.readOnly = true;
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
                        var amt = tempdata[i][3].toString().replace(/,/g, '');
                        if(isNaN(amt) == false) {
                            tempdata[i][3] = numberWithCommas(amt);
                        }
                    }catch(err) {
                        console.log(err.message);
                    }
                    
                }
                this.loadData(tempdata);
                try {
                    var url = $("#example1").data('save');
                    var tabledata = this.getData();
                    for(var i = 0; i < tabledata.length; i++)
                    {
                        tabledata[i][3] = tabledata[i][3].toString().replace(/,/g, '');
                    }
                
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
        },
        
    });
    
    var url = $("#example1").data('get');

    $.get(url,function(resdata){
        var data = JSON.parse(resdata);
        hot.loadData(data);
    });

// PER / SECTION

    var container2 = document.getElementById('example2');
    var hot2;

    hot2 = new Handsontable(container2, {
        startRows: 8,
        startCols: 4,
        rowHeaders: true,
        colWidths : [400,200,200,300],
        colHeaders: true,
        contextMenu: true,
        colHeaders: ['Item Description/ General Specification', 'Unit','Quantity', 'Unit Cost'],
        cells: function(r,c, prop) {
            var cellProperties = {};
            if (c== 2) cellProperties.readOnly = true;
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
                        var amt = tempdata[i][3].toString().replace(/,/g, '');
                        if(isNaN(amt) == false) {
                            tempdata[i][3] = numberWithCommas(amt);
                        }
                    }catch(err) {
                        console.log(err.message);
                    }
                }
                this.loadData(tempdata);
                try {
                    var url = $("#example2").data('save');
                    var tabledata = this.getData();
                    for(var i = 0; i < tabledata.length; i++)
                    {
                        tabledata[i][3] = tabledata[i][3].toString().replace(/,/g, '');
                    }
                
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

    var url = $("#example2").data('get');
    $.get(url,function(resdata){
        var data = JSON.parse(resdata);
        hot2.loadData(data);
    });


// TRAINING SUPPLIES


    var container3 = document.getElementById('example3');
    var hot3;

    hot3 = new Handsontable(container3, {
        startRows: 8,
        startCols: 4,
        rowHeaders: true,
        colWidths : [400,200,200,300],
        colHeaders: true,
        contextMenu: true,
        colHeaders: ['Item Description/ General Specification', 'Unit','Quantity', 'Unit Cost'],
        cells: function(r,c, prop) {
            var cellProperties = {};
            if (c== 2) cellProperties.readOnly = true;
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
                        var amt = tempdata[i][3].toString().replace(/,/g, '');
                        if(isNaN(amt) == false) {
                            tempdata[i][3] = numberWithCommas(amt);
                        }
                    }catch(err) {
                        console.log(err.message);
                    }
                    
                }
                this.loadData(tempdata);
                try {
                    var url = $("#example3").data('save');
                    var tabledata = this.getData();
                    for(var i = 0; i < tabledata.length; i++)
                    {
                        tabledata[i][3] = tabledata[i][3].toString().replace(/,/g, '');
                    }
                
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

    var url = $("#example3").data('get');
    $.get(url,function(resdata){
        var data = JSON.parse(resdata);
        hot3.loadData(data);
    });


    var container4 = document.getElementById('example4');
    var hot4;

    hot4 = new Handsontable(container4, {

        startRows: 8,
        startCols: 4,
        rowHeaders: true,
        colWidths : [400,200,200,300],
        colHeaders: true,
        contextMenu: true,
        colHeaders: ['Item Description/ General Specification', 'Unit','Quantity','Unit Cost'],
        cells: function(r,c, prop) {
            var cellProperties = {};
            if (c== 2) cellProperties.readOnly = true;
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
                        var amt = tempdata[i][3].toString().replace(/,/g, '');
                        if(isNaN(amt) == false) {
                            tempdata[i][3] = numberWithCommas(amt);
                        }
                    }catch(err) {
                        console.log(err.message);
                    }
                    
                }
                this.loadData(tempdata);
                try {
                    var url = $("#example4").data('save');
                    var tabledata = this.getData();
                    for(var i = 0; i < tabledata.length; i++)
                    {
                        tabledata[i][3] = tabledata[i][3].toString().replace(/,/g, '');
                    }
                
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

    var url = $("#example4").data('get');
    $.get(url,function(resdata){
        var data = JSON.parse(resdata);
        hot4.loadData(data);
    });




    var container5 = document.getElementById('example5');
    var hot5;

    hot5 = new Handsontable(container5, {
        startRows: 8,
        startCols: 4,
        rowHeaders: true,
        colWidths : [400,200,200,300],
        colHeaders: true,
        contextMenu: true,
        colHeaders: ['Item Description/ General Specification', 'Unit','Quantity', 'Unit Cost'],
        cells: function(r,c, prop) {
            var cellProperties = {};
            if (c== 2) cellProperties.readOnly = true;
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
                        var amt = tempdata[i][3].toString().replace(/,/g, '');
                        if(isNaN(amt) == false) {
                            tempdata[i][3] = numberWithCommas(amt);
                        }
                    }catch(err) {
                        console.log(err.message);
                    }
                    
                }
                this.loadData(tempdata);
                try {
                    var url = $("#example5").data('save');
                    var tabledata = this.getData();
                    for(var i = 0; i < tabledata.length; i++)
                    {
                        tabledata[i][3] = tabledata[i][3].toString().replace(/,/g, '');
                    }
                
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


    var url = $("#example5").data('get');
    $.get(url,function(resdata){
        var data = JSON.parse(resdata);
        hot5.loadData(data);
    });


    var container6 = document.getElementById('example6');
    var hot6;

    hot6 = new Handsontable(container6, {
        startRows: 8,
        startCols: 4,
        rowHeaders: true,
        colWidths : [400,200,200,300],
        colHeaders: true,
        contextMenu: true,
        colHeaders: ['Item Description/ General Specification', 'Unit','Quantity', 'Unit Cost'],
        cells: function(r,c, prop) {
            var cellProperties = {};
            if (c== 0 || c == 1 || c == 2 || c == 3) cellProperties.readOnly = true;
            return cellProperties;
        },
        afterChange : function(change,source){

            if(source == 'edit') {
                    try {
                        var url = $("#example6").data('save');
                        var resdata = JSON.stringify(hot6.getData());
                        var postdata = {
                            data: resdata
                        };
                        $.post(url, postdata, function (res) {
                            console.log(res);
                        });
                    } catch (err) {
                        console.log(err.message);
                    }
            }
        }
    });

    var container7 = document.getElementById('example7');
    var hot7;

    hot7 = new Handsontable(container7, {
        startRows: 8,
        startCols: 4,
        rowHeaders: true,
        colWidths : [400,200,200,300],
        colHeaders: true,
        contextMenu: true,
        colHeaders: ['Item Description/ General Specification', 'Unit','Quantity', 'Unit Cost'],
        cells: function(r,c, prop) {
            var cellProperties = {};
            if (c== 2) cellProperties.readOnly = true;
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
                        var amt = tempdata[i][3].toString().replace(/,/g, '');
                        if(isNaN(amt) == false) {
                            tempdata[i][3] = numberWithCommas(amt);
                        }
                    }catch(err) {
                        console.log(err.message);
                    }
                    
                }
                this.loadData(tempdata);
                try {
                    var url = $("#example7").data('save');
                    var tabledata = this.getData();
                    for(var i = 0; i < tabledata.length; i++)
                    {
                        tabledata[i][3] = tabledata[i][3].toString().replace(/,/g, '');
                    }
                
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

    var url = $("#example7").data('get');
    $.get(url,function(resdata){
        var data = JSON.parse(resdata);
        hot7.loadData(data);
    });


    var container8 = document.getElementById('example8');
    var hot8;

    hot8 = new Handsontable(container8, {
        startRows: 8,
        startCols: 4,
        rowHeaders: true,
        colWidths : [400,200,200,300],
        colHeaders: true,
        contextMenu: true,
        colHeaders: ['Item Description/ General Specification', 'Unit','Quantity', 'Unit Cost'],
        cells: function(r,c, prop) {
            var cellProperties = {};
            if (c== 2) cellProperties.readOnly = true;
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
                        var amt = tempdata[i][3].toString().replace(/,/g, '');
                        if(isNaN(amt) == false) {
                            tempdata[i][3] = numberWithCommas(amt);
                        }
                    }catch(err) {
                        console.log(err.message);
                    }
                    
                }
                this.loadData(tempdata);
                try {
                    var url = $("#example8").data('save');
                    var tabledata = this.getData();
                    for(var i = 0; i < tabledata.length; i++)
                    {
                        tabledata[i][3] = tabledata[i][3].toString().replace(/,/g, '');
                    }
                
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

    var url = $("#example8").data('get');
    $.get(url,function(resdata){
        var data = JSON.parse(resdata);
        hot8.loadData(data);
    });
});




