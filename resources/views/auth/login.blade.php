@extends('partials.layout')

@section('content')
    <div class="columns is-centered">
        <div class="column is-half">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">{{ __('Login') }}</p>
                </header>
                <div class="card-content">
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="field">
                        <label class="label">{{ __('Email Address') }}</label>
                        <div class="control">
                            <input class="input @error('email') is-danger @enderror" type="text" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">{{ __('Password') }}</label>
                        <div class="control">
                            <input class="input @error('password') is-danger @enderror" type="password" name="password" required autocomplete="current-password">
                            @error('password')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <label class="checkbox">
                                <input type="checkbox" name="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            <input type="submit" class="button is-link" value="{{__('Login')}}">
                        </div>
                        <div class="control">
                            @if (Route::has('password.request'))
                                <a class="button is-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
