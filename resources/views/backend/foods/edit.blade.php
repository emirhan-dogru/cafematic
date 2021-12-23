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
                                <h4 class="widget-title">You are editing the food named <b>{{$food->food_name}}</b></h4>
                            </header><!-- .widget-header -->
                            <hr class="widget-separator">
                            <div class="widget-body">
                                <form action="{{route('foods.Update' , ['slug' => $food->food_slug])}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Food Name</label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter the food name" value="{{$food->food_name}}">
                                        @if ($errors->any())
                                        <small style="color: red;">This field cannot be left blank!</small>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Food Price</label>
                                        <input type="text" name="price" class="form-control" placeholder="Enter the food price" value="{{$food->food_price}}">
                                        @error('price')
                                        <small style="color: red;">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary btn-md">Edit</button>
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
            <footer class="app-footer">
                <div class="clearfix">
                    <ul class="footer-menu pull-right">
                        <li><a href="javascript:void(0)">Careers</a></li>
                        <li><a href="javascript:void(0)">Privacy Policy</a></li>
                        <li><a href="javascript:void(0)">Feedback <i class="fa fa-angle-up m-l-md"></i></a></li>
                    </ul>
                    <div class="copyright pull-left">Copyright Emirhan Doğru 2021 &copy;</div>
                </div>
            </footer>
        </div>
        <!-- /#app-footer -->
    </main>
@endsection

@section('css')@endsection
@section('js')@endsection
