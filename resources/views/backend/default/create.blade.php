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
                                <h4 class="widget-title">Create Active Table </h4>
                            </header><!-- .widget-header -->
                            <hr class="widget-separator">
                            <div class="widget-body">
                                @if (!count($data['tables']))
                                <div class="alert alert-warning" role="alert">
                                    <strong>Warning! </strong>
                                    <span>Registered table not found or all sessions are full! </span>
                                    <a href="{{ route('tables.Create') }}" class="alert-link">Click here to add a new table</a>
                                </div>
                                @else
                                <form action="{{route('sessions.Store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Table Name </label>
                                        <select name="title" class="form-control">
                                            @foreach ($data['tables'] as $table)
                                            <option value="{{$table->table_slug}}">{{$table->table_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary btn-md">Add </button>
                                    </div>
                                </form>
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
