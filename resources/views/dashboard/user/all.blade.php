@extends('dashboard.layouts.master')

@section('title', 'user')
@section('pageClass','all-user')

@section('content')
    <span class="title">@yield('title'):</span>
    <div class="content">
        <table class="table" border="0">
            <thead>
                <th>#</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Country</th>
                <th>Region</th>
                <th>City</th>
                <th>Street</th>
                <th>Zip_code</th>
                <th>State</th>
                <th>Joined at</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->fname }}</td>
                    <td>{{ $user->lname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->country }}</td>
                    <td>{{ $user->region }}</td>
                    <td>{{ $user->city }}</td>
                    <td>{{ $user->street }}</td>
                    <td>{{ $user->zip_code }}</td>
                    <td>@if($user->state) <span class="text success">active</span> @else <span class="text danger">Suspended</span> @endif</td>
                    <td>{{ $user->created_at }}</td>
                    <td><a href="{{ url('/dashboard/user/suspend/'.$user->id) }}" class="action text danger">Suspend</a></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td>#</td>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Country</th>
                    <th>Region</th>
                    <th>City</th>
                    <th>Street</th>
                    <th>Zip code</th>
                    <th>State</th>
                    <th>Joined at</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
@stop
