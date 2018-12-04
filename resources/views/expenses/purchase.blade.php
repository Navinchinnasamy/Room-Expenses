@extends('layouts.default')

@section('page_style')
    <!-- Dropify - File upload -->
    <link href="{{ asset('template/plugins/dropify/css/dropify.min.css') }}" type="text/css" rel="stylesheet"
          media="screen,projection">
@endsection

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
                            {!! Form::open(array('route' => 'expense.store', 'files' => true, 'method' => 'POST', 'class' => 'col s12')) !!}
                            {{ csrf_field() }}
                            {{--<input type="hidden" name="purchased_by" id="purchased_by" value="{{ $data['id'] }}"/>--}}
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="mdi-social-person-outline prefix"></i>
                                    <select id="purchased_by" name="purchased_by" class="input-field validate">
                                        @foreach($data['users'] as $usr)
                                            @php $selected = ($usr->id == old('purchased_by')) ? "selected" : ""; @endphp
                                            <option value="{{ $usr->id }}" {{ $selected }}>{{ $usr->name  }}</option>
                                        @endforeach
                                    </select>
                                    <label for="name">Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="mdi-action-description prefix"></i>
                                    <input id="description" name="description"
                                           value="{{ old('description') }}" type="text" class="validate">
                                    <label for="description">Description</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="mdi-editor-attach-money prefix"></i>
                                    <input id="amount" type="text" name="amount" value="{{ old('amount') }}"
                                           class="validate">
                                    <label for="amount">Amount</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="mdi-action-event prefix"></i>
                                    <input class="datepicker" id="purchased_at"
                                           name="purchased_at" value="{{ old('purchased_at') }}" type="date"
                                           class="validate">
                                    <label for="purchased_at">Purchased At</label>
                                </div>
                            </div>

                            <div class="row">
                            <!--<div class="col s12 m8 l9">
									<div class="dropify-wrapper">
										<div class="dropify-message">
											<span class="file-icon"></span>
											<p>Drag and drop a file here or click</p>
											<p class="dropify-error">Sorry, this file is too large</p>
										</div>
										<input type="file" id="bills" name="bills" value="{{ old('bills') }}" class="dropify" data-default-file="">
										<button type="button" class="dropify-clear">Remove</button>
										<div class="dropify-preview">
											<span class="dropify-render"></span>
											<div class="dropify-infos">
												<div class="dropify-infos-inner">
													<p class="dropify-filename">
														<span class="file-icon"></span>
														<span class="dropify-filename-inner"></span>
													</p>
													<p class="dropify-infos-message">Drag and drop or click to replace</p>
												</div>
											</div>
										</div>
									</div>
								</div>-->
                                <div class="file-field input-field col s12">
                                    <i class="mdi-editor-attach-file prefix"></i>
                                    <input class="file-path validate" type="text"/>
                                    <div class="btn">
                                        <span>Bills</span>
                                        <input type="file" id="bills" name="bills" value="{{ old('bills') }}"
                                               class="validate"/>
                                    </div>
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
        </div>
    </div>
@endsection

@section('page_script')
    <!-- Dropify - File upload -->
    <script type="text/javascript" src="{{ asset('template/plugins/dropify/js/dropify.min.js') }}"></script>
@endsection