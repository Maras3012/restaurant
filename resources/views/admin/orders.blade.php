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

    <div style="position: relative; top: 60px; right: -150px">

            <form align="center" action="{{url('/search')}}" method="get">

                @csrf
                <input type="text" name="search" style="color: black;">
                <input type="submit" value="Search" class="btn btn-success">
            </form>

            <table style="background-color: black">
                <tr align="center">
                    <th style="padding: 20px">Name</th>
                    <th style="padding: 20px">Phone</th>
                    <th style="padding: 20px">Address</th>
                    <th style="padding: 20px">Foodname</th>
                    <th style="padding: 20px">Price</th>
                    <th style="padding: 20px">Quantity</th>
                    <th style="padding: 20px">Total price</th>
                </tr> 

                @foreach($data as $data)
                <tr align="center" style="background-color: black;">
                    <td>{{$data->name}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->address}}</td>
                    <td>{{$data->foodname}}</td>
                    <td>{{$data->price}}$</td>
                    <td>{{$data->quantity}}</td>
                    <td>{{$data->price * $data->quantity}}$</td>
                    <td><a href="{{url('/deletechef',$data->id)}}">Delete</a></td>
                    <td><a href="{{url('/updatechef',$data->id)}}">Update</a></td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>

    @include("admin.adminscript")
  </body>
</html>