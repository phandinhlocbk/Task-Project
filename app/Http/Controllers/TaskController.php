<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    //
    public function TaskPage() {
        
        return view('user.task_page.create_task');
    } //end method

    public function StoreTask(Request $request) {

        Task::insert([
            'project_name' => $request->project_name,
            'task_name' => $request->task_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'priority' => $request->priority,
            'task_description' => $request->task_description,

        ]);

        $notification = array (
            'message' => 'Task Inserted Successfully',
            'alert-type' => 'success',
         );

         return back();
        

    }//end method

    public function AllTaskPage() {
        $taskdata = Task::latest()->get();

        return view('user.task_page.all_task_page', compact('taskdata'));


    }//endd method

    public function DeleteTask($id) {

        Task::findOrFail($id)->delete();
        $notification = array(
            'message'=>'Task has been deleted successfully',
            'aler-type' => 'success'
        );

         return redirect()->route('alltask.page')->with($notification);

    }
}
