@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                            <div class="col">
                                {{ __('Registered Assets') }}
                            </div>
                            <div class="col">
                                <a href="{{ route('registerNewAsset') }}" class="btn btn-primary float-end">Add New Asset</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
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

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Asset Number</th>
                                    <th>Kind</th>
                                    <th>Purchased On</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($assets as $item)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $item->asset_name }}</td>
                                        <td>{{$item->asset_number}}</td>
                                        <td>{{ $item->kind->name }}</td>
                                        <td>{{ $item->purchase_date }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <a href="{{route('editAsset',$item->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('deleteAsset', $item->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this asset?')">Delete</a>
                                        </td>
                                        @php
                                            $i++;
                                        @endphp
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
