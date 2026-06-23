<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index()
    {
        return response()->json(Question::paginate(20));
    }

    public function show($id)
    {
        $q = Question::findOrFail($id);
        return response()->json($q);
    }
}
