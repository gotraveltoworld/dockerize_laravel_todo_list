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
    Route::get('/', function () {
        return view('todolist', [
            'tasks' => (new ToDoList)->getData()
        ]);
    });

    Route::get('/todolist/{id?}', function ($id = null) {
        return response()->json((new ToDoList)->getData($id));
    });

    Route::delete('/deleteList/{id?}', function ($id = null) {
        return response()->json((new ToDoList)->deletedList($id));
    });

    Route::delete('/deleteRedirect/{id?}', function ($id = null) {
        $result = (new ToDoList)->deletedList($id);
        return redirect('/');
    });

    Route::put('/updateRedirect/{id}', function (Request $request, $id = null) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:50',
            'content' => 'required|max:300'
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        $todolist = new ToDoList;
        $todolist->updatedList(
            $id,
            $request->title,
            $request->content
        );

        return redirect('/');
    });
    /**
     * Add New Task
     */
    Route::post('/addToDoList', function (Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:50',
            'content' => 'required|max:300',
            'attachment' => [
                'file',
                'max : 10240' // 10 MB
            ]
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $oriName = $request->attachment->getClientOriginalName();
        $ext = $request->attachment->getClientOriginalExtension();
        $fileName = 'attachment_'. uniqid(). '.'. $ext;
        $path = $request->file('attachment')->storeAs(
            'public/attachments',
            $fileName
        );
        $todolist = new ToDoList;
        $id = $todolist->addToDoList(
            $request->title,
            $request->content,
            $fileName,
            $oriName
        );
        return redirect('/');
    });
});