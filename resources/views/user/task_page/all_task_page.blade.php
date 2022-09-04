@extends('user.user_master')
@section('user')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Tasks</h4>



                </div>
            </div>
        </div>
        <!-- ------ -->
        <!-- ---- -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                <h4 class="card-title">All Tasks</h4>
                    <p class="card-title-desc"></p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                          
                            <th>Sl</th>
                            <th>Project</th>
                            <th>Task</th>
                            <th>Task Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Priority</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                    @php($i = 1)
                        @foreach($taskdata as $task)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$task->project_name}}</td>
                            <td>{{$task->task_name}}</td>
                            <td>{{$task->task_description}}</td>
                            <td>{{$task->start_date}}</td>
                            <td>{{$task->end_date}}</td>
                            <td>{{$task->status}}</td>
                            <td>{{$task->priority}}</td>
                            <td>
                                <a href="{{route('edit.task',$task->id)}}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

                                <a href="{{route('delete.task', $task->id)}}" class="btn btn-danger sm" title="Delete Data">  <i class="fas fa-trash-alt" id="delete"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->



    </div> <!-- container-fluid -->
</div>
            
@endsection