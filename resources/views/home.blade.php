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

@php $month_total_expenses = 0; $colors = array("purple", "yellow", "green", "light-blue", "orange"); @endphp

@section('content')
<div class="container">
    <!--chart dashboard start-->
    <div id="chart-dashboard">
        <div class="row">
            @php $spidx = 0; @endphp
            @foreach($data['expense'] as $k => $d)
                @php $month_total_expenses += $d->spent; $sidx = ($spidx >= count($colors)) ? (count($colors) % $spidx) : $spidx; $scardclr = $colors[$sidx]; $spidx++; @endphp

                <div class="col s6 m3 32">
                    <div class="card {{ $scardclr }}">
                        <div class="card-content white-text">
                            <span class="card-title bold">{{ $d->user->name }}</span>
                            <p calss="bolder">&#8360; {{ \App\Helpers\CommonHelper::moneyFormatIndia($d->spent) }}</p>
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
            @php $spidx = 0; shuffle($colors); @endphp
            @foreach($data['general'] as $k => $d)
                @php $month_total_expenses += $d->amount; $sidx = ($spidx >= count($colors)) ? (count($colors) % $spidx) : $spidx; $scardclr = $colors[$sidx]; $spidx++; @endphp
                <div class="col s6 m3 32">
                    <div class="card {{ $scardclr }} darken-1">
                        <div class="card-content white-text">
                            @php $d->description = ucwords(str_replace('_', ' ', $d->description)); @endphp
                            <span class="card-title bold">{{ $d->description }}</span>
                            <p calss="bolder">&#8360; {{ \App\Helpers\CommonHelper::moneyFormatIndia($d->amount) }}</p>
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
                <div class="card light-green darken-1">
                    <div class="card-content white-text">
                        <span class="card-title bold">Total Month Expense</span>
                        <p calss="bolder">
                            &#8360; {{ \App\Helpers\CommonHelper::moneyFormatIndia($month_total_expenses) }} 
							<button id="pay_rent_btn" class="btn btn-xs btn-info">Pay!</button></p>
                        @php $equal_share = (count($data['users'])) ? ($month_total_expenses / count($data['users'])) : 0.00; @endphp
                    </div>
                </div>
            </div>
            <div class="col s6 m4 32">
                <div class="card yellow darken-1">
                    <div class="card-content white-text">
                        <span class="card-title bold">Per Head Share</span>
                        <p calss="bolder">
                            &#8360; {{ \App\Helpers\CommonHelper::moneyFormatIndia($equal_share) }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @php
                $share_details = "";
                $expary = $data['expary'];
                shuffle($colors);
                $ci = 0;
            @endphp

            @foreach($data['users'] as $usr)
                @php $spent = isset($expary[$usr->id]) ? $expary[$usr->id] : 0; $idx = ($ci >= count($colors)) ? (count($colors) % $ci) : $ci; $cardclr = $colors[$idx]; $ci++; @endphp
                <div class="col s3 m2 32">
                    <div class="card {{ $cardclr }}">
                        <div class="card-content white-text">
                            <span class="card-title bold">{{ $usr->name }}</span>
                            <p calss="bolder">
                                &#8360; {{ \App\Helpers\CommonHelper::moneyFormatIndia(($equal_share - $spent)) }}</p>
                            @php $share_details .= empty($share_details) ? $usr->name."-".($equal_share - $spent) : $usr->name."-".($equal_share - $spent)."|"; @endphp
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {!! Form::open(array('route' => 'pay-rent', 'method' => 'POST', 'class' => 'col s12', 'id' => 'pay_rent_form')) !!}
        {{ csrf_field() }}
        <input type="hidden" name="total_amount" id="total_amount" value="{{ $month_total_expenses }}"/>
        <input type="hidden" name="equal_share" id="equal_share" value="{{ $equal_share }}"/>
        <input type="hidden" name="share_details" id="share_details" value="{{ $share_details }}"/>
        {!! Form::close() !!}

        <div class="divider"></div>

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
	<script>
		$(function(){
			$("body").on("click", "#pay_rent_btn", function(){
				$("body").find("#pay_rent_form").submit();
			});
		});
	</script>
@endsection