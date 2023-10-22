@extends('base')
@section('content')

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }
    .result-card {
        margin: 40px auto;
        max-width: 600px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }
    .result-card h2 {
        font-size: 24px;
        margin-bottom: 20px;
        border-bottom: 2px solid #f8f9fa;
        padding-bottom: 10px;
    }
    .result-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
    }
    .result-row:last-child {
        margin-bottom: 0;
    }
    .label {
        font-weight: bold;
        color: #6c757d;
    }
    .value {
        color: #333;
    }
</style>

<section class="page--verify wrapper">
    <div class="container py-3">
        
        <div class="result-card">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <h2>Personal Information</h2>

            @if($data->is_verified == 0)
            <p>Please verify your information</p>
            @endif
            <div class="result-row">
                <div class="label">Company Name</div>
                <div class="value" id="displayCompanyName">{{ $data->company }}</div>
            </div>
            <div class="result-row">
                <div class="label">First Name</div>
                <div class="value" id="displayFirstName">{{ $data->first_name }}</div>
            </div>
            <div class="result-row">
                <div class="label">Last Name</div>
                <div class="value" id="displayLastName">{{ $data->last_name }}</div>
            </div>
            <div class="result-row">
                <div class="label">Phone</div>
                <div class="value" id="displayPhone">{{ $data->phone }}</div>
            </div>
            <div class="result-row">
                <div class="label">Mobile Phone</div>
                <div class="value" id="displayMobilePhone">{{ $data->mobile_phone }}</div>
            </div>
            <div class="result-row">
                <div class="label">Email</div>
                <div class="value" id="displayEmail">{{ $data->email }}</div>
            </div>
            <div class="result-row">
                <div class="label">Website</div>
                <div class="value" id="displayWebsite">{{ $data->website }}</div>
            </div>
            <div class="result-row">
                <div class="label">Address</div>
                <div class="value" id="displayAddress">{{ $data->address }}</div>
            </div>
            <div class="result-row">
                <div class="label">City</div>
                <div class="value" id="displayCity">{{ $data->city }}</div>
            </div>
            <div class="result-row">
                <div class="label">State</div>
                <div class="value" id="displayState">{{ $data->state }}</div>
            </div>
            <div class="result-row">
                <div class="label">Zip</div>
                <div class="value" id="displayZip">{{ $data->zip }}</div>
            </div>
            @if($data->is_verified == 0)
            <form action="{{route('verify.now', $data->id)}}" method="post">
            {{ csrf_field() }}
                <div class="container text-center">
                    <button type="submit" class="btn btn-primary">
                        Verify Now
                    </button>
                </div>
            </form>
            @else 
                 <div class="container text-center">
                    <button type="submit" class="btn btn-primary" disabled>
                        Verified
                    </button>
                </div>
            @endif
        </div>

    </div>
</section>
