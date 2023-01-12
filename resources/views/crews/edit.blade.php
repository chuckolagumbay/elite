@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Edit Crew: ') }}
                    </div>

                    <div class="card-body">
                        <form action="{{ route('crews.update', [$crew->id]) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="input_first_name" class="form-label">First Name</label>
                                <input type="text" name="first_name" value="{{ $crew->first_name }}" class="form-control" id="input_first_name">
                            </div>
                            <div class="mb-3">
                                <label for="input_last_name" class="form-label">Last Name</label>
                                <input type="text" name="last_name" value="{{ $crew->last_name }}" class="form-control" id="input_last_name">
                            </div>
                            <div class="mb-3">
                                <label for="input_middle_name" class="form-label">Middle Name</label>
                                <input type="text" name="middle_name" value="{{ $crew->middle_name }}" class="form-control" id="input_middle_name">
                            </div>
                            <div class="mb-3">
                                <label for="input_email" class="form-label">Email Address</label>
                                <input type="email" name="email" value="{{ $crew->email }}" class="form-control" id="input_email">
                            </div>
                            <div class="mb-3">
                                <label for="input_address" class="form-label">Address</label>
                                <textarea name="address" class="form-control" id="input_address" rows="3">{{ $crew->address }}</textarea>
{{--                                <input type="text" class="form-control" id="input_first_name">--}}
                            </div>
                            <div class="mb-3">
                                <label for="input_education" class="form-label">Education</label>
                                <textarea name="education" class="form-control" id="input_education" rows="3">{{ $crew->education }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="input_contact" class="form-label">Contact</label>
                                <input type="text" name="contact" value="{{ $crew->contact }}" class="form-control" id="input_contact">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a class="btn btn-light" href="{{ route('crews') }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
