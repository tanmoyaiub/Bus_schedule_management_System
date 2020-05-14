<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
<h1>BusList for Manager</h1>
<a href="{{route('manager.index')}}">Back</a>
{{session('updateBus')}}
<script>
    function f2(id){
        
        
        if (confirm("After dalete it can't be restore!")) {
            $.ajax({
            type: 'delete',
            url: "/system/buses/manager/"+id+"/delete",
             data : {
                       "_token": "{{ csrf_token() }}"  
                    },
                    datatype : 'html',
            success: function(response){
                //alert("Come back");
                window.location = response;
            },
            error: function(error){
                alert(error.status);
            }
        });
        } else {
            
        } 
    }
</script>
 

<table border="1px" style="text-align:center;">   
    <tr>
        <th>Operator<th>
       <th>Manager<th>
        <th>Name<th>
        <th>Location<th>
       <th>Seat_row<th>
       <th>Seat_column<th>
       <!-- <th>Company<th> -->
        <th>Action<th>
    </tr>

    @foreach ($busList as $bus)
        <tr>
            <td>{{$bus['operator']}}<td>
            <td>{{session('name')}}<td>
            <td>{{$bus['name']}}<td>
            <td>{{$bus['location']}}<td>
            <td>{{$bus['seat_row']}}<td>
            <td>{{$bus['seat_column']}}<td>
            <!-- <td>{{$bus['company']}}<td> -->
            <td>
                <a href="/system/buses/manager/{{$bus['busId']}}/edit">Edit</a> | 
                <button type="button" onclick="f2({{$bus['busId']}})">Delete</button>
            <td>
        </tr>
    @endforeach
</table>