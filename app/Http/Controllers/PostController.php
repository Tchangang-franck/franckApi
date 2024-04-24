<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        try {
            return response()->json([
                'status code' => 200,
                'message' => 'Liste des utilisateurs',
                'data' => Post::all()
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function store(PostRequest $request)
    {
        try {
            $post = new Post();
            $post->title = $request->title;
            $post->description = $request->description;
            $post->save();
            return response()->json([
                'status code' => 201,
                'message' => 'post created successfully',
                'data' => $post
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function show($id)
    {
        try {
            $poste = Post::find($id);
            return response()->json([
                'status code' => 200,
                'message' => 'show a single post',
                'data' => $poste,
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function update(PostRequest $request, Post $post)
    {
        try {

            // On modifie les informations de l'utilisateur
            $post->update([
                "title" => $request->title,
                "description" => $request->description,
            ]);

            // On retourne la réponse JSON
            return response()->json([
                'status code' => 200,
                'message' => 'utilisateur modifier avec succes',
                'data' => $post
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }
    public function  delete(Post $post)
    {
        try {
            // On supprime l'utilisateur
            $post->delete();
            // informer l'utilisateur qui a bien supprimer 
            return response()->json([
                'status' => 200,
                'message' => 'utilisateur supprimer avec succs',
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
        // On retourne la réponse JSON

    }
}
