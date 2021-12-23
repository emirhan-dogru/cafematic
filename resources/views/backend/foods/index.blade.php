@extends('backend.layout')


@section('content')

    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <!-- DOM dataTable -->
                    @if (!count($data['foods']))
                    <div class="col-md-12">
                        <div class="alert alert-warning" role="alert">
                            <strong>Warning! </strong>
                            <span>Foods not found!</span>
                            <a href="{{route('foods.Create')}}" class="alert-link">Click here to add</a>
                        </div>
                    </div>
                    @else
                        <div class="col-md-12">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h4 class="panel-title">Foods</h4>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="pull-right">
                                                <a href="{{route('foods.Create')}}" class="text-white">Add new food </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Food Name</th>
                                            <th>Food Price</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        @foreach ($data['foods'] as $food)
                                            <tr>
                                                <td><b>{{ $food->food_name }}</b></td>
                                                <td width="120" class="text-center">{{ $food->food_price }}</td>
                                                <td width="20"><a href="{{route('foods.Edit' , ['slug' => $food->food_slug])}}" class="btn btn-info btn-xs"><i
                                                    class="fa fa-edit"></i> Edit Food</a></td>
                                        <td width="20"><a href="{{route('foods.Delete' , ['slug' => $food->food_slug])}}" class="btn btn-danger btn-xs"><i
                                                    class="fa fa-trash"></i></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
