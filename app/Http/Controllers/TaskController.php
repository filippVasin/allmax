<?php

namespace App\Http\Controllers;

use App\Priority;
use App\Status;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (Gate::denies('show-list')) {
            $admin = true;
        } else {
            $admin = false;
        }

        $priority_id = $request->input('priority_id');
        $status_id = $request->input('status_id');

        $user = Auth::user();

        $tasks = Task::
            when($priority_id != 0, function ($query) use ($priority_id) {
                return $query->where('priority_id', $priority_id);
            })
            ->when($status_id != 0, function ($query) use ($status_id) {
                return $query->where('status_id', $status_id);
            })
            ->when($admin, function ($query) use ($user) {
                return $query->where('user_id',$user->id );
            })
            ->get();

       return view('task.list',[
           'tasks' => $tasks,
           'statuses' => Status::get(),
           'priorities' => Priority::get(),
       ]);
    }

    public function create(){
        return view('task.create',[
            'statuses' => Status::get(),
            'priorities' => Priority::get(),
        ]);
    }

    public function save(Request $request){

        $user = Auth::user();

        Task::create([
            'user_id' => $user->id,
            'title' => $request->input('title'),
            'priority_id' => $request->input('priority_id'),
            'status_id' => $request->input('status_id')
        ]);

        return redirect()->route('list')->with('message', 'Задача создана');
    }

    public function edit(Request $request){

        $task = Task::find($request->input('id'));

        if (Gate::denies('edit-task', $task)) {
            return redirect()->route('list')->with('message', 'У вас не хватает прав!');
        }

        return view('task.edit',[
            'task' =>   $task,
            'statuses' => Status::get(),
            'priorities' => Priority::get(),
        ]);
    }

    public function update(Request $request)
    {
        $task = Task::find($request->input('task_id'));

        if (Gate::denies('edit-task', $task)) {
            return redirect()->route('list')->with('message', 'У вас не хватает прав!');
        }

        $task->title = $request->input('title');
        $task->priority_id = $request->input('priority_id');
        $task->status_id = $request->input('status_id');
        $task->save();

        return redirect()->route('list')->with('message', 'Задача обновлена');
    }

    public function destroy(Request $request){
        $task = Task::find($request->input('id'));

        if (Gate::denies('edit-task', $task)) {
            return redirect()->route('list')->with('message', 'У вас не хватает прав!');
        }

        $task->delete();
        return redirect()->route('list')->with('message', 'Задача удалена');
    }

}
