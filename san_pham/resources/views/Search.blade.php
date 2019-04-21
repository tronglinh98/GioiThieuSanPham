<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách tin tức</title>

    <style>
        #customers*{
            border-collapse: collapse;
            width: 80%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr{background-color: #f2f2f2;}


        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #83C75D;
            color: white;
        }

        #form1 {
            border-collapse: collapse;
            margin-right: 500px;
        }
        #form1 input{
            width: 200px;
            height: 25px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 12px;
            background-color: white;

        }
        #form1 button{
            background-color: #4CAF50;
            color: white;
            padding: 5px 18px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h1 id="h11">DANH SÁCH TIN TỨC</h1>
<h2>
    <form action="{{Route('search')}}" method="GET" id="form1">
        {{--  {{ csrf_field() }} --}}
        <input type="text" name="search">
        <button type="submit">SEARCH</button>

    </form>
</h2>

<table border="1" id="customers">

    <thead>
    <tr>
        <th>ID</th>
        <th>Tên Sản Phẩm</th>
        <th>Hình ảnh</th>
        <th>Loại Sản Phẩm</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($san_pham as $row)
    <tr>
        <td>{{$row->id}}</td>
        <td>{{$row->ten_san_pham}}</td>
        <td>
            <img src="{{asset('images/' . $row->hinh_anh)}}" width="120" height="100">
        </td>
        <td>{{$row->loai_san_pham->loai_san_pham}}</td>
        <td><a href="edit/{{$row->id}}">Edit</a> </td>
        <td><a href="delete/{{$row->id}}">Delete</a> </td>
    </tr>
    @endforeach
    </tbody>

</table>
<a href="/san_pham/public">Home</a>
</body>
</html><?php
