<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\DB;
use App\bus;
use App\busesschedule;
use Validator;

class AdminController extends Controller
{
    public function index(){
    	return view('admin.index');
    }

    public function addBus(){
    	return view('admin.addBus');
    }

     public function searchBus($id){
        
        $bus = Bus::where('busId', $id)->get();
        
        return response()->json(['success'=> $bus]);
    }

    public function insertBus(Request $req){
    	$req->validate([
            'name' => 'required',
            'operator' => 'required',
            'location' => 'required',
            'seat_row' => 'bail|required|numeric',
            'seat_column' => 'bail|required|numeric',
           // 'company' => 'required',
        ]);

        $name = $req->name;
        $operator = $req->operator;
        $location = $req->location;
        $seat_row = $req->seat_row; 
        $seat_column = $req->seat_column;
       // $company = $req->company;

        $data = new bus;

        $data->name = $name;
        $data->operator = $operator;
        $data->location = $location;
        $data->seat_row  = $seat_row ;
        $data->seat_column = $seat_column;
       // $data->company = $company;

        if($data->save()){
            $req->session()->flash('insertBus', 'Bus added  successfully');
            return redirect()->route('admin.buses');
        }
    }

    public function busList(){
        $buses = bus::all();
        return view('admin.busList')
            ->with('buses', $buses);
        
    }

    public function editBus($id){
    	 $buses = Bus::where('id', $id)->get();
        return view('admin.editBus')
            ->with('buses', $buses);
    }

    public function updateBus(Request $req , $id){
    	 $req->validate([
            'name' => 'required',
            'operator' => 'required',
            'location' => 'required',
            'seat_row' => 'bail|required|numeric',
            'seat_column' => 'bail|required|numeric',
            //'company' => 'required',
        ]);

        $name = $req->name;
        $operator = $req->operator;
        $location = $req->location;
        $seat_row = $req->seat_row; 
        $seat_column = $req->seat_column;
       // $company = $req->company;

        $data = bus::find($id);
        //error_log($data);

        $data->name = $name;
        $data->operator = $operator;
        $data->location = $location; 
        $data->seat_row  = $seat_row ;
        $data->seat_column = $seat_column;
       // $data->company = $company;

        if($data->save()){
            $req->session()->flash('updateBus', 'Bus updated successfully');
            return redirect()->route('admin.buses');
        }
    }

    public function editBusSchedule($id){
    	$busSchedule = busesschedule::find($id);
    	return view('admin.editBusSchedule' , compact('busSchedule'));
    }

    public function updateBusSchedule(Request $req ,$id){
    	$req->validate([
            'name' => 'required',
            'route' => 'required',
            'fare' => 'bail|required|numeric',
            'deparature' => 'bail|required|numeric',
            'arrival' => 'bail|required|numeric',
        ]);

        $name = $req->name;
        $route = $req->route;
        $fare = $req->fare;
        $deparature = $req->deparature; 
        $arrival = $req->arrival;

        $data =busesschedule::find($id);

        $data->name = $name;
        $data->route = $route;
        $data->fare = $fare;
        $data->departure  = $deparature ;
        $data->arrival = $arrival;

        if($data->save()){
            $req->session()->flash('updateBusSchedule', 'Bus Schedule updated success');
            return redirect()->route('admin.busSchedule');
        }
    }



     public function deleteBus($id){
        $bus = bus::find($id);
        bus::where('id', $id)->delete();
       // return redirect()->route('admin.buses');
       return url('/system/buses');
    }

    public function addBusSchedule(){
        return view('admin.addBusSchedule');
    }

     public function busSchedule(){
        $busSchedule = busesschedule::all();
        $buses = bus::all();
        return view('admin.busSchedule')
            ->with('busSchedule', $busSchedule)
            ->with('buses', $buses);
        
    }

    public function insertBusSchedule(Request $req){
        $req->validate([
            'name' => 'required',
            'route' => 'required',
            'fare' => 'bail|required|numeric',
            'deparature' => 'bail|required|numeric',
            'arrival' => 'bail|required|numeric',
        ]);

        $name = $req->name;
        $route = $req->route;
        $fare = $req->fare;
        $deparature = $req->deparature; 
        $arrival = $req->arrival;

        $data = new busesschedule;

        $data->name = $name;
        $data->route = $route;
        $data->fare = $fare;
        $data->departure  = $deparature ;
        $data->arrival = $arrival;

        if($data->save()){
            $req->session()->flash('insertBusSchedule', 'Bus Schedule inserted success');
            return redirect()->route('admin.busSchedule');
        }
    }
}
