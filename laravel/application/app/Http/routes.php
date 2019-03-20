<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use App\Task;
use App\ToDoList;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {

    /**
     * Show Task Dashboard
     */
    Route::get('/todolist', function () {
        return view('todolist', [
            'tasks' => ToDoList::getTasks()
        ]);
    });
    /**
     * Add New Task
     */
    Route::post('/addToDoList', function (Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:50',
            'content' => 'required|max:300',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $ext = $request->attachment->getClientOriginalExtension();
        $fileName = 'attachment_'. uniqid(). '.'. $ext;
        $path = $request->file('attachment')->storeAs(
            'public/attachments',
            $fileName
        );
        var_dump($path);
        // $todolist = new ToDoList;
        // $task->addToDoList();

        return redirect('/todolist');
    });


    /**
     * Show Task Dashboard
     */
    Route::get('/', function () {
        return view('tasks', [
            'tasks' => Task::orderBy('created_at', 'asc')->get()
        ]);
    });

    /**
     * Add New Task
     */
    Route::post('/task', function (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    });

    /**
     * Delete Task
     */
    Route::delete('/task/{id}', function ($id) {
        Task::findOrFail($id)->delete();

        return redirect('/');
    });
});
