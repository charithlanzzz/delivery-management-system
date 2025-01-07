@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('delivery.requests.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf

            <div class="card mb-4">
                <div class="card-header">
                    <h3>Delivery Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="pickup_address" class="form-label">Pickup Address<span class="text-danger">*</span></label>
                            <input type="text" name="pickup_address" class="form-control" id="pickup_address" placeholder="Enter Pickup Address" required>
                            <div class="invalid-feedback">Please provide a pickup address.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="pickup_name" class="form-label">Pickup Name<span class="text-danger">*</span></label>
                            <input type="text" name="pickup_name" class="form-control" id="pickup_name" pattern="^[A-Za-z\s]+$" placeholder="Enter Pickup Name" required>
                            <div class="invalid-feedback">Only letters are allowed.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="pickup_contact_no" class="form-label">Pickup Contact No<span class="text-danger">*</span></label>
                            <input type="tel" name="pickup_contact_no" class="form-control" id="pickup_contact_no" pattern="0\d{9}" maxlength="10" placeholder="Enter Contact No" required>
                            <div class="invalid-feedback">Mobile number must start with '0' and be exactly 10 digits.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="pickup_email" class="form-label">Pickup Email (Optional)</label>
                            <input type="email" name="pickup_email" class="form-control" id="pickup_email" placeholder="Enter Email">
                            <div class="invalid-feedback">Please provide a valid email address.</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="delivery_address" class="form-label">Delivery Address<span class="text-danger">*</span></label>
                            <input type="text" name="delivery_address" class="form-control" id="delivery_address" placeholder="Enter Delivery Address" required>
                            <div class="invalid-feedback">Please provide a delivery address.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="delivery_name" class="form-label">Delivery Name<span class="text-danger">*</span></label>
                            <input type="text" name="delivery_name" class="form-control" id="delivery_name" pattern="^[A-Za-z\s]+$" placeholder="Enter Delivery Name" required>
                            <div class="invalid-feedback">Only letters are allowed.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="delivery_contact_no" class="form-label">Delivery Contact No<span class="text-danger">*</span></label>
                            <input type="tel" name="delivery_contact_no" class="form-control" id="delivery_contact_no" pattern="0\d{9}" maxlength="10" placeholder="Enter Contact No" required>
                            <div class="invalid-feedback">Mobile number must start with '0' and be exactly 10 digits.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="delivery_email" class="form-label">Delivery Email (Optional)</label>
                            <input type="email" name="delivery_email" class="form-control" id="delivery_email" placeholder="Enter Email">
                            <div class="invalid-feedback">Please provide a valid email address.</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="type_of_good" class="form-label">Type of Good<span class="text-danger">*</span></label>
                            <select name="type_of_good" class="form-select" id="type_of_good" required>
                                <option value="" selected disabled>Select Type</option>
                                <option value="Document">Document</option>
                                <option value="Parcel">Parcel</option>
                            </select>
                            <div class="invalid-feedback">Please select the type of good.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="delivery_provider" class="form-label">Delivery Provider<span class="text-danger">*</span></label>
                            <select name="delivery_provider" class="form-select" id="delivery_provider" required>
                                <option value="" selected disabled>Select Provider</option>
                                <option value="DHL">DHL</option>
                                <option value="STARTRACK">STARTRACK</option>
                                <option value="ZOOM2U">ZOOM2U</option>
                                <option value="TGE">TGE</option>
                            </select>
                            <div class="invalid-feedback">Please select a delivery provider.</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="priority" class="form-label">Priority<span class="text-danger">*</span></label>
                            <select name="priority" class="form-select" id="priority" required>
                                <option value="" selected disabled>Select Priority</option>
                                <option value="Standard">Standard</option>
                                <option value="Express">Express</option>
                                <option value="Immediate">Immediate</option>
                            </select>
                            <div class="invalid-feedback">Please select a priority level.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="shipment_pickup_date" class="form-label">Shipment Pickup Date<span class="text-danger">*</span></label>
                            <input type="date" name="shipment_pickup_date" class="form-control" id="shipment_pickup_date" required>
                            <div class="invalid-feedback">Please select a valid date.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="shipment_pickup_time" class="form-label">Shipment Pickup Time<span class="text-danger">*</span></label>
                            <input type="time" name="shipment_pickup_time" class="form-control" id="shipment_pickup_time" required>
                            <div class="invalid-feedback">Please select a valid time.</div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h3>Package Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="package_description" class="form-label">Package Description<span class="text-danger">*</span></label>
                            <textarea name="package_description" class="form-control" id="package_description" rows="3" required></textarea>
                            <div class="invalid-feedback">Please provide a package description.</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="length" class="form-label">Length (cm)<span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="length" class="form-control" id="length" required>
                            <div class="invalid-feedback">Please provide the length.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="height" class="form-label">Height (cm)<span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="height" class="form-control" id="height" required>
                            <div class="invalid-feedback">Please provide the height.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="width" class="form-label">Width (cm)<span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="width" class="form-control" id="width" required>
                            <div class="invalid-feedback">Please provide the width.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="weight" class="form-label">Weight (kg)<span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="weight" class="form-control" id="weight" required>
                            <div class="invalid-feedback">Please provide the weight.</div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('.needs-validation');

            Array.from(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        });
    </script>
@endsection
