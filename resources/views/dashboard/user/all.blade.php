@extends('dashboard.layouts.master')

@section('title', 'user')
@section('pageClass','all-user')

@section('content')
<h4 class="text-primary mb-4">Users</h4>
<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
            <table class="table table-striped table-hover table-sm my-0" id="dataTable">
                <thead>
                    <tr>
                        <th></th>
                        <th><strong>Name</strong><br></th>
                        <th><strong>Email</strong></th>
                        <th><strong>Country</strong></th>
                        <th><strong>Region</strong></th>
                        <th><strong>City</strong></th>
                        <th><strong>Street</strong></th>
                        <th class="text-nowrap"><strong>Zip code</strong><br></th>
                        <th class="text-nowrap"><strong>Joined at</strong><br></th>
                        <th><br></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr @if ($user->state == 0) class="bg-danger" @endif>
                        <td>{{ $user->id }}</td>
                        <td class="text-nowrap"><img class="rounded-circle mr-2" width="30" height="30" src="{{ asset('assets/img/dashboard/avatars/avatar-icon-images-4.jpg') }}">{{ $user->fname }} {{ $user->lname }}</td>
                        <td class="text-nowrap">{{ $user->email }}</td>
                        <td class="text-nowrap">{{ $user->country }}</td>
                        <td class="text-nowrap">{{ $user->region }}</td>
                        <td class="text-nowrap">{{ $user->city }}</td>
                        <td class="text-nowrap">{{ $user->street }}</td>
                        <td class="text-nowrap">{{ $user->zip_code }}</td>
                        <td class="text-nowrap">{{ $user->created_at }}</td>
                        <td class="text-nowrap">
                            @if ($user->state == 1)
                            <a href="{{ url('/dashboard/user/suspend/'.$user->id) }}" class="btn btn-danger btn-sm" role="button">Suspend</a>
                            @else
                            <a href="{{ url('/dashboard/user/activate/'.$user->id) }}" class="btn btn-success btn-sm" role="button">Activate</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td><strong>Name</strong><br></td>
                        <td><strong>Email</strong></td>
                        <td><strong>Country</strong></td>
                        <td><strong>Region</strong></td>
                        <td><strong>City</strong></td>
                        <td><strong>Street</strong></td>
                        <td class="text-nowrap"><strong>Zip code</strong><br></td>
                        <td class="text-nowrap"><strong>Joined at</strong><br></td>
                        <td><br></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@stop
