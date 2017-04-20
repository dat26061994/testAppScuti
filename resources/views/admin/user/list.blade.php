@extends('admin.master')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>List</small>
                        </h1>
                    </div>
                     @if(Session::has('flash_message'))
                            <div class="alert alert-{!! Session::get('flash_level') !!}">
                                {!! Session::get('flash_message') !!}
                            </div>
                        @endif
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Active</th>
                                <th>Delete</th>
                                @if((Auth::user()->id)==2)
                                <th>Edit</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        <?php $stt =0; ?>
                        @foreach($user as $item)
                        <?php $stt++ ?>
                            <tr class="odd gradeX" align="center">
                                <td>{{ $stt }}</td>
                                <td>{{ $item->name }}</td>
                                
                                <td>{{ $item->email }}</td>
                                
                               
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! URL::route('admin.user.getDelete',$item->id) !!}" onclick="return deleteConfirm('Do you want tho delete ??')"> Delete</a></td>
                                
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.user.getEdit',$item->id) !!}">Edit</a></td>
                                
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

   @endsection