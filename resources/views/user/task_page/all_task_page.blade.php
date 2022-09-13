@extends('user.user_master') @section('user')
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
                        <!-- <h4 class="card-title">All Tasks</h4> -->

                        <form action="{{route('alltask.page')}}" method="get" class="mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <!-- <label for="validationCustom03" class="form-label">status</label> -->
                                        <select name="status" class="form-select" id="validationCustom03" required="">
                                            <option selected="" value="">
                                                All Status
                                            </option>
                                            <option value="Pending">Pending</option>
                                            <option value="On Process"> On Process </option>
                                            <option value="Done">Done</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <!-- <label for="validationCustom03" class="form-label">Priority</label> -->
                                        <select name="priority" class="form-select" id="validationCustom03" required="">
                                            <option selected="" value="">
                                                All Priority
                                            </option>
                                            <option value="Urgent">Urgent</option>
                                            <option value="High">High</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <!-- <label for="validationCustom04" class="form-label">Search</label> -->
                                        <input name="keywords" type="text" class="form-control" id="validationCustom04"
                                            placeholder="Search" required="" value="{{request()->keywords}}" />
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <!-- <label for="validationCustom04" class="form-label">Serach</label> -->
                                        <input type="submit" class="form-control" value="Edit Task" />
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="card-title-desc"></p>
                        <table class="table mb-0">
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
                                @php($i = 1) @foreach($taskdata as $task)
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
                                        <a href="{{route('edit.task',$task->id)}}" class="btn btn-info sm"
                                            title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="{{route('delete.task', $task->id)}}" class="btn btn-danger sm"
                                            title="Delete Data">
                                            <i class="fas fa-trash-alt" id="delete"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>

@endsection
