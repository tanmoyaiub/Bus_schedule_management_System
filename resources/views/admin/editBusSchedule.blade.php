<h1>Edit Bus Schedule</h1>

<form method="post" action="{{route('update.busSchedule' , $busSchedule->id)}}">
    @csrf
    
    <table> 
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="{{$busSchedule->name}}"></td>
        </tr>
        <tr>
            <td>Route</td> 
            <td><input type="text" name="route" value="{{$busSchedule->route}}"></td>
        </tr>
        <tr>
            <td>Fare</td>
            <td><input type="text" name="fare" value="{{$busSchedule->fare}}"></td>
        </tr>
        <tr>
            <td>Deparature</td>
            <td><input type="text" name="deparature" value="{{$busSchedule->departure}}"></td>
        </tr>
        <tr>
            <td>Arrival</td>
            <td><input type="text" name="arrival" value="{{$busSchedule->arrival}}"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Update"></td>
        </tr>
        <tr>
            <td><a href="{{route('admin.home')}}">Back</a></td>
            <td><a href="{{route('logout')}}">Logout</a></td>
        </tr>

    </table>

    @foreach ($errors->all() as $error)
        {{$error}}<br>
    @endforeach
</form>