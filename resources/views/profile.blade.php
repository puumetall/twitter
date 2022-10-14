@extends('partials.layout')

@section('content')
    <div class="columns is-centered">
        <div class="column is-half">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">Profile</p>
                </header>
                <div class="card-content">
                    <form method="POST" action="/profile" enctype="multipart/form-data">
                        @csrf
                        <div class="field">
                            <label class="label">Bio</label>
                            <div class="control">
                                <textarea class="textarea @error('bio') is-danger @enderror" name="bio">{{ old('bio') ?? Auth::user()->profile->bio ?? ''}}</textarea>
                                @error('bio')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Profile image</label>
                            <div class="control">
                                <input class="input @error('image') is-danger @enderror" type="file" name="image">
                                @error('image')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Background image</label>
                            <div class="control">
                                <input class="input @error('background') is-danger @enderror" type="file" name="background">
                                @error('background')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Theme Color</label>
                            <div class="control">
                                <input class="input @error('color') is-danger @enderror" type="color" name="color" value="{{old('color') ?? Auth::user()->profile->color ?? ''}}">
                                @error('color')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <input type="submit" class="button is-link" value="Update Profile">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
