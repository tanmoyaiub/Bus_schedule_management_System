<h1>This is edit buss page</h1>

<form method="post">
    @csrf
     @method('PATCH')
    <table> 
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value= "{{$buses[0]['name']}}"></td>
        </tr>
        <tr>
            <td>Operator</td>
            <td><input type="text" name="operator" value= "{{$buses[0]['operator']}}"></td>
        </tr>
        <tr>
            <td>Location</td>
            <td><input type="text" name="location" value= "{{$buses[0]['location']}}"></td>
        </tr>
        <tr>
            <td>Seat_Row</td>
            <td><input type="text" name="seat_row" value= "{{$buses[0]['seat_row']}}"></td>
        </tr>
        <tr>
            <td>Seat_Column</td>
            <td><input type="text" name="seat_column" value= "{{$buses[0]['seat_column']}}"></td>
        </tr>
      <!--   <tr>
            <td>Company</td>
            <td><input type="text" name="company" value= "{{$buses[0]['company']}}"></td>
        </tr> -->
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