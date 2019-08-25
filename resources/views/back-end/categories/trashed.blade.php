@extends('back-end.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="card-title" style="color:#FFF">The Trashed Categories</h4>
                            <p class="card-category">Here is You Can Restore || Delete The Categories</p>
                        </div>
                        <div class="col-md-8 text-right">
                            <a href="{{ route('back.'.$routeName . '.index') }}" class="btn btn-primary btn-round bg-white" style="color:blueviolet"><i style="margin-right:10px" class="fa fa-user"></i>  The Categories</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        title
                                    </th>
                                    <th>
                                        Icon
                                    </th>
                                    <th>
                                        Control
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rows_trashed as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->title }}</td>
                                    <td><img src="{{ $row->iconPath() }}" alt="" width="100" height="100"></td>
                                    <td class="td-actions">
                                        @include('back-end.shared.buttons.restore', ['url' => route('back.categories.restore', $row)])
                                        @include('back-end.shared.buttons.delete', ['url' => route('back.categories.delete', $row)])
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection