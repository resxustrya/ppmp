
@extends('supply.layout.main')
@section('content')

<section class="content" style="padding: 10px;">
    <ul  style="text-decorration :none;" class="timeline">
        <li class="time-label">
            <span class="bg-green">
                I. OFFICE SUPPLIES
            </span>
        </li>
        <li>
            <div class="timeline-item">
                <h3 class="timeline-header"><a href="javascript:void(0);">COMMON-USE/REGULAR/STANDARD OFFICE SUPPLIES</a></h3>
                <div class="timeline-body">
                    <ul>
                        <li><strong>1. CONSUMABLE</strong>
                            <ul>
                                <li><strong>a. PER EMPLOYEE</strong>
                                    <div id="example1" data-save="{{ asset('save/table_a') }}" data-get="{{ asset('get/table_a') }}"></div>
                                </li>
                                <li><strong>b. PER SECTION</strong>
                                    <div id="example2" data-save="{{ asset('save/table_b') }}" data-get="{{ asset('get/table_b') }}"></div>
                                </li>
                                <li><strong>c. TRAINING SUPPLIES</strong>
                                    <div id="example3" data-save="{{ asset('save/table_c') }}" data-get="{{ asset('get/table_c') }}"></div>
                                </li>
                                <li><strong>d. EQUIPMENT CONSUMABLE</strong>
                                    <div id="example4" data-save="{{ asset('save/table_d') }}" data-get="{{ asset('get/table_d') }}"></div>
                                </li>
                            </ul>
                        </li>
                        <li><strong>2. NON-CONSUMABLE</strong>
                            <ul>
                                <li><strong>a. PER SECTION</strong>
                                    <div id="example5" data-save="{{ asset('save/table_e') }}" data-get="{{ asset('get/table_e') }}"></div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <div class="timeline-item">
                <h3 class="timeline-header"><a href="javascript:void(0);">B. OTHER COMMON-USE OFFICE SUPPLIES SPECIFICALLY USED ONLY BY CONCERNED SECTION (OPEN LIST BY SECTION / PROGRAM)</a></h3>
                <div class="timeline-body">
                    <ul>
                        <li>
                            <ul>
                                <div id="example6"></div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="time-label">
            <span class="bg-green">
                II. SEMI-EXPANDABLE EQUIPEMENT AND FURNITURE
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
                                    <div id="example7" data-save="{{ asset('save/table_f') }}" data-get="{{ asset('get/table_f') }}"></div>
                                </li>
                                <li><strong>b. PER SECTION/DIVISION</strong>
                                    <div id="example8" data-save="{{ asset('save/table_g') }}" data-get="{{ asset('get/table_g') }}"></div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
</section>
<span data-openlist="{{ asset('openlist/forms') }}"></span>
@endsection
@section('js')
    <script>
        $('.scroll').click(function(){
            var id = $(this).data('id');
            document.getElementById('code'+id).scrollIntoView();
        });
    </script>
@endsection
