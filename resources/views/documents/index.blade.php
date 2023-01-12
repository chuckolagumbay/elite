@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Crew Listing') }}
                        <div class="float-end">
                            <a href="{{ route('crews.create') }}">Add Crew</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Middle Name</th>
                                <th scope="col">Email</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if ($crews->count())
                                    @foreach ($crews as $crew)
                                        <tr>
                                            <td>{{ $crew->first_name }}</td>
                                            <td>{{ $crew->last_name }}</td>
                                            <td>{{ $crew->middle_name }}</td>
                                            <td>{{ $crew->email }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('crews.view', [$crew->id]) }}">view</a> |
                                                <a href="{{ route('crews.edit', [$crew->id]) }}">edit</a> |
                                                <a href="{{ route('crews.delete', [$crew->id]) }}" class="text-danger">delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">No Records Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
