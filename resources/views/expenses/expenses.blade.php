@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Expenses</div>
                <div class="panel-body">
                    <table class="table table-striped table-hover table-responsive">
						<thead>
							<tr>
								<th>S.No.</th>
								<th>Purchased By</th>
								<th>Purchased At</th>
								<th>Description</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
						@php
						$total = 0;
						@endphp
						@foreach ($expenses as $key=>$exp)
							@php $total += $exp->amount @endphp
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ $exp->name }}</td>
								<td>{{ $exp->purchased_at }}</td>
								<td>{{ $exp->description }}</td>
								<td>{{ $exp->amount }}</td>
							</tr>
						@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th colspan="3"></th>
								<th> Total : </th>
								<th>{{ $total }}</th>
							</tr>
						</tfoot>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
