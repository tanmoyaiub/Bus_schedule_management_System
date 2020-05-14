<h1>Wellcome {{session('name')}} in Manager Dashboard</h1>



	<a href="{{route('manager.busList')}}">Buses List</a>|
    
   	<a href="{{route('manager.Schedule')}}">Bus ScheduleList</a>|
    <a href="{{route('manager.addBusSchedule')}}">Add Bus Schedule</a>|
    <a href="{{route('logout')}}">Logout</a>
