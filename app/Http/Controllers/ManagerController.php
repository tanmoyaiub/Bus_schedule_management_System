<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\bus; 
use App\busesschedule;
/*use Validator;*/

class ManagerController extends Controller
{
     public function index(){
        return view('manager.index');
    }

    public function busList(){
    	$busList = bus::all();
        return view('manager.busList')
            ->with('busList', $busList);
    }

    public function busSchedule(){
        $busSchedule = busesschedule::all();
        $buses = bus::all();
        return view('manager.busSchedule')
            ->with('busSchedule', $busSchedule)
            ->with('buses', $buses);
    }

    public function addBusSchedule(){
        return view('manager.addBusSchedule');
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
            $req->session()->flash('insertBusSchedule', 'Bus Schedule insert success');
            return redirect()->route('manager.index');
        }
    }

}
