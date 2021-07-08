<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * The function for get a blade template with home page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Delete task from database
     *
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return back();
    }

    public function create(CreateTaskRequest $request)
    {
        Task::create([
            'name' => $request->post('name'),
            'user_id' => auth()->id(),
        ]);

        return back();
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }
}
