@extends('layouts.admin_layout.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Catalogues</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Shipments</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        @if(Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
                                {{Session::get('success_message')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Shipments</h3>
                                <a href="{{url('admin/add-edit-shipment')}}" style="max-width: 150px; float:right; display: inline-block"
                                   class="btn btn-block btn-success">Add Shipment</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="products" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Shipment Number</th>
                                        <th>Courier</th>
                                        <th>Products</th>
                                        <th>Description</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($shipments as $shipment)
                                        <tr>
                                            <td>{{$shipment->id}}</td>
                                            <td>{{$shipment->number}}</td>
                                            <td>{{$shipment->courier->name}}</td>
                                            <td>
                                                @foreach($shipment->products as $product)
                                                    {{$product->name}}
                                                @endforeach
                                            </td>
                                            <td>{{$shipment->description}}</td>
                                            <td>{{$shipment->address}}</td>
                                            <td>{{$shipment->status}}</td>
                                            <td style="width:120px; ">
                                                &nbsp;&nbsp;
                                                &nbsp;&nbsp;
                                                <a title="Edit Product" href="{{url('admin/add-edit-shipment/'.$shipment->id)}}"><i class="fas fa-edit"></i></a>
                                                &nbsp;&nbsp;
                                                <a title="Delete Shipment" href="javascript:void(0)" class="confirmDelete" record="shipment" recordid="{{$shipment->id}}"
                                                <?php /*href="{{url('admin/delete-shipment/'.$shipment->id)}}"*/?>><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
