<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\ContactUs;

class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $data["contactus"] = true;
        return view('User.contactus.contactus', $data);
    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits_between:8,15',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);
        DB::beginTransaction();
        try {
            $data = ContactUs::create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'subject' => $request->subject,
                    'message' => $request->message
                ]
            );
            DB::commit();
            if($data)
            {
                Toastr::success('Your message has been sent successfully.');
                return redirect()->route('contact-us.index');
            }
            else
            {
                Toastr::error('Something went wrong. Please try again.');
                return redirect()->route('contact-us.index');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("BlogController::store");
            Log::error($e);
            Toastr::error('Something went wrong. Please try again.');
            return redirect()->route('contact-us.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
