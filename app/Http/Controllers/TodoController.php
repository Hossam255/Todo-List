<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Todo;
use Illuminate\Http\Request;
// use App\Exports\TodoExport;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $todos = Todo::all();
        return view('todo', compact('todos'));
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
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
        [
            "title"=>'required',
            'image'=>'required'
        ]);

        // save photo in folder
        $file_extension = $request->file('image')->extension();
        $file_name = time().'.'.$file_extension;
        $path= 'puplic/images';
        $request->file('image')->move($path, $file_name);

        Todo::create([
            'title'=>$request->get("title"),
            'image'=>$file_name
        ]);
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
        $todo = Todo::where('id',$id)->first();
        return view('edit-todo', compact('todo'));
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
        $validator = Validator::make($request->all(),
        [
            "title"=>'required'
        ]);

        $to_update = Todo::find($id);
        $to_update->title = $request->title;
        $to_update->is_completed = $request->is_completed;
        $to_update->save();
        return redirect('/todos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $to_delete = Todo::find($id);
        $to_delete->delete();
        return redirect('/todos');
    }

    public function exportCsv()
    {
        return Excel::download( new DataExport, 'TodoList.csv');
    }
}
class DataExport implements FromCollection{
    function collection(){
    $todos = Todo::all();
        return $todos;
    }
}