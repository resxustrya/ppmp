<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <form action="{{ asset('search') }}" method="GET">
        <div class="search-icon">
            <i class="glyphicon glyphicon-search"></i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="glyphicon glyphicon-remove"></i>
        </div>
    </form>
</div>