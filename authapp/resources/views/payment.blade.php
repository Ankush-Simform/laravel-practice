<!DOCTYPE html>
<html>
<head>
    <title>Payment Form</title>
</head>
<body>

<h1>Payment Form</h1>

<form method="POST" action="/payment">

    @csrf

    <!-- NAME -->
    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name') }}">

        @error('name')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <br>

    <!-- EMAIL -->
    <div>
        <label>Email</label>
        <input type="text" name="email" value="{{ old('email') }}">

        @error('email')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <br>

    <!-- PHONE -->
    <div>
        <label>Phone</label>
        <input type="text" name="phone" value="{{ old('phone') }}">

        @error('phone')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <br>

    <!-- PAYMENT METHOD -->
    <div>
        <label>Payment Method</label>

        <select name="payment_method">

            <option value="">Select</option>

            <option value="card">Card</option>

            <option value="upi">UPI</option>

            <option value="cash">Cash</option>

        </select>

        @error('payment_method')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <br>

    <!-- CARD NUMBER -->
    <div>
        <label>Card Number</label>

        <input type="text" name="card_number">

        @error('card_number')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <br>

    <!-- CVV -->
    <div>
        <label>CVV</label>

        <input type="text" name="cvv">

        @error('cvv')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <br>

    <!-- UPI -->
    <div>
        <label>UPI ID</label>

        <input type="text" name="upi_id">

        @error('upi_id')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <br>

    <!-- COMPANY PAYMENT -->
    <div>
        <label>Company Payment?</label>

        <input type="checkbox" name="is_company" value="1">
    </div>

    <br>

    <!-- COMPANY NAME -->
    <div>
        <label>Company Name</label>

        <input type="text" name="company_name" value="{{old('company_name')}}">

        @error('company_name')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <br>

    <!-- GST -->
    <div>
        <label>GST Number</label>

        <input type="text" name="gst_number">

        @error('gst_number')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <br>

    <!-- ADDRESS -->
    <div>
        <label>Address</label>

        <input type="text" name="address" value="{{old('address')}}">

        @error('address')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <br>

    <!-- CITY -->
    <div>
        <label>City</label>

        <input type="text" name="city" value="{{old('city')}}">

        @error('city')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <br>

    <!-- STATE -->
    <div>
        <label>State</label>

        <input type="text" name="state"  value="{{old('state')}}">

        @error('state')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <br>

    <button type="submit">
        Pay Now
    </button>

</form>

</body>
</html>