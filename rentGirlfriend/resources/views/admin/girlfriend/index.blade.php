@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Girlfriend List
                        <a href="{{ url('admin/girlfriend/create') }}" class="btn btn-primary btn-sm float-end">Add
                            Girlfriend</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Normal Price</th>
                                <th>Skinship Price</th>
                                <th>Rule Can</th>
                                <th>Rule Can't</th>
                                <th>Desc</th>
                                <th>About Me</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($girlfriends as $girlfriend)
                                <tr>
                                    <td>{{ $girlfriend->id }}</td>
                                    <td>{{ $girlfriend->gf_name }}</td>
                                    <td>{{ $girlfriend->gf_location }}</td>
                                    <td>{{ $girlfriend->gf_price1 }}</td>
                                    <td>{{ $girlfriend->gf_price2 }}</td>
                                    <td>{{ $girlfriend->gf_rulecan }}</td>
                                    <td>{{ $girlfriend->gf_rulecant }}</td>
                                    <td>{{ $girlfriend->gf_description }}</td>
                                    <td>{{ $girlfriend->gf_aboutme }}</td>
                                    <td>{{ $girlfriend->status == '1' ? 'Empty' : 'Full' }}</td>
                                    <td><a href="{{ url('admin/girlfriend/edit/'.$girlfriend->id) }}"
                                            class="btn btn-outline-success">Edit</a></td>
                                    <td>
                                        <form action="{{ url('admin/girlfriend/delete/'.$girlfriend->id) }}" method="post">
                                          @csrf
                                          @method('DELETE')
                                          <button class="btn btn-outline-danger"
                                              onclick="return confirm('Are You Sure ?');" type="submit">Del</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
