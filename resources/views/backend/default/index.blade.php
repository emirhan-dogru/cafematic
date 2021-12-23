@extends('backend.layout')


@section('content')
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    @if (!count($data['sessions']))
                        <div class="col-md-12">
                            <div class="alert alert-warning" role="alert">
                                <strong>Warning! </strong>
                                <span>No Currently Active Sessions Found!</span>
                                <a href="{{route('sessions.Create')}}" class="alert-link">Click here to add </a>
                            </div>
                        </div>
                    @else
                        <!-- DOM dataTable -->
                        <div class="col-md-12">
                            <div class="widget">
                                <header class="widget-header">
                                    <h4 class="widget-title">Active Sessions</h4>
                                    <div class="pull-right">
                                        <a href="{{ route('sessions.Create') }}" class="btn btn-primary btn-xs">Table Add</a>
                                    </div>
                                </header><!-- .widget-header -->
                                <hr class="widget-separator">
                                <div class="widget-body">
                                    <div class="table-responsive">
                                        <table id="default-datatable" data-plugin="DataTable" class="table table-striped"
                                            cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Table Name</th>
                                                    <td>Order Code</td>
                                                    <th>Money</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data['sessions'] as $session)
                                                    <tr>
                                                        <td>{{ $session->table_name }}</td>
                                                        <td>{{ $session->id}}</td>
                                                        <td>${{ $session->price }}</td>
                                                        <td width="20"><a href="{{route('sessions.Edit' , ['slug' => $session->table_slug])}}" class="btn btn-primary btn-xs"><i
                                                                    class="fa fa-edit"></i> Edit Order </a></td>
                                                        <td width="20"><a href="{{route('sessions.Delete' , ['session_id' => $session->session_id])}}" class="btn btn-danger btn-xs">Mark as paid </a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- .widget-body -->
                            </div><!-- .widget -->
                        </div><!-- END column -->
                    @endif

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
