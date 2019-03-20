@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('addToDoList')}}"
                        method="POST"
                        class="form-horizontal"
                        enctype="multipart/form-data"
                    >
                        {{ csrf_field() }}

                        <!-- Task Area -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">
                                Title
                            </label>

                            <div class="col-sm-6">
                                <input type="text" name="title"
                                    id="task-title"
                                    class="form-control"
                                    value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">
                                Content
                            </label>
                            <div class="col-sm-6">
                                <input type="text" name="content"
                                    id="task-content"
                                    class="form-control"
                                    value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="task-attachment"
                                class="col-sm-3 control-label">
                                Attachment
                            </label>
                            <div class="col-sm-6">
                                <input type="file" name="attachment"
                                    id="task-attachment"
                                    class="form-control">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>
                                        Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Task</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text">
                                        title:
                                            <div>
                                                {{ $task->title }}
                                            </div>
                                        </td>
                                        <td class="table-text">
                                        content:
                                            <div>
                                                {{ $task->content }}
                                            </div>
                                        </td>
                                        <td class="table-text">
                                        attachment:
                                            <div>
                                                {{ $task->attachment }}
                                            </div>
                                        </td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form
                                                action="{{ url('todolist/'.$task->id) }}"
                                                method="POST"
                                            >
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
