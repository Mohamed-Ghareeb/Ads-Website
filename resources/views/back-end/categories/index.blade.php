@extends('back-end.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="card-title" style="color:#FFF">Categories</h4>
                            <p class="card-category">Here is You Can Control The Categories</p>
                        </div>
                        {{-- <div class="col-md-2"></div>
                        <div class="col-md-4 text-right">
                        </div> --}}
                        <div class="col-md-8 text-right">
                            @if (count($rows_trashed) > 0)
                                <a href="{{ route('back.categories_trashed') }}" class="btn btn-primary btn-round bg-white" style="color:blueviolet"><i style="margin-right:10px" class="fa fa-trash"></i> The Trashed Records</a>
                            @endif
  
                            <a href="{{ route('back.'.$routeName . '.create') }}" class="btn btn-primary btn-round bg-white" style="color:blueviolet"><i style="margin-right:10px" class="fa fa-plus"></i>  Add Category</a>
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
                                @foreach ($rows as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td><img src="{{ $row->iconPath() }}" alt="" width="100" height="100"></td>
                                        <td class="td-actions">
                                            @include('back-end.shared.buttons.edit', ['url' => route('back.' . $routeName . '.edit', $row)])
                                            @include('back-end.shared.buttons.destroy', ['url' => route('back.' . $routeName . '.destroy', $row)])
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