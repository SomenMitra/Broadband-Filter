
<script type="text/javascript" src="{{URL::asset('js/jquery.js')}}"></script>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<style type="text/css">
	.warn{
		color: red;
	}
</style>

</head>

<body>

    <script type="text/javascript">
	function validation()
	 {
            let email = document.myForm.email.value;
            let name = document.myForm.applicant_name.value;
            let mobile = document.myForm.mobile_no.value;

            error_name=false;
            error_email=false;
            error_mobile=false;

            checkname(name);
            checkEmail(email);
            phonenumber(mobile);

				    function checkname(inputtxt)
				  {
				   var letters = /^[A-Za-z]+$/;
				   if(inputtxt.match(letters))
				     {
				     error_name=true;
				     }
				   else
				     {
				     error_name=false;
				     alert("Name must be letters only !");
				    document.myForm.applicant_name.focus();
				    return false;
				     }
				  }
    
          
			   function checkEmail(email) 
			      {
			    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			    if (!filter.test(email))
			       {
			   	error_email=false;
			    alert('Please provide a valid email !');
			    document.myForm.email.focus();
			    return false;

					 }	
				else{
					error_email=true;
				      }	   
			 		}




			 	function phonenumber(inputtxt) {
				  var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
				  if(inputtxt.match(phoneno)) {
				    error_mobile=true;
				  }
				  else {
				     alert('Please provide a valid Phone Number !');
				    error_mobile=false;
				    document.myForm.mobile_no.focus();
				    return false;
				  }
				}



	if (error_name && error_email && error_mobile)
	{
		return true;
	}
	else{
		alert('All Fields are Required');
		return false;
	}
		
}


</script>

















	@if(isset($msg))
    <center><h3 class="alert alert-success" style="color:green;width: 800px;height: 50px; margin-down: 10px;">{{isset($msg)?$msg:""}}</h3></center>
    @endif

		<h2 class="text text-center">Broadband Connection Form</h2>
		<form  class="container text text-center" method="post" action="reg" name="myForm" onsubmit="return validation()">

		<table class="table table-borderless" cellpadding="30px" cellspacing="60px">
			<tr>
				<td>
				<div class="form-group">
				    <label for="">Service Provider Name</label>
				 </div>
				 <div class="form-group">
				   <select class="form-control" name="provider_id" id="provider_id" required>
				   		<option>-select-</option>
				   		@foreach ($provider as $s)
                        <option value="{{$s->provider_id}}">{{$s->provider_name}}</option>
                        @endforeach
				   </select>
				  </div>
				  </td>
				  <td>
				<div class="form-group">
				    <label for="branch">Connection Speed</label>
                    <select class="form-control" id="" name="connection_id" >
                        <option value="" hidden>Select </option>
                        @foreach ($connection as $b)
                        <option value="{{$b->connection_id}}">{{$b->connection_speed}}</option>
                        @endforeach
                    </select>
				  </div>
				  </td>
				  <td>

				  </td>
			 </tr>
		</table>



	<div class="form-group">
	<fieldset class="form-group border p-3 the-fieldset">
		<legend class="the-legend">Applicant Details</legend>
		<table class="table table-borderless">
			<tr>
				<td>
					<div class="form-group">
					  <label for="name">Name</label>
					  <input type="text" class="form-control form-control-sm" name="applicant_name" id="applicant_name">

					  @error('applicant_name')
					    <span style="color: red;">{{ $message }}</span>
					@enderror
				  	</div>
		  		</td>
		  		<td>
		  			<div class="form-group">
					  <label for="email">Email</label>
					  <input type="text" class="form-control form-control-sm" name="email_id" id="email">
					  <span id="message" class="warn"></span>
					 <!--  @error('email_id')
					    <span style="color: red;">{{ $message }}</span>
					@enderror -->
				  	</div>	
		  		</td>
		  		<td>
		  			<div class="form-group">
					  <label for="mobile_no">Phone No</label>
					  <input type="text" class="form-control form-control-sm" name="mobile_no" id="mobile_no">
					  @error('mobile_no')
					    <span style="color: red;">{{ $message }}</span>
					@enderror
				  	</div>	
		  		</td>
		  	</tr>
		  	<tr> 
		  		<td>
					<div class="form-group">
					  <label for="dob">DOB</label>
					  <input type="datetime-local" class="form-control form-control-sm" name="dob" id="dob">
					   @error('dob')
					    <span style="color: red;">{{ $message }}</span>
					@enderror
				  	</div>
		  		</td>
		  		<td>
		  			<div class="form-group">
					  <label for="gender">Gender</label><br>
					  <input type="radio"  value="Male" name="gender" id="gender" checked>Male
					  <input type="radio"  value="Female" name="gender" id="gender">Female
				  	</div>	
		  		</td>
		  		<td>
                  <div class="form-group">
					  <label for="image_path">Upload Address</label>
					  <input type="file" class="form-control form-control-sm" name="image_path" id="image_path">
					   @error('image_path')
					    <span style="color: red;">{{ $message }}</span>
					@enderror
				  	</div>		
		  		</td>
		  	</tr>

		 </table>
		 <tr>
		  	<input class="btn btn-primary" type="submit" name="btn" id="btn" value="submit">
		  	<input class="btn btn-danger" type="reset" name="resetbtn" id="resetbtn" value="Reset">
		  	</tr>
	</fieldset>
	 </div>
	 @csrf
</form>
	</select>
    


<form action="filter" method="filter" class="container text text-center" onclick="return search()">
@csrf
    <div class="row">
       <div class="col-md-4">
        <div class="form-group">
        <label>Select provider Name</label>

        <select class="form-control" name="provider_id" id="filter">
				   		<option>-select-</option>
				   		@foreach ($provider as $s)
                        <option value="{{$s->provider_id}}">{{$s->provider_name}}</option>
                        @endforeach
		</select>
        </div>
      </div>
        <div class="col-md-4">
        <div class="form-group">
        <label>Click to Search</label> <br>
      <button type="submit" id="filter" class="btn btn-info">Search</button>
      </div>
      </div>
      </div>
</form>






<div class="card mt-4">
    <div class="card-body">
    <table class="table table-dark">
    <thead>
    <tr>
    <th>slno</th>
    <th>Name</th>
    <th>Email</th>
    <th>Mobile No</th>
    <th>Document</th>
    <th>Provider Name</th>
    <th>Speed</th>
    <th>Fees</th>


    </tr>
    </thead>
    <tbody>
    @php
    $i=1
    @endphp
    @foreach($data as $user)
    <tr>
    <th scope="row">{{$i++}}</th>
      <td>{{$user->applicant_name}}</td>
      <td>{{$user->email_id}}</td>
      <td>{{$user->mobile_no}}</td>
      <td>{{$user->image_path}}</td>
      <td>{{$user->provider_name}}</td>
      <td>{{$user->connection_speed}}</td>
      <td>{{$user->fees}}</td>

    </tr>
    @endforeach                         
      </tbody>
    </table>
  </div>
  </div>
</center>




