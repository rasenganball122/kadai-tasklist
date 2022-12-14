@extends("layouts.app")

@section("content")
    @if(Auth::check())
        
        <h1>{{ Auth::user()->name }} のタスク一覧</h1>
        
        @if (count($tasks) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>進捗状況</th>
                        <th>タスク</th>
                    </tr>            
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{!! link_to_route("tasks.show", $task->id, ["task"=>$task->id]) !!}</td>
                            <td>{!! nl2br(e($task->status)) !!}</td>
                            <td>{!! nl2br(e($task->content)) !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        
        {{--タスク作成ページへのリンク--}}
        {!! link_to_route("tasks.create", "新規タスクの投稿", [], ["class"=>"btn btn-primary"]) !!}
    
    @else
        <div class="center jumbotron">
            <<div class="text-center">
                <h1>Welcome to Tasklist!</h1>
                 {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route("signup.get", "Sign up now!", [], ["class"=>"btn btn-lg btn-primary"]) !!}
            </div>
        </div>
    @endif
@endsection