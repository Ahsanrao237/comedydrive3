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
            <h1>Registration</h1>
          </div>
          
        </div>
        <form method="POST" action="{{ route('register') }}">
                        @csrf
          <div class="row">
            <div class="col-md-12">
              <div class="field">
                <select name="state_id" id="state_id" >
                  <option value="" selected disabled>Select State*</option>
                  <option value="1">State1</option>
                  <option value="2">State2</option>
                  <option value="3">State3</option>
                </select>
              </div>
              <div class="field">
                <select name="course_id" id="course_id" >
                  <option value="" selected disabled>Select Course*</option>
                  <option value="1">Course1</option>
                  <option value="2">Course2</option>
                  <option value="3">Course3</option>
                </select>
              </div>
              <div class="field">
                <select name="county_id" id="county_id" >
                  <option value="" selected disabled>Select County/Court*</option>
                  <option value="1">County1</option>
                  <option value="2">County2</option>
                  <option value="3">County3</option>
                </select>
              </div>
              <br><br>
              <div class="field">
                <img src="assets/images/case_number.jpg" alt="">
              </div>
              <div class="field">
                <input type="text" placeholder="Case Number" name="case_number" >
              </div>

              <br><br>
              <div class="field">
                <img src="assets/images/citation.jpg" alt="">
              </div>

              <div class="field">
                <input type="text" placeholder="Citation/Ticket Number" name="citation_number" >
              </div>

              <div class="row">
              <div class="col-md-6">
                <div class="field">
                <p for="">Citation Date*</p>
                  <input type="date" placeholder="Citation Date" name="citation_due_date" >
                </div>
              </div>

              <div class="col-md-6">
                <div class="field">
                <p for="">Court Due Date*</p>
                  <input type="date" placeholder="Court Due Date" name="citation_court_due_date" >
                </div>
              </div></div>
            </div>
            <div class="col-md-12">
              <div class="field">
                <label for="">Completion Certificate Delivery Options*</label>
              </div>
              <div class="field">
                <h5>Free Email Delivery! (at course completion)</h5>
            </div>
              <br>
              
              <div class="rd-field">
                <input type="radio" id="course_completion_certificate_price_id" name="course_completion_certificate_price" value="2.50">
                <label for="course_completion_certificate_price_id">Regular Mail ($2.50) - Typical 3-7 Day **Cheapest**</label><br>
                <div class="field">
                  <h5>Hard copy of certificate sent via first class mail from Houston TX.</h5>
                </div>
              </div>
              <br>

              <div class="rd-field">
                <input type="radio" id="course_completion_certificate_price_id" name="course_completion_certificate_price" value="5.50">
                <label for="course_completion_certificate_price_id">Immediate Download/Email ($5.50) **Most Popular**</label><br>
                <div class="field">
                  <h5>Upon course completion certificate will be downloadable and will also be e-mailed to you. This is a new state law as of Oct. 2018</h5>
                </div>
              </div>
              <div class="rd-field">
                <input type="radio" id="course_completion_certificate_price_id" name="course_completion_certificate_price" value="2.50">
                <label for="course_completion_certificate_price_id">Regular Mail ($2.50) - Typical 3-7 Day **Cheapest**</label><br>
                <div class="field">
                  <h5>Hard copy of certificate sent via first class mail from Houston TX.</h5>
                </div>
              </div>
            </div>
      <div class="col-md-12">
        <div class="field">
        <label for="">Login Details*</label>
          </div>
            </div>
            <div class="col-md-6">
              <div class="field">
            <input id="email" type="email" name="email" value="{{ old('email') }}" required >
          </div>
            </div>
            <div class="col-md-6">
              <div class="field">
            <input type="password" placeholder="Password" name="password" >
          </div>
            </div>
             <div class="col-md-12">
              <div class="field">
       <h5>Password should contain one letter, one digit and minimum 8 characters</h5>
          </div>
            </div>

              <div class="col-md-12">
              <div class="field">
        <label for="">Payment Details*</label>
          </div>
            </div>
             <div class="col-md-12">
              <div class="field">
            <select name="payment_type" id="payment_type" >
              <option value="" selected disabled>Select Payment Type*</option>
              <option value="check">Paying by Check</option>
            </select>
          </div>
            </div>
             <div class="col-md-12">
              <div class="field">
        <label for="">Your Credit Card Information*</label>
          </div>
            </div>
              <div class="col-md-6">
              <div class="field">
            <select name="card_type" id="card_type" >
              <option value="" selected disabled>Select Card Type*</option>
              <option value="1">Card1</option>
              <option value="2">Card2</option>
              <option value="3">Card3</option>
            </select>
          </div>
            </div>
            <div class="col-md-6">
                <div class="field">
                  <input type="text" placeholder="Card Number" name="card_number" >
                </div>
            </div>
                <div class="col-md-6">
                <div class="field">
                           <input type="text" placeholder="Name on Card" name="card_name" >
                        </div>
            </div>
                <div class="col-md-6">
                <div class="field">
                           <input type="text" placeholder="Card Verification Code" name="card_code" >
                        </div>
            </div>
               <div class="col-md-6">
              <div class="field">
            <select name="card_expiry_month" id="card_expiry_month" >
              <option value="" selected disabled>Select Expiry Month*</option>
              <option value="1">Month1</option>
              <option value="2">Month2</option>
              <option value="3">Month3</option>
            </select>
          </div>
            </div>
               <div class="col-md-6">
              <div class="field">
            <select name="card_expiry_date" id="card_expiry_date" >
              <option value="" selected disabled>Select Expiry Date*</option>
              <option value="1">Date1</option>
              <option value="2">Date2</option>
              <option value="3">Date3</option>
            </select>
          </div>
            </div>
            <div class="col-md-12">
              <div class="field">
                <input type="text" placeholder="Billing Zipcode" name="card_zipcode" >
              </div>
            </div>
          </div>
          
          
         
          <div class="field">
            <img src="assets/images/captcha.png" alt="">
          </div>

                 <div class="d_none col-md-12">
                     
                     <div class="cbx-field">
                       
                        <label class="customCheck"  for="password">Password should contain one letter, one digit and minimum 8 characters
                        <input type="checkbox"  id="password">
                        <span class="checkmark"></span></label><br>
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