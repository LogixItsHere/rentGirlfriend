@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
        <div class="container mt-5">
            <div class="shadow rounded p-5 bg-body">
                <div class="col-lg">
                    <h2 class="mb-5">
                        Search Anyone
                    </h2>
                    <br>
                    <br>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-lg-8">
                        <form action="{{ url('/search') }}" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search a Girl">
                                <button class="btn btn-primary" type="submit" name="submit">
                                    &nbsp; Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <div class="col-lg">
                    @foreach ($girlfriends as $girlfriend)
                    <div class="card-fluid border-bottom shadow rounded">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset("/profile/". $girlfriend->gf_profile) }}" style="max-height: 200px; max-width: 200px;" alt="">
                            </div>
                            <div class="col-md-8 mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ $girlfriend->gf_name }}
                                    </h5>
                                    <p class="card-text overflow-hidden text-dark">
                                        {{ $girlfriend->gf_description }}
                                    </p>
                                    <p class="card-text">
                                        <small class="text-muted">ราคาประมาณ : {{ $girlfriend->gf_price1 }} - {{ $girlfriend->gf_price2 }} บาท</small>
                                    </p>
                                </div>

                                <div class="btn-group">
                                    <a href="{{ url('single/'.$girlfriend->id) }}" class="btn btn-primary">ดูรายละเอียดเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
