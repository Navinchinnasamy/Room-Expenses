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
                            <p calss="bolder">&#8360; {{ \App\Helpers\CommonHelper::moneyFormatIndia($d->spent) }}</p>
                        </div>
                        <div class="card-action">
                            <a href="{{ url('/expense') }}">Go to History</a>
                        </div>
                    </div>
                </div>
            @endforeach
			<div class="col s6 m3 32">
				<iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-in.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=IN&source=ac&ref=qf_sp_asin_til&ad_type=product_link&tracking_id=navinchinnasa-21&marketplace=amazon&region=IN&placement=B0756ZFXVB&asins=B0756ZFXVB&linkId=80a2165e00c958c38b8537d1bf9b176f&show_border=false&link_opens_in_new_window=true&price_color=333333&title_color=0066c0&bg_color=ffffff">
				</iframe>
			</div>
			
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
                <div class="card green darken-1">
                    <div class="card-content white-text">
                        <span class="card-title bold">Total Month Expense</span>
                        <p calss="bolder">
                            &#8360; {{ \App\Helpers\CommonHelper::moneyFormatIndia($month_total_expenses) }} 
							<button id="pay_rent_btn" class="btn btn-xs btn-info">Pay!</button></p>
							@php $equal_share = ($month_total_expenses / count($data['expense'])); @endphp
                    </div>
                </div>
            </div>
			@foreach($data['expense'] as $k => $d)
                @php $share_details = ""; @endphp

                <div class="col s3 m2 32">
                    <div class="card light-blue">
                        <div class="card-content white-text">
                            <span class="card-title bold">{{ $d->user->name }}</span>
                            <p calss="bolder">&#8360; {{ \App\Helpers\CommonHelper::moneyFormatIndia(($equal_share - $d->spent)) }}</p>
							@php $share_details .= empty($share_details) ? $d->user->name."-".($equal_share - $d->spent) : $d->user->name."-".($equal_share - $d->spent)."|"; @endphp
                        </div>
                    </div>
                </div>
            @endforeach
			
			{!! Form::open(array('route' => 'pay-rent', 'method' => 'POST', 'class' => 'col s12', 'id' => 'pay_rent_form')) !!}
				{{ csrf_field() }}
				<input type="hidden" name="total_amount" id="total_amount" value="{{ $month_total_expenses }}" />
				<input type="hidden" name="equal_share" id="equal_share" value="{{ $equal_share }}" />
				<input type="hidden" name="share_details" id="share_details" value="{{ $share_details }}" />
			{!! Form::close() !!}
        </div>

        <div class="divider"></div>

        <div class="row">
            <div class="col s12 m12 32">
                <script type="text/javascript" language="javascript">
				  var aax_size='728x90';
				  var aax_pubname = 'navinchinnasa-21';
				  var aax_src='302';
				</script>
				<script type="text/javascript" language="javascript" src="http://c.amazon-adsystem.com/aax2/assoc.js"></script>
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
	<script>
		$(function(){
			$("body").on("click", "#pay_rent_btn", function(){
				$("body").find("#pay_rent_form").submit();
			});
		});
	</script>
@endsection