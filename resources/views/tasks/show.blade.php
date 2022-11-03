@extends("layouts.app")

@section("content")
    <h1>タスク{{ $task->id}}の詳細ページ</h1>
    
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{$task->id}}</td>
        </tr>
        <tr>
            <th>タスク内容</th>
            <td>{!! nl2br(e($task->content)) !!}</td>
        </tr>
        <tr>
            <th>進捗状況</th>
            <td>{!! nl2br(e($task->status)) !!}</td>
        </tr>
    </table>
    
    {{--タスク編集ページへのリンク--}}
    {!! link_to_route("tasks.edit", "このタスクを編集", ["task"=>$task->id], ["class"=>"btn btn-light"]) !!}
    
    @if(Auth::id()==$task->user_id)
        {{--タスクの削除--}}
        {!! Form::model($task, ["route"=>["tasks.destroy", $task->id], "method"=>"delete"]) !!}
            {!! Form::submit("削除", ["class"=>"btn btn-danger"]) !!}
        {!! Form::close() !!}
    @endif
@endsection