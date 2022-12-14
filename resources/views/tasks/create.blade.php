@extends("layouts.app")

@section("content")
    @if(count($errors)>0)
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                <li class="ml-4">{{$error}}</li>
                @endforeach
            </ul>
    @endif
    
    <h1>新規タスク作成</h1>
    
    <div class="row">
        <div class="col-sm-6">
            {!! Form::open(["route"=>"tasks.store"]) !!}
            
            <div class="form-group">
                {!! Form::label("status", "進捗状況:") !!}
                {!! Form::text("status", null, ["class"=>"form-control"]) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label("content", "タスク内容:") !!}
                {!! Form::text("content", null, ["class"=>"form-control"]) !!}
            </div>
            
            {!! Form::submit("投稿", ["class"=>"btn btn-primary"]) !!}
            
            {!! Form::close() !!}
        </div>
    </div>
@endsection