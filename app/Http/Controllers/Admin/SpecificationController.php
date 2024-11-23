<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Trait
// use App\Traits\UploadImageTrait;
// Controllers

//models
use App\Models\Specification;
use App\Models\Value;
// others
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class SpecificationController extends Controller
{
    // use UploadImageTrait;
    public function index()
    {
        $data['specifications'] = Specification::paginate(10);
        return view('admin.specification.list',$data);
    }
   
    public function create()
    {
        return view('admin.specification.create');
    }

    public function store(Request $request)
    {
              
        $request->validate([
            'specification' => 'required|max:255',
            'values' => 'required|array|min:1',
        ],
        [
            'specification.required' => 'The product name is required.',
            'values.max' => 'The values is required.',
            'values.array' => 'The values must be a array.',
            'values.values' => 'The values must be at least one.'
        ]);

        $specification = Specification::where('specification', $request->specification)->where('is_active', 1)->exists();
        if ($specification) {
            Toastr::error('Specification already exists.');
            return redirect()->back()->withInput();
        }
        
        DB::beginTransaction();
        try {
            $specification = Specification::create([
                'specification' => $request->specification
            ]);
            if ($specification) {
                foreach ($request->values as $value) {
                    $specification->values()->create([
                        'value' => $value
                    ]);                   
                }
                DB::commit();
                Toastr::success('Specification created successfully.');
                return redirect()->route('admin.specification.index');
            }
            else {
                DB::rollBack();
                Toastr::error('Something went wrong.');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("SpecificationController::store");
            Log::error($e);
            Toastr::error('Something went wrong.');
            return redirect()->back()->withInput();
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
        $data['specification'] = Specification::with('values')->findorfail($id);
        return view('admin.specification.create',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Log::info($request->all());
        $request->validate([
                'specification' => 'required|max:255',
                'values' => 'required|array|min:1',
            ],
            [
                'specification.required' => 'The product name is required.',
                'values.max' => 'The values is required.',
                'values.array' => 'The values must be a array.',
                'values.values' => 'The values must be at least one.'
            ]);

        $specification = Specification::where('specification', $request->specification)
                    ->where('id', '!=', $id)->where('is_active', 1)->exists();
        if ($specification) {
            Toastr::error('Specification already exists.');
            return redirect()->back()->withInput();
        }
            
        DB::beginTransaction();
        try {
            
            $specification = Specification::findorfail($id);
            $specification->specification = $request->specification;
            $specificationSave = $specification->save();
            if ($specificationSave) {
                foreach ($request->values as $key => $value) {

                    Log::info($request->ids[$key]);


                    $specificationValue = Value::find($request->ids[$key]);
                    if ($specificationValue){
                        $specificationValue->value = $value; // $request->values[$key];
                        $specificationValue->save();
                    }
                    else{
                        $specification->values()->create([
                            'value' => $value
                        ]);
                    }                                     
                }
                DB::commit();
                Toastr::success('Specification created successfully.');
                return redirect()->route('admin.specification.index');
            }
            else {
                DB::rollBack();
                Toastr::error('Something went wrong.');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("SpecificationController::store");
            Log::error($e);
            Toastr::error('Something went wrong.');
            return redirect()->back()->withInput();
        }           
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $deleteValue = Value::where('specification_id', $id)->delete();
            $productCategory = Specification::findorfail($id);
            $productCategory->delete();
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("SpecificationController::destroy");
            Log::error($e);
            return 0;
        }
    }  
}