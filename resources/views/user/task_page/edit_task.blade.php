@extends('user.user_master')
@section('user')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title"> Edit Task</h4>

            <form method="post" action="{{route('update.task')}}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{$taskdata->id}}">

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Project Name </label>
                <div class="col-sm-10">
                    <input name="project_name" class="form-control" type="text" id="example-text-input" value="{{$taskdata->project_name}}">

                </div>
            </div>

            
            <!-- end row -->

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Task Name </label>
                <div class="col-sm-10">
                    <input name="task_name" class="form-control" type="text" id="example-text-input" value="{{$taskdata->task_name}}">

                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-date-input" class="col-sm-2 col-form-label">Start Date</label>
                <div class="col-sm-10">
                    <input name="start_date" class="form-control" type="date" value="{{$taskdata->staart_date}}" id="example-date-input">
                </div>
            </div>

            <!-- end row -->

            <div class="row mb-3">
                <label for="example-date-input" class="col-sm-2 col-form-label">End Date</label>
                <div class="col-sm-10">
                    <input name="end_date" class="form-control" type="date" value="{{$taskdata->end_date}}" id="example-date-input">
                </div>
            </div>

            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
            <select name="status" class="form-select" aria-label="Default select example" value="{{$taskdata->status}}">
            <option selected="">Open this select menu</option>
            <option value="Peding">Pending</option>
            <option value="On Process">On Process</option>
            <option value="Done">Done</option>
            </select>
               </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Priority</label>
                <div class="col-sm-10">
            <select name="priority" class="form-select" aria-label="Default select example" value="{{$taskdata->priority}}">
            <option selected="">Open this select menu</option>
            <option value="Urgent">Urgent</option>
            <option value="High">High</option>
            <option value="Medium">Medium</option>
            <option value="Low">Low</option>
            </select>
               </div>
            </div>
            <!-- end row -->

            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Task Description </label>
                <div class="col-sm-10">
                <textarea id="elm1" name="task_description" value="{{$taskdata->task_description}}">

                </textarea>
                </div>
            </div>
            <!-- end row -->

            <!-- end row -->
            <input type="submit" class="btn btn-info waves-effect waves-light" value="Edit Task">
            </form>



        </div>
    </div>
</div> <!-- end col -->
</div>



</div>
</div>
@endsection 