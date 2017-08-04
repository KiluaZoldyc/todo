<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Category;

class todoController extends Controller
{
	public function index()
	{
		$todos = Todo::all();
		$categories = Category::all();
		return view('todos.index', ['todos' =>$todos , 'categories' =>$categories]);


	}
	public function create(){

		return view('todos.create');

	}
	public function save(Request $request){
		$this->validate($request, [
			'name'=>'required|max:15',
			]);
		$todo= new Todo();
		$todo->name=$request->input('name');
		$todo->category_id=$request->input('category_id');
		$todo->do=0;
		$todo->save();

		return redirect('/todos');

	}
	
	public function edit(Request $request,$id){

		$id = (int) $id;

		$todo =Todo::find($id);

		return view('todos.edit', ['todo' => $todo]);

	}
	
	public function update(Request $request){
		
		$id=$request->input('id');

		$todo =Todo::find($id);

		$todo->name=$request->input('name');
		$todo->save();

		return redirect('/todos');
	}
	
	public function delete(Request $request){
		
		$id=$request->input('id');

		$todo =Todo::find($id);
		$todo->delete();

		return redirect('/todos');

	}
	public function checked($id){
		
		$todo =Todo::find($id);
		$todo->do=1;
		$todo->save();

		return redirect('/todos');
	}
}