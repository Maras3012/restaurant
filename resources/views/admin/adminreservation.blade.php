<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include("admin.admincss")
  </head>
  <body>
    <div class="container-scroller">
    @include("admin.navbar")

    <div style="position: relative; top: 60px; right: -150px;">
        
        <table style="background-color: grey; border: 3px;">
            <tr>
                <th style="padding: 30px">Name</th>
                <th style="padding: 30px">Email</th>
                <th style="padding: 30px">Number</th>
                <th style="padding: 30px">Guest</th>
                <th style="padding: 30px">Date</th>
                <th style="padding: 30px">Time</th>
                <th style="padding: 30px">Message</th>
            </tr>

            @foreach($data as $data)
            <tr align="center">
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->number}}</td>
                <td>{{$data->guest}}</td>
                <td>{{$data->date}}</td>
                <td>{{$data->time}}</td>
                <td>{{$data->message}}</td>
            </tr>
            @endforeach
        </table>
    </div>
    </div>
    @include("admin.adminscript")
  </body>
</html>