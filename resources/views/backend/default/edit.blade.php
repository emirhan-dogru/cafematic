@extends('backend.layout')


@section('content')
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <!-- DOM dataTable -->
                    <div class="col-md-12">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">
                                <h4 class="panel-title">ORDER LIST</h4>
                            </div>
                            <div class="panel-body">
                                @php($session = $data['sessions'][0])
                                @if (!count($data['sessionLists']))
                                    <div class="alert alert-warning" role="alert">
                                        <strong>Warning! </strong>
                                        <span>The order list is currently empty. Please add a product below!</span>
                                    </div>
                                @else
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>#</th>
                                                <th>Food Name </th>
                                                <th>Food Money</th>
                                                <th>Quantity of Food</th>
                                                <th>Total</th>
                                            </tr>
                                            @php($say = 1)
                                            @foreach ($data['sessionLists'] as $list)
                                                <tr>
                                                    <td>{{ $say++ }}</td>
                                                    <td>{{ $list->food_name }}</td>
                                                    <td>{{ $list->food_price }}</td>
                                                    <td>{{ $list->food_total }}</td>
                                                    <td>₺{{ $list->food_price * $list->food_total }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="col-xs-12">
                                        <h4 class="m-t-lg fw-600">Total:</h4>
                                        <div class="clearfix">
                                            <p class="pull-left">Order Price:</p>
                                            <b class="pull-right">₺{{ $session->price }}</b>
                                        </div>
                                        <div class="clearfix">
                                            <p class="pull-left">Order Number:</p>
                                            <p class="pull-right">{{ $session->session_id }}</p>
                                        </div>
                                        <div class="clearfix">
                                            <div class="pull-right">
                                                <a class="btn mw-md btn-info" href="{{ route('sessions.Index') }}">Close</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div><!-- END column -->

                    <div class="col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4 class="panel-title">Foods</h4>
                            </div>
                            @if (!count($data['foods']))
                                <div class="alert alert-success" role="alert">
                                    <strong>Warning! </strong>
                                    <span>Food not found!</span>
                                    <a href="{{ route('foods.Create') }}" class="alert-link">Click here to add</a>
                                </div>
                            @else
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th>Food Name</th>
                                            <th>Quantity of Food</th>
                                            <th></th>
                                        </tr>
                                        @php($say = 1)
                                        @foreach ($data['foods'] as $food)
                                            <form
                                                action="{{ route('sessions.AddProduct', ['id' => $session->session_id, 'product_id' => $food->id]) }}"
                                                method="POST">
                                                @csrf
                                                <tr>
                                                    <td>{{ $say++ }}</td>
                                                    <td>{{ $food->food_name }}</td>
                                                    <td width="200"><input type="number" name="total" value="1"></td>
                                                    <td width="50"><input type="submit" class="btn btn-success btn-xs"
                                                            value="Add">
                                                    </td>
                                                </tr>
                                            </form>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>


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
