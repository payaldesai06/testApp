@extends('layouts.app')

@section('title')
Users
@endsection

@section('css_before')
@endsection

@section('css_after')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
@endsection

@section('js_after')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
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
            <!-- Page title actions -->
            {{-- @if(Commonhelper::checkPermission('user-create')) --}}
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{route('user.add')}}" class="btn btn-primary d-none d-sm-inline-block">
                            Create User
                        </a>
                    </div>
                </div>
            {{-- @endif --}}
        </div>
    </div>
</div>
<div class="page-body" id="UserTableList">
    <div class="container-fluid">
        @include('errors.formerror')
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div id="users">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal modal-blur fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Delete</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete this?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="#" data-id="" id="deleteUser" class="btn btn-primary deleteUrl">Yes</a>
        </div>
    </div>
</div>
@endsection
