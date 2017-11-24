@extends('layouts.default')

@section('page_style')
    <link href="{{ asset('template/js/plugins/jvectormap/jquery-jvectormap.css') }}" type="text/css"
          rel="stylesheet" media="screen,projection">
@endsection
<style>
    .bold {
        font-weight: 500 !important;
    }

    p.bolder {
        font-weight: 500 !important;
    }
</style>

@php $month_total_expenses = 0; @endphp

@section('content')
<div class="container">
    <!--chart dashboard start-->
    <div id="chart-dashboard">
        <div class="row">
            @foreach($data['expense'] as $k => $d)
                @php $month_total_expenses += $d->spent; @endphp

                <div class="col s6 m3 32">
                    <div class="card light-blue">
                        <div class="card-content white-text">
                            <span class="card-title bold">{{ $d->user->name }}</span>
                            <p calss="bolder">&#8377; {{ \App\Helpers\CommonHelper::moneyFormatIndia($d->spent) }}</p>
                        </div>
                        <div class="card-action">
                            <a href="{{ url('/expense') }}">Go to History</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="divider"></div>

        <div class="row">
            @foreach($data['general'] as $k => $d)
                @php $month_total_expenses += $d->amount; @endphp

                <div class="col s6 m3 32">
                    <div class="card purple darken-1">
                        <div class="card-content white-text">
                            @php $d->description = ucwords(str_replace('_', ' ', $d->description)); @endphp
                            <span class="card-title bold">{{ $d->description }}</span>
                            <p calss="bolder">&#8377; {{ \App\Helpers\CommonHelper::moneyFormatIndia($d->amount) }}</p>
                        </div>
                        <div class="card-action">
                            <a href="{{ url('/general') }}">Go to Master</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="divider"></div>

        <div class="row">
            <div class="col s6 m4 32">
                <div class="card green darken-1">
                    <div class="card-content white-text">
                        <span class="card-title bold">Total Month Expense</span>
                        <p calss="bolder">
                            &#8377; {{ \App\Helpers\CommonHelper::moneyFormatIndia($month_total_expenses) }}</p>
                    </div>
                </div>
            </div>
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