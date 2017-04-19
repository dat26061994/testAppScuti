@extends('admin.master')


@section('content')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>List</small>
                        </h1>

                        @if(Session::has('flash_message'))
                            <div class="alert alert-{!! Session::get('flash_level') !!}">
                                {!! Session::get('flash_message') !!}
                            </div>
                        @endif
                    
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $stt=0 ?>
                        @foreach($data as $item)
                        <?php $stt++?>
                            <tr class="odd gradeX" align="center">
                                <td>{!!$stt!!}</td>
                                <td><img src="{{ url('resources/upload/'.$item['image']) }}" alt="" style="height:80px;width:80px;"></td>
                                <td>{!! $item["name"] !!}</td>
                                <td>{!! number_format($item["price"]) !!}$</td>
                                <td>{{ $item["updated_at"] }}</td>
                                
                                <td>
                                   <?php
                                        if ($item["status"]==1) {
                                            echo "Active";
                                        }else{
                                            echo "Inactive";
                                        }
                                   ?>
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! URL::route('admin.product.getDelete',$item['id']) !!}" onclick="return deleteConfirm('Do you want tho delete ??')"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.product.getEdit',$item["id"]) !!}">Edit</a></td>
                            </tr>
                         @endforeach   
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
 @endsection()    
    