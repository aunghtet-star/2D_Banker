<?php

namespace App\Http\Controllers;

use App\User;
use App\Three;
use Carbon\Carbon;
use App\AllBrakeWithAmount;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreThree;
use App\Http\Requests\UpdateThree;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ThreeController extends Controller
{
    public function index()
    {
        $numbers = Three::where('admin_user_id', Auth()->user()->id)->get();
        return view('backend.three.index', compact('numbers'));
    }

    public function ssd()
    {
        $threes = Three::where('admin_user_id', Auth()->user()->id)->limit(10);
        return Datatables::of($threes)
        ->addColumn('name', function ($each) {
            return $each->users ? $each->users->name : '_';
        })
        ->editColumn('updated_at', function ($each) {
            return Carbon::parse($each->updated_at)->format('d-m-Y h:i:s A');
        })
        ->addColumn('action', function ($each) {
            $edit_icon = '<a href="'.url('admin/three/'.$each->id.'/edit').'" class="text-warning"><i class="fas fa-user-edit"></i></a>';
            $delete_icon = '<a href="'.url('admin/three/'.$each->id).'" data-id="'.$each->id.'"  data-three="'.$each->three.'" data-amount="'.$each->amount.'"  class="text-danger" id="delete"><i class="fas fa-trash"></i></a>';
            
           
            return '<div class="action-icon">'.$edit_icon . $delete_icon.'</div>';
        })
        ->make(true);
    }
    
    public function create()
    {
        $users = User::where('admin_user_id', Auth()->user()->id)->get();
        return view('backend.three.create', compact('users'));
    }

    public function store(StoreThree $request)
    {
        $validate = $request->validate([
            'user_id' => 'required'
        ]);
        
        foreach ($request->three as $key=>$threed) {
            $three = new Three();
            $three->user_id = $request->user_id;
            $three->admin_user_id = Auth()->guard('adminuser')->user()->id;
            $three->date = now()->format('Y-m-d');
            $three->three = $threed;
            $three->amount = $request->amount[$key];
            $three->save();
        }

        return redirect('admin/three/create')->with('create', 'Created Successfully');
    }

    public function edit($id)
    {
        $number = Three::findOrFail($id);
        $users = User::where('admin_user_id', Auth()->user()->id)->get();

        return view('backend.three.edit', compact('number', 'users'));
    }

    public function update(UpdateThree $request, $id)
    {
        $number = Three::findOrFail($id);

        $number->user_id = $request->user_id;
        $number->admin_user_id = Auth::guard('adminuser')->user()->id;
        $number->date = now();
        $number->three = $request->three;
        $number->amount = $request->amount;
        $number->update();

        return redirect('admin/three')->with('update', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $number = Three::findOrFail($id);
        $number->delete();

        return 'success';
    }

    public function threeHistory(Request $request)
    {
        $from = $request->startdate ?? now()->format('Y-m-d');
        $to = $request->enddate ?? date('Y-m-d', strtotime(now(). '+10 days'));
        
        $three_brake = AllBrakeWithAmount::select('amount')->where('admin_user_id', Auth::guard('adminuser')->user()->id)->where('type', '3D')->first();
        $three_brake_amount = $three_brake ? $three_brake->amount : 99999999999999999;
        
        $three_transactions = Three::select('three', DB::raw('SUM(amount) as total'))->groupBy('three')->where('admin_user_id', Auth()->user()->id)->whereBetween('date', [$from,$to])->paginate(144);
        $three_transactions->withPath('/admin/three-overview/history?startdate='.$from.'&enddate='.$to);
        
        $three_transactions_total = Three::select('amount')->where('admin_user_id', Auth()->user()->id)->whereBetween('date', [$from,$to])->sum('amount');

        return view('backend.three_overview.history', compact('three_transactions', 'three_transactions_total', 'three_brake_amount', 'from', 'to'));
    }

    public function threeKyon(Request $request)
    {
        $from = $request->startdate ?? now()->format('Y-m-d');
        $to = $request->enddate ?? date('Y-m-d', strtotime(now(). '+10 days'));
        
        $three_brake = AllBrakeWithAmount::select('amount')->where('admin_user_id', Auth::guard('adminuser')->user()->id)->where('type', '3D')->first();
        $three_brake_amount = $three_brake ? $three_brake->amount : 99999999999999999;
        
        $three_transactions = Three::select('three', DB::raw('SUM(amount) as total'))->groupBy('three')->where('admin_user_id', Auth()->user()->id)->whereBetween('date', [$from,$to])->paginate(144);
        $three_transactions->withPath('/admin/three-overview/history?startdate='.$from.'&enddate='.$to);
        
        $three_transactions_total = Three::select('amount')->where('admin_user_id', Auth()->user()->id)->whereBetween('date', [$from,$to])->sum('amount');

        return view('backend.three_overview.threekyon', compact('three_transactions', 'three_transactions_total', 'three_brake_amount', 'from', 'to'));
    }
}
