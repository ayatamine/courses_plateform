<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\Course\CourseResource;
use App\Http\Resources\Course\CourseCollection;
use App\Http\Resources\Tutorials\TutorialResource;
use App\Http\Resources\Tutorials\TutorialCollection;

class TutorialController extends Controller
{
    public function index()
    {
        $tutorials =QueryBuilder::for(Tutorial::class)
        ->allowedFilters(['title','title_en'])
        ->allowedIncludes('skills','tags','categories')
        ->defaultSort('-created_at')
        ->allowedSorts('created_at')
        ->paginate(6);
        return  new TutorialCollection(Tutorial::paginate(6));
    }
    public function show(Tutorial $slug)
    {
         return new TutorialResource($slug);
    }
    public function search(){
        return 'yes';
    }
}
