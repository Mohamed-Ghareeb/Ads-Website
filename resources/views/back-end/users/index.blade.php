@extends('back-end.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title" style="color:#FFF">Users</h4>
                            <p class="card-category">Here is You Can Control The Users</p>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-round bg-white" style="color:blueviolet">Add User</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Group
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
                                        <td><a href="{{ route('users.show', ['id' => $row->id]) }}">{{ $row->name }}</a></td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->group }}</td>
                                        <td class="td-actions">
                                            @include('back-end.shared.buttons.edit')
                                            @include('back-end.shared.buttons.delete')
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