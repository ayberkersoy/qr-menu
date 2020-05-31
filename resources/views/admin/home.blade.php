@extends('adminlte::page')

@section('content_header')
    <h1>Anasayfa</h1>
@stop

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
{{--                    <h3>{{  }}</h3>--}}
                    <p>Sipariş</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="/orders" class="small-box-footer">Tümü <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
{{--                    <h3>{{ reservations.length }}</h3>--}}
                    <p>Rezervasyon</p>
                </div>
                <div class="icon">
                    <i class="ion ion-calendar"></i>
                </div>
                <a href="/reservations" class="small-box-footer">Tümü <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
{{--                    <h3>{{ users.length }}</h3>--}}
                    <p>Kullanıcı</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="/users" class="small-box-footer">Tümü <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
{{--                    <h3>{{ products.length }}</h3>--}}
                    <p>Ürün</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pizza"></i>
                </div>
                <a href="/products" class="small-box-footer">Tümü <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Son Siparişler</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-bordered table-striped table-hover data-table">
                        <tr>
                            <th>#</th>
                            <th>Sipariş Tarihi</th>
                            <th>Sipariş Sahibi</th>
                            <th>Sipariş Tutarı</th>
                            <th>Sipariş Durumu</th>
                            <th>İşlemler</th>
                        </tr>
                        <tr>
                            <td>{{ 'orderLast.id' }}</td>
                            <td>{{ 'orderLast.date_ordered' }}</td>
                            <td>{{ 'orderLast.user.name' }} {{ 'orderLast.user.surname' }}</td>
                            <td>{{ 'orderLast.price' }}</td>
                            <td>
                                <span class="label label-danger">İptal Edildi</span>
                                <span class="label label-warning">Bekliyor</span>
                                <span class="label label-primary">Onaylandı</span>
                                <span class="label label-success">Gönderildi</span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                <!-- <a href="#" class="btn btn-xs btn-danger" v-on:click="handleSubmit(campaign.id, index)"><i class="fa fa-trash-o"></i></a> -->
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
@stop
