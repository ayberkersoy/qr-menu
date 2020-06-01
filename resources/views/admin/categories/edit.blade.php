@extends('adminlte::page')

@section('content_header')
    <h1>Kategori Düzenle</h1>
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
            <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Kategori Adı:</label>
                    <input type="text" class="form-control" id="name" name="name"
                           required placeholder="Kategori adını girin" value="{{ $category->name }}">
                </div>

                <div class="form-group">
                    <label for="description">Açıklama:</label>
                    <input type="text" class="form-control" id="description" name="description"
                           required placeholder="Kategori açıklamasını girin" value="{{ $category->description }}">
                </div>

                <div class="form-group">
                    <label for="image_url">Kategori Resmi:</label>
                    <input type="file" class="form-control" id="image_url" name="image"
                           placeholder="Kategori resmini girin">
                </div>

                <button class="btn btn-success" id="add" name="add">
                    <span class="fa fa-edit"></span> Düzenle
                </button>
            </form>
        </div><!-- /.box-body -->
    </div>
</div><!-- /.box -->
@stop
