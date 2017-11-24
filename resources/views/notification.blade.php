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

@php $month_total_expenses = 0; @endphp

@section('content')
    <div class="container">
        <div class="section">

            <p class="caption">A Simple Blank Page to use it for your custome design and elements.</p>
            <div class="divider"></div>

        </div>
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