@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Crew: ' . $document->crew->first_name . ' ' . $document->crew->last_name) }}
                        <div class="float-end">
                            <a href="{{ route('crews.view', [$document->crew->id]) }}">Back to Crew</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <p><strong>Code:</strong><br> {{ $document->code }}</p>
                        <p><strong>Name:</strong><br> {{ $document->name }}</p>
                        <p><strong>Document Number:</strong><br> {{ $document->document_number }}</p>
                        <p><strong>Date Issued:</strong><br> {{ $document->date_issued }}</p>
                        <p><strong>Date Expiry:</strong><br> {{ $document->date_expiry }}</p>
                        <p><strong>Remarks:</strong><br> {{ $document->remarks }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
