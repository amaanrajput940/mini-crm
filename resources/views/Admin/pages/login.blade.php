@extends('layouts.auth.auth')

@section('content')

    <div class="text-center">
        <form class="form-signin" method="post" action="{{url('admin/post-signin')}}">
            {{ csrf_field() }}
            <h2><strong>CRM</strong></h2>
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            @if ($errors->has('email'))
                <span class="error">{{ $errors->first('email') }}</span>
            @endif

            @if ($errors->has('password'))
                <span class="error">{{ $errors->first('password') }}</span>
            @endif

            @if(session()->has('invalid_credentials'))
                <div class="alert alert-danger">
                    {{ session()->get('invalid_credentials') }}
                </div>
            @endif

            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
        </form>
    </div>
@stop
