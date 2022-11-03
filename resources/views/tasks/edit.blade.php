@extends("layouts.app")

@section("content")
    @if(count($errors)>0)
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                <li class="ml-4">{{$error}}</li>
                @endforeach
            </ul>
    @endif
    
    <h1>タスク{{$task->id}}の編集ページ</h1>
    
    <div class="row">
        <div class="col-sm-6">
            {!! Form::model($task, ["route"=>["tasks.update", $task->id], "method"=>"put"]) !!}
                <div class="form-group">
                {!! Form::label("status", "進捗状況:") !!}
                {!! Form::text("status", null, ["class"=>"form-control"]) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label("content", "タスク内容") !!}
                    {!! Form::text("content", null, ["class"=>"form-control"])!!}
                </div>
                
                {!! Form::submit("更新", ["class"=>"btn btn-light"]) !!}
            
            {!! Form::close() !!}
        </div>
    </div>
@endsection