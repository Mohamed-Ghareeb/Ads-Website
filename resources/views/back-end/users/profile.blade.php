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
                        <h4 class="card-title">{{ $row->name }}</h4>
                        <p class="card-description">
                            Don't be scared of the truth because we need to restart the human foundation in truth And I
                            love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                        </p>
                        <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection