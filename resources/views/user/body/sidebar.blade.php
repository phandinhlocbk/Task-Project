@php
$id = Auth::user()->id;
$userData = App\Models\User::find($id);
@endphp

<div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->
                    <div class="user-profile text-center mt-3">
                        <div class="">
                            <img src="{{ (!empty($userData->profile_image)?url('upload/user_images/'.$userData->profile_image):url('upload/no_image.jpg')) }}" alt="" class="avatar-md rounded-circle">
                        </div>
                        <div class="mt-3">
                            <h4 class="font-size-16 mb-1">{{$userData->name}}</h4>
                        </div>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="index.html" class="waves-effect">
                                    <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-layout-3-line"></i>
                                    <span>Task</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="{{route('task.page')}}">Create Task</a></li>
                                            <li><a href="{{route('alltask.page')}}">All Tasks</a></li>
                                        </ul>
                                    </li>
                                  
                                </ul>
                            </li>


                          
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>