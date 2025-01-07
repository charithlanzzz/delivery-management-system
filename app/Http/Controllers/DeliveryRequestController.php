<?php

namespace App\Http\Controllers;

use App\Models\DeliveryRequest;
use Illuminate\Http\Request;

class DeliveryRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveryRequests = DeliveryRequest::orderBy('created_at', 'desc')->paginate(10);
        return view('delivery_requests.index', compact('deliveryRequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('delivery_requests.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pickup_address' => 'required|string',
            'pickup_name' => 'required|string',
            'pickup_contact_no' => 'required|string',
            'pickup_email' => 'nullable|email',
            'delivery_address' => 'required|string',
            'delivery_name' => 'required|string',
            'delivery_contact_no' => 'required|string',
            'delivery_email' => 'nullable|email',
            'type_of_good' => 'required|in:Document,Parcel',
            'delivery_provider' => 'required|in:DHL,STARTRACK,ZOOM2U,TGE',
            'priority' => 'required|in:Standard,Express,Immediate',
            'shipment_pickup_date' => 'required|date',
            'shipment_pickup_time' => 'required',
            'package_description' => 'required|string',
            'length' => 'required|numeric',
            'height' => 'required|numeric',
            'width' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);

        DeliveryRequest::create($validated);

        return redirect()->route('delivery.requests.index')->with('success', 'Delivery Request Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DeliveryRequest $deliveryRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeliveryRequest $deliveryRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DeliveryRequest $deliveryRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeliveryRequest $deliveryRequest)
    {
        //
    }

    public function cancel(Request $request, $id)
    {
        $deliveryRequest = DeliveryRequest::findOrFail($id);

        if (in_array($deliveryRequest->status, ['Processed', 'Shipped'])) {
            return redirect()->back()->with('error', 'This request cannot be cancelled as it has already been processed or shipped.');
        }

        $deliveryRequest->status = 'Cancelled';
        $deliveryRequest->save();

        return redirect()->back()->with('success', 'The delivery request has been cancelled successfully.');
    }
}
