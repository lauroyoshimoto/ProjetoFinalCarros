<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Car;
use App\Models\Make;

use App\Models\User;

class CarController extends Controller

{
    public function index(){

        $search = request('search');

        if($search) {
            $cars = Car::where([ ['model', 'like', '%'.$search.'%'] ])->get();
        } else {
            $cars = Car::all();
        }
   
        return view('cars.welcome',['cars' => $cars, 'search' => $search]);
    }

    public function create(){
        $makes = Make::all();
        return view('cars.create', ['makes' => $makes]);
    }

    public function store(Request $request){

        $car =  new Car;

        $car->make_id = $request->make_id;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->value = $request->value;

        //image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/cars'), $imageName);

            $car->image = $imageName;
        }

        $car->save();

        return redirect('/')->with('msg', 'Carro criado com sucesso!');
    }

    public function show($id) {
        $car = Car::findOrFail($id);
        return view('cars.show', ['car' => $car]);   
    }

    public function dashboard() {        
        $cars = Car::all();
        return view('cars.dashboard', ['cars' => $cars]);
    }

    public function destroy($id) {
        Car::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg', 'Carro excluído com sucesso!');
    }

    public function edit($id) {
        $car = Car::findOrFail($id);
        $makes = Make::all();
        return view('cars.edit', ['car' => $car, 'makes' => $makes ]);
    }

    public function update(Request $request) { 

        $data = $request->all();

        //image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/cars'), $imageName);

            $data['image'] = $imageName;
        }

        Car::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Carro editado com sucesso!');
    }
}
