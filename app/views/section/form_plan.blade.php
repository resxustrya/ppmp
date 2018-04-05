
@extends('section.layout.main')
@section('content')

<section class="content" style="padding: 10px;" id="get_expense" data-expense="{{ asset('get/expense') }}">
    <ul  style="text-decorration :none;" class="timeline">
        <li class="time-label">
            <span class="bg-green">
                I. OFFICE SUPPLIES
            </span>
        </li>
        <li>
            <div class="timeline-item">
                <h3 class="timeline-header"><a href="javascript:void(0);">A. COMMON-USE/REGULAR/STANDARD OFFICE SUPPLIES</a></h3>
                <div class="timeline-body">
                    <ul>
                        <li><strong>1. CONSUMABLE</strong>
                            <ul>
                                <li><strong>a. PER EMPLOYEE</strong><span> (You can only change the quantity in this items)</span>
                                    <div id="container1" data-save="{{ asset('save/section/table_a') }}" data-get="{{ asset('get/section/table_a') }}" class="hot handsontable htRowHeaders htColumnHeaders" ></div>
                                </li>
                                <li><strong>b. PER SECTION</strong>
                                    <div id="container2" data-save="{{ asset('save/section/table_b') }}" data-get="{{ asset('get/section/table_b') }}"></div>
                                </li>
                                <li><strong>c. TRAINING SUPPLIES</strong>
                                    <div id="container3" data-save="{{ asset('save/section/table_c') }}" data-get="{{ asset('get/section/table_c') }}"></div>
                                </li>
                                <li><strong>d. EQUIPMENT CONSUMABLE</strong>
                                    <div id="container4" data-save="{{ asset('save/section/table_d') }}" data-get="{{ asset('get/section/table_d') }}" data-delete="{{ asset('delete/section/table_d') }}"></div>
                                </li>
                            </ul>
                        </li>
                        <li><strong>2. NON-CONSUMABLE</strong>
                            <ul>
                                <li><strong>a. PER SECTION</strong>
                                    <div id="container5" data-save="{{ asset('save/section/table_e') }}" data-get="{{ asset('get/section/table_e') }}"></div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <div class="timeline-item">
                <h3 class="timeline-header"><a href="javascript:void(0)">B. OTHER COMMON-USE OFFICE SUPPLIES SPECIFICALLY USED ONLY BY CONCERNED SECTION (OPEN LIST BY SECTION / PROGRAM)</a></h3>
                <div class="timeline-body">
                    <ul>
                        <li>
                            <ul>
                                <div id="container6" data-save="{{ asset('save/section/table_z') }}" data-get="{{ asset('get/section/table_z') }}" data-delete="{{ asset('delete/item/table_z') }}"></div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="time-label">
            <span class="bg-green">
                II. SEMI-EXPANDABLE EQUIPMENT AND FURNITURE
            </span>
        </li>
        <li>
            <div class="timeline-item">
                <h3 class="timeline-header"><a href="javascript:void(0);">A. COMMON-USE/REGULAR/STANDARD OFFICE/IT/TRAINING EQUIPMENT/FURNITURE</a></h3>
                <div class="timeline-body">
                    <ul>
                        <li>
                            <ul>
                                <li><strong>a. PER EMPLOYEE</strong>
                                    <div id="container7" data-save="{{ asset('save/section/table_f') }}" data-get="{{ asset('get/section/table_f') }}"></div>
                                </li>
                                <li><strong>b. PER SECTION/DIVISION</strong>
                                    <div id="container8" data-save="{{ asset('save/section/table_g') }}" data-get="{{ asset('get/section/table_g') }}"></div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
        <?php $start = 9; ?>
        <?php $expense = DB::table('ppmp_code')->where('id','<>','1')->where('id','<>','2')->get(); ?>
        @foreach($expense as $code)
            <li class="time-label" id="view_code{{$code->id}}">
            @if($code->oneline == 0)
                <span class="bg-green">
                {{ $code->expense_name }}
                </span>
            @else
                <span style="background-color :#EDBB99;color:white;">
                {{ $code->expense_name }}
                </span>
            @endif
            </li>
            <li>
                <div class="timeline-item">
                    @if($code->oneline == 0)
                        <p class="timeline-header"><a href="javascript:void(0);">Some items may appear here even you did not encode it because it was already encoded by other sections.</a></p>
                    @endif
                    <div class="timeline-body">
                        <ul>
                            <li>
                                <ul>
                                    <li>
                                        <div id="container{{$start }}" data-save="{{ asset('save/section/open-list') }}" data-get="{{ asset('get/section/open-list') }}" data-delete="{{ asset('delete/item/open-list') }}" data-expense="{{ $code->id}}" class="status"></div>
                                    </li>
                                    @if($code->oneline == 0)
                                        <li id="program_form{{ $code->id}}">
                                            <div class="preloader program_loader{{ $code->id }}">
                                                <div class="spinner-layer pl-deep-orange">
                                                    <div class="circle-clipper left">
                                                        <div class="circle"></div>
                                                    </div>
                                                    <div class="circle-clipper right">
                                                        <div class="circle"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a onclick="create_program(this,{{ $code->id}});" href="javascript:void(0);" data-link="{{ asset('create/program')}}" title="Create a new program to be added to ppmp">Create a per program expense</a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                @include('section.open_list')
            </li>
            <?php $start = $start + 1; ?>
            <?php $programs = DB::table('program_name')->where('division','=',Auth::user()->division)->where('section','=',Auth::user()->section)->where('ppcode','=',$code->id)->get(); ?>

            @foreach($programs as $program)
                <li>
                    <div class="timeline-item">
                        <p class="timeline-header"><a href="javascript:void(0);">{{ $program->name}}</a> <a style="float:right;" href="{{ asset('delete/program/'.$program->id)}}" title="Delete Program"><span class="glyphicon glyphicon-trash"></a></p>
                        <div class="timeline-body">
                            <ul>
                                <li>
                                    <ul>
                                        <?php
                                            $venues = DB::table('program_training_venue')
                                                        ->leftJoin('training_venue','program_training_venue.venue_id','=', 'training_venue.id')
                                                        ->where('program_training_venue.program_id','=',$program->id)
                                                        ->orderBy('training_venue.order','ASC')
                                                        ->get();
                                        ?>
                                        @foreach($venues as $venue)
                                            <li><strong style="color:#5F6A6A;">{{ DB::table('training_venue')->where('id','=',$venue->venue_id)->first()->venue }}</strong>
                                            <div id="container{{ $program->id."_".$venue->id }}" data-save="{{ asset('save/section/program') }}" data-get="{{ asset('get/section/program') }}" data-delete="{{ asset('delete/section/program') }}" data-program="{{ $program->id }}" data-venue="{{ $venue->id }}"></div>
                                            @include('section.program_js')
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            @endforeach
        @endforeach
        <li>
            <i class="fa fa-clock-o bg-gray"></i>
        </li>
    </ul>
</section>
<span data-openlist="{{ asset('openlist/forms') }}"></span>
@endsection
@section('js')
    <script>
        $('.scroll').click(function(){
            var id = $(this).data('id');
            document.getElementById('view_code'+(id -1)).scrollIntoView();
        });

        function create_program(el,id) {
            $(el).hide();
            $(".program_loader"+id).show();
            var url = $(el).data('link') + "?ppcode=" + id;
            setTimeout(function(){
                $.get(url,function(data){
                    $("#program_form"+id).html(data);
                });
            },1000);
        }
        $(".btn_back").click(function(){
            alert("Back Click");
        });
    </script>
@endsection
