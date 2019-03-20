@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-success">
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
                                <button type="submit" class="btn btn-success">
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
                <div class="panel panel-danger">
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
                                        attachment name:
                                            <div>
                                            <a href='{{ asset("storage/". $task->attachment) }}'
                                                download="{{ $task->attachment_ori_name }}"
                                                target="_blank">
                                                {{ $task->attachment_ori_name }}
                                            </a>
                                            </div>
                                        </td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form
                                                action="{{ url('deleteRedirect/'.$task->id) }}"
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

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Edit
                    </div>
                    <div class="panel-body">
                        @foreach ($tasks as $task)
                        <form
                            class="form-horizontal"
                            action="{{ url('updateRedirect/'.$task->id) }}"
                            method="POST"
                            enctype="multipart/form-data"
                        >
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="task-name" class="col-sm-3 control-label">
                                    Title
                                </label>

                                <div class="col-sm-6">
                                    <input type="text" name="title"
                                        id="task-title"
                                        class="form-control"
                                        value="{{ $task->title }}">
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
                                        value="{{ $task->content }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn"></i>
                                        UPDATE
                                    </button>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
