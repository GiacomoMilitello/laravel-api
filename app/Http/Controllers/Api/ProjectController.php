<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::with( 'type', 'technologies' )->paginate(3);

        return response()->json([
            'success' => true,
            'projects' => $projects,
        ]);
    }

    public function show( $slug ){
        $project = Project::with( 'type', 'technologies' )->where( 'slug', $slug)->first();

        if( $project ){
            return response()->json([
                'seccess' => true,
                'project' => $project,
            ]);
        } else {
            return response()->json([
                'seccess' => false,
                'error' => 'Impossibile trovare Progetto',
            ]);
        }
        
    }
}
