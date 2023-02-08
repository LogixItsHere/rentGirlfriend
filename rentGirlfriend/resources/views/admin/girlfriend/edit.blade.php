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
                    <form action="{{ url('admin/girlfriend/update/' . $girlfriends->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" name="gf_name" value="{{ $girlfriends->gf_name }}"
                                    class="form-control" />
                                @error('gf_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Localtion</label>
                                <input type="text" name="gf_location" value="{{ $girlfriends->gf_location }}"
                                    class="form-control" />
                                @error('gf_localtion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Price Normal Date</label>
                                <input type="text" name="gf_price1" value="{{ $girlfriends->gf_price1 }}"
                                    class="form-control" />
                                @error('gf_price1')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Price Skinship Date</label>
                                <input type="text" name="gf_price2" value="{{ $girlfriends->gf_price2 }}"
                                    class="form-control" />
                                @error('gf_price2')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Rule Can</label>
                                <input type="text" name="gf_rulecan" value="{{ $girlfriends->gf_rulecan }}"
                                    class="form-control" />
                                @error('gf_rulecan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Rule Can't</label>
                                <input type="text" name="gf_rulecant" value="{{ $girlfriends->gf_rulecant }}"
                                    class="form-control" />
                                @error('gf_rulecant')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Description</label>
                                <input type="text" name="gf_description" value="{{ $girlfriends->gf_description }}"
                                    class="form-control" />
                                @error('gf_description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>About Me</label>
                                <textarea name="gf_aboutme" class="form-control" rows="3">{{ $girlfriends->gf_aboutme }}</textarea>
                                @error('gf_aboutme')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <h4>Image Import</h4>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Profile</label>
                                <input type="file" name="gf_profile" class="form-control" />
                                <img src="{{ asset('/profile/' . $girlfriends->gf_profile) }}"
                                    style="max-height: 100px; max-width: 100px;" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Cover Image</label>
                                <input type="file" class="form-control" name="images[]" multiple />
                                @foreach ($girlfriends->images as $img)
                                    <img src="/images/{{ $img->image }}" class="img-responsive"
                                        style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                                @endforeach
                            </div>
                            <div class="col-md-6 mb-3">
                                <label> Status</label><br />
                                <input type="checkbox" name="status" {{ $girlfriends->status == '1' ? 'checked' : '' }} />
                            </div>
                            <div class="col-md-6 mb-3">
                                <button type="submit" class="btn btn-primary float-end">Save</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-lg-3">
                        @if (count($girlfriends->images) > 0)
                            <p>Delete Covers:</p>
                            @foreach ($girlfriends->images as $img)
                                <form action="/admin/girlfriend/deleteimage/{{ $img->id }}" method="post">
                                    <button class="btn text-danger">X</button>
                                    @csrf
                                    @method('delete')
                                </form>
                                <img src="/images/{{ $img->image }}" class="img-responsive"
                                    style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
