@extends('userData.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('userData.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
        <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
    <label for="email">Name:</label>
    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
  </div>
  <div class="form-group">
    <label for="email">Phone:</label>
    <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone">
  </div>
  <div class="form-group">
    <label for="email">City:</label>
    <input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
  </div>
  <button type="submit" class="btn btn-primary" id="butsave">Submit</button>
</div>
<script>
$(document).ready(function() {
   
    $('#butsave').on('click', function() {
      var name = $('#name').val();
      var email = $('#email').val();
      var phone = $('#phone').val();
      var city = $('#city').val();
      var password = $('#password').val();
      if(name!="" && email!="" && phone!="" && city!=""){
        //   $("#butsave").attr("disabled", "disabled");
          $.ajax({
              url: "/userData",
              type: "POST",
              data: {
                  _token: $("#csrf").val(),
                  type: 1,
                  name: name,
                  email: email,
                  phone: phone,
                  city: city
              },
              cache: false,
              success: function(dataResult){
                  console.log(dataResult);
                  var dataResult = JSON.parse(dataResult);
                  if(dataResult.statusCode==200){
                    window.location = "/userData";				
                  }
                  else if(dataResult.statusCode==201){
                     alert("Error occured !");
                  }
                  
              }
          });
      }
      else{
          alert('Please fill all the field !');
      }
  });
});
</script>
@endsection