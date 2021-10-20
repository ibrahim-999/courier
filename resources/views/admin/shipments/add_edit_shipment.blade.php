@extends('layouts.admin_layout.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Catalogues </h1>
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
                @if($errors->any())
                    <div class="alert alert-danger" style="margin-top: 10px;">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="productForm" id="ProductForm"
                      @if(empty($shipmentdata['id']))
                      action="{{url('admin/add-edit-shipment')}}"
                      @else action="{{url('admin/add-edit-shipment/'.$shipmentdata['id'])}}"
                      @endif
                      method="post" enctype="multipart/form-data">@csrf
                    @if(Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{Session::get('success_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{$title}}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address"
                                               @if(!empty($shipmentdata['address']))
                                               value="{{$shipmentdata['address']}}"
                                               @else value="{{old('address')}}" @endif>
                                    </div>

                                   {{-- <div class="form-group">
                                        <label for="number">Number</label>
                                        <input type="text" class="form-control" name="number" id="number"
                                               @if(!empty($shipmentdata['number']))
                                               value="{{$shipmentdata['number']}}"
                                               @else value="{{old('number')}}" @endif>
                                    </div>
--}}
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" rows="3" id="description" name="description">@if(!empty($shipmentdata['description'])){{$shipmentdata['description']}}@else {{old('description')}} @endif</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Select Product</label>
                                        <select name="product_id" id="product_id" class="form-control select2" multiple="" style="width: 100%;">
                                            <option  value="">Select</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product['id'] }}"
                                                        @if(!empty($shipmentdata['product_id']) && $shipmentdata['product_id'] == $product['id']) selected  @endif>{{$product['name']}} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label><strong>Select Status :</strong></label><br/>
                                        <select class="form-control" name="status">
                                            <option value="php">Pending</option>
                                            <option value="react">Picked</option>
                                            <option value="jquery">OFD</option>
                                            <option value="javascript">Delivered</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Select Courier</label>
                                        <select name="courier_id" id="courier_id" class="form-control select2"  style="width: 100%;">
                                            <option  value="">Select</option>
                                            @foreach($couriers as $courier)
                                                <option value="{{ $courier['id'] }}"
                                                        @if(!empty($shipmentdata['courier_id']) && $shipmentdata['courier_id'] == $courier['id']) selected  @endif>{{$courier['name']}} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

@endsection
