@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Girlfriend
                        <a href="{{ url('admin/girlfriend/') }}" class="btn btn-primary btn-sm float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/girlfriend') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" name="gf_name" class="form-control" />    
                            @error('gf_name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Localtion</label>
                                <input type="text" name="gf_location" class="form-control" />    
                            @error('gf_location')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Price Normal Date</label>
                                <input type="text" name="gf_price1" class="form-control" />
                            @error('gf_price1')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Price Skinship Date</label>
                                <input type="text" name="gf_price2" class="form-control" />
                            @error('gf_price2')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Rule Can</label>
                                <input type="text" name="gf_rulecan" class="form-control" />
                            @error('gf_rulecan')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Rule Can't</label>
                                <input type="text" name="gf_rulecant" class="form-control" />
                            @error('gf_rulecant')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Description</label>
                                <input type="text" name="gf_description" class="form-control" />
                            @error('gf_description')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>About Me</label>
                                <textarea name="gf_aboutme" class="form-control" rows="3"></textarea>
                            @error('gf_aboutme')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            </div>
                            <div class="col-md-12">
                                <h4>Image Import</h4>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Profile</label>
                                <input type="file" name="gf_profile" class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Cover Image</label>
                                <input type="file" class="form-control" name="images[]" multiple />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label> Status</label><br/>
                                <input type="checkbox" name="status" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <button type="submit" class="btn btn-primary float-end">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
