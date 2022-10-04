@extends('partials.layout')

@section('content')
    <div class="columns is-centered">
        <div class="column is-half">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">{{ __('Register') }}</p>
                </header>
                <div class="card-content">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="field">
                            <label class="label">{{ __('Name') }}</label>
                            <div class="control">
                                <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

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
                                <input class="input @error('password') is-danger @enderror" type="password" name="password" required autocomplete="new-password">
                                @error('password')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">{{ __('Password') }}</label>
                            <div class="control">
                                <input class="input @error('password_confirmation') is-danger @enderror" type="password" name="password_confirmation" required autocomplete="new-password">
                                @error('password_confirmation')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <input type="submit" class="button is-link" value="{{__('Register')}}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
