
@extends('admin.layout.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Sections</h2>
            </div>

            <div class="row clearfix">
                @foreach($sections as $section)
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a href="{{ asset('section/users/'.$section->id) }}">
                            <div class="info-box-4">
                                <div class="icon">
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                </div>
                                <div class="content">
                                    <div class="text">{{ $section->description }}</div>
                                    <?php $members = DB::table('users')->where('section','=',$section->id)->count(); ?>
                                    <div class="number count-to" data-from="0" data-to="{{ $members }}" data-speed="1000" data-fresh-interval="20">{{ $members }}</div>
                                </div>
                            </div>
                        </a>

                    </div>
                @endforeach
            </div>
            <div class="row">
                <center>
                    {{ $sections->links() }}
                </center>

            </div>
        </div>
    </section>

@endsection