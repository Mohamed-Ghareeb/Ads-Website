@extends('back-end.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title" style="color:#FFF">Edit Category</h4>
                    <p class="card-category">From Here You Can Edit a Category</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('back.'.$routeName . '.update', ['id' => $row->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('back-end.' . $routeName . '.form')
                        <button type="submit" class="btn btn-primary pull-right">Update Category</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection