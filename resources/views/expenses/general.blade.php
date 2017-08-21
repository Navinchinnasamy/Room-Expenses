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
                        <h4 class="header2">General Expenses</h4>
                        <div class="row">
                            {!! Form::open(array('route' => 'general', 'method' => 'POST', 'class' => 'col s12')) !!}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="mdi-action-account-circle prefix"></i>
                                    <input id="room_rent" name="room_rent"
                                           value="{{ old('room_rent') }}" type="text" class="validate">
                                    <label for="room_rent">Room Rent</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="mdi-communication-email prefix"></i>
                                    <input id="eb_bill" type="text" name="eb_bill" value="{{ old('eb_bill') }}"
                                           class="validate">
                                    <label for="eb_bill">EB Bill</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="mdi-communication-email prefix"></i>
                                    <input id="cleaning_charge" type="text" name="cleaning_charge"
                                           value="{{ old('cleaning_charge') }}"
                                           class="validate">
                                    <label for="cleaning_charge">Cleaning Charge</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn cyan waves-effect waves-light right" type="submit">
                                        Submit
                                        <i class="mdi-content-send right"></i>
                                    </button>
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