@extends('adminlte::page')

@section('content_header')
    <h1>Kategoriler</h1>
@stop

@section('content')
    <div id="app">
        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        @include('notifications.success')
                    </div>
                </div>
                <table id="campaigns_table" class="table table-bordered table-striped table-hover data-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Kategori Adı</th>
                        <th>Ürün Sayısı</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->products->count() }}</td>
                            <td>
                                <!-- <a href="#" class="btn btn-xs btn-danger" v-on:click="handleSubmit(campaign.id, index)"><i class="fa fa-trash-o"></i></a> -->
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <button type="submit" class="btn btn-danger" onclick="confirm('Emin misiniz?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('.data-table').dataTable();
        });
    </script>
@stop
