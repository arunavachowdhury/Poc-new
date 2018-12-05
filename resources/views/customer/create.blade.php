@extends('includes.app')

@section('content')

<form action="{{route('customer.store')}}" method="post">
{{csrf_field()}}
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <textarea name="address" id="address" rows="3" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="phone_number">Phone Number</label>
        <input type="text" class="form-control" id="phone_number" name="phone_number">
    </div>
    <div class="form-group">
        <label for="contact_person">Contact Person:</label>
        <input type="text" class="form-control" id="contact_person" name="contact_person">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>

@endsection
