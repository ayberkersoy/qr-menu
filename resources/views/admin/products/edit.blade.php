@extends('adminlte::page')

@section('content_header')
    <h1>Ürün Düzenle</h1>
@stop

@section('content')<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <div class="box-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @include('notifications.success')
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Ürün Adı:</label>
                    <input type="text" class="form-control" id="name" name="name"
                           required placeholder="Ürün adını girin" value="{{ $product->name }}">
                </div>

                <div class="form-group">
                    <label for="description">Açıklama:</label>
                    <input type="text" class="form-control" id="description" name="description"
                           required placeholder="Ürün açıklamasını girin" value="{{ $product->description }}">
                </div>

                <div class="form-group">
                    <label for="category">Ürün Kategorisi:</label>
                    <select name="category_id" id="category" class="form-control">
                        <option value="" selected>Lütfen seçiniz</option>
                        @foreach(\App\Category::all() as $category)
                            <option value="{{ $category->id }}"
                                    @if($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="category">Ürün Stoğu:</label>
                    <select name="status" id="category" class="form-control">
                        <option value="" selected>Lütfen seçiniz</option>
                        <option value="{{ \App\Product::Available }}"
                                    @if(\App\Product::Available == $product->status) selected @endif>Var</option>
                        <option value="{{ \App\Product::Hidden }}"
                                @if(\App\Product::Hidden == $product->status) selected @endif>Yok</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Ürün Fiyatı:</label>
                    <input type="text" class="form-control" id="price" name="price"
                           required placeholder="Ürün fiyatını girin (Örn: 8.5)" value="{{ $product->price }}">
                </div>

                {{--            <div class="form-group">--}}
                {{--                <label for="isFeatured">Ürün öne çıkarılsın mı?</label>--}}
                {{--                <br>--}}
                {{--                <input type="radio" class="form-check-input" id="isFeatured" name="isFeatured" v-model="isFeatured" value="1"> Evet--}}
                {{--            </div>--}}

                <div class="form-group">
                    <label for="image_url">Ürün Resmi:</label>
                    <input type="file" class="form-control" id="image_url" name="image"
                           placeholder="Ürün resmini girin">
                </div>

                <button class="btn btn-success" id="add" name="add">
                    <span class="fa fa-edit"></span> Düzenle
                </button>
            </form>
        </div><!-- /.box-body -->
    </div>
</div><!-- /.box -->
@stop
