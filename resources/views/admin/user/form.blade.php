@extends('layouts.app')

@section('title')
Users
@endsection

@section('css_before')
@endsection

@section('css_after')
@endsection

@section('js_after')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/pages/user.js') }}"></script>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Manage
                </div>
                <h2 class="page-title">
                    User
                </h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-fluid">
        @include('errors.formerror')
        <div class="row row-cards">
            <div class="col-12">
                <form id="userForm" method="post" class="card" enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="id" value="{{@$user->id}}">
                    <div class="card-header">
                        <h3 class="card-title">@if(@$id) Edit @else Create @endif User</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label required">Email</label>
                                    <div>
                                        <input maxlength="255" type="email" value="{{@$user->email}}" name="email" class="form-control" placeholder="Enter email" required>
                                        <small class="form-hint"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label required">User Name</label>
                                    <div>
                                        <input maxlength="255" type="text" value="{{@$user->user_name}}" name="user_name" class="form-control" placeholder="Enter name" maxlength="255" required>
                                        <small class="form-hint"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label required">User Type</label>
                                    <div class="input-group mb-2">
                                        <select class="form-control" name="role_id" required>
                                            <option value="2" @if(@$user->role_id == 2) selected @endif>Client</option>
                                            <option value="1" @if(@$user->role_id == 1) selected @endif>Admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label">Middle Name</label>
                                    <div class="input-group mb-2">
                                        <input maxlength="255" type="text" value="{{@$user->middle_name}}" name="middle_name" class="form-control" placeholder="Enter name">
                                        <small class="form-hint"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label">Date Of Birth</label>
                                    <div class="input-group mb-2">
                                        <input type="date" value="{{@$user->dob}}" name="dob" class="form-control" placeholder="Enter date" max="<?php echo date("Y-m-d"); ?>">
                                        <small class="form-hint"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label">Blood Group</label>
                                    <div class="input-group mb-2">
                                        <input maxlength="255" type="text" value="{{@$user->blood_group}}" name="blood_group" class="form-control" placeholder="Enter blood group">
                                        <small class="form-hint"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label">Region</label>
                                    <div class="input-group mb-2">
                                        <input maxlength="255" type="text" value="{{@$user->region}}" name="region" class="form-control" placeholder="Enter region">
                                        <small class="form-hint"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label">Favorite Animal</label>
                                    <div class="input-group mb-2">
                                        <input maxlength="255" type="text" value="{{@$user->favorite_animal}}" name="favorite_animal" class="form-control" placeholder="Enter favorite animal">
                                        <small class="form-hint"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label @if(!@$id) required @endif">Password</label>
                                    <div>
                                        <input maxlength="255" id="password" type="password" name="password" class="form-control" autocomplete="off"
                                        placeholder="Enter new password" @if(!@$id) required @endif>
                                        <small class="form-hint"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label @if(!@$id) required @endif">Confirm Password</label>
                                    <div>
                                        <input maxlength="255" id="password_confirmation" type="password" autocomplete="off" name="password_confirmation" class="form-control" placeholder="Confirm password" @if(!@$id) required @endif>
                                        <small id="password-hint" class="form-hint"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="d-flex">
                            <a href="{{route('user')}}" class="btn btn-link">Cancel</a>
                            <button type="submit" class="btn btn-primary ms-auto">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
