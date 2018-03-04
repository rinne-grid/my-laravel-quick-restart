@extends('layouts.app');

@section('content')
    <div class="panel-body">
        <form action="/task" method="post" class="form-horizontal">
            {{ csrf_field() }}
            @include('common.errors');
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" id="task-name">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button class="btn btn-default">
                        <i class="fa fa-plus"></i>タスクを追加
                    </button>
                </div> 
            </div>
        </form>
    </div>

    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                現在のタスク
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped task-table">
                <thead>
                    <th>タスク</th>
                    <th>&nbsp;</th>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>
                            <td>
                                <form action="/task/{{ $task->id }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger">タスク削除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
