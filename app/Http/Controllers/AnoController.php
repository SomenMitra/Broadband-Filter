<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AnoController extends Controller
{
    public function index(Request $request){
        $provider=DB::table('provider_master')->get();
        $data = DB::table('registration_detaails')
   						 ->join('connection_master', 'registration_detaails.connection_id', '=', 'connection_master.connection_id')
    					->join('provider_master', 'provider_master.provider_id', '=', 'registration_detaails.provider_id')
    					->get();
    //dd($data);
     			return view('register', ['provider' => $provider,'data'=>$data]);

    }

    public function get_sub_type(Request $request)
    {
        $provider_id = $request->provider_id;
        // dd($provider_id);
        $sems = DB::table('connection_master')->where('provider_id', $provider_id)->get();
        $html = '<option value="">Subscription Type </option>';
        if (count($sems)) {
            foreach ($sems as $sem) {
                $html .= '<option value="' . $sem->connection_id . '">' . $sem->connection_speed . '</option>';
            }
            echo $html;
        } else {
            $html = '<option value="">Connection Fee not found</option>';
        }
    }
    public function get_sub_fees(Request $request)
    {
    	$connection_id = $request->connection_id;
    	// dd($connection_id);
    	 $fees = DB::table('connection_master')->select('fees')->where('connection_id', $connection_id)->get();
    	 return response()->json([
    	 	'fees'=>$fees
    	 ]);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'library_id'=>'required',
        //     'subscription_id'=>'required',
        //     'fees'=>'required',
        //     'applicant_name'=>'required',
        //     'gender'=>'required',
        //      'email_id'=>'required',
        //     'mobile_no'=>'required|string|min:10|max:10',
        //      'dob'=>'required',
        //       'image_path'=>'required'
        // ]);



        $input = $request->all();
        //dd($input);
        //dd($subscription_id);
        $applicant_name = $input['applicant_name'];
        $email_id = $input['email_id'];
        $mobile_no = $input['mobile_no'];
        $gender = $input['gender'];
        $dob = $input['dob'];
        //$image_path = $input['image_path'];
        $provider_id = $input['provider_id'];
        $connection_id = $input['connection_idd'];
        // $fees = $input['fees'];
        //dd('hi');
        $image_data = ($_FILES["image_path"]["tmp_name"]);
        $image_name = $_FILES["image_path"]["name"];
        $path = "uploads/" . $image_name;

        $status = DB::table('registration_detaails')->insert([
            'applicant_name' => $applicant_name,
            'email_id' => $email_id,
            'mobile_no' => $mobile_no,
            'gender' => $gender,
            'dob' => $dob,
            'image_path' => $image_name,
            'provider_id' => $provider_id,
            'connection_id' => $connection_id

        ]);

        $mailData=[
        	'applicant_name'=>$applicant_name,
        	'email_id'=>$email_id,
        	'mobile_no'=>$mobile_no,
        	'image_path'=>$image_name,
            'dob'=>$dob
        ];
        // dd($mailData);
        \Mail::to($email_id)->send(new \App\Mail\DemoMail($mailData));
        // dd('sent success');



        $provider = DB::table('provider_master')->get();
        // $subscription = DB::table('subscription_master')->get();
        //dd($status);
        if (move_uploaded_file($image_data, $path)) {
            if ($status) {
                $a = "Registered Successfully !";
            }
        }

        $data = DB::table('registration_detaails')
            ->join('provider_master', 'registration_detaails.provider_id', '=', 'provider_master.provider_id')
            ->join('connection_master', 'connection_master.connection_id', '=', 'registration_detaails.connection_id')
            ->get();
        return view('register', ['provider' => $provider,'data'=>$data])->with('msg', 'Inserted Successfully!!');
    }



    public function filterData(Request $request)
    {
         // echo 1;exit;
    $input= $request->all();
    $provider_id=$input["p_id"];
    $connection_id=$input["s_id"];
        if($connection_id == ""){
            $data=DB::table('registration_detaails')->select('registration_detaails.*','provider_master.provider_name','connection_master.connection_speed')
            ->join('provider_master','provider_master.provider_id','=','registration_detaails.provider_id')
            ->join('connection_master','connection_master.connection_id','=','registration_detaails.connection_id')
            ->where('provider_master.provider_id', [$provider_id])
            ->get();
        }else{
            $data=DB::table('registration_detaails')->select('registration_detaails.*','provider_master.provider_name','connection_master.connection_speed')
            ->join('provider_master','provider_master.provider_id','=','registration_detaails.provider_id')
            ->join('connection_master','connection_master.connection_id','=','registration_detaails.connection_id')
            ->where('connection_master.connection_id', [$connection_id])
            ->get();
        }
        $ele='';
        $i =1;
        foreach ($data as  $value) {
            $dateOfBirth = $value->dob ;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dateOfBirth), date_create($today));
            $y = $diff->format('%y');
    $ele.="<tr><td>".$i++."</td><td>".$value->applicant_name."</td><td>".$value->email_id."</td><td>".$value->mobile_no."</td><td>".$y."</td><td>"."<a  href=/uploads/$value->image_path >{$value->image_path}</a>"."</td><td>".$value->provider_name."</td><td>".$value->connection_speed."</td></tr>";
        }
        echo $ele;
    }

}
