<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Restaurant Menu</title>
    <!-- Stylesheets -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/thumb-slide.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">

    <!--[if IE 9]>
    <script src="{{ asset('js/media.match.min.js') }}"></script>
    <![endif]-->

</head>

<body>
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Local jQuery -->
<script>
    window.jQuery || document.write('<script src="{{ asset('js/jquery-1.11.0.min.js') }}"><\/script>')
</script>
<script src="{{ asset('js/jquery-ui-1.10.4.custom.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="{{ asset('js/jquery.ui.map.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>


<script>

</script>

</body>

<!-- Mirrored from new.uouapps.com/takeaway/menu(view-1).html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 May 2020 16:04:26 GMT -->
</html>
