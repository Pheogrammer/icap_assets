@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Reports') }}</div>

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

                        <a href="{{route('generateRegisteredAssetsReport')}}" class="btn btn-primary"> Generate Report for Registered Assets </a> <br>
                        <hr>
                        <a href="{{route('generateDeletedAssetsReport')}}" class="btn btn-primary"> Generate Report for Deleted Assets </a> <br>
                        <hr>
                        <a href="" class="btn btn-primary"> Generate Report for All Assets (Deleted and Registered)
                        </a> <br>
                        <hr>
                        <div> Generate Report for Assets by Kind </div> <br>
                        <form action="" method="get">
                            <div class="form-group">
                                <label for="">Select Kind</label>
                                <select type="date" name="asset_kind" required id=""
                                    value="{{ old('asset_kind') }}" class="form-control" placeholder="Asset Kind"
                                    aria-describedby="helpId">
                                    <option value="" selected>Select Asset Kind</option>
                                    @foreach ($kinds as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <button class="btn btn-primary" type="submit">Generate</button>
                            </div>
                        </form>
                        <hr>
                        <div> Generate Report for Assets by Status </div> <br>
                        <form action="" method="get">
                            <div class="form-group">
                                <label for="">Select Status</label>
                                <select type="date" name="asset_status" required id=""
                                    value="{{ old('asset_status') }}" class="form-control" placeholder="Asset Status"
                                    aria-describedby="helpId">
                                    <option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                                <br>
                                <button class="btn btn-primary" type="submit">Generate</button>
                            </div>
                        </form>
                        <hr>
                        <a href="" class="btn btn-primary"> Generate Report for All Users </a> <br>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
