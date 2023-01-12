@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Edit Document for: ' . $document->crew->first_name . ' ' . $document->crew->last_name) }}

                        <div class="float-end">
                            <a href="{{ route('crews.view', [$document->crew->id])  }}">Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('documents.update', [$document->id]) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="input_code" class="form-label">Code</label>
                                <input type="text" name="code" value="{{ $document->code }}" class="form-control" id="input_code">
                            </div>
                            <div class="mb-3">
                                <label for="input_name" class="form-label">Name</label>
                                <input type="text" name="name" value="{{ $document->name }}" class="form-control" id="input_name">
                            </div>
                            <div class="mb-3">
                                <label for="input_document_number" class="form-label">Document Number</label>
                                <input type="text" name="document_number" value="{{ $document->document_number }}" class="form-control" id="input_document_number">
                            </div>
                            <div class="mb-3">
                                <label for="input_date_issued" class="form-label">Date Issued</label>
                                <input type="date" name="date_issued" value="{{ $document->date_issued->format('Y-m-d') }}" class="form-control" id="input_date_issued">
                            </div>
                            <div class="mb-3">
                                <label for="input_date_expiry" class="form-label">Date Expiry</label>
                                <input type="date" name="date_expiry" value="{{ $document->date_expiry->format('Y-m-d') }}" class="form-control" id="input_date_expiry">
                            </div>
                            <div class="mb-3">
                                <label for="input_remarks" class="form-label">Remarks</label>
                                <textarea name="remarks" class="form-control" id="input_remarks" rows="3">{{ $document->remarks }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a class="btn btn-light" href="{{ route('crews.view', [$document->crew->id]) }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
