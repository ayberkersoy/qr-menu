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
                        <?php $total = 0 ?>
                        @foreach(session('cart') as $id => $details)
                            <?php $total += $details['price'] * $details['quantity'] ?>
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
                                                                <span style="float: right;">₺{{ $details['price'] * $details['quantity'] }}</span>
                                                            </h6>
                                                        </div>
                                                        <div class="qty-cart text-center">
                                                            <form class="default-form" action="{{ route('basket.update', $id) }}" method="POST">
                                                                @method('PATCH')
                                                                @csrf
                                                                <label for="quantity">Porsiyon</label>
                                                                <input type="hidden" name="product_id" value="{{ $id }}">
                                                                <input type="number" step="0.5" placeholder="1" value="{{ $details['quantity'] }}" id="quantity" name="quantity">
                                                                <button type="submit">
                                                                    <i class="fa fa-refresh"></i>
                                                                </button>
                                                            </form>
                                                            <form class="default-form" action="{{ route('basket.destroy', $id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
{{--                                                                <label for="quantity">Porsiyon</label>--}}
                                                                <input type="hidden" name="product_id" value="{{ $id }}">
{{--                                                                <input type="number" step="0.5" placeholder="1" value="1" id="quantity" name="quantity">--}}
                                                                <button type="submit" onclick="confirm('Emin misiniz?')">
                                                                    <i class="fa fa-trash-o"></i>
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
                            <p><strong>Toplam: </strong> ₺{{ $total }}</p>
                            <label for="table_no">Masa Numarası</label>
                            <input type="text" name="table_no" id="table_no">
                            <br>
                            <button type="submit">
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
@endsection
