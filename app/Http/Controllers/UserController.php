<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Models\Role;
Use Hash;
use Auth;

class UserController extends Controller
{
    
    public function index()

    {
        $role= Role::all();
        return view('User.form',compact('role'));
        
    }

    public function home(){
        return view('User.home');
    }

    public function admin(){
        if(session()->has('id')){
            $user=User::find(session('id'));
            if($user && $user->RoleId == 1){
                 return view('User.admin');

            }
            else{
                return redircet()->route('user.login');
            }
        }
         return redirect()->route('user.login');
      
    }

    public function officerdashboard(){
        

    
    if(session()->has('id')){
            $user=User::find(session('id'));
            if($user && $user->RoleId == 2){
                 
            $complaints = Complaint::where('AssignedTo', session('id'))->get();

             return view('User.officer', compact( 'complaints'));
            }

            else{
                return redirect()->route('user.login');
            }
            return redirect()->route('user.login');
    }


}
    // public function customer(){
    //     return view('User.customer');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name'=> 'required|string',
            'Email'=> 'required|Email|unique:users,Email',
            'Password'=> 'required|min:5'
        ]);
        $store= new User;
        $store->Email=$request->Email;
        $store->Password=Hash::make($request->Password);
        $store->RoleId= $request->choose;
        $store->Name=$request->Name;
        $store->save();
        return redirect()->back();
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if (session()->has('id')){
            $user=User::find(session('id'));
            if($user && $user->RoleId==1){
                 $list=User::all();
                 return view('User.show',compact('list'));

            }

        else{
            return redirect()->route('user.login');
        }
        }
        else{
            return redirect()->route('user.login');


        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request){
        $edit=User::find($request->input('id'));
        if($edit){
            return view('User.update',compact('edit'));

        }
        else{
            return redirect()->route('user.show');
        }
    }
    public function update(Request $request){
        $update=User::find($request->id);
        if($update){
            $request->validate([
                'Email'=> 'required|Email'
            ]);
            $update->Email=$request->Email;
            $update->Password=hash::make($request->Password);
            $update->update();
            return redirect()->route('user.show');

        }
        else{
            return redirect()->route('user.show');
        }

    }
    public function destroy(Request $request)
    {
        $id=$request->id;
        if($id){
            User::destroy($id);
            return redirect()->route('user.show');
        }
        else{
             return redirect()->route('user.show');
        }
    }

    public function login(){
        return view('User.login');

    }
    public function logincheck(Request $request){
        $credentials=['Email'=> $request->Email,'Password'=>$request->Password];
        if (Auth::attempt($credentials)){
            $check= Auth::User();
            session()->regenerate();
            if($check->RoleId==1){
                 return redirect()->route('admin.dashboard');

            }

            else if($check->RoleId==2){
                 return redirect()->route('officer.dashboard');

            }

            else{
                return redirect()->route('user.login');
            }
        }

        else{
            return redirect()->route('user.login');
        }

    }

    
    //     // if($exist){
    //         if(hash::check($request->Password,$exist->Password)){
                
    //             $request->session()->put('id',$exist->id);


    //             if($exist->RoleId==1){
    //                   return redirect()->route('admin.dashboard');
                    
    //             }
    //             elseif($exist->RoleId==2){
    //                 return redirect()->route('officer.dashboard');
    //             }

    //             else{
    //                 return redirect()->route('user.login');
    //             }


    //         }
    //         else{
    //                 return redirect()->route('user.login');
                
    //         }
    //     }
    //     else{
    //                 return redirect()->route('user.login');

    //     }
    // }

    public function logout(Request $request){
        $request->session()->invalidate();
        return redirect()->route('user.login');

    }

 

    
}