<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $tasks = $user->tasks()->orderBy('created_at', 'desc')->get();
        
        $todoTasks = $tasks->where('status', 'To Do');
        $inProgressTasks = $tasks->where('status', 'In Progress');
        $doneTasks = $tasks->where('status', 'Done');
        
        return view('tasks.index', compact('todoTasks', 'inProgressTasks', 'doneTasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('tasks.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:To Do,In Progress,Done'
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->status = $request->status;
        $task->user_id = Auth::id();
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('tasks.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->route('tasks.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:To Do,In Progress,Done'
        ]);

        $task = Auth::user()->tasks()->findOrFail($id);
        $task->title = $request->title;
        $task->status = $request->status;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Auth::user()->tasks()->findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }

    /**
     * Update task status via AJAX
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:To Do,In Progress,Done'
        ]);

        $task = Auth::user()->tasks()->findOrFail($id);
        $task->status = $request->status;
        $task->save();

        return response()->json(['success' => true, 'message' => 'Status updated successfully']);
    }
}
