<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Tag;
use App\Models\Skill;
use App\Models\Category;
use App\Models\Tutorial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TutorialRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Tutorials\TutorialResource;
use App\Http\Resources\Tutorials\TutorialCollection;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  Tutorial::with('categories:id,name,name_en')
                       ->with('skills')
                       ->with('tags')
                       ->latest()->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TutorialRequest $request)
    {
        $filename ='';
        if($thumbnail = $request->file('thumbnail')){
            $extension = $thumbnail->getClientOriginalExtension();
            $filename  = 'tutorial-thumbnail-' . time() . '.' . $extension;
            $path      = $thumbnail->storeAs('tutorials', $filename);
        }
        $tutorial = Tutorial::create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title_en),
            'title_en'=>$request->title_en,
            'description'=>$request->description,
            'description_en'=>$request->description_en,
            'thumbnail'=>$filename,
        ]);
        $categories = $request->categories;
        $tags = $request->tags;
        $skills = $request->skills;
        if($tutorial){
          if(!!$request->categories && count($categories))  $this->saveRelation($tutorial,$categories,'category');
          if(!!$request->tags && count($tags))  $this->saveRelation($tutorial,$tags,'tag');
          if(!!$request->skills && count($skills))  $this->saveRelation($tutorial,$skills,'skill');

        }
        return response()->json(
            $tutorial->load('categories')->load('skills')->load('tags')
        );
    }
    function saveRelation($tutorial,$arr,$entity){
        switch ($entity) {
            case 'category':
                  $tutorial->categories()->sync([]);
                  foreach($arr as $id){
                    $category = Category::find($id);
                    $tutorial->categories()->save($category);
                   }
                break;
            case 'skill':
                  $tutorial->skills()->sync([]);
                  foreach($arr as $id){
                    $skill = Skill::find($id);
                    if(!$tutorial->skills()->where('id', '=', $id))
                    $tutorial->skills()->save($skill);
                   }
                break;

            default:
                $tutorial->tags()->sync([]);
                foreach($arr as $id){
                    $tag = Tag::find($id);

                    $tutorial->tags()->save($tag);
                }
                break;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function show(Tutorial $tutorial)
    {
        return $tutorial->load('categories:id,name,name_en')
        ->load('skills')
        ->load('tags');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutorial $tutorial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function update(TutorialRequest $request, $slug)
    {

        $tutorial = Tutorial::whereSlug($slug)->first();
        $filename =$tutorial->thumbnail;
        if($thumbnail = $request->file('thumbnail')){
            Storage::delete('tutorials/'.$filename);
            $extension = $thumbnail->getClientOriginalExtension();
            $filename  = 'tutorial-thumbnail-' . time() . '.' . $extension;
            $path      = $thumbnail->storeAs('tutorials', $filename);
        }
        $tutorial->title = $request->title;
        $tutorial->slug = Str::slug($request->title_en);
        $tutorial->title_en = $request->title_en;
        $tutorial->description = $request->description;
        $tutorial->description_en = $request->description_en;
        $tutorial->thumbnail = $filename;
        $tutorial->save();

        $categories = $request->categories;
        $tags = $request->tags;
        $skills = $request->skills;
        if($tutorial){
          if(!!$request->categories && count($categories))  $this->saveRelation($tutorial,$categories,'category');
          if(!!$request->tags && count($tags))  $this->saveRelation($tutorial,$tags,'tag');
          if(!!$request->skills && count($skills))  $this->saveRelation($tutorial,$skills,'skill');

        }
        return response()->json(
            $tutorial->load('categories')->load('skills')->load('tags')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutorial $tutorial)
    {
        //
    }
}
