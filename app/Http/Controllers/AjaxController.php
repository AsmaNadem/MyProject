<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function handleRequest(): \Illuminate\Http\JsonResponse
    {
        // Perform any processing or data retrieval here
        $data = ['message' => 'This is the AJAX response'];

        // Return a JSON response
        return response()->json($data);
    }
}
