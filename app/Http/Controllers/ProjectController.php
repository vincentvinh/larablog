<?php

namespace App\Http\Controllers;

use App\project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view(projectHome);
    }
}
