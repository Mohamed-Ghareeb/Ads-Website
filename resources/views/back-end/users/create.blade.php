@extends('back-end.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title" style="color:#FFF">Add {{ $singleModuleName }}</h4>
                    <p class="card-category">From Here You Can Create a {{ $moduleName }}</p>
                </div>
                <div class="card-body">
                    <form action="{{ route($routeName . '.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('back-end.' . $routeName . '.form')
                        <button type="submit" class="btn btn-primary pull-right">Add User</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection