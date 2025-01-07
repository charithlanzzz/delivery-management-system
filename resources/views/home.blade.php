@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container text-center mt-5">
        <h1 class="display-4">Welcome to Our Website!</h1>
        <p class="lead">Your one-stop destination for all your needs.</p>
        <hr class="my-4">
        <div class="row mt-4">
            <div class="col-md-6">
                <h2>About Us</h2>
                <p>We are committed to providing the best services and products to our customers. Our team works tirelessly to innovate and exceed expectations.</p>
                <a href="#" class="btn btn-primary">Learn More</a>
            </div>

            <div class="col-md-6">
                <h2>Our Services</h2>
                <ul class="list-unstyled">
                    <li>High-quality Products</li>
                    <li>Reliable Customer Support</li>
                    <li>Fast and Secure Delivery</li>
                </ul>
                <a href="#" class="btn btn-secondary">Explore Services</a>
            </div>
        </div>

        <div class="mt-5 p-4 bg-light">
            <h2>Stay Connected</h2>
            <p>Subscribe to our newsletter and follow us on social media to stay updated!</p>
            <form action="#" method="POST" class="d-flex justify-content-center">
                @csrf
                <input type="email" name="email" class="form-control w-50 me-2" placeholder="Enter your email" required>
                <button type="submit" class="btn btn-success disabled">Subscribe</button>
            </form>
        </div>
    </div>
@endsection
