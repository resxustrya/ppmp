<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar" style="width: 230px;">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{ asset('public/asset/images/user.png') }}" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>{{ Auth::user()->fname . Auth::user()->lname }}</strong></div>
                <div class="email">
                    <?php  
                    $section = Auth::user()->section;
                    $section = DB::connection('dts')->select("SELECT description FROM section WHERE id=? LIMIT 1" ,array($section));
                    $section = $section[0]->description;
                    echo $section;
                ?> 
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active">
                    <a href="{{ asset('home') }}">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                        <span>Home</span>
                    </a>
                </li>

                <li>
                    <a href="{{ asset('items') }}">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        <span>Items</span>
                    </a>
                </li>
                <li>
                    <a href="{{ asset('units') }}">
                        <span class="glyphicon glyphicon-filter"></span>
                        <span>Units</span>
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
    <!-- #END# Right Sidebar -->
    @include('assidebar')
</section>
