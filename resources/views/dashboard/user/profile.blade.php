@extends('dashboard.layouts.master')

@section('title', 'user')
@section('pageClass','all-user')

@section('content')
<h3 class="text-primary mb-4">Profile</h3>
                    <div class="row mb-3">
                        <div class="col-lg-12 mb-3">
                            <div class="card mb-3" style="height: 100%;">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="{{ asset('assets/img/dashboard/avatars/avatar-icon-images-4.jpg') }}" width="160" height="160"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3" style="height: 100%;">
                                        <div class="card-body">
                                            <form action="{{ url('/dashboard/user/profile/update') }}" method="POST">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="name" style="color: var(--blue);"><strong>Name</strong><br></label>
                                                            <input required value="{{ $user->name }}" class="form-control" type="text" id="username" placeholder="name" name="name" style="color: #ffffff;"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="email" style="color: var(--blue);"><strong>Email Address</strong></label><input class="form-control" type="email" id="email" disabled="" readonly="" value="{{ $user->email }}"></div>
                                                    </div>
                                                </div>
                                                <div class="form-row" style="margin-bottom: 17px;margin-top: 10px;padding: 7px;background: rgba(78,115,223,0.17);border-radius: 10px;border-style: solid;border-color: var(--blue);">
                                                    <div class="col">
                                                        <div class="form-group"><label for="password" style="color: var(--blue);"><strong>Password</strong></label><input class="form-control" type="password" name="password" style="color: #ffffff;"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="password_confirmation" style="color: var(--blue);"><strong>Confirm&nbsp;Password</strong><br></label><input class="form-control" type="password" name="password_confirmation" style="color: #ffffff;"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group"><button class="btn btn-primary btn-block btn-lg" type="submit">Save</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@stop
