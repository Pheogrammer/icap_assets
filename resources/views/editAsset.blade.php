@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                            <div class="col  ">
                                {{ __('Update Assets Details') }}
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

                        <form action="{{ route('updateAsset') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" value="{{ $asset->id }}" name="id" hidden>

                            <div class="form-group">
                                <label for="">Asset Name</label>
                                <input type="text" name="asset_name" required id=""
                                    value="{{ $asset->asset_name }}" class="form-control" placeholder="Asset Name"
                                    aria-describedby="helpId">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Asset Number</label>
                                <input type="text" name="asset_number" required id=""
                                    value="{{ $asset->asset_number }}" class="form-control" placeholder="Asset Number"
                                    aria-describedby="helpId">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Asset Kind</label>
                                <select type="date" name="asset_kind" required id=""
                                    value="{{ old('asset_kind') }}" class="form-control" placeholder="Asset Kind"
                                    aria-describedby="helpId">
                                    <option value="{{ $asset->kind_id }}" selected>{{ $asset->kind->name }}</option>
                                    @foreach ($kinds as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Purchase Date</label>
                                <input type="date" name="purchase_date" required id="purchase_date"
                                    value="{{ $asset->purchase_date }}" class="form-control" placeholder="Purchase Date"
                                    aria-describedby="helpId" max="{{ date('Y-m-d') }}">
                            </div>

                            <br>
                            <div class="form-group">
                                <label for="">Asset Status</label>
                                <select type="date" name="asset_status" required id=""
                                    value="{{ old('asset_status') }}" class="form-control" placeholder="Asset Status"
                                    aria-describedby="helpId">
                                    <option value="{{ $asset->status }}">{{ $asset->status }}</option>
                                    <option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            <br>
                            <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                                <div class="col-md-2  ">
                                    <button class="btn btn-primary" type="submit">Update</button>
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
