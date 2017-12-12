@extends('layouts.default')
@section('page_style')
    <link href="{{ asset('template/js/plugins/data-tables/css/jquery.dataTables.min.css') }}" type="text/css"
          rel="stylesheet" media="screen,projection">
    <link href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}" type="text/css"
    <link href="{{ asset('plugins/bootstrap-editable/css/bootstrap-editable.css') }}" type="text/css"
          rel="stylesheet" media="screen,projection">
@endsection

@section('content')
    <div class="container">
        <div class="section">
            <div class="table-datatables">
                <h4 class="header">Purchase History</h4>
                <div class="row">
                    <div class="col s12 m12 32">
                        <table id="data-table-row-grouping" class="responsive-table display" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Purchased By</th>
                                <th>Purchased At</th>
                                <th>Purchased Month</th>
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
                                    <td>{{ $exp->user->name }}</td>
                                    <td>{{ date('d/m/Y', strtotime($exp->purchased_at)) }}</td>
                                    <td>{{ date('M', strtotime($exp->purchased_at)) }}</td>
                                    <td>{{ $exp->description }}</td>
                                    <td>
                                        <div id="_token" class="hidden" data-token="{{ csrf_token() }}"></div>
                                        <a href="javascript:void(0);" class="expense_amount" data-type="text"
                                           data-pk="{{ $exp->id }}" data-title="Update Amount?"
                                           id="amount">{{ $exp->amount }}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_script')
    <!-- data-tables -->
    <script type="text/javascript"
            src="{{ asset('template/js/plugins/data-tables/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template/js/plugins/data-tables/data-tables-script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('plugins/bootstrap-editable/js/bootstrap-editable.min.js') }}"></script>
    <script>
        $(function () {
            $.fn.editable.defaults.params = function (params) {
                params._token = $("#_token").data("token");
                return params;
            };
            $.fn.editable.defaults.mode = 'inline';
            $.fn.editable.defaults.url = '{{ route('update-expense') }}';
            $('.expense_amount').editable({
                title: 'Update Amount?',
                success: function (response, newValue) {
                    if (response.status == 'error') return response.msg; //msg will be shown in editable form
                }
            });
        });
    </script>
@endsection