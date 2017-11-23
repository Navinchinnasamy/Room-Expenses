@extends('layouts.default')

@section('page_style')
    <link href="{{ asset('template/js/plugins/jvectormap/jquery-jvectormap.css') }}" type="text/css"
          rel="stylesheet" media="screen,projection">
@endsection
<style>
    .bold {
        font-weight: 500 !important;
    }
</style>

@section('content')
<div class="container">
    <!--chart dashboard start-->
    <div id="chart-dashboard">
        <div class="row">
            @foreach($data['expense'] as $k => $d)
                <div class="col s6 m3 32">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title bold">{{ $d->user->name }}</span>
                            <p calss="bold">{{ \App\Helpers\CommonHelper::moneyFormatIndia($d->spent) }}</p>
                        </div>
                        <div class="card-action">
                            <a href="{{ url('/expense') }}">Go to History</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--chart dashboard end-->
</div>
@endsection

@section('page_script')
    <!--jvectormap-->
    <script type="text/javascript"
            src="{{ asset('template/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('template/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template/js/plugins/jvectormap/vectormap-script.js') }}"></script>
@endsection