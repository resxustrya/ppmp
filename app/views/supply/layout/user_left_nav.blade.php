<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar" style="width: 210px;">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{ asset('public/asset/images/user.png') }}" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>{{ Auth::user()->fname . Auth::user()->lname }}</strong></div>
                <div class="email">
                   <?php
                        $section = DB::table('section')->where('id','=', Auth::user()->section)->first();
                        echo $section->description;
                    ?>
                </div>
            </div>

        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">
                    <span id="main">MAIN NAVIGATION</span>
                    <button id="btn_hide" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float" style="margin-left: 30px;">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                    </button>
                    <button id="btn_show" type="button" class="hidden btn btn-default btn-circle waves-effect waves-circle waves-float" style="margin-left: 30px;">
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </li>
                <li class="active">
                    <a href="{{ asset('supply') }}">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                        <span class="left_hide">Home</span>
                    </a>
                </li>
                
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                        <span class="left_hide">Items</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ asset('s/i') }}">
                                Search Item
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset('expense/codes') }}"> Item Expenses</a>
                        </li>
                        @if(Auth::user()->user_priv == "1")
                            <li>
                                <a href="{{ asset('create/expense') }}"> Create Expense Code</a>
                            </li>
                        @endif
                    </ul>
                </li>
                <li>
                    <a href="{{ asset('units') }}">
                        <span class="glyphicon glyphicon-filter" aria-hidden="true"></span>
                        <span class="left_hide">Units</span>
                    </a>
                </li>
                <li>
                    <a href="{{ asset('operating_expense') }}">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                        <span class="left_hide">Operating Expense Doc</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2016 - 2017 <a href="javascript:void(0);">DOH RO7 PPMP - Material Design</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.5
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    @include('assidebar')
    <!-- #END# Right Sidebar -->
</section>
