@extends('layout')

@section('content')
    <div id="main-wrapper">
        <!-- thumbnail slide section -->
        <div id="page-content">
            <div id="thumbnail-slide">
                <div class="container">
                    <div id="thumb-slide">
                        <div id="thumb-slide-section" class="owl-carousel" role="tablist">
                            @foreach($categories as $category)
                                <div class="item">
                                    <a href="#tab-{{ $category->id }}" role="tab" data-toggle="tab">
                                        @if(!empty($category->image))
                                            <img src="{{ asset($category->image->path) }}" alt="" style="max-width: 75px">
                                        @endif
                                        <p>{{ $category->name }}</p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <!-- end .thumb-slide-section -->
                    </div>
                    <!-- end #thumb-slide -->
                </div>
                <!-- end .container -->
            </div>
            <!-- end .thumbnail-slide -->

            <!-- start #main-wrapper -->
            <div class="container">
                <div class="row mt30">
                    <div class="col-md-12 col-sm-12">
                        <!-- end view-style -->
                        <div class="tab-content">
                            <a href="{{ route('basket.index') }}"><i class="fa fa-shopping-cart"></i> Sepetim ({{ session('cart') ? count(session('cart')) : 0 }} ürün)</a>
                            @include('notifications.success')
                            @foreach($categories as $category)
                                <div class="tab-pane fade @if($loop->iteration == 1) in active @endif" id="tab-{{ $category->id }}">
                                    <div class="all-menu-details">
                                        <h5>{{ $category->name }}</h5>
                                        @foreach($category->products as $product)
                                            <div class="item-list">
                                                @if(!empty($product->images))
                                                    <div class="list-image">
                                                        @foreach($product->images as $image)
                                                            <img src="{{ asset($image->path) }}" alt="">
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <div class="all-details">
                                                    <div class="visible-option">
                                                        <div class="details">
                                                            <h6>
                                                                <a href="#">{{ $product->name }}</a>
                                                                <span style="float: right">₺{{ $product->price }}</span>
                                                            </h6>
                                                            <p class="m-with-details"><strong>Açıklama:</strong><br>{{ $product->description }}</p>

                                                            <p class="for-list">{{ $product->description }}</p>
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
                                        @endforeach
                                    </div>
                                    <!--end all-menu-details-->

                                </div> <!-- end .tab-pane -->
                            @endforeach
                        </div> <!-- end .tab-content -->
                    </div>
                    <!--end main-grid layout-->
                </div>
                <!-- end .row -->
            </div>
            <!--end .container -->
        </div>
    </div>
    <!-- end #main-wrapper -->
@endsection
