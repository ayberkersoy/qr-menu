@extends('layout')

@section('content')
    <!-- start #main-wrapper -->
    <div class="container">
        <div class="row mt30">
            <div class="col-md-12 col-sm-12">
                <!-- end view-style -->
                <div class="tab-content">
{{--                    <a href="{{ route('basket.index') }}"><i class="fa fa-shopping-cart"></i> Sepetim ({{ session('cart') ? count(session('cart')) : 0 }} ürün)</a>--}}
                    @if(session('cart'))
                        <h3>Siparişim</h3>
                        @include('notifications.success')
                        <?php $total = 0 ?>
                        @foreach(session('cart') as $id => $details)
                            <?php $total += $details['price'] * $details['quantity'] ?>
                            <div class="tab-pane fade in active" id="tab-{{ $id }}">
                                <div class="all-menu-details menu-with-2grid thumb">
{{--                                    <h5>{{ $details['name'] }}</h5>--}}
                                    <div class="row" style="border: 1px solid #222; border-radius: 5px; margin-right: 2px; margin-left: 2px; margin-top: 5px">
                                        <div class="col-sm-12">
                                            <div class="item-list">
                                                <div class="all-details">
                                                    <div class="visible-option">
                                                        <div class="details">
                                                            <h6>
                                                                <img src="{{ $details['image'] }}" alt="" style="height: 70px">
                                                                <a href="#">{{ $details['name'] }}</a>
                                                                <span style="float: right; font-size: 24px">₺{{ $details['price'] * $details['quantity'] }}</span>
                                                            </h6>
                                                        </div>
                                                        <div class="qty-cart text-center">
                                                            <form class="default-form" action="{{ route('basket.destroy', $id) }}" method="POST" style="float: right; margin-left:5px">
                                                                @csrf
                                                                @method('DELETE')
                                                                {{--                                                                <label for="quantity">Porsiyon</label>--}}
                                                                <input type="hidden" name="product_id" value="{{ $id }}">
                                                                {{--                                                                <input type="number" step="0.5" placeholder="1" value="1" id="quantity" name="quantity">--}}
                                                                <button type="submit" onclick="confirm('Emin misiniz?')">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </form>
                                                            <form class="default-form" action="{{ route('basket.update', $id) }}" method="POST" style="float: right;">
                                                                @method('PATCH')
                                                                @csrf
                                                                <label for="quantity">Porsiyon</label>
                                                                <input type="hidden" name="product_id" value="{{ $id }}">
                                                                <input type="number" step="0.5" placeholder="1" value="{{ $details['quantity'] }}" id="quantity" name="quantity" style="width: 35px">
                                                                <button type="submit">
                                                                    <i class="fa fa-refresh"></i>
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

                        <form action="{{ route('order.store') }}" method="POST" style="margin-top: 20px;">
                            @csrf

                            <label for="table_no">Masa Numarası</label>
                            <br>
                            <input type="text" name="table_no" id="table_no" class="form-control" placeholder="Lütfen masa numaranızı giriniz.">
                            <input type="hidden" name="total" value="{{ $total }}">
                            <br>
                            <label for="note">Sipariş Notu</label>
                            <textarea name="note" id="note" class="form-control" cols="10" rows="3" placeholder="Sipariş notunuzu buraya yazabilirsiniz."></textarea>
                            <br>
                            <p style="float:right"><strong>Toplam: ₺{{ $total }}</strong></p>
                            <button type="submit" class="btn btn-warning">
                                Sipariş Ver
                            </button>
                        </form>
                    @else
                        <h6>Sepetinizde ürün bulunmamaktadır.</h6>
                    @endif
                </div> <!-- end .tab-content -->
            </div>
            <!--end main-grid layout-->
        </div>
        <!-- end .row -->
    </div>
    <!--end .container -->

    <div id="main-wrapper">
        <!-- thumbnail slide section -->
        <div id="page-content">
            <div class="container">
                <h5>Diğer ürünlerimize de göz atabilirsiniz!</h5>
            </div>
            <div id="thumbnail-slide">
                <div class="container">
                    <div id="thumb-slide">
                        <div id="thumb-slide-section" class="owl-carousel" role="tablist">
                            @foreach($categories as $category)
                                <div class="item">
                                    <a href="#tab-{{ $category->id }}" role="tab" data-toggle="tab">
                                        @if(!empty($category->image))
                                            <img src="{{ asset($category->image->path) }}" alt="" style="width: 75px !important; height: 55px !important;">
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
{{--                            <a href="{{ route('basket.index') }}"><i class="fa fa-shopping-cart"></i> Sepetim ({{ session('cart') ? count(session('cart')) : 0 }} ürün)</a>--}}
{{--                            @include('notifications.success')--}}
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
