@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-5 text-success"><i class="bi bi-person-workspace"></i> User Administration</h1>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Permission</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $permissions[$user->level] }}</td>
                                <td class="text-end">
                                    <div class="btn-group" role="group" aria-label="User"><a
                                            href="/updateuser/{{ $user->id }}" class="btn btn-success btn-sm"><i
                                                class="bi bi-pencil-square"></i> Edit</a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteUser{{ $user->id }}"
                                            class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="deleteUser{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title text-white" id="exampleModalLabel">Are you sure??</h5>
                                            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            This action cannot be undone!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <a href="/deleteuser/{{ $user->id }}" class="btn btn-danger">Yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        @endforeach




                    </tbody>
                </table>
                {{ $users->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
@endsection
