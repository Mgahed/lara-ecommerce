<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShipDivision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShippingAreaController extends Controller
{
    protected function getRules()
    {
        return [
            'name_en' => 'required|unique:ship_divisions',
            'name_ar' => 'required|unique:ship_divisions',
            'cost' => 'required'
        ];
    }

    protected function getMSG()
    {
        return [
            'name_en.required' => __('This field is required'),
            'name_ar.required' => __('This field is required'),
            'cost.required' => __('This field is required'),
            'name_en.unique' => __('Name should be unique'),
            'name_ar.unique' => __('Name should be unique')
        ];
    }


    public function DivisionView(){
        $divisions = ShipDivision::orderBy('name_en','ASC')->get();
        return view('admin.ship.division.view_division',compact('divisions'));

    }


    public function DivisionStore(Request $request){

        $rules = $this->getRules();
        $customMSG = $this->getMSG();
        $validator = Validator::make($request->all(), $rules, $customMSG);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        ShipDivision::create([
            'name_en' => ucfirst(strtolower($request->name_en)),
            'name_ar' => $request->name_ar,
            'cost' => $request->cost

        ]);

        $notification = array(
            'message' => __('City Inserted Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end method



    public function DivisionEdit($id){

        $division = ShipDivision::findOrFail($id);
        return view('admin.ship.division.edit_division',compact('division'));
    }



    public function DivisionUpdate(Request $request,$id){

        $rules = [
            "cost" => 'required'
        ];
        $customMSG = [
            "cost.required" => __('This field is required')
        ];
        $validator = Validator::make($request->all(), $rules, $customMSG);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        ShipDivision::findOrFail($id)->update([
            /*'name_en' => ucfirst(strtolower($request->name_en)),
            'name_ar' => $request->name_ar,*/
            'cost' => $request->cost,
        ]);

        $notification = array(
            'message' => __('City Updated Successfully'),
            'alert-type' => 'info'
        );

        return redirect()->route('manage-division')->with($notification);


    } // end mehtod


    public function DivisionDelete($id){

        ShipDivision::findOrFail($id)->delete();

        $notification = array(
            'message' => __('City Deleted Successfully'),
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    } // end method



    //// Start Ship District
/*
    public function DistrictView(){
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::with('division')->orderBy('id','DESC')->get();
        return view('backend.ship.district.view_district',compact('division','district'));
    }


    public function DistrictStore(Request $request){

        $request->validate([
            'division_id' => 'required',
            'district_name' => 'required',

        ]);


        ShipDistrict::insert([

            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'District Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end method



    public function DistrictEdit($id){

        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::findOrFail($id);
        return view('backend.ship.district.edit_district',compact('district','division'));
    }



    public function DistrictUpdate(Request $request,$id){

        ShipDistrict::findOrFail($id)->update([

            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'District Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage-district')->with($notification);


    } // end mehtod



    public function DistrictDelete($id){

        ShipDistrict::findOrFail($id)->delete();

        $notification = array(
            'message' => 'District Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    } // end method
*/
    //// End Ship District

}
