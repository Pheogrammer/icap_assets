@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Registered Users') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{ Session::get('message') }}</li>
                                </ul>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card bg-primary">
                                    <div class="card-body">
                                        <h5 class="card-title">Registered Assets</h5>
                                        <p class="card-text">This card displays a list of assets that have been registered
                                            in the system.</p>
                                        <a href="{{route('assets')}}" class="btn btn-light">View Registered Assets</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card bg-danger">
                                    <div class="card-body">
                                        <h5 class="card-title">Deleted Assets</h5>
                                        <p class="card-text">This card displays a list of assets that have been marked as
                                            deleted.</p>
                                        <a href="{{route('deletedAssets')}}" class="btn btn-light">View Deleted Assets</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card bg-success">
                                    <div class="card-body">
                                        <h5 class="card-title">Registered Users</h5>
                                        <p class="card-text">This card displays a list of registered users in the system.
                                        </p>
                                        <a href="{{route('users')}}" class="btn btn-light">View Registered Users</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card bg-info">
                                    <div class="card-body">
                                        <h5 class="card-title">Assets Kinds</h5>
                                        <p class="card-text">This card displays a list of different kinds of assets
                                            available.</p>
                                        <a href="#" class="btn btn-light">View Registered Kinds</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
