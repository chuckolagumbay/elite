@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Crew: ' . $crew->first_name . ' ' . $crew->last_name) }}
                        <div class="float-end">
                            <a href="{{ route('crews') }}">Back to listing</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <p><strong>First Name:</strong><br> {{ $crew->first_name }}</p>
                        <p><strong>Last Name:</strong><br> {{ $crew->last_name }}</p>
                        <p><strong>Middle Name:</strong><br> {{ $crew->middle_name }}</p>
                        <p><strong>Email:</strong><br> {{ $crew->email }}</p>
                        <p><strong>Address:</strong><br> {{ $crew->address }}</p>
                        <p><strong>Education:</strong><br> {{ $crew->education }}</p>
                        <p><strong>Contact Details:</strong><br> {{ $crew->contact }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        {{ __('Documents') }}
                        <div class="float-end">
                            <a href="{{ route('documents.create', [$crew->id]) }}">Add Document</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Code</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Document #</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if ($crew->document->count())
                                    @foreach ($crew->document as $document)
                                        <tr>
                                            <td>{{ $document->code }}</td>
                                            <td>{{ $document->name }}</td>
                                            <td>{{ $document->document_number }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('documents.view', [$document->id]) }}">view</a> |
                                                <a href="{{ route('documents.edit', [$document->id]) }}">edit</a> |
                                                <a href="{{ route('documents.delete', [$document->id]) }}" class="text-danger">delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">No Records Found</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
