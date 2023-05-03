<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

                        <!--<a href="{{ route('admin.apartments.new', ['house_id' => 1]) }}">New apartment</a>-->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($apartments as $apartment)
                <tr>
                    <td>
                        <a href="{{ route('admin.apartments.edit', ['house_id' => $apartment->house->id,'id' => $apartment->id]) }}">Edit</a>
                    </td>
                    <td>{{ $apartment->id }}</td>
                    <td>{{ $apartment->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


        svi apartmani
        <div class="panel-body">
        </div>

    </body>
</html>
