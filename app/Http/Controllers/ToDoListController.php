<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ToDoList;
use Illuminate\Support\Facades\Auth;

class ToDoListController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = ToDoList::where("user_id", Auth::id())->get();
        return view("todolist/index")->with(['todos' => $todos]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $todos = ToDoList::where("user_id", Auth::id())->get();
        return view('todolist/create')->with(['todos' => $todos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

          'content' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->route('home')->withErrors($validator)->withInput();
        }


        $todolist = new ToDoList([

          'content' => $request->get('content'),
        ]);

        $todolist->user_id = Auth::id();

        $todolist->save();

        return redirect()->to('/home/todolist')->with(['success' => 'Data Added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = ToDoList::find($id);
        return view('todolist.edit')->with(['todo' => $todo]);
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

        $todo = ToDoList::find($id);

        $todo->content = $request->get('content');
        $todo->status = $request->get('status');

        $todo->save();


        return redirect()->to('/home/todolist')->with(['success' => 'Data Updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = ToDoList::find($id);
        $todo->delete();

        return redirect()->to('/home/todolist')->with(['success' => 'Data Deleted successfully']);
    }
}
