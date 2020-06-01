@extends('adminlte::page')

@section('content_header')
    <h1>Sipariş Detayı</h1>
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
                        <tr>
                            <td>{{ $order->table_no }}</td>
                            <td>₺{{ $order->total }}</td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <!-- <a href="#" class="btn btn-xs btn-danger" v-on:click="handleSubmit(campaign.id, index)"><i class="fa fa-trash-o"></i></a> -->
                                @if($order->status == \App\Order::New)
                                    <form action="{{ route('orders.update', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-warning">
                                            <span class="fa fa-check"></span> Onayla
                                        </button>
                                    </form>
                                @else
                                    <span class="alert alert-success">Onaylandı</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h3>Ürünler</h3>
                <table id="campaigns_table" class="table table-bordered table-striped table-hover data-table">
                    <thead>
                    <tr>
                        <th>Ürün Adı</th>
                        <th>Porsiyon</th>
                        <th>Tutar</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($order->baskets as $basket)
                            <tr>
                                <td>{{ $basket->product->name }}</td>
                                <td>{{ $basket->quantity }}</td>
                                <td>₺{{ $basket->quantity * $basket->product->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
