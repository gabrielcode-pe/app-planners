<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function contactView()
    {
        return view('pages.contact');
    }

    public function getTestimonies()
    {
        return view('pages.testimonies');
    }

    public function getPosts()
    {
        return view('pages.posts');
    }

    public function getCoursesOwner()
    {
        return view('pages.courses.esc-proyectistas');
    }

    public function getInstitutionlCourses()
    {
        return view('pages.courses.institutionals');
    }

    public function frecuentQuestions()
    {
        return view('pages.frequent-questions');
    }


    public function shopCartView()
    {
        return view('pages.shop-cart');
    }

}
