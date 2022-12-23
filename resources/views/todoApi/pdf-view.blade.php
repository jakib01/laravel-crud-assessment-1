<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Viewer</title></head>
<style>
    h1,h2,h3 {
        text-align: center;
    }
</style>
<body>
<h1 style="align-items: center">PDF Header</h1>
<h3>{!! $allData[0]['title'] !!}</h3>
@if(isset($allData))

    <table>
        <thead>
        <tr>
            <th>Title</th>
            <th>User Name</th>
            <th>Completed</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allData as $data)
            <tr>
                <td>{!! $data['title'] !!}</td>

                @if(isset($data['user']))
                    <td>{!! $data['user']['username']!!}</td>
                @else
                    <td>N/A</td>
                @endif
                <td>{!! $data['completed'] == 1 ? 'Completed' : 'Incomplete' !!}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Title</th>
            <th>User</th>
            <th>Completed</th>
        </tr>
        </tfoot>
    </table>
@endif


</body>
</html>
