<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function Show_Address_Pickup()
    {
        $address = Address::where('user_id', null)->get();
        if ($address->isEmpty()) {
            $address = null;
            return view('admin.order.address.show_address', compact('address'));
        }
        return view('admin.order.address.show_address', compact('address'));
    }

    public function addAddress(Request $request)
    {
        $address = Address::create([
            // 'user_id' => null,
            'address_type' => 'pickup',
            'province' => $request['province'],
            'district' => $request['district'],
            'ward' => $request['ward'],
            'address' => $request['address'],
        ]);
        return response()->json([
            'success' => true,
            'redirect_url' => route('show_address_pickup') // Đây là URL bạn muốn chuyển hướng đến
        ]);
    }
    public function DeleteAddress(Request $request)
    {
        $addresses = Address::where('address_type', 'pickup')->where('user_id', null)->get();

        if ($addresses->isEmpty()) {
            return redirect()->route('show_address_pickup')->with('error', 'No pickup addresses found.');
        }

        foreach ($addresses as $address) {
            $address->delete(); // Delete the individual address
        }

        session()->flash('success', 'All pickup addresses have been deleted.');

        return redirect()->route('show_address_pickup');
    }
}
