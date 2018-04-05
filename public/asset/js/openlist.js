var container{{$start}} = document.getElementById("container{{$start}}");

                    var hot{{ $start }};

                    hot{{ $start }} = new Handsontable(container{{$start}}, {
                        startRows: 8,
                        startCols: 4,
                        rowHeaders: true,
                        colWidths : [450,100,100,200,200],
                        colHeaders: true,
                        @if($code->oneline == 0)
                            minSpareRows: 1,
                            contextMenu: true,
                        @else
                            fillHandle: {
                                autoInsertRow: false,
                            },
                        @endif
                        colHeaders: ['Item Description/ General Specification', 'Unit','Quantity', 'Unit Cost','Total Amount'],
                        @if($code->oneline == 1)
                            cells: function(r,c, prop) {
                                var cellProperties = {};
                                if (c === 0) cellProperties.readOnly = true;
                                return cellProperties;
                            },
                        @endif
                        afterChange : function(change,source){

                            if(source == 'edit') {
                                try {
                                    var url = $("#container{{$start}}").data('save');
                                    var resdata = JSON.stringify(hot{{$start}}.getData());
                                    var postdata = {
                                        data: resdata,
                                        expense : {{ $code->id }}
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
                    
                    var url = $("#container{{$start}}").data('get');
                    var expense = {
                        expense : $("#container{{$code->id}}").data('expense')
                    };
                    @if($code->oneline == 0)
                        $.get(url,expense,function(resdata){
                            var data = JSON.parse(resdata);
                            hot{{$start}}.loadData(data);
                        });
                    @else
                        <?php
                            $data = array(
                                array($code->expense_name,null,null,null,null)
                            );
                        ?>
                        console.log(expense);
                        hot{{$start}}.loadData({{json_encode($data)}});
                    @endif