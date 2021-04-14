<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Models\Tutorial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Course\CourseResource;
use App\Http\Resources\Course\CourseCollection;

class TutorialController extends Controller
{
    public function index()
    {
        return  new TutorialCollection(Tutorial::paginate(6));
    }
    public function show(Tutorial $slug)
    {
         return new TutorialResource($slug);
    }
}
