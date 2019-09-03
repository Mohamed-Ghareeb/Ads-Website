@extends('back-end.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title" style="color:#FFF">Edit  User</h4>
                    <p class="card-category">From Here You Can Edit a Users</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('back.users.update', ['id' => $row->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('back-end.users.form')
                        <button type="submit" class="btn btn-primary pull-right">Update User</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection