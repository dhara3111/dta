<?php
use App\Models\Property;

if (! function_exists('getPropertyPriceAndType')) {
    function getPropertyPriceAndType($id) {
        $property = Property::find($id);
        $type = "";
        if($property->property_for_id == Property::SELL){
            $type = $property->expected_price;
        }
        else if($property->property_for_id == Property::RENT){
            $type = $property->expected_price." / Month";
        }
        else if($property->property_for_id == Property::ROOMATES){
            $type = $property->expected_price." / Month";
        }
        return $type;
    }
}

if (! function_exists('getName')) {
    function getName(){
        $name = auth()->user()->first_name.' '.auth()->user()->last_name;
        return $name;
    }
}

if (! function_exists('getPropertyOwnerName')) {
    function getPropertyOwnerName($id){
        $property = Property::find($id);
        $name = $property->user->first_name.' '.$property->user->last_name;
        return $name;
    }
}

if (! function_exists('imageResize')) {
    function imageResize($path,$dimension=750,$return=0) {
        $logoPath = public_path('frontend/img/logos/logo-4.png');
        $save_path = $path;
        $img = \Intervention\Image\Facades\Image::make($path);
        $width  = $img->width();
        $height = $img->height();

        $vertical   = (($width < $height) ? true : false);
        $horizontal = (($width > $height) ? true : false);
        $square     = (($width = $height) ? true : false);

        if ($vertical) {
            if ($height>$dimension){
                $value=0;
            } else {
                $value=$dimension-$width;
                $value = $value/2;
            }
            $top = $bottom =  $value;
            $newHeight = ($dimension) - ($bottom + $top);
            $img->resize(null, $newHeight, function ($constraint) {
                $constraint->aspectRatio();
            });

        } else if ($horizontal) {
            if ($width>$dimension){
                $value=0;
            } else {
                $value=$dimension-$width;
                $value = $value/2;
            }
            $right = $left =  $value;
            $newWidth = ($dimension) - ($right + $left);
            $img->resize($newWidth, null, function ($constraint) {
                $constraint->aspectRatio();
            });

        } else if ($square) {
            if ($width>$dimension){
                $value=0;
            } else {
                $value=$dimension-$width;
                $value = $value/2;
            }
            $right = $left =  $value;
            $newWidth = ($dimension) - ($left + $right);
            $img->resize($newWidth, null, function ($constraint) {
                $constraint->aspectRatio();
            });

        }

        $img->resizeCanvas($dimension, $dimension, 'center', false, '#ffffff');
        $img->insert($logoPath, 'bottom-right', 10, 0);
        $img->save($save_path);

    }
}


if (! function_exists('getPropertyType')) {
    function getPropertyType($id) {
        $property = Property::find($id);
        $type = "";
        if($property->property_for_id == Property::SELL){
            $type = "Sell";
        }
        else if($property->property_for_id == Property::RENT){
            $type = "Rent";
        }
        else if($property->property_for_id == Property::ROOMATES){
            $type = "Roommates";
        }
        return $type;
    }
}

if (! function_exists('getDateFormat')) {
    function getDateFormat($date) {
        $newDate = null ;

        if($date != null){

            $newDate = date('m/d/Y', strtotime($date));
        }
        return $newDate;
    }
}
