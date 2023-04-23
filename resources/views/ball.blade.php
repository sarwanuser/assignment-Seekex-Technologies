<!DOCTYPE html>
<html lang="en">
<head>
<title>STAGE-1 ASSIGNMENT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        ​<div class="row">
            <div class="col-md-12">
                <a href="/bucket"><button type="button" class="btn btn-primary">Bucket Form</button></a>
                <a href="/ball"><button type="button" class="btn btn-secondary">Ball Form</button></a>
                <a href="/bucket-suggestion"><button type="button" class="btn btn-success">Bucket Suggestion</button></a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3" style="padding: 15px;">
                <h4>Ball</h4><hr>
                <form action="{{ url('/ball/store') }}" method="post">
                    @csrf
                    <label for="">Name:</label>
                    <input type="text" name="name" id="" required><br><br>
    
                    <label for="">Value:</label>
                    <input type="text" name="value" id="" required><br><br>
    
                    <button type="submit" class="btn btn-success">Save</button>
                    <span style="color: red;" min-height="10px" max-height="10px"> &nbsp; @if(Session::has('Failed')){{Session::get('Failed')}}@endif</span>
                    <span style="color: green;" min-height="10px" max-height="10px"> &nbsp; @if(Session::has('Success')){{Session::get('Success')}}@endif</span>
                </form>

                <div class="table-responsive">
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Name</th>
                                <th>Value</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php $x=1; @endphp
                            @foreach($data as $datas)
                            <tr>
                                <td>{{$x++}}</td>
                                <td>{{$datas->name}} </td>
                                <td>{{$datas->value}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>