<?php

namespace App\Http\Controllers;

use App\Models\Address;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
    public function Show_address()
    {
        $user_id = Auth::user()->id;
        $address_user = Address::where('user_id', $user_id)->first();
        if ($address_user == null) {
            return view('pages.account.address_user');
        }
        return view('pages.account.edit_address', compact('address_user'));
    }
    public function Edit_address()
    {
        $user_id = Auth::user()->id;
        $address_user = Address::where('user_id', $user_id)->first();
        return view('pages.account.edit_address', compact('address_user'));
    }
    public function Update_address(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = Address::create([
            'user_id' => $user_id,
            'address_type' => 'delivery',
            'province' => $request->input('checkout_province'),
            'district' => $request->input('checkout_district'),
            'ward' => $request->input('checkout_ward'),
            'address' => $request->input('checkout_detail_address'),
            'fullname' => $request->input('checkout_fullname'),
            'email' => $request->input('checkout_email'),
            'phone' => $request->input('checkout_phone')
        ]);

        if ($user) {
            return response()->json([
                'success' => 'User added successfully',
                'redirect' => route('profile_account')  // Return the route to redirect to
            ]);
        } else {
            return response()->json(['error' => 'Failed to add user'], 500);
        }
    }
    public function Save_address(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = Address::create([
            'user_id' => $user_id,
            'address_type' => 'delivery',
            'province' => $request->input('checkout_province'),
            'district' => $request->input('checkout_district'),
            'ward' => $request->input('checkout_ward'),
            'address' => $request->input('checkout_detail_address'),
            'fullname' => $request->input('checkout_fullname'),
            'email' => $request->input('checkout_email'),
            'phone' => $request->input('checkout_phone')
        ]);

        if ($user) {
            return response()->json([
                'success' => 'User added successfully',
                'redirect' => route('profile_account')  // Return the route to redirect to
            ]);
        } else {
            return response()->json(['error' => 'Failed to add user'], 500);
        }
    }
}
