@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Purchase</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('expense.store') }}">
						{{ csrf_field() }}
						<input type="hidden" name="purchased_by" id="purchased_by" value="{{$data['id']}}" />
						<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount</label>
                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" required autofocus>
                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						<div class="form-group{{ $errors->has('purchased_at') ? ' has-error' : '' }}">
                            <label for="purchased_at" class="col-md-4 control-label">Purchased At</label>
                            <div class="col-md-6">
                                <input id="purchased_at" type="text" class="form-control" name="purchased_at" value="{{ old('purchased_at') }}" required autofocus>
                                @if ($errors->has('purchased_at'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('purchased_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						<div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
