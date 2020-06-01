@extends('adminlte::page')

@section('content_header')
    <h1>Siparişler</h1>
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
                        <th>Masa Numarası</th>
                        <th>Tutar</th>
                        <th>Tarih</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->table_no }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <!-- <a href="#" class="btn btn-xs btn-danger" v-on:click="handleSubmit(campaign.id, index)"><i class="fa fa-trash-o"></i></a> -->
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $orders->links() }}
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
