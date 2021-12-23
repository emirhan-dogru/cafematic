@extends('backend.layout')


@section('content')

    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <!-- DOM dataTable -->
                    <div class="col-md-12">
                        <div class="widget">
                            <header class="widget-header">
                                <h4 class="widget-title">Tables</h4>
                                <div class="pull-right">
                                    <a href="{{ route('tables.Create') }}" class="btn btn-primary btn-xs">Add New Table</a>
                                </div>
                            </header><!-- .widget-header -->
                            <hr class="widget-separator">
                            <div class="widget-body">
                                @if (!count($data['tables']))
                                    <div class="alert alert-warning" role="alert">
                                        <strong>Warning! </strong>
                                        <span>Tables Not Found!</span>
                                        <a href="{{ route('tables.Create') }}" class="alert-link">Click here to add</a>
                                    </div>
                                @else
                                    <div class="table-responsive">
                                        <table id="default-datatable" data-plugin="DataTable" class="table table-striped"
                                            cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Table Name</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data['tables'] as $table)
                                                    <tr>
                                                        <td>{{ $table->table_name }}</td>
                                                        <td width="20"><a href="{{route('tables.Edit' , ['slug' => $table->table_slug])}}" class="btn btn-info btn-xs"><i
                                                                    class="fa fa-edit"></i> Edit Table</a></td>
                                                        <td width="20"><a href="{{route('tables.Delete' , ['slug' => $table->table_slug])}}" class="btn btn-danger btn-xs"><i
                                                                    class="fa fa-trash"></i></a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
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
