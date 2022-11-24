@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Invitations') }}</div>

                    <div class="card-body">
                        @auth
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('invitations.index') }}" class="btn btn-primary">Show All</a>
                                </div>
                            </div>
                        @endauth

                        <hr />
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('attendances.store') }}" enctype="multipart/form-data">
                            @csrf
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="mobile-tab" data-bs-toggle="tab" data-bs-target="#mobile" type="button" role="tab" aria-controls="mobile" aria-selected="true">Mobile</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="passport-tab" data-bs-toggle="tab" data-bs-target="#passport" type="button" role="tab" aria-controls="passport" aria-selected="false">Per to passport</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="accommodation-tab" data-bs-toggle="tab" data-bs-target="#accommodation" type="button" role="tab" aria-controls="accommodation" aria-selected="false">Accommodation</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">Review</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="mobile" role="tabpanel" aria-labelledby="mobile-tab">
                                    <div class="mb-3">
                                        <label for="mobile" class="form-label">Mobile</label>
                                        <input type="number" class="form-control" name="mobile" id="mobile" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="country_code" class="form-label">Country Code</label>
                                        <input type="number" pattern="\d*" maxlength="4" class="form-control" name="country_code" id="country_code">
                                    </div>
                                    <div class="mb-3">
                                        <label for="otp_code" class="form-label">Activation Code (OTP)</label>
                                        <input type="number" class="form-control" name="otp_code" id="otp_code">
                                        <a href="#" id="resend-code" class="form-text">Click here to resend your code.</a>
                                    </div>
                                    <button type="button" class="btn btn-success btnNext">Next</button>
                                </div>
                                <div class="tab-pane fade" id="passport" role="tabpanel" aria-labelledby="passport-tab">
                                    <div class="mb-3">
                                        {{-- TODO: extract validation rule to external function --}}
                                        <label for="first_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" required oninput="this.value=this.value.replace(/[^A-Za-z\s]/g,'');">
                                        <div class="form-text">Just English letters are allowed.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" required oninput="this.value=this.value.replace(/[^A-Za-z\s]/g,'');">
                                        <div class="form-text">Just English letters are allowed.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="dob" class="form-label">Date of birth</label>
                                        <input type="date" class="form-control" name="dob" id="dob" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="gender" value="male" id="gender_male">
                                            <label class="form-check-label" for="gender_male">Male</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="gender" value="female" id="gender_female">
                                            <label class="form-check-label" for="gender_female">Female</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="birth_place" class="form-label">Place of birth:</label>
                                        <select class="form-control" name="birth_place" id="birth_place" required>
                                            <option value="KSA">KSA</option>
                                            <option value="SAR">SAR</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="country_of_residency" class="form-label">Country of residency:</label>
                                        <select class="form-control" name="country_of_residency" id="country_of_residency" required>
                                            <option value="KSA">KSA</option>
                                            <option value="SAR">SAR</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="passport_no" class="form-label">Passport No:</label>
                                        <input type="text" class="form-control" name="passport_no" id="passport_no" required minlength="6" oninput="this.value=this.value.replace(/[^A-Za-z0-9]/g,'');">
                                        <div class="form-text">Just English letters and numbers are allowed.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="issue_date" class="form-label">Issue date</label>
                                        <input type="date" class="form-control" name="issue_date" id="issue_date" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="expiry_date" class="form-label">Expiry date:</label>
                                        <input type="date" class="form-control" name="expiry_date" id="expiry_date" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="place_of_issue" class="form-label">Place of issue:</label>
                                        <select class="form-control" name="place_of_issue" id="place_of_issue" required>
                                            <option value="KSA">KSA</option>
                                            <option value="SAR">SAR</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="arrival_date" class="form-label">Arrival date:</label>
                                        <input type="date" class="form-control" name="arrival_date" id="arrival_date" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="proffesion" class="form-label">Proffesion</label>
                                        <input type="text" class="form-control" name="proffesion" id="proffesion">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ordanization" class="form-label">Organization</label>
                                        <input type="text" class="form-control" name="ordanization" id="ordanization">
                                    </div>
                                    <div class="mb-3">
                                        <label for="visa_duration" class="form-label">Visa duration:</label>
                                        <select class="form-control" name="visa_duration" id="visa_duration">

                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="visa_status" class="form-label">Visa status</label>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="visa_status" value="multiple" id="visa_status_multiple">
                                            <label class="form-check-label" for="visa_status_multiple">Multiple</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="visa_status" value="single" id="visa_status_single">
                                            <label class="form-check-label" for="visa_status_single">Single</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="passport_image">Passport image:</label>
                                        <input type="file" class="form-control" id="passport_image" name="passport_image" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="personal_image">Personal image:</label>
                                        <input type="file" class="form-control" id="personal_image" name="personal_image" />
                                    </div>
                                    <button type="button" class="btn btn-success btnNext">Next</button>
                                </div>
                                <div class="tab-pane fade show" id="accommodation" role="tabpanel" aria-labelledby="accommodation-tab">
                                    <div class="h4">Legaly stay:</div>

                                    <div class="mb-3">
                                        <label for="check_in_date" class="form-label">Check in date</label>
                                        <input type="date" class="form-control" name="check_in_date" id="check_in_date" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="check_out_date" class="form-label">Check out date</label>
                                        <input type="date" class="form-control" name="check_out_date" id="check_out_date" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Room type</label>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="room_type" value="king" id="room_type_king">
                                            <label class="form-check-label" for="room_type_king">King</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="room_type" value="twin" id="room_type_twin">
                                            <label class="form-check-label" for="room_type_twin">Twin</label>
                                        </div>
                                    </div>
                                    <div class="h4">Additional stay:</div>

                                    <div class="mb-3">
                                        <label for="add_check_in_date" class="form-label">Check in date</label>
                                        <input type="date" class="form-control" name="add_check_in_date" id="add_check_in_date" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="add_check_out_date" class="form-label">Check out date</label>
                                        <input type="date" class="form-control" name="add_check_out_date" id="add_check_out_date" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Room type</label>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="add_room_type" value="king" id="add_room_type_king">
                                            <label class="form-check-label" for="add_room_type_king">King</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="add_room_type" value="twin" id="add_room_type_twin">
                                            <label class="form-check-label" for="add_room_type_twin">Twin</label>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success btnNext">Next</button>
                                </div>
                                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <div id="review-container" class="row">

                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
    {{-- TODO: Move this section into a srparate file  --}}
    <script>
        let options = '';
        for (let index = 1; index <= 90; index++) {
            options += `<option value='${index}'>${index}</option>`;
        }
        $('#visa_duration').html(options);

        $('.btnNext').click(function() {
            const nextTabLinkEl = $('.nav-tabs .active').closest('li').next('li').find('.nav-link')[0];
            nextTabLinkEl.click();
        });

        $('.btnPrevious').click(function() {
            const prevTabLinkEl = $('.nav-tabs .active').closest('li').prev('li').find('.nav-link')[0];
            prevTabLinkEl.click();
        });

        $('#review-tab').click(function() {
            const container = $('#review-container');
            container.html('');
            $(':input:not([type=hidden])').each(function(index, item) {
                const name = $(item).attr('name');
                if (name) {
                    container.append(`<div class="col-6">${name}: ${item.value}</div>`);
                }
            });
        });
    </script>
@endsection
@endsection
