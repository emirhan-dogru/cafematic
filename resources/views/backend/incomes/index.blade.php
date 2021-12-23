@extends('backend.layout')


@section('content')
    @php
    $totalDay = $data['income_day_price'];
    $totalMonth = $data['income_month_price'];
    $totalYear = $data['income_year_price'];
    $totalAll = $data['income_all_price'];
    @endphp
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default panel-custom">
                            <div class="panel-heading">
                                <h4 class="panel-title">Income statement</h4>
                            </div>
                            <div class="panel-body">
                                <div class="m-b-lg nav-tabs-horizontal">
                                    <!-- tabs list -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#days" aria-controls="days" role="tab" data-toggle="tab"
                                                aria-expanded="true">Daily </a>
                                        </li>
                                        <li role="presentation" class=""><a href=" #month" aria-controls="month"
                                            role="tab" data-toggle="tab" aria-expanded="false">Monthly</a></li>
                                        <li role="presentation" class=""><a href=" #year" aria-controls="year"
                                            role="tab" data-toggle="tab" aria-expanded="false">Yearly</a></li>
                                        <li role="presentation"><a href="#all" aria-controls="all"
                                                role="tab" data-toggle="tab">All Income</a></li>
                                    </ul><!-- .nav-tabs -->

                                    <!-- Tab panes -->
                                    <div class="tab-content p-md">
                                        <div role="tabpanel" class="tab-pane fade active in" id="days">
                                            <h3 class="m-b-lg">Daily</h3>
                                            <div class="row">
                                                @if (count($data['income_day']))
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Order Number</th>
                                                                <th>Date</th>
                                                                <th>Order Price</th>
                                                            </tr>
                                                            @php($say = 1)
                                                            @foreach ($data['income_day'] as $dataday)
                                                                <tr>
                                                                    <td>{{ $say++ }}</td>
                                                                    <td>{{ $dataday->session_id }}</td>
                                                                    <td>{{ $dataday->created_at }}</td>
                                                                    <td>${{ $dataday->price }}</td>
                                                                </tr>
                                                            @endforeach

                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <h5><b>Total</b></h5>
                                                                </td>
                                                                <td></td>
                                                                <td>
                                                                    <h5><b>${{ $totalDay }}</b></h5>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @else
                                                <div class="alert alert-info alert-custom alert-dismissible">
                                                    <h4 class="alert-title">Warning!</h4>
                                                    <p>No earnings yet today.</p>
                                                </div>
                                                @endif
                                            </div><!-- .row -->
                                        </div><!-- .tab-pane -->

                                        <div role="tabpanel" class="tab-pane fade" id="month">
                                            <h3 class="m-b-lg">Monthly</h3>
                                            <div class="row">
                                                @if (count($data['income_month']))
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Order Number</th>
                                                                <th>Date</th>
                                                                <th>Order Price</th>
                                                            </tr>
                                                            @php($say = 1)
                                                            @foreach ($data['income_month'] as $dataMonth)
                                                                <tr>
                                                                    <td>{{ $say++ }}</td>
                                                                    <td>{{ $dataMonth->session_id }}</td>
                                                                    <td>{{ $dataMonth->created_at }}</td>
                                                                    <td>${{ $dataMonth->price }}</td>
                                                                </tr>
                                                            @endforeach

                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <h5><b>Total</b></h5>
                                                                </td>
                                                                <td></td>
                                                                <td>
                                                                    <b>${{ $totalMonth }}</b>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @else
                                                <div class="alert alert-info alert-custom alert-dismissible">
                                                    <h4 class="alert-title">Warning!</h4>
                                                    <p>No earnings yet this month.</p>
                                                </div>
                                                @endif
                                            </div><!-- .row -->
                                        </div><!-- .tab-pane -->

                                        <div role="tabpanel" class="tab-pane fade" id="year">
                                            <h3 class="m-b-lg">Yearly</h3>
                                            <div class="row">
                                                @if (count($data['income_year']))
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Order Number</th>
                                                                <th>Date</th>
                                                                <th>Order Price</th>
                                                            </tr>
                                                            @php($say = 1)
                                                            @foreach ($data['income_year'] as $dataYear)
                                                                <tr>
                                                                    <td>{{ $say++ }}</td>
                                                                    <td>{{ $dataYear->session_id }}</td>
                                                                    <td>{{ $dataYear->created_at }}</td>
                                                                    <td>${{ $dataYear->price }}</td>
                                                                </tr>
                                                            @endforeach

                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <h5><b>Total</b></h5>
                                                                </td>
                                                                <td></td>
                                                                <td>
                                                                    <b>${{ $totalYear }}</b>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @else
                                                <div class="alert alert-info alert-custom alert-dismissible">
                                                    <h4 class="alert-title">Warning!</h4>
                                                    <p>No earnings yet this year. </p>
                                                </div>
                                                @endif
                                            </div><!-- .row -->

                                        </div><!-- .tab-pane -->
                                        <div role="tabpanel" class="tab-pane fade" id="all">
                                            <h3 class="m-b-lg">All Income </h3>
                                            <div class="row">
                                                @if (count($data['income_all']))
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Order Number</th>
                                                                <th>Date</th>
                                                                <th>Order Price</th>
                                                            </tr>
                                                            @php($say = 1)
                                                            @foreach ($data['income_all'] as $dataAll)
                                                                <tr>
                                                                    <td>{{ $say++ }}</td>
                                                                    <td>{{ $dataAll->session_id }}</td>
                                                                    <td>{{ $dataAll->created_at }}</td>
                                                                    <td>${{ $dataAll->price }}</td>
                                                                </tr>
                                                            @endforeach

                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <h5><b>Total</b></h5>
                                                                </td>
                                                                <td></td>
                                                                <td>
                                                                    <b>${{ $totalAll }}</b>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @else
                                                <div class="alert alert-info alert-custom alert-dismissible">
                                                    <h4 class="alert-title">Uyarı!</h4>
                                                    <p>No earnings have been made yet.</p>
                                                </div>
                                                @endif
                                            </div><!-- .row -->
                                        </div><!-- .tab-pane -->
                                    </div><!-- .tab-content -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .widget-body -->
        </div><!-- .widget -->
        </div><!-- END column -->


        </div><!-- .row -->
        </section><!-- .app-content -->
        </div><!-- .wrap -->
        <!-- APP FOOTER -->
        <div class="wrap p-t-0">
            @include('backend.footer.footer')
        </div>
        <!-- /#app-footer -->
    </main>

@endsection

@section('css')@endsection
@section('js')@endsection
