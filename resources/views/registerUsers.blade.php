@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Register User') }}</div>

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
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{ Session::get('message') }}</li>
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('saveregisteredUser') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" required id="" value="{{ old('name') }}"
                                    class="form-control" placeholder="Name" aria-describedby="helpId">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" required id="" value="{{ old('email') }}"
                                    class="form-control" placeholder="Email" aria-describedby="helpId">
                            </div>
                            <br>
                            <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                                <div class="col-md-2  ">
                                    <button class="btn btn-primary" type="submit">Register</button>
                                </div>
                                <div class="col-md-2  ">
                                    <a href="{{ route('users') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
