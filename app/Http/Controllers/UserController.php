<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Inertia\Inertia;
use App\Mail\OTPMail;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    function LoginPage(){
        return Inertia::render('LoginPage');
    }

    function RegistrationPage(){
        return Inertia::render('RegistrationPage');
    }

    function ResetPasswordPage(){
        return Inertia::render('ResetPasswordPage');
    }

    function SendOtpPage(){
        return Inertia::render('SendOtpPage');
    }

    function VerifyOtpPage(){
        return Inertia::render('VerifyOtpPage');
    }

    function ProfilePage(Request $request){
        $email=$request->header('email');
        $user=User::where('email','=',$email)->first();
        return Inertia::render('ProfilePage',[
            'list'=>$user,
        ]);
    }



    //user-registration==================
    function userRegistraion(Request $request){
        try{
            $name=$request->input('name');
            $email=$request->input('email');
            $mobile=$request->input('mobile');
            $password=$request->input('password');

            User::create([
                'name'=>$name,
                'email'=>$email,
                'mobile'=>$mobile,
                'password'=>$password,
            ]);

            $data = [
                'message' => 'User Registration Successfully',
                'status' => true,
                'error' => ''
            ];
            return redirect()->route('RegistrationPage')->with($data);

        }
        catch(Exception $e){
            $data = [
                'message' => 'User Registration Faild',
                'status' => false,
                'error' => $e->getMessage()
            ];
            return redirect()->route('RegistrationPage')->with($data);
        }


    }

    //User-login=========================
    function userLogin(Request $request){
        $count=User::where('email','=',$request->input('email'))
            ->where('password','=',$request->input('password'))
            ->select('id')->first();

        if($count!==null){
            $email = $request->input('email');
            $user_id = $count->id;

            $request->session()->put('email', $email);
            $request->session()->put('user_id', $user_id);

            $data = [
                'message' => 'User Login Successfully',
                'status' => true,
                'error' => ''
            ];
            return redirect()->route('DashboardPage')->with($data);

        }
        else{
            $data = [
                'message' => 'User Login Faild',
                'status' => false,
            ];
            return redirect()->route('LoginPage')->with($data);
        }
    }


    //User-logout======================
    function UserLogout(Request $request){
        $request->session()->flush();
        return redirect()->route('LoginPage');
    }

    //Sendotp=============
    function SendOtpCode(Request $request){

        $email=$request->input('email');
        $otp=rand(1000,9999);
        $count=USer::where('email','=',$email)->count();

        if($count==1){
            Mail::to($email)->send(new OTPMail($otp));

            USer::where('email','=',$email)->update(['otp'=>$otp]);

            $data = [
                'message' => 'OTP Request Successfull',
                'status' => true,
                'error' => ''
            ];
            $request->session()->put('email', $email);

            return redirect()->route('SendOtpPage')->with($data);

        }
        else{
            $data = [
                'message' => 'OTP Request Faild',
                'status' => false,
                'error' => ''
            ];
            return redirect()->route('SendOtpPage')->with($data);
        }

    }

    //verify-otp================
    function VerifyOtp(Request $request){
        $email=$request->session()->get('email', 'default');
        $otp=$request->input('otp');

        $count=USer::where('email','=',$email)
            ->where('otp','=',$otp)->count();

        if($count==1){
            USer::where('email','=',$email)->update(['otp'=>'0']);
            $request->session()->put('otp_verify', 'yes');

            $data = [
                'message' => 'VerifyOTP Request Successfull',
                'status' => true,
                'error' => ''
            ];
            return redirect()->route('VerifyOtpPage')->with($data);

        }
        else{
            $data = [
                'message' => 'VerifyOTP Request Faild',
                'status' => false,
                'error' => ''
            ];
            return redirect()->route('VerifyOtpPage')->with($data);
        }

    }

    //ResetPassword================
    function ResetPassword(Request $request){
        try{
            $email=$request->session()->get('email', 'default');
            $password=$request->input('password');
            $otp_verify=$request->session()->get('otp_verify', 'default');

            if($otp_verify==="yes"){
                User::where('email','=',$email)->update(['password'=>$password]);
                $data = ['message' => 'ResetPassword Request Successful','status' => true];
                $request->session()->flush();
                return redirect()->route('ResetPasswordPage')->with($data);
            }
            else{
                $data = ['message' => 'ResetPassword Request Faild','status' => false];
                return redirect()->route('ResetPasswordPage')->with($data);
            }

        }
        catch(Exception $e){
            $data = [
                'message' => 'ResetPassword Request Faild',
                'status' => false,
                'error' => $e->getMessage(),
            ];
            return redirect()->route('ResetPasswordPage')->with($data);
        }
    }

    //Profile-update================
    function UpdateProfile(Request $request){
        try{
            $email=$request->header('email');
            $name=$request->input('name');
            $mobile=$request->input('mobile');
            $password=$request->input('password');

            User::where('email','=',$email)->update([
                'name'=>$name,
                'email'=>$email,
                'mobile'=>$mobile,
                'password'=>$password,
            ]);

            $data = ['message' => 'Profile Update Successful','status' => true];
            return redirect()->route('ProfilePage')->with($data);
        }
        catch(Exception $exception){
            $data = ['message' => 'Profile Update Faild','status' => false];
            return redirect()->route('ProfilePage')->with($data);
        }
    }




}
