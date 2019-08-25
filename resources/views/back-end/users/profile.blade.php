@extends('back-end.layouts.app')

@section('content')


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <img class="img" src="/uploads/users/{{ $row->image }}">
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray">{{ $row->group }}</h6>
                        <h3 class="card-title">{{ $row->name }}</h3>
                        <h4 class="card-title">{{ $row->email }}</h4>
                        @if (auth()->user()->id == $row->id)
                            <div>
                                <button onclick="$(this).next('div').slideToggle(500)" class="btn btn-primary btn-round">Edit Profile</button>
                                <div class="card card-nav-tabs text-left" id="profileCard" style="display:none;margin-top: 40px">
                                        <br />
                                    <div class="card-header card-header-primary">
                                        <h4 style="margin-top:10px;margin-bottom:5px">Update Profile</h4>
                                    </div>
                                    <div class="card-body">
                                        @include('back-end.shared.profile.form')
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
