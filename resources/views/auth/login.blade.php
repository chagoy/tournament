@extends('layouts.app')

@section('content')

<div class="column is-half is-offset-2">
    <form method="POST" action="/login">
        {{ csrf_field() }}
        <div class="field">
            <label class="label">Email</label>
            <p class="control">
                <input class="input" type="email" name="email" id="email" required>
            </p>
        </div>
        <div class="field">
            <label class="label">Password</label>
            <p class="control">
                <input class="input" type="password" name="password" id="password" required>
            </p>
        </div>
        <div class="field">
            <p class="control">
                <label class="checkbox">
                    <input type="checkbox" name="remember">Stay logged in
                </label>
            </p>    
        </div>
        <div class="field is-grouped">
            <p class="control">
                <button class="button is-primary">Submit</button>
            </p>
            <p class="control">
                <a href="{{ route('password.request') }}">Forgot</a>
            </p>
        </div>
        @include ('layouts.errors')
    </form>
</div>

@endsection
