<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Amenities;
use App\Models\City;
use App\Models\Feature;
use App\Models\FittingsType;
use App\Models\FlooringType;
use App\Models\NearestFrom;
use App\Models\PropertyFor;
use App\Models\PropertySubType;
use App\Models\PropertyType;
use App\Models\RequirementAmenities;
use App\Models\RequirementFeature;
use App\Models\RequirementForm;
use App\Models\RequirementNearestFrom;
use App\Models\RequirementPropertyId;
use App\Models\RequirementWhereFind;
use App\Models\State;
use App\Models\WallsType;
use App\Models\WhereFind;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequirementFromController extends Controller
{
    public function index(){

        $propertyFors = PropertyFor::get();
        $propertyTypes = PropertyType::get();
        $propertySubTypes = PropertySubType::get();
        $features = Feature::get();
        $amenities = Amenities::get();
        $flooringTypes = FlooringType::get();
        $fittingsTypes = FittingsType::get();
        $wallsTypes = WallsType::get();
        $nearestFroms = NearestFrom::get();
        $whereFinds = WhereFind::get();
        $states = State::get();
        $cities = City::get();

       return view('frontend.requirementForm.index',[
           'propertyFors' => $propertyFors,
           'propertyTypes' => $propertyTypes,
           'propertySubTypes' => $propertySubTypes,
           'features' => $features,
           'amenities' => $amenities,
           'flooringTypes' => $flooringTypes,
           'fittingsTypes' => $fittingsTypes,
           'wallsTypes' => $wallsTypes,
           'nearestFroms' => $nearestFroms,
           'whereFinds' => $whereFinds,
           'states' => $states,
           'cities' => $cities,
       ]);
    }

    public function store(Request $request)
    {
//        dd($request->all());
//        $this->validate($request, [
//            'type' => 'required',
//            'property_for_id' => 'required',
//            'name' => 'required',
//            'address' => 'required',
//            'area' => 'required',
//            'city' => 'required',
//            'state' => 'required',
//            'country' => 'required',
//            'mobile' => 'required',
//            'home' => 'required',
//            'office' => 'required',
//            'whatsapp' => 'required',
//            'property_type_id' => 'required',
//            'property_sub_type_id' => 'required',
//            'transaction_type' => 'required',
//            'possession_status' => 'required',
//            'unit_available' => 'required',
//            'possession_date' => 'required',
//            'year_construction' => 'required',
//            'bedrooms' => 'required',
//            'bathrooms' => 'required',
//            'no_of_open_side' => 'required',
//            'carpet_area' => 'required',
//            'build_up_area' => 'required',
//            'super_build_up_area' => 'required',
//            'nearest_from' => 'required',
//            'where_find' => 'required',
//            'budget_from' => 'required',
//            'budget_to' => 'required',
//            'expected_rent' => 'required',
//            'expected_rent_per_square' => 'required',
//            'municipal_tax' => 'required',
//            'maintenance' => 'required',
//            'electricity_bill' => 'required',
//        ]);

        $possessionDate = date('Y-m-d', strtotime($request->possession_date));

        $requirementFormModel = new RequirementForm();
        $requirementForm = $requirementFormModel->create([

            'type' => $request->type,
            'property_status' => $request->property_for_id,
            'area' => $request->area,
            'city_id' => $request->city,
            'state_id' => $request->state,
            'budget_from' => $request->budget_from,
            'budget_to' => $request->budget_to,
            'loan_required' => $request->loan_required,
            'expected_rent' => $request->expected_rent,
            'expected_rent_per_square' => $request->expected_rent_per_square,
            'municipal_tax' => $request->municipal_tax,
            'maintenance' => $request->maintenance,
            'electricity_bill' => $request->electricity_bill,
            'property_type_id' => $request->property_type_id,
            'property_sub_type_id' => $request->property_sub_type_id,
            'carpet_area' => $request->carpet_area,
            'transaction_type' => $request->transaction_type,
            'possession_status' => $request->possession_status,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'no_of_open_side' => $request->no_of_open_side,
            'floor_no' => $request->floor_no,
            'feature' => $request->feature,
            'amenities' => $request->amenities,
            'nearest_from' => $request->nearest_from,
            'where_find' => $request->where_find,
            'name' => $request->name,
            'address' => $request->address,
            'applicant_area' => $request->applicant_area,
            'applicant_city' => $request->applicant_city,
            'applicant_state' => $request->applicant_state,
            'applicant_country' => $request->applicant_country,
            'mobile' => $request->mobile,
            'home' => $request->home,
            'office' => $request->office,
            'whatsapp' => $request->whatsapp,

        ]);

        if ($request->has('property_id')){
            foreach ($request->property_id as $id) {
                $requirementPropertyIdModel = new RequirementPropertyId();
                $requirementPropertyId = $requirementPropertyIdModel->create([
                    'requirement_from_id' => $requirementForm->id,
                    'id_of_property' => $id,
                ]);
            }
        }

        if ($request->has('feature')){
            foreach ($request->feature as $feature) {
                $requirementFeatureModel = new RequirementFeature();
                $requirementFeature = $requirementFeatureModel->create([
                    'requirement_from_id' => $requirementForm->id,
                    'feature_id' => $feature,
                ]);
            }
        }

        if ($request->has('amenities')) {
            foreach ($request->amenities as $amenity) {
                $RequirementAmenitiesModel = new RequirementAmenities();
                $RequirementAmenities = $RequirementAmenitiesModel->create([
                    'requirement_from_id' => $requirementForm->id,
                    'amenities_id' => $amenity,
                ]);
            }
        }

        if ($request->has('nearest_from')) {
            foreach ($request->nearest_from as $nearest_from) {
                $requirementNearestFromModel = new RequirementNearestFrom();
                $requirementNearestFrom = $requirementNearestFromModel->create([
                    'requirement_from_id' => $requirementForm->id,
                    'nearest_from_id' => $nearest_from,
                ]);
            }
        }

        if ($request->has('where_find')) {
            foreach ($request->where_find as $where_find) {
                $requirementWhereFindModel = new RequirementWhereFind();
                $requirementWhereFind = $requirementWhereFindModel->create([
                    'requirement_from_id' => $requirementForm->id,
                    'where_find_id' => $where_find,
                ]);
            }
        }

        return redirect()->route('frontend.home.index')->with('success','Property Requirement From Added Successfully');

    }

}
