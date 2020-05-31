@extends('adminlte::page')

@section('content_header')
    <h1>Kategori Ekle</h1>
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
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Kategori Adı:</label>
                    <input type="text" class="form-control" id="name" name="name"
                           required placeholder="Ürün adını girin">
                </div>

                <div class="form-group">
                    <label for="description">Açıklama:</label>
                    <input type="text" class="form-control" id="description" name="description"
                           required placeholder="Ürün açıklamasını girin">
                </div>

                <div class="form-group">
                    <label for="image_url">Kategori Resmi:</label>
                    <input type="file" class="form-control" id="image_url" name="image"
                           placeholder="Ürün resmini girin">
                </div>

                <button class="btn btn-success" id="add" name="add">
                    <span class="fa fa-plus"></span> Ekle
                </button>
            </form>
        </div><!-- /.box-body -->
    </div>
</div><!-- /.box -->
@stop
