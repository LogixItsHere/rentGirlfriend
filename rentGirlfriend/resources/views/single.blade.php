@extends('layouts.app')

@section('content')
    <div class="row py-5 px-4">
        <div class="col-xl-10 mx-auto">
            <!-- Profile widget -->
            <div class="bg-white shadow rounded overflow-hidden">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        @foreach ($girlfriends->images as $img)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <img src="{{ asset('/images/' . $img->image) }}" alt=""
                                    class="img-fluid rounded shadow-sm cover-img">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="px-4 pt-3 pb-5">
                    <div class="profile">
                        <img src="{{ asset('/profile/' . $girlfriends->gf_profile) }}" alt="..."
                            class="rounded mb-2 img-thumbnail profile-img1">
                    </div>
                    <div class="row">
                        <div class="col col-sm-2">

                        </div>
                        <div class="col ">
                            <div class="media-body mb-5 text-black">
                                <h4 class="mt-0 mb-0">{{ $girlfriends->gf_name }}</h4>
                                <p class="small mb-4"> <i
                                        class="fas fa-map-marker-alt mr-2"></i>{{ $girlfriends->gf_location }}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="px-4 py-3">
                    <div class="row">
                        <div class="col-xl-10">
                            <h5 class="mb-0">About Me</h5>
                            <div class="p-4 rounded shadow-sm bg-light">
                                <p class="font-italic mb-0">{{ $girlfriends->gf_description }}</p>
                            </div>
                        </div>
                        <div class="col">
                            <h5 class="mb-0">Status</h5>
                            <div class="p-4 rounded shadow-sm bg-light">
                                <p class="font-italic mb-0">{{ $girlfriends->status == '1' ? 'Empty' : 'Full' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3">
                    <div class="row">
                        <div class="col">
                            <h5 class="mb-0">Rule Can</h5>
                            <div class="p-4 rounded shadow-sm bg-light">
                                <p class="font-italic mb-0">{{ $girlfriends->gf_rulecan }}</p>
                            </div>
                        </div>
                        <div class="col">
                            <h5 class="mb-0">Rule Can't</h5>
                            <div class="p-4 rounded shadow-sm bg-light">
                                <p class="font-italic mb-0">{{ $girlfriends->gf_rulecant }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3">
                    <div class="row">
                        <div class="col-xl-8">
                            <h5 class="mb-0">About</h5>
                            <div class="p-4 rounded shadow-sm bg-light">
                                <p class="font-italic mb-0">{{ $girlfriends->gf_aboutme }}</p>
                            </div>
                        </div>
                        <div class="col">
                            <h5 class="mb-0">Price Rates</h5>
                            <div class="table-responsive shadow-sm text-center">
                                <table class="table table-primary">
                                    <thead>
                                        <tr>
                                            <th scope="col">Price</th>
                                            <th scope="col">Button</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="">
                                            <td>{{ $girlfriends->gf_price1 }} / Talk Only</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop">
                                                    Reserve
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td>{{ $girlfriends->gf_price2 }} / Skinship</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop">
                                                    Reserve
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="p-4 rounded shadow-sm bg-light">
                                
                                <p class="font-italic mb-0">{{ $girlfriends->status == '1' ? 'Empty' : 'Full' }}</p>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="py-4 px-4 text-center">
                    <a href="{{ url('/home') }}" class="btn btn-primary rounded" style="font-size: 1.5rem;">Back To Home
                        Page</a>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ url('/') }}" method="POST" enctype="multipart/form-data">

                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Order</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Name</label>
                                    <input type="text" name="gf_name" class="form-control" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Name</label>
                                    <input type="text" name="gf_name" class="form-control" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Name</label>
                                    <input type="text" name="gf_name" class="form-control" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Name</label>
                                    <input type="text" name="gf_name" class="form-control" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Name</label>
                                    <input type="text" name="gf_name" class="form-control" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Name</label>
                                    <input type="text" name="gf_name" class="form-control" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Name</label>
                                    <input type="text" name="gf_name" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
