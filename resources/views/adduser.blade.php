@extends('layouts.default')

@section('page_style')
    <style>
        .alert-danger {
            background-color: #f2dede;
            border-color: #ebccd1;
            color: #a94442
        }

        .alert-danger hr {
            border-top-color: #e4b9c0
        }

        .alert-danger .alert-link {
            color: #843534
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="section">
            @if (!isset($users))
                <div class="row">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="col s12 m12 l6">
                        <div class="card-panel">
                            <h4 class="header2">Add User</h4>
                            <div class="row">
                                {!! Form::open(array('route' => 'add-user', 'method' => 'POST', 'class' => 'col s12')) !!}
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="mdi-social-person-outline prefix"></i>
                                        <input id="name" name="name"
                                               value="{{ old('name') }}" type="text" class="validate">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="mdi-communication-email prefix"></i>
                                        <input id="email" name="email"
                                               value="{{ old('email') }}" type="email" class="validate">
                                        <label for="email">E-Mail</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="mdi-action-lock-outline prefix"></i>
                                        <input id="password" name="password"
                                               value="" type="password" class="validate">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="mdi-action-lock-outline prefix"></i>
                                        <input id="password-confirm" name="password_confirmation"
                                               value="" type="password" class="validate">
                                        <label for="password-confirm">Confirm Password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn cyan waves-effect waves-light right" type="submit"
                                                name="action">Submit
                                            <i class="mdi-content-send right"></i>
                                        </button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col s12 m12 32">
                        <table id="data-table-row-grouping" class="responsive-table display" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>E-Mail</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($users as $key=>$usr)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $usr->name }}</td>
                                    <td>{{ $usr->email }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('page_script')
@endsection