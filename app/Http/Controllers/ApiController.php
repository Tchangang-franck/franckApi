<?php

namespace App\Http\Controllers;

use App\Models\User;
use  App\Http\Requests\ApiRequest;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.   
     */
    public function index()
    {
        try {
            // On récupère tous les utilisateurs
            $users = User::all();

            // On retourne les informations des utilisateurs en JSON
            return response()->json([
                'status code' => 200,
                'message' => 'la liste des utilisateurs',
                'data' => $users
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ApiRequest $request)
    {
        try {
            // On crée un nouvel utilisateur
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            // On retourne les informations du nouvel utilisateur en JSON
            return response()->json([
                'statut code' => 201,
                'message' => ' utilisateur creer avec succes',
                'data' => $user
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        try {
            // On retourne les informations de l'utilisateur en JSON
            return response()->json([
                'satus code' => 200,
                'message' => 'utilisateur recupere avec succes',
                'data' => $user
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApiRequest $request, User $user)
    {
        try {

            // On modifie les informations de l'utilisateur
            $user->update([
                "name" => $request->name,
                "email" => $request->email,
            ]);

            // On retourne la réponse JSON
            return response()->json([
                'status code' => 200,
                'message' => 'utilisateur modifier avec succes',
                'data' => $user
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)

    {
        try {
            // On supprime l'utilisateur
            $user->delete();
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
