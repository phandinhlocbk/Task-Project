@extends('user.user_master')
@section('user')
<!-- <h1>{{$taskdata ->count()}}</h1> -->
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">DashBoard</h4>



                </div>
            </div>
        </div>
        <!-- ------ -->
        <!-- ---- -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                <h4 class="card-title">DashBoard</h4>
                    <p class="card-title-desc"></p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                          
                            <th>Total tasks</th>
                            <th>Pending Tasks</th>
                            <th>Processing Tasks</th>
                            <th>Done Tasks</th>
                        </tr>
                    </thead>


                    <tbody>
                 
                        <tr>
                            <td>{{$taskdata ->count()}}</td>
                            <td>{{$taskdata -> where('status','Pending')->count()}}</td>
                            <td>{{$taskdata -> where('status','On Process')->count()}}</td>
                            <td>{{$taskdata -> where('status','Done')->count()}}</td>
                          
                        </tr>
                      
                    </tbody>
                    </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->



    </div> <!-- container-fluid -->
</div>


@endsection