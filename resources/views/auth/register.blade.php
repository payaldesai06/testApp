@extends('layouts.auth')

@section('content')
<form method="POST" action="{{ route('register') }}" class="card card-md">
    @csrf
    <div class="card-body">
        <h2 class="mb-3 text-center">{{ __('auth.register') }}</h2>
        <div class="mb-3">
            <label class="form-label required">User Name</label>
            <input type="text" maxlength="255" name="user_name" value="{{ old('username') }}" required autofocus autocomplete="user_name"
                class="form-control" placeholder="User name" tabindex="1">
        </div>
        <div class="mb-3">
            <label class="form-label required">{{ __('auth.fields.email') }}</label>
            <input type="email" maxlength="255" name="email" value="{{ old('email') }}" required class="form-control"
                placeholder="{{ __('auth.placeholder.email') }}" tabindex="2">
        </div>
        <div class="mb-3">
            <label class="form-label">Middle Name</label>
            <input type="text" maxlength="255" name="middle_name" value="{{ old('name') }}" autofocus autocomplete="middle_name"
                class="form-control" placeholder="Middle Name" tabindex="1">
        </div>
        <div class="mb-3">
            <label class="form-label">Region</label>
            <input type="text" maxlength="255" name="region" value="{{ old('region') }}" autofocus autocomplete="region"
                class="form-control" placeholder="Region" tabindex="1">
        </div>
        <div class="mb-3">
            <label class="form-label">Date Of Birth</label>
            <input type="date" name="dob" value="{{ old('dob') }}" max="<?php echo date("Y-m-d"); ?>" autofocus autocomplete="dob"
                class="form-control" placeholder="Date Of Birth" tabindex="1">
        </div>
        <div class="mb-3">
            <label class="form-label">Blood Group</label>
            <input type="text" maxlength="255" name="blood_group" value="{{ old('blood_group') }}" autofocus autocomplete="blood_group"
                class="form-control" placeholder="Blood Group" tabindex="1">
        </div>
        <div class="mb-3">
            <label class="form-label">Favorite Animal</label>
            <input type="text" maxlength="255" name="favorite_animal" value="{{ old('favorite_animal') }}" autofocus autocomplete="favorite_animal"
                class="form-control" placeholder="Favorite Animal" tabindex="1">
        </div>
        <div class="mb-3">
            <label class="form-label required">{{ __('auth.fields.password') }}</label>
            <div class="input-group input-group-flat">
                <input type="password" maxlength="255" name="password" required autocomplete="new-password" class="form-control"
                    placeholder="{{ __('auth.placeholder.password') }}" tabindex="3">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label required">{{ __('auth.fields.passwordconfirmation') }}</label>
            <input type="password" name="password_confirmation" required autocomplete="new-password"
                class="form-control" placeholder="{{ __('auth.placeholder.passwordconfirmation') }}" tabindex="4">
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary btn-block"
                tabindex="5">{{ __('auth.registerbutton') }}</button>
        </div>
    </div>
</form>
<div class="text-center text-muted">
    <a href="{{ route('login') }}" tabindex="-1">{{ __('auth.login') }}</a>
</div>
@endsection
