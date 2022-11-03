@extends("layouts.app")

@section("content")
    <div text-center>
        <h1>Log in</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::open(["route"=>"login.post"]) !!}
                <div class="form-group">
                    {!! Form::label("email", "Email") !!}
                    {!! Form::text("email", null, ["class"=>"form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label("password", "Password") !!}
                    {!! Form::text("password", null, ["class"=>"form-control"]) !!}
                </div>
                {!! Form::submit("Login", ["class"=>"btn btn-primary btn-block"]) !!}
            {!! Form::close() !!}
            {{-- ユーザ登録ページへのリンク --}}
            <p class="mt-2">New user?{!! link_to_route("signup.get", "Sign up Now!") !!}</p>
        </div>
    </div>
@endsection