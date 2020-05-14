<h1>Welcome {{session('name')}}, in Admin Panel</h1> 

 {{session('insertBus')}}
{{session('insertBusSchedule')}}

  
    	<a href="{{route('admin.addBus')}}">Add Bus</a> |
        <a href="{{route('admin.buses')}}">Buses List</a> |
        <a href="{{route('admin.busSchedule')}}">Bus ScheduleList</a></td> |
         <a href="{{route('admin.addBusSchedule')}}">Add Bus Schedule</a> 

    
  

<a href="{{route('logout')}}">Logout</a>