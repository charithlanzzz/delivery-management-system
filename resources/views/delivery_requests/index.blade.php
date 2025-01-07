@extends('layouts.app')

@section('title', 'Delivery Requests')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Delivery Requests</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="table-responsive">
            <table id="deliveryRequestsTable" class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Pickup Address</th>
                        <th>Pickup Name</th>
                        <th>Pickup Contact No</th>
                        <th>Delivery Address</th>
                        <th>Delivery Name</th>
                        <th>Delivery Contact No</th>
                        <th>Type of Good</th>
                        <th>Delivery Provider</th>
                        <th>Priority</th>
                        <th>Shipment Pickup Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($deliveryRequests as $request)
                        <tr>
                            <td>{{ $request->id }}</td>
                            <td>{{ $request->pickup_address }}</td>
                            <td>{{ $request->pickup_name }}</td>
                            <td>{{ $request->pickup_contact_no }}</td>
                            <td>{{ $request->delivery_address }}</td>
                            <td>{{ $request->delivery_name }}</td>
                            <td>{{ $request->delivery_contact_no }}</td>
                            <td>{{ $request->type_of_good }}</td>
                            <td>{{ $request->delivery_provider }}</td>
                            <td>{{ $request->priority }}</td>
                            <td>{{ $request->shipment_pickup_date }}</td>
                            <td>{{ $request->status }}</td>
                            <td>
                                @if ($request->status === 'Pending')
                                    <form action="{{ route('delivery.requests.cancel', $request->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                    </form>
                                @else
                                    <button class="btn btn-secondary btn-sm" disabled>Cannot Cancel</button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="13" class="text-center">No delivery requests found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-3">
            {{ $deliveryRequests->links() }}
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#deliveryRequestsTable').DataTable({
                processing: true,
                responsive: true,
                autoWidth: false,
            });
        });
    </script>
@endsection
