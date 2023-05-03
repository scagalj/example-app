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

                        <a href="{{ route('admin.houses.new') }}">New House</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($houses as $house)
                <tr>
                    <td>
                        <a href="{{ route('admin.houses.edit', ['id' => $house->id]) }}">Edit</a>
                    </td>
                    <td>{{ $house->id }}</td>
                    <td>{{ $house->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


        svi objekti

    </body>
</html>