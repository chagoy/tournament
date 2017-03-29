@extends('layouts.app')

@section('content')
<div class="column is-half">
    <div class="content">
        <form method="post" action="/register">
            {{ csrf_field() }}
            <div class="field">
                <p class="control">
                    <label class="label" for="name">Name</label>
                    <input class="input" type="text" name="name" id="name" required>
                </p>
            </div>
            <div class="field">
                <p class="control">
                    <label class="label" for="email">Email Address</label>
                    <input class="input" type="email" name="email" id="email" required>
                </p>
            </div>
            <div class="field">
                <p class="control">
                    <label class="label" for="password">Password</label>
                    <input class="input" type="password" name="password" id="password" required>
                </p>
            </div>
            <div class="field">
                <p class="control">
                    <label class="label" for="password_confirmation">Confirm Password</label>
                    <input class="input" type="password" name="password_confirmation" required>
                </p>
            </div>
            <div class="field">
                <p class="control">
                <button type="submit" class="button is-primary">Register</button>
                </p>
            </div>
            @include ('layouts.errors')
        </form>
    </div>
</div>
@endsection
