<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contactus;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['contactus'] = Contactus::paginate(10);
        return view('admin.contactus.list',$data);
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
        //
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
        $data['contactus'] = Contactus::findorfail($id);
        return view('admin.contactus.create',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'reply' => 'required'
        ],
        [
            'reply.required' => 'The department name is required.'
        ]);

        DB::beginTransaction();
        try {
            $contactusSave = Contactus::where(['status' => 1, 'id' => $id])->update([
                'reply' => $request->reply,
                'status' => 2
            ]);
            if ($contactusSave) {
                DB::commit();
                Toastr::success('Replied successfully.');
                return redirect()->route('admin.contact-us.index');
            }
            else {
                DB::rollBack();
                Toastr::error('Something went wrongg.');
                return redirect()->route('admin.contact-us.edit',$id);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error("ContactusController::update");
            \Log::error($e);
            Toastr::error('Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
