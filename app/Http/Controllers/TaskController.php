<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function __construct()
    {
        $this->tasks = new Task();
    }

    public function TaskPage()
    {
        return view('user.task_page.create_task');
    } //end method

    public function StoreTask(Request $request)
    {
        $form = $request->query();
        dd($form);
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

        $notification = [
            'message' => 'Task Inserted Successfully',
            'alert-type' => 'success',
         ];

        return redirect()->route('alltask.page');
    }

    public function AllTaskPage(Request $request)
    {
        $fillters = [];
        if (!empty($request->status)) {
            $status = $request->status;
            $fillters[] = ['status', '=', $status];
        }
        if (!empty($request->priority)) {
            $priority = $request->priority;
            $fillters[] = ['priority', '=', $priority];
        }

        //dd($fillters);
        // dd($fillters);
        //$taskdata = auth()->user()->tasks;
        $taskdata = Task::all();
        $taskdata = $this->tasks->getAllTasks($fillters);
        // $taskdata = $this->tasks;

        // dd($taskdata);

        return view('user.task_page.all_task_page', compact('taskdata'));
    }//endd method

    public function DeleteTask($id)
    {
        Task::findOrFail($id)->delete();
        $notification = [
            'message'=>'Task has been deleted successfully',
            'aler-type' => 'success',
        ];

        return redirect()->route('alltask.page')->with($notification);
    }

    public function EditTask($id)
    {
        $taskdata = Task::findOrFail($id);

        return view('user.task_page.edit_task', compact('taskdata'));
    }//end method

    public function UpdateTask(Request $request)
    {
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

        $notification = [
            'message' => 'Task Updated Successfully',
            'alert-type' => 'success',
         ];

        return redirect()->route('alltask.page')->with($notification);
    }//end method

    public function AllTaskDashboard()
    {
        $taskdata = auth()->user()->tasks;
        // $tasktotal = $taskdata ->count();
        // $pendingcount = $taskdata -> where('status','Pending')->count();
        // $processingcount = $taskdata -> where('status','On Process')->count();
        // $donecount = $taskdata -> where('status','done')->count();

        // dd($task);

        return view('user.task_page.alltask_dashboard', compact('taskdata'));
    }
}
