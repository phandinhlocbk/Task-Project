<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    //
    public function TaskPage() {
        
        return view('user.task_page.create_task');
    } //end method

    public function StoreTask(Request $request) {

        // Task::insert([
        //     'project_name' => $request->project_name,
        //     'task_name' => $request->task_name,
        //     'start_date' => $request->start_date,
        //     'end_date' => $request->end_date,
        //     'status' => $request->status,
        //     'priority' => $request->priority,
        //     'task_description' => $request->task_description,

        // ]);

        $inputs = ([
            'project_name' => $request->project_name,
            'task_name' => $request->task_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'priority' => $request->priority,
            'task_description' => $request->task_description,

        ]);
        auth()->user()->tasks()->create($inputs);

        $notification = array (
            'message' => 'Task Inserted Successfully',
            'alert-type' => 'success',
         );

         return redirect()->route('alltask.page');
        

    }//end method

    public function AllTaskPage() {
        $taskdata = auth()->user()->tasks;
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

    public function EditTask($id) {
        $taskdata = Task::findOrFail($id);

        return view('user.task_page.edit_task', compact('taskdata'));
    }//end method

    public function UpdateTask(Request $request) {

        $task_id = $request->id;        
        Task::findOrFail($task_id)->update([
            'project_name' => $request->project_name,
            'task_name' => $request->task_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'priority' => $request->priority,
            'task_description' => $request->task_description,
        ]);

        $notification = array (
            'message' => 'Task Updated Successfully',
            'alert-type' => 'success',
         );

         return redirect()->route('alltask.page')->with($notification);
    }//end method

    public function AllTaskDashboard() {
        return view('user.task_page.alltask_dashboard');
    }
}
