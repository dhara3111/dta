<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HelplineController extends Controller
{
    public function index(){

        $testimonials = Testimonial::all();

        return view('frontend.helpline.index',[
            'testimonials' => $testimonials
        ]);
    }
}
