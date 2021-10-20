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
                            <li class="breadcrumb-item active">Couriers</li>
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
                                <h3 class="card-title">Couriers</h3>
                                <a href="{{url('admin/add-edit-courier')}}" style="max-width: 150px; float:right; display: inline-block"
                                   class="btn btn-block btn-success">Add Courier</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="products" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Courier Name</th>
                                        <th>Courier Address</th>
                                        <th>Courier Number</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($couriers as $courier)
                                        <tr>
                                            <td>{{$courier->id}}</td>
                                            <td>{{$courier->name}}</td>
                                            <td>{{$courier->address}}</td>
                                            <td>{{$courier->number}}</td>
                                            <td style="width:120px; ">
                                                &nbsp;&nbsp;
                                                &nbsp;&nbsp;
                                                <a title="Edit Courier" href="{{url('admin/add-edit-courier/'.$courier->id)}}"><i class="fas fa-edit"></i></a>
                                                &nbsp;&nbsp;
                                                <a title="Delete Courier" href="javascript:void(0)" class="confirmDelete" record="courier" recordid="{{$courier->id}}"
                                                <?php /*href="{{url('admin/delete-courier/'.$courier->id)}}"*/?>><i class="fas fa-trash"></i></a>
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
