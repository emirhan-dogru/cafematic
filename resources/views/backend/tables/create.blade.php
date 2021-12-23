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
                                <h4 class="widget-title">New Table</h4>
                            </header><!-- .widget-header -->
                            <hr class="widget-separator">
                            <div class="widget-body">
                                <form action="{{route('tables.Store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Table Name</label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter the table name">
                                        @if ($errors->any())
                                        <small style="color: red;">This field cannot be left blank!</small>
                                        @endif
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary btn-md">Create</button>
                                    </div>
                                </form>
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
