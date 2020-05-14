<h1>Add BusSchedule for Manager</h1>

<form method="post">
    @csrf
    <table> 
        <tr>
            <td>Name</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Route</td> 
            <td><input type="text" name="route"></td>
        </tr>
        <tr>
            <td>Fare</td>
            <td><input type="text" name="fare"></td>
        </tr>
        <tr>
            <td>Deparature</td>
            <td><input type="text" name="deparature"></td>
        </tr>
        <tr>
            <td>Arrival</td>
            <td><input type="text" name="arrival"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="ADD"></td>
        </tr>

    </table>

    @foreach ($errors->all() as $error)
        {{$error}}<br>
    @endforeach
</form>