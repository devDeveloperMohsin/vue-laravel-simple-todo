<?php

namespace App\Http\Controllers;

use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        switch($request->input('filter')){
            case 'completed':
                $todos = Todo::where('completed',1)->latest()->get();
                break;
            case 'pending':
                $todos = Todo::where('completed',0)->latest()->get();
                break;
            default:
            $todos = Todo::latest()->get();
        }
        
        return TodoResource::collection($todos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'todo' => ['required','string','max:500'],
        ]);

        Todo::create($validData);

        return response()->json([
            'response' => 'success',
            'message' => __('Todo Item Created')
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->completed = !$todo->completed;
        $todo->save();

        return response()->json([
            'response' => 'success',
            'message' => __('Todo Item Status Changed')
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validData = $request->validate([
            'todo' => ['required','string','max:500'],
        ]);

        Todo::findOrFail($id)->update($validData);

        return response()->json([
            'response' => 'success',
            'message' => __('Todo Item Updated')
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::destroy($id);

         return response()->json([
            'response' => 'success',
            'message' => __('Todo Item Deleted')
        ], 200);
    }
}
