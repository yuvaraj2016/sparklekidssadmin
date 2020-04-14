<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    //
    public function index()
    {
        return view('testimonial');

    }

    public function create()
    {
        return view('testimonial.create');

    }

    public function edit($id)
    {
        return view('testimonial.edit');

    }

    public function show($id)
    {
        return view('testimonial.show');

    }


}
