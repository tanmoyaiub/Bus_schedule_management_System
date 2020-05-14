<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
<h1>Bus Schedule's</h1>
<script>
    function f1(){
        $data =  $('#searchBus1').val();
        $.ajax({
            type: 'post',
            url: "/system/busSchedule/manager/ajax/"+$data,
             data : {
                       "_token": "{{ csrf_token() }}"  
                    },
                    datatype : 'html',
            success: function(response){

           var data =  "<tr>"
                + "<th>" + "Name" + "</th>" 
                + "<th>" + "Route" + "</th>"
                + "<th>" + "Fare" + "</th>"
                + "<th>" + "Deparature" + "</th>"
                + "<th>" + "Arrival" + "</th>"
            + "</tr>"
            + "<tr>"
                + "<td>" +response.success[0]['name']+ "</td>"
                + "<td>" +response.success[0]['route']+ "</td>"
                + "<td>" +response.success[0]['fare']+ "</td>"
                + "<td>" +response.success[0]['deparature']+ "</td>"
                + "<td>" +response.success[0]['arrival']+ "</td>"
            + "</tr>";


            $("#table").append(data);
            },
            error: function(error){
                alert(error.status);
            }
        });
       
    }  

    
</script>
 

<table id="table"  border="1px" style="text-align:center;"></table>


<table border="1px" style="text-align:center;">  

    <tr>
        <td><input type="text" id="searchBus1"></td> 
        <td colspan="2"><button type="button" onclick="f1()">Search Bus</button></td>
        <td>
        	<a href="{{route('admin.home')}}">Back</a>
        </td>
    </tr>

    <tr>
        <th>Operator<th>
       <th>Manager<th>
        <th>Name<th>
        <th>Location<th>
       <th>Route<th>
       <th>Fare<th>
       <th>deparature<th>
        <th>Arrival<th>
        <th>Action<th>
    </tr>

    
    @for($i = 0; $i < count($busSchedule); $i++)
        <tr>
            <td>{{$buses[$i]['operator']}}<td>
            <td>{{session('name')}}<td>
            <td>{{$buses[$i]['name']}}<td>
            <td>{{$buses[$i]['location']}}<td>
            <td>{{$busSchedule[$i]['route']}}<td>
            <td>{{$busSchedule[$i]['fare']}}<td>
            <td>{{$busSchedule[$i]['departure']}}<td>
            <td>{{$busSchedule[$i]['arrival']}}<td>
            <td>
                <a href="{{route('edit.busSchedule' , $busSchedule[$i]['id'])}}">Edit</a> | 
                <a href="#">Delete</a>
            <td>
        </tr>   
    @endfor

  
</table>