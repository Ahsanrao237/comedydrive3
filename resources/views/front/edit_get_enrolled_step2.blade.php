@extends('front/layout/layout')
@section('page_title','| Get Enrolled')
@section('content')
<section class="entrolled-sec">
   <div class="container">
      @if ($errors->any())
      <div class = 'alert alert-danger' role="alert">
         <h5 class="alert-heading">Something went wrong!</h5>
         <hr>
         <div class="alert-body">
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      </div>
      @endif
      <div class="contact-text">
         <div class="question-hd">
            <h1>Update Profile</h1>
         </div>
      </div>
      <form method="POST" action="{{ route('update_get_enrolled_step2') }}">
         @csrf
         <div class="row">
            <div class="col-md-12">
               <div class="field">
                  <input type="hidden"  name="session_state" value="{{ Session::get('user_state_id') }}" required>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <input type="text" placeholder="First Name*"  name="firstname" value="{{ $student_detail->firstname ?? old('firstname') }}" required>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <input type="text" placeholder="Middle Name*"  name="middlename" value="{{ $student_detail->middlename ?? old('middlename') }}" required>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <input type="text" placeholder="Last Name*"  name="lastname" value="{{ $student_detail->lastname ?? old('lastname') }}" required>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <input type="text" placeholder="Telephone*"  name="telephone" value="{{ $student_detail->telephone ?? old('telephone') }}" required>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <select name="gender" id="gender" required>
                     <option value="" selected disabled>Select Gender*</option>
                     <option value="Male" {{($student_detail->gender == 'Male') ? 'selected' : ''  }}>Male</option>
                     <option value="Female" {{($student_detail->gender == 'Female') ? 'selected' : ''  }}>Female</option>
                  </select>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <input type="date" placeholder="Date of Birth*"  name="dob" value="{{ $student_detail->dob ?? old('dob') }}" required>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <select name="drivers_license_state_id" id="drivers_license_state_id" required>
                     <option value="" selected disabled>Select Drivers License State*</option>
                     @foreach ($states as $state) 
                     <option value="{{$state->id}}"  {{($student_detail->drivers_license_state_id == $state->id) ? 'selected' : ''  }}> {{ $state->name }}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <input type="text" placeholder="Driver's License Number*" name="drivers_license_number" value="{{ $student_detail->drivers_license_number ?? old('drivers_license_number') }}" required>
               </div>
            </div>
            @if(Session::get('user_state_id') == '3')
            <div class="col-md-12">
               <div class="cbx-field">
                  <label class="customCheck" for="non_texas_license_cbx">Not Texas License
                  <input type="checkbox" name="texas_checkbox" id="non_texas_license_cbx" value='non texas license'>
                  <span class="checkmark"></span></label><br>
               </div> 
            </div>
            @endif
            <div class="col-md-12">
               <div class="field">
                  <input type="text" placeholder="Confirm Driver's License Number*" name="confirm_drivers_license_number" value="{{ $student_detail->drivers_license_number ?? old('confirm_drivers_license_number') }}" required>
               </div>
            </div>
            @if(Session::get('user_state_id') == '3')
            <div class="texas_fields col-md-12">
               <div class="field">
                  <input type="text" placeholder="Driver's License Plate Number (Maybe yours or Family Members - Not Necessarily Vehicle Ticketed in)*"  name="license_plate_number" value="{{ $student_detail->license_plate_number ?? old('license_plate_number') }}" required>
               </div>
            </div>
            @endif
            @if(Session::get('user_state_id') == '3')
            <div class="col-md-12">
               <div class="cbx-field">
                  <label class="customCheck"  for="vehicle_not_registered_cbx">Vehicle Not Registered In Texas. Is leased, or Belongs to Family Member
                  <input type="checkbox" name="texas_checkbox"  id="vehicle_not_registered_cbx" value='non registered vehicle'>
                  <span class="checkmark"></span></label><br>
               </div>
            </div>
            @endif
            @if(Session::get('user_state_id') == '3')
            <div class="texas_fields col-md-12">
               <div class="field">
                  <input type="text" placeholder="Confirm Driver's License Plate Number*"  name="confirm_license_plate_number" value="{{ $student_detail->license_plate_number ?? old('confirm_license_plate_number') }}" required>
               </div>
            </div>
            @endif
            <div class="non_texas_license_fields d_none mt-5">
               <div class="col-md-12">
                  <div class="field">
                     <label for="">Drivers License Information*</label>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="field">
                     <h6>If you don't have a Texas License please download this from AFFIDAVIT. You don't need to submit the form to take the course, but you will need to email it Steven@ComedySafeDrive.com or fax it to (815) 461-6274 before the completion certificate can be sent to you (Texas Law)</h6>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="field">
                     <p>What is your Name as it appears on your driver's license?</p>
                     <input type="text" placeholder=""  name="non_texas_license_name" value="{{ $student_detail->non_texas_license_name ?? old('non_texas_license_name') }}">
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="field">
                     <p>What is your Address as it appears on your driver's license?</p>
                     <input type="text" placeholder=""  name="non_texas_license_address" value="{{ $student_detail->non_texas_license_address ?? old('non_texas_license_address') }}">
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="field">
                     <p>What is your City as it appears on your driver's license?</p>
                     <input type="text" placeholder=""  name="non_texas_license_city" value="{{ $student_detail->non_texas_license_city ?? old('non_texas_license_city') }}">
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="field">
                     <p>What is your Zip code as it appears on your driver's license?</p>
                     <input type="text" placeholder=""  name="non_texas_license_zipcode" value="{{ $student_detail->non_texas_license_zipcode ?? old('non_texas_license_zipcode') }}">
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="field">
                     <p>What is your Date of Birth as it appears on your driver's license?</p>
                     <input type="date" placeholder=""  name="non_texas_license_dob" value="{{ $student_detail->non_texas_license_dob ?? old('non_texas_license_dob') }}">
                  </div>
               </div>
            </div>
            
            <div class="non_registered_vehicle_fields d_none mt-5">
               <div class="col-md-12">
                  <div class="field">
                     <label for="">Vehicle License Plate Info. (Can belong to family member. Doesn't need to be Vehicle ticketed.)*</label>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="field">
                     <p>What is the vehicle owners Last Name on the vehicle registration for the license plate?*</p>
                     <input type="text" placeholder=""  name="non_registered_vehicle_lastname" value="{{ $student_detail->non_registered_vehicle_lastname ?? old('non_registered_vehicle_lastname') }}">
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="field">
                     <p>What is the vehicle owners Address on the vehicle registration for the license plate?*</p>
                     <input type="text" placeholder=""  name="non_registered_vehicle_address" value="{{ $student_detail->non_registered_vehicle_address ?? old('non_registered_vehicle_address') }}">
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="field">
                     <p>What is the vehicle owners City on the vehicle registration for the license plate?*</p>
                     <input type="text" placeholder=""  name="non_registered_vehicle_city" value="{{ $student_detail->non_registered_vehicle_city ?? old('non_registered_vehicle_city') }}">
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="field">
                     <p>What is the vehicle owners State on the vehicle registration for the license plate?*</p>
                     <input type="text" placeholder=""  name="non_registered_vehicle_state" value="{{ $student_detail->non_registered_vehicle_state ?? old('non_registered_vehicle_state') }}">
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="field">
                     <p>What is the vehicle owners Zip Code on the vehicle registration for the license plate?*</p>
                     <input type="text" placeholder=""  name="non_registered_vehicle_zipcode" value="{{ $student_detail->non_registered_vehicle_zipcode ?? old('non_registered_vehicle_zipcode') }}">
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="field">
                     <p>What is the vehicle Year (Not the Registration Expiration Year) of the vehicle?*</p>
                     <input type="text" placeholder=""  name="non_registered_vehicle_year" value="{{ $student_detail->non_registered_vehicle_year ?? old('non_registered_vehicle_year') }}">
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="field">
                     <p>What vehicle Make is on the vehicle registration for the license plate?*</p>
                     <input type="text" placeholder=""  name="non_registered_vehicle_make" value="{{ $student_detail->non_registered_vehicle_make ?? old('non_registered_vehicle_make') }}">
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="field">
                     <p>What Year does your vehicle registration expire for the license plate?*</p>
                     <input type="text" placeholder=""  name="non_registered_vehicle_expire_year" value="{{ $student_detail->non_registered_vehicle_expire_year ?? old('non_registered_vehicle_expire_year') }}">
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="field">
                     <p>What is your Model on the vehicle registration for the license plate?*</p>
                     <input type="text" placeholder=""  name="non_registered_vehicle_model" value="{{ $student_detail->non_registered_vehicle_model ?? old('non_registered_vehicle_model') }}">
                  </div>
               </div>
            </div>
         </div>
         <div class="field">
            <button type="submit">Submit</button>
         </div>
      </form>
   </div>
   </div>
</section>
@endsection