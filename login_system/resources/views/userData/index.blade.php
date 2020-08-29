@extends('userData.layout')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Fetch Data using Ajax Call</h2>
            </div>
            @if(isset(Auth::user()->email))
            <div class="pull-right alert alert-danger success-block">
                <strong>Welcome {{ Auth::user()->email }}</strong>
                <br />
                <a href="{{ url('/main/logout') }}">Logout</a>
            </div>
            @else
            <div class="pull-right">
                <a class="btn btn-success" href="{{ url('/main/') }}"> Login</a>
                <!-- <a class="btn btn-success" href="{{ route('userData.create') }}"> Create New User</a> -->
            </div>
            @endif
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered table-sm">
       <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>email</th>
            <th>Created_at</th>
            <!-- <th width="280px">Action</th> -->
        </tr>
       </thead>
       <tbody id="bodyData">

       </tbody>  
    </table>
      
<script>
    $(document).ready(function() {
        var url = "{{URL('userData')}}";
        $.ajax({
            url: "/userData/getUserData",
            type: "POST",
            data:{ 
                _token:'{{ csrf_token() }}'
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
                console.log(dataResult);
                var resultData = dataResult.data;
                var bodyData = '';
                var i=1;
                $.each(resultData,function(index,row){
                    bodyData+="<tr>"
                    bodyData+="<td>"+ i++ +"</td><td>"+row.name+"</td><td>"+row.email+"</td><td>"+row.created_at+"</td>";
                    bodyData+="</tr>";
                    
                })
                $("#bodyData").append(bodyData);
            }
        });

        
});
</script>
@endsection
   