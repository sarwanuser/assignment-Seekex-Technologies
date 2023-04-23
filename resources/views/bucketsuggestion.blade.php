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
                <h4>Bucket Suggestion</h4><hr>
                <form action="{{ url('/bucket-suggestion/calculate') }}" method="post">
                    @csrf
                    <label style="width: 70px;">PINK:</label>
                    <input type="text" name="pink" value="{{@$post['pink']}}" required><br><br>

                    <label style="width: 70px;">RED:</label>
                    <input type="text" name="red" value="{{@$post['red']}}" required><br><br>

                    <label style="width: 70px;">BLUE:</label>
                    <input type="text" name="blue" value="{{@$post['blue']}}" required><br><br>

                    <label style="width: 70px;">ORANGE:</label>
                    <input type="text" name="orange" value="{{@$post['orange']}}" required><br><br>

                    <label style="width: 70px;">GREEN:</label>
                    <input type="text" name="green" value="{{@$post['green']}}" required><br><br>


                    <button type="submit" class="btn btn-success">SUGGEST ME BUCKETS</button>
                    <span style="color: red;" min-height="10px" max-height="10px"> &nbsp; @if(Session::has('Failed')){{Session::get('Failed')}}@endif</span>
                    <span style="color: green;" min-height="10px" max-height="10px"> &nbsp; @if(Session::has('Success')){{Session::get('Success')}}@endif</span>
                </form>
            </div>
            <div class="col-md-5">
                <h4>Result</h4>
                <p>Following are the suggested buckets:</p>
                <div class="table-responsive">
                    <table class="table table-hover" id="datatablesSimple">
                        <thead style="font-size: 12px;">
                            <tr>
                                <th>BUCKET</th>
                                <th>EMPTY VOLUME</th>
                                <th>BALL</th>
                                <th>NO. OF BALLS CAN BE PUT</th>
                                <th>Message</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(@$result)
                            @foreach(@$result as $rdata)
                            <tr>
                                <td>{{$rdata['bucket']}}</td>
                                <td>{{$rdata['empty']}}</td>
                                <td>{{$rdata['ball']}}</td>
                                <td>{{$rdata['no_ball']}}</td>
                                <td>{{$rdata['msg']}}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-2">
                <h4>Bucket</h4>
                <div class="table-responsive">
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Value</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php $x=1; @endphp
                            @foreach($buckets as $bucket)
                            <tr>
                                <td>{{$bucket->name}} </td>
                                <td>{{$bucket->value}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="col-md-2">
                <h4>Ball</h4>
                <div class="table-responsive">
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Value</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php $x=1; @endphp
                            @foreach($balls as $ball)
                            <tr>
                                <td>{{$ball->name}} </td>
                                <td>{{$ball->value}}</td>
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