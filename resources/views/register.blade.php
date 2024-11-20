<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

//for date picker(dd/mm/yy)
 <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js
"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">





<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
  </li>
  <!-- <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
  </li> -->
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

  @if(isset($msg))
    <center><h3 class="alert alert-success" style="color:green;width: 1100px;height: 55px; margin-down: 10px;">{{isset($msg)?$msg:""}}</h3></center>
    @endif
    <h2 style="color:red;" class="text text-center">BroadBand Connection Form</h2>
    <form  class="container text text-center" method="post" action="register" enctype="multipart/form-data" name="myForm" onsubmit="return validation()">

    <table class="table table-borderless" cellpadding="30px" cellspacing="60px">
      <tr>
        <td>
        <div class="form-group">
            <label for="">Library Name *</label>
         </div>
         <div class="form-group">
           <select class="form-control" name="provider_id" id="provider_id">
              <option>-select-</option>
               @foreach($provider as $c)
                <option value="{{$c->provider_id}}">{{$c->provider_name}}</option>
                 @endforeach
           </select>
           <h5 id="providercheck"></h5>
           <!-- @error('library_id')
              <span style="color: red;">{{ $message }}</span>
          @enderror
            -->
          </div>
          </td>
          <td>
        <div class="form-group">
        <label for="branch">Subscription Type *</label>
                    <select class="form-control" id="connection_id" name="connection_idd" >
                        <option value="" hidden>Select </option>
                    </select>
                    <h5 id="subscriptioncheck">dsd  </h5>
                    <!-- @error('subscription_id')
                     <span style="color: red;">{{ $message }}</span>
                    @enderror -->
          </div>
          </td>
          <td>
        <div class="form-group">
        <label for="branch">Subscription Fee *</label>
                    <input type="text" class="form-control" id="fees" name="fees" readonly="true">
                <h5 id="feescheck">dsd  </h5>
               <!--  @error('fees')
                     <span style="color: red;">{{ $message }}</span>
                    @enderror     -->
        </div>

          </td>
       </tr>
    </table>



  <div class="form-group">
  <fieldset class="border p-2">
      <legend class="float-none w-auto p-2"> <h5 style="color:blue;">Applicant Registration Form</h5></legend>
    <table class="table table-borderless">
      <tr>
        <td>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control form-control-sm" name="applicant_name" id="applicant_name">
            <h5 id="namecheck">dsd  </h5>
            <!-- @error('applicant_name')
              <span style="color: red;">{{ $message }}</span>
          @enderror -->
            </div>
          </td>
          <td>
            <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control form-control-sm" name="email_id" id="email_id">
            <h5 id="emailcheck">dsd  </h5>
           <!--  @error('email_id')
              <span style="color: red;">{{ $message }}</span>
          @enderror -->
            </div>  
          </td>
          <td>
            <div class="form-group">
            <label for="mobile_no">Phone No</label>
            <input type="text" class="form-control form-control-sm" name="mobile_no" id="mobile_no">
            <h5 id="mobilecheck">dsd  </h5>
           <!--  @error('mobile_no')
              <span style="color: red;">{{ $message }}</span>
          @enderror -->
            </div>  
          </td>
        </tr>
        <tr> 
          <td>
          <div class="form-group">
            <label for="dob">DOB</label>
            <input type="text" class="form-control form-control-sm" name="dob" id="dob">
            <h5 id="dobcheck">dsd  </h5>
            <span id="age" style="color:red;"> </span>
             <!-- @error('dob')
              <span style="color: red;">{{ $message }}</span>
          @enderror -->
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
            <h5 id="imagecheck">dsd  </h5>
             <!-- @error('image_path')
              <span style="color: red;">{{ $message }}</span>
          @enderror -->
            </div>    
          </td>
        </tr>

     </table>
     <tr>
        <input class="btn btn-primary" type="submit" id="register" name="btn" value="Submit">
        <input class="btn btn-danger" type="reset" name="resetbtn" id="resetbtn" value="Reset">
        </tr>
  </fieldset>
   </div>
   @csrf
</form>
  </select>
   



  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

  <h2 class="text-success text-center display-6 mb-4"><b>Registration Details</b></h2>
    <table class="table table-borderless" cellpadding="30px" cellspacing="60px">
      <tr>
        <td>
           <div class="form-group">
             <label>Select Library Name</label>
                 <select class="form-control" name="provider_id1" id="provider_id1">
                      <option>-select-</option>
                       @foreach($provider as $c)
                <option value="{{$c->provider_id}}">{{$c->provider_name}}</option>
                 @endforeach
                          
                  </select>
            </div>
        </td>   
    <td>
       <div class="form-group">
          <label>Select Subscription Type</label>
             <select class="form-control" id="connection_id1" name="connection_id" >
                <option>Select </option>
              </select>
        </div>
    </td>
    <td>
      <div class="form-group">
          <label>Click to Search</label> <br>
              <button type="submit" class="btn btn-info" onclick='getFilter()'>Search</button>
      </div>
    </td>
</tr>
    </table>
  <div class="card mt-4">
            <div class="card-body">
            <table id="td" class="table table-striped">
            <thead>
            <tr>
            <th>slno</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile No</th>
            <th>Age</th>
            <th>Regd Date</th>
            <th>Document</th>
            <th>Provider Name</th>
            <th>Connection Speed</th>


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
              <td>
              <?php
              $dateOfBirth = $user->dob ;
              $today = date("Y-m-d");
              $diff = date_diff(date_create($dateOfBirth), date_create($today));
              echo ''.$diff->format('%y');
              ?>
              </td>
              <td>{{$user->regd_date}}</td>
              <td> <a href="{{url('/uploads/',$user->image_path)}} " height="100px" width="100px" >{{$user->image_path}} </a> </td>
              <td>{{$user->provider_name}}</td>
              <td>{{$user->connection_speed}}</td>
              

            </tr>
            @endforeach                         
              </tbody>
            </table>

            <table class="table table-light table-striped" id="td">
                    <thead>
                        <tr>
                            <th scope="col">SL#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile No</th>
                            <th scope="col">Age</th>
                            <th scope="col">Image</th>
                            <th scope="col">Provider Name</th>
                            <th scope="col">Connection Type</th>
                        </tr>
                    </thead>
                    <tbody id="b">
                    
                    </tbody>
                <table>

  </div>
</div>

<script type="text/javascript">
$( document ).ready(function() {
  //alert('hii');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


   $("#provider_id").change(function () {
       var provider_id = this.value;
        $.ajax({
           type:'POST',
           url:"{{ url('get-sub-type') }}",
           data:{provider_id:provider_id},
           success:function(sems){
              $('#connection_id').html(sems);
           }
        });
   }); 

   $("#connection_id").change(function () {
       var connection_id = this.value;
       console.log(connection_id)
        $.ajax({
           type:'POST',
           url:"{{ url('get-sub-fees') }}",
           data:{connection_id:connection_id},
           success:function(res){
            var fees=res.fees[0].fees;
            //  alert(fees);
              $('#fees').val(fees);
           }
        });
   });

   $("#dob").change(function() {
        date = $("#dob").val();
        const myArray = date.split("/");
        selected_year=myArray[2];
        selected_year=parseInt(selected_year);
        if(selected_year> 0 && selected_year <= 23)
        {
          selected_year=selected_year + 2000;
        }
        else{
          selected_year=selected_year + 1900;
        }
        // alert(selected_year);
        var today =new Date();
        const current_year = today.getFullYear();
        //  alert(current_year);
        var age = Math.floor((current_year - selected_year));
        //  alert(age);
        if (age <= 12) {
            $("#age").html("Age must be grater than 12");
            return false;
        } else {
            $("#age").html("");
            return true;
        }
    })
    
    $('input[id$=dob]').datepicker({
            dateFormat: 'dd/mm/y'      // Date Format "dd/mm/yy"
        });


    $('#td').DataTable();



   $("#provider_id1").change(function() {

        var provider_id = this.value;
        $.ajax({
            type: 'POST',
            url: "{{ url('get-sub-type') }}",
            data: {
                provider_id: provider_id
            },
            success: function(sems) {
                $('#connection_id1').html(sems);
            }
        });
    });

  });
  </script>
  <script>
    function getFilter(){
        $provider_id=$('#provider_id1').val();
        $connection_id=$('#connection_id1').val();
        // alert($sports_id);
        $('#td').css('display','none');
        // $('#Filter').css('display','block');
        $.ajax({
        type:"POST",
        url: "filterData",
        data:{p_id:$provider_id,s_id:$connection_id,"_token":"{{csrf_token()}}"},
        success: function(result){
          $('#b').html(result);
        }
      });
    }
</script>

<script type="text/javascript">
 $(document).ready(function(){
  //  alert("hii");

 $('#providercheck').hide();
 $('#subscriptioncheck').hide();
 $('#feescheck').hide();
 $('#namecheck').hide();
 $('#emailcheck').hide();
 $('#mobilecheck').hide();
 $('#dobcheck').hide();
 $('#imagecheck').hide();


 var provider_err = true;
 var subscription_err = true;
 var fees_err = true;
 var name_err = true;
 var email_err = true;
 var mobile_err = true;
 var dob_err = true;
 var image_err = true;



 function provider_check(){
  var provider_id=$("#provider_id option:selected").val();
  if(provider_id=="-select-"){
    $('#providercheck').show();
    $('#providercheck').html("please choose Provider");
    $('#providercheck').focus();
    $('#providercheck').css("color", "red");
    provider_err=false;
    return false;
  }else{
    $('#providercheck').hide();
  }
 }

 function subscription_check(){
  var subscription_id=$("#connection_id option:selected").val();
  if(subscription_id==""){
    $('#subscriptioncheck').show();
    $('#subscriptioncheck').html("please choose Subscription");
    $('#subscriptioncheck').focus();
    $('#subscriptioncheck').css("color", "red");
    subscription_err=false;
    return false;
  }else{
    $('#subscriptioncheck').hide();
  }
 }

 function fees_check(){
  var fees=$("#fees option:selected").val();
  if(feescheck==""){
    $('#feescheck').show();
    $('#feescheck').html("please choose Fees");
    $('#feescheck').focus();
    $('#feescheck').css("color", "red");
    fees_err=false;
    return false;
  }else{
    $('#feescheck').hide();
  }
 }


 $('#applicant_name').keyup(function(){
 name_check();
 });

 function name_check(){

 var applicant_name = $('#applicant_name').val().trim();

 if(applicant_name.length == ''){
 $('#namecheck').show();
 $('#namecheck').html("Please Fill the username");
 $('#namecheck').focus();
 $('#namecheck').css("color","red");
 name_err = false;
 return false;

 }else{
 $('#namecheck').hide();
 }


 if(applicant_name.length < 4 ){
 $('#namecheck').show();
 $('#namecheck').html("name length must be greater than 3");
 $('#namecheck').focus();
 $('#namecheck').css("color","red");
 name_err = false;
 return false;

 }else{
 $('#namecheck').hide();
 }
 var regex = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;;
        if(!regex.test(applicant_name)) {
          $('#namecheck').show();
 $('#namecheck').html("please enter correct name");
 $('#namecheck').focus();
 $('#namecheck').css("color","red");
           return false;
       
 
 name_err = false;
 }else{
 $('#namecheck').hide();
 }
 }


 $('#email_id').keyup(function(){
    email_check();
 });

 function email_check(){

 var email_id = $('#email_id').val();

 if(email_id.length == ''){
 $('#emailcheck').show();
 $('#emailcheck').html("Please Fill the email");
 $('#emailcheck').focus();
 $('#emailcheck').css("color","red");
 email_err = false;
 return false;

 }else{
 $('#emailcheck').hide();
 }


var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email_id)) {
          $('#emailcheck').show();
 $('#emailcheck').html("please enter correct email");
 $('#emailcheck').focus();
 $('#emailcheck').css("color","red");
           return false;
       
 
 email_err = false;
 }else{
 $('#emailcheck').hide();
 }

 }



 $('#mobile_no').keyup(function(){
    mobile_check();
 });

 function mobile_check(){

 var mobile_no = $('#mobile_no').val();

 if(mobile_no.length == ''){
 $('#mobilecheck').show();
 $('#mobilecheck').html("Please enter mobile number");
 $('#mobilecheck').focus();
 $('#mobilecheck').css("color","red");
 mobile_err = false;
 return false;

 }else{
 $('#mobilecheck').hide();
 }


 var regex = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[6789]\d{9}$/;
 if(!regex.test(mobile_no)) {
 $('#mobilecheck').show();
 $('#mobilecheck').html("mobile length must be  10");
 $('#mobilecheck').focus();
 $('#mobilecheck').css("color","red");
           return false;
 
 email_err = false;
 //return false;

 }else{
 $('#mobilecheck').hide();
 }
 }


 $('#dob').keyup(function(){
    dob_check();
 });

 function dob_check(){

 var dob = $('#dob').val();

 if(dob.length == ''){
 $('#dobcheck').show();
 $('#dobcheck').html("Please Fill the DOB");
 $('#dobcheck').focus();
 $('#dobcheck').css("color","red");
 dob_err = false;
 return false;

 }else{
 $('#dobcheck').hide();
 }
}

$('#image_path').keyup(function(){
    image_check();
 });

 function image_check(){

 var image_path = $('#image_path').val();

 if(image_path.length == ''){
 $('#imagecheck').show();
 $('#imagecheck').html("Please Upload photo !");
 $('#imagecheck').focus();
 $('#imagecheck').css("color","red");
 image_err = false;
 return false;

 }else{
 $('#imagecheck').hide();
 }
}



 $('#register').click(function () { 
  provider_err = true;
 subscription_err = true;
 fees_err = true;
 name_err = true;
 email_err = true;
 mobile_err = true;
 dob_err = true;
 image_err = true;

 provider_check();
 subscription_check();
 fees_check();
 name_check();
 email_check();
 mobile_check();
 dob_check();
 image_check();
 if((provider_err == true) && (subscription_err == true) && (fees_err == true) && (name_err == true) && (mobile_err == true) && (email_err == true) && (dob_err == true) && (image_err == true)){
  return true;
 }else{
  return false;
 }

 });
});
</script>