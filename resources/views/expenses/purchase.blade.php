@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="section">
            <div class="row">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input. <br/><br/>
                        <ul>
                            $foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            $endforeach
                        </ul>
                    </div>
                @endif

                <div class="col s12 m12 l6">
                    <div class="card-panel">
                        <h4 class="header2">Purchases</h4>
                        <div class="row">
                            {!! Form::open(array('route' => 'expense.store', 'method' => 'POST', 'class' => 'col s12')) !!}
                            {{ csrf_field() }}
                            <input type="hidden" name="purchased_by" id="purchased_by" value="{{ $data['id'] }}"/>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="mdi-action-account-circle prefix"></i>
                                    <input placeholder="Description" id="description" name="description"
                                           value="{{ old('description') }}" type="text" class="validate">
                                    <label for="description">Description</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="mdi-communication-email prefix"></i>
                                    <input id="amount" type="text" name="amount" value="{{ old('amount') }}"
                                           class="validate">
                                    <label for="amount">Amount</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="mdi-action-question-answer prefix"></i>
                                    <input placeholder="Purchased at" class="datepicker" id="purchased_at"
                                           name="purchased_at" value="{{ old('purchased_at') }}" type="date"
                                           class="validate">
                                    <label for="purchased_at">Purchased At</label>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn cyan waves-effect waves-light right" type="submit"
                                                name="action">Submit
                                            <i class="mdi-content-send right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection