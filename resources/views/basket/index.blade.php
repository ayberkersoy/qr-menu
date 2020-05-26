@extends('layout')

@section('content')
    <!-- start #main-wrapper -->
    <div class="container">
        <div class="row mt30">
            <div class="col-md-12 col-sm-12">
                <!-- end view-style -->
                <div class="tab-content">
{{--                    <a href="{{ route('basket.index') }}"><i class="fa fa-shopping-cart"></i> Sepetim ({{ session('cart') ? count(session('cart')) : 0 }} ürün)</a>--}}
                    @include('notifications.success')
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="tab-pane fade in active" id="tab-{{ $id }}">
                                <div class="all-menu-details menu-with-2grid thumb">
{{--                                    <h5>{{ $details['name'] }}</h5>--}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="item-list">
                                                <div class="all-details">
                                                    <div class="visible-option">
                                                        <div class="details">
                                                            <h6>
                                                                <a href="#">{{ $details['name'] }}</a>
                                                                <span style="float: right">₺{{ $details['price'] }}</span>
                                                            </h6>
{{--                                                            <p class="m-with-details"><strong>Açıklama:</strong><br>{{ $product->description }}</p>--}}

{{--                                                            <p class="for-list">{{ $product->description }}</p>--}}
                                                        </div>

                                                    {{--                                                    <div class="price-option fl">--}}
                                                    {{--                                                        <h4></h4>--}}
                                                    {{--                                                <button class="toggle">Option</button>--}}
                                                    {{--                                                    </div>--}}
                                                    <!-- end .price-option-->
                                                        <div class="qty-cart text-center">
                                                            {{--                                                        <h6>Porsiyon</h6>--}}
                                                            <form class="default-form" action="{{ route('basket.store') }}" method="POST">
                                                                @csrf
                                                                <label for="quantity">Porsiyon</label>
                                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                                <input type="number" step="0.5" placeholder="1" value="1" id="quantity" name="quantity">
                                                                <button type="submit">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </button>
                                                            </form>
                                                        </div> <!-- end .qty-cart -->
                                                    </div> <!-- end .vsible-option -->

                                                </div>
                                                <!-- end .all-details -->
                                            </div>
                                            <!-- end .item-list -->
                                        </div>
                                    </div>
                                </div>
                                <!--end all-menu-details-->

                            </div> <!-- end .tab-pane -->
                        @endforeach
                    @endif
                </div> <!-- end .tab-content -->
            </div>
            <!--end main-grid layout-->
        </div>
        <!-- end .row -->
    </div>
    <!--end .container -->
@endsection
