<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Loan;
use App\Models\Book;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasPermissionTo('view users')){
        $users = User::all();
        return view('user.index',compact('users'));
        }else
        return redirect()->back()->with('error','NO fue posible crear el registro');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard()
    {
            
           $dashboardUser = User::select (DB::raw("COUNT(*) as count"))->whereYear('created_at', date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('count');

            $dashboardMonthUser = User::select (DB::raw("Month(created_at) as month"))->whereYear('created_at', date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('month');

            $datasUser = array(0,0,0,0,0,0,0,0,0,0,0,0);

            $dashboardLoan = Loan::select (DB::raw("COUNT(*) as count"))->whereYear('created_at', date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('count');

            $dashboardMonthLoan = Loan::select (DB::raw("Month(created_at) as month"))->whereYear('created_at', date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('month');

            $datasLoan = array(0,0,0,0,0,0,0,0,0,0,0,0);

                  foreach ($dashboardMonthUser as $dashboard => $month) {
                $datasUser[$month] = $dashboardUser[$dashboard];
            }

            foreach ($dashboardMonthLoan as $dashboard => $month) {
                $datasLoan[$month] = $dashboardLoan[$dashboard];
            }

            
            return view('dashboard', compact('datasLoan','datasUser')) ;

   
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($user = User::create($request->all())){
                $user->role_id = $request->role_id;
                $user->password =  Hash::make($request['password']);
                $user->save();
                return  redirect()->back()->with('success', 'User created successfully');
            }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $user = User::find($request['id']);
           if($user!=null){
               $user->role_id = $request->role_id;
               $user->Update($request->all());
               return  redirect()->back()->with('success', 'The user has been updated');
           }
           return redirect()->back()->with('error', 'Sorry, user not updated, try again');
        /*$user = User::find($request->id);
        if($user!=null){
               $user->role_id = $request->role_id;
               $user->password =  Hash::make($request->password);
               $user->save();
               $user->Update($request->all());
               if ($user->update($request->all())) {
                $user->password =  Hash::make($request['password']);
                $user->role_id = $request->role_id;
                $user->save();
                return  redirect()->back()->with('success', 'Se ha actualizado el usuario');
            }
           }else{
            return redirect()->back()->with('error', 'Sorry, user not updated, try again');
           }*/
        
           
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user){
            if($user->delete()){
                return response()->json([
                        'message' =>'registro eliminado',
                        'code' =>'200'
                ]);
            }
        }
        return response()->json([
        'message' =>'no se puede eliminar el registro',
                        'code' =>'400'
        ]);
    }
}
