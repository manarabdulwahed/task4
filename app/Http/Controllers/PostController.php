<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;





use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller ;
use function Ramsey\Uuid\v1;

class PostController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Posts = Post::all()->map(function ($post)
        {
            $post->images = json_decode($post->images);
            return $post;
        }
        );

        return view('index', compact("Posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
    'image'=>"file",
    'description'=>"string",
    'title'=>"required|min:10",
]);
        $images=$request->file("images");
        $image_names[]=null;
        $i=0;
        foreach ($images as $image) {
        $image_name = $image->getClientOriginalName() . "-" . time() . "." . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image_name);
        $image_names[$i]=$image_name;
        $i++ ;
        }
        $json=json_encode($image_names);
        Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'images'=>$json,
        ]);
        return redirect()->route("Posts.index");
    }

    /**
     * Display the specified resource.
     */
    // public function show(Post $post)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $Post)
    {   $images = json_decode($Post->images);
        return view("edit", compact("Post"), compact("images"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $Post)
{      $request->validate([
        'image'=>"file",
        'description'=>"string",
        'title'=>"required|min:10",
        ]);
        if ($request->images == null) {
        $json=$Post->images;
        }
        else{
            $images=$request->file("images");
        $image_names[]=null;
        $i=0;
        foreach ($images as $image) {
        $image_name = $image->getClientOriginalName() . "-" . time() . "." . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image_name);
        $image_names[$i]=$image_name;
        $i++ ;
        }
        $json=json_encode($image_names);
        }

        $Post->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'images'=>$json,
        ]);




    return redirect()->route("Posts.index");

    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $Post)
    {
        $this->authorize("admin" , User::class);
        $Post->delete();
        return redirect()->route("Posts.index");
    }
}


