<?php

namespace App\Http\Controllers;

use App\AllBrakeWithAmount;
use App\Helpers\HtaitPaitForeach;
use App\Http\Requests\StoreHtaitPait;
use App\Two;

use App\User;
use stdClass;
use Carbon\Carbon;
use App\TwoOverview;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTwo;
use App\Http\Requests\UpdateTwo;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TwoController extends Controller
{
    public function index()
    {
        $numbers = Two::where('admin_user_id', Auth::guard('adminuser')->user()->id);
        return view('backend.two.index', compact('numbers'));
    }

    public function ssd()
    {
        $twos = Two::where('admin_user_id', Auth::guard('adminuser')->user()->id)->limit(10);
        return Datatables::of($twos)
        ->addColumn('name', function ($each) {
            return $each->users ? $each->users->name : '_';
        })
        ->editColumn('updated_at', function ($each) {
            return Carbon::parse($each->updated_at)->format('d-m-Y H:i:s A');
        })
        ->addColumn('action', function ($each) {
            $edit_icon = '<a href="'.url('admin/two/'.$each->id.'/edit').'" class="text-warning"><i class="fas fa-user-edit"></i></a>';
            $delete_icon = '<a href="'.url('admin/two/'.$each->id).'" data-id="'.$each->id.'" data-two="'.$each->two.'" data-amount="'.$each->amount.'" class="text-danger" id="delete"><i class="fas fa-trash"></i></a>';
            
           
            return '<div class="action-icon">'.$edit_icon . $delete_icon.'</div>';
        })
        ->make(true);
    }
    
    public function create()
    {
        $users = User::where('admin_user_id', Auth::guard('adminuser')->user()->id)->get();
        return view('backend.two.create', compact('users'));
    }

    public function store(StoreTwo $request)
    {
        $validate = $request->validate([
            'user_id' => 'required'
        ]);
        
        $reverse_two = [];
        
        if (!is_null($request->r)) {
            foreach ($request->r as $r) {
                foreach ($request->two as $key=>$two) {
                    if ($key == $r) {
                        $reverse_two[] .= strrev((string)$two);
                    }
                }
            }
        }

        foreach ($request->two as $key=>$twod) {
            $two = new Two();
            $two->user_id = $request->user_id;
            $two->admin_user_id = Auth()->guard('adminuser')->user()->id;
            $two->date = now()->format('Y-m-d');
            $two->two = $twod;
            $two->amount = $request->amount[$key];
            $two->save();
        }

        foreach ($reverse_two ?? [] as $key=>$twor) {
            $two = new Two();
            $two->user_id = $request->user_id;
            $two->admin_user_id = Auth()->guard('adminuser')->user()->id;
            $two->date = now()->format('Y-m-d');
            $two->two = $twor;
            $two->amount = $request->amount[$key];
            $two->save();
        }

        return redirect('admin/two/create')->with('create', 'Created Successfully');
    }

    public function HtaitPaitCreate()
    {
        $users = User::where('admin_user_id', Auth::guard('adminuser')->user()->id)->orderBy('name')->get();
        return view('backend.two.htaitpait', compact('users'));
    }

    public function HtaitPaitStore(StoreHtaitPait $request)
    {
        //----------------- htait ------------------------------
        if (!is_null($request->zerohtait)) {
            $zerohtaits =  explode('-', $request->zerohtait);
                
            if ($zerohtaits) {
                HtaitPaitForeach::htaitpait($zerohtaits, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->onehtait)) {
            $onehtaits =  explode('-', $request->onehtait);
                
            if ($onehtaits) {
                HtaitPaitForeach::htaitpait($onehtaits, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->twohtait)) {
            $twohtaits =  explode('-', $request->twohtait);
                
            if ($twohtaits) {
                HtaitPaitForeach::htaitpait($twohtaits, $request->amount, $request->user_id);
            }
        }
                
        
        
        if (!is_null($request->threehtait)) {
            $threehtaits =  explode('-', $request->threehtait);
            if ($threehtaits) {
                HtaitPaitForeach::htaitpait($threehtaits, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->fourhtait)) {
            $fourhtaits =  explode('-', $request->fourhtait);
            if ($fourhtaits) {
                HtaitPaitForeach::htaitpait($fourhtaits, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->fivehtait)) {
            $fivehtaits =  explode('-', $request->fivehtait);
            if ($fivehtaits) {
                HtaitPaitForeach::htaitpait($fivehtaits, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->sixhtait)) {
            $sixhtaits =  explode('-', $request->sixhtait);
            if ($sixhtaits) {
                HtaitPaitForeach::htaitpait($sixhtaits, $request->amount, $request->user_id);
            }
        }
        
        
        if (!is_null($request->sevenhtait)) {
            $sevenhtaits =  explode('-', $request->sevenhtait);
            if ($sevenhtaits) {
                HtaitPaitForeach::htaitpait($sevenhtaits, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->eighthtait)) {
            $eighthtaits =  explode('-', $request->eighthtait);
            if ($eighthtaits) {
                HtaitPaitForeach::htaitpait($eighthtaits, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->ninehtait)) {
            $ninehtaits =  explode('-', $request->ninehtait);
            if ($ninehtaits) {
                HtaitPaitForeach::htaitpait($ninehtaits, $request->amount, $request->user_id);
            }
        }
        
        
        
        //----------------- Pait ------------------------------
        
        if (!is_null($request->zeropait)) {
            $zeropaits =  explode('-', $request->zeropait);
                
            if ($zeropaits) {
                HtaitPaitForeach::htaitpait($zeropaits, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->onepait)) {
            $onepaits =  explode('-', $request->onepait);
                
            if ($onepaits) {
                HtaitPaitForeach::htaitpait($onepaits, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->twopait)) {
            $twopaits =  explode('-', $request->twopait);
                
            if ($twopaits) {
                HtaitPaitForeach::htaitpait($twopaits, $request->amount, $request->user_id);
            }
        }
                
        
        
        if (!is_null($request->threepait)) {
            $threepaits =  explode('-', $request->threepait);
            if ($threepaits) {
                HtaitPaitForeach::htaitpait($threepaits, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->fourpait)) {
            $fourpaits =  explode('-', $request->fourpait);
            if ($fourpaits) {
                HtaitPaitForeach::htaitpait($fourpaits, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->fivepait)) {
            $fivepaits =  explode('-', $request->fivepait);
            if ($fivepaits) {
                HtaitPaitForeach::htaitpait($fivepaits, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->sixpait)) {
            $sixpaits =  explode('-', $request->sixpait);
            if ($sixpaits) {
                HtaitPaitForeach::htaitpait($sixpaits, $request->amount, $request->user_id);
            }
        }
        
        
        if (!is_null($request->sevenpait)) {
            $sevenpaits =  explode('-', $request->sevenpait);
            if ($sevenpaits) {
                HtaitPaitForeach::htaitpait($sevenpaits, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->eightpait)) {
            $eightpaits =  explode('-', $request->eightpait);
            if ($eightpaits) {
                HtaitPaitForeach::htaitpait($eightpaits, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->ninepait)) {
            $ninepaits =  explode('-', $request->ninepait);
            if ($ninepaits) {
                HtaitPaitForeach::htaitpait($ninepaits, $request->amount, $request->user_id);
            }
        }
        
        //----------------- Brake ------------------------------
        
        if (!is_null($request->zerobrake)) {
            $zerobrakes =  explode('-', $request->zerobrake);
                
            if ($zerobrakes) {
                HtaitPaitForeach::htaitpait($zerobrakes, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->onebrake)) {
            $onebrakes =  explode('-', $request->onebrake);
                
            if ($onebrakes) {
                HtaitPaitForeach::htaitpait($onebrakes, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->twobrake)) {
            $twobrakes =  explode('-', $request->twobrake);
                
            if ($twobrakes) {
                HtaitPaitForeach::htaitpait($twobrakes, $request->amount, $request->user_id);
            }
        }
                
        
        
        if (!is_null($request->threebrake)) {
            $threebrakes =  explode('-', $request->threebrake);
            if ($threebrakes) {
                HtaitPaitForeach::htaitpait($threebrakes, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->fourbrake)) {
            $fourbrakes =  explode('-', $request->fourbrake);
            if ($fourbrakes) {
                HtaitPaitForeach::htaitpait($fourbrakes, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->fivebrake)) {
            $fivebrakes =  explode('-', $request->fivebrake);
            if ($fivebrakes) {
                HtaitPaitForeach::htaitpait($fivebrakes, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->sixbrake)) {
            $sixbrakes =  explode('-', $request->sixbrake);
            if ($sixbrakes) {
                HtaitPaitForeach::htaitpait($sixbrakes, $request->amount, $request->user_id);
            }
        }
        
        
        if (!is_null($request->sevenbrake)) {
            $sevenbrakes =  explode('-', $request->sevenbrake);
            if ($sevenbrakes) {
                HtaitPaitForeach::htaitpait($sevenbrakes, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->eightbrake)) {
            $eightbrakes =  explode('-', $request->eightbrake);
            if ($eightbrakes) {
                HtaitPaitForeach::htaitpait($eightbrakes, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->ninebrake)) {
            $ninebrakes =  explode('-', $request->ninebrake);
            if ($ninebrakes) {
                HtaitPaitForeach::htaitpait($ninebrakes, $request->amount, $request->user_id);
            }
        }
        
        //----------------- a par ------------------------------
        
        if (!is_null($request->zeropar)) {
            $zeropars =  explode('-', $request->zeropar);
                
            if ($zeropars) {
                HtaitPaitForeach::htaitpait($zeropars, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->onepar)) {
            $onepars =  explode('-', $request->onepar);
                
            if ($onepars) {
                HtaitPaitForeach::htaitpait($onepars, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->twopar)) {
            $twopars =  explode('-', $request->twopar);
                
            if ($twopars) {
                HtaitPaitForeach::htaitpait($twopars, $request->amount, $request->user_id);
            }
        }
                
        
        
        if (!is_null($request->threepar)) {
            $threepars =  explode('-', $request->threepar);
            if ($threepars) {
                HtaitPaitForeach::htaitpait($threepars, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->fourpar)) {
            $fourpars =  explode('-', $request->fourpar);
            if ($fourpars) {
                HtaitPaitForeach::htaitpait($fourpars, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->fivepar)) {
            $fivepars =  explode('-', $request->fivepar);
            if ($fivepars) {
                HtaitPaitForeach::htaitpait($fivepars, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->sixpar)) {
            $sixpars =  explode('-', $request->sixpar);
            if ($sixpars) {
                HtaitPaitForeach::htaitpait($sixpars, $request->amount, $request->user_id);
            }
        }
        
        
        if (!is_null($request->sevenpar)) {
            $sevenpars =  explode('-', $request->sevenpar);
            if ($sevenpars) {
                HtaitPaitForeach::htaitpait($sevenpars, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->eightpar)) {
            $eightpars =  explode('-', $request->eightpar);
            if ($eightpars) {
                HtaitPaitForeach::htaitpait($eightpars, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->ninepar)) {
            $ninepars =  explode('-', $request->ninepar);
            if ($ninepars) {
                HtaitPaitForeach::htaitpait($ninepars, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->ten)) {
            $tens =  explode('-', $request->ten);
            if ($tens) {
                HtaitPaitForeach::htaitpait($tens, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->power)) {
            $powers =  explode('-', $request->power);
            if ($powers) {
                HtaitPaitForeach::htaitpait($powers, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->natkhat)) {
            $natkhats =  explode('-', $request->natkhat);
            if ($natkhats) {
                HtaitPaitForeach::htaitpait($natkhats, $request->amount, $request->user_id);
            }
        }
        
        if (!is_null($request->brother)) {
            $brothers =  explode('-', $request->brother);
            if ($brothers) {
                HtaitPaitForeach::htaitpait($brothers, $request->amount, $request->user_id);
            }
        }
               
        return back()->with('create', 'Done');
    }
  
    public function edit($id)
    {
        $number = Two::findOrFail($id);
        $users = User::where('admin_user_id', Auth::guard('adminuser')->user()->id)->get();

        return view('backend.two.edit', compact('number', 'users'));
    }

    public function update(UpdateTwo $request, $id)
    {
        $number = Two::findOrFail($id);

        $number->user_id = $request->user_id;
        $number->admin_user_id = Auth::guard('adminuser')->user()->id;
        $number->date = now();
        $number->two = $request->two;
        $number->amount = $request->amount;
        $number->update();

        return redirect('admin/two')->with('update', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $number = Two::findOrFail($id);
        $number->delete();

        return 'success';
    }

    public function twoHistory(Request $request)
    {
        return view('backend.two_overview.history');
    }

    public function twoHistoryTable(Request $request)
    {
        $date = $request->date;
        $time = $request->time;
        $two_brake = AllBrakeWithAmount::select('amount')->where('admin_user_id', Auth::guard('adminuser')->user()->id)->first();
        $two_brake_amount = $two_brake ? $two_brake->amount : 9999999999999999;

        if ($time == 'all') {
            $two_transactions = Two::select('two', DB::raw('SUM(amount) as total'))->groupBy('two')->where('admin_user_id', Auth::guard('adminuser')->user()->id)->whereDate('date', $date)->whereBetween('created_at', [Carbon::parse($date.' '.'00:00:00'),Carbon::parse($date.' '.'23:59:00')])->get();
            $two_transactions_total = Two::select('amount')->where('admin_user_id', Auth::guard('adminuser')->user()->id)->whereDate('date', $date)->whereBetween('created_at', [Carbon::parse($date.' '.'00:00:00'),Carbon::parse($date.' '.'23:59:00')])->sum('amount');
        }
        
        if ($time == 'true') {
            $two_transactions = Two::select('two', DB::raw('SUM(amount) as total'))->groupBy('two')->groupBy('two')->where('admin_user_id', Auth::guard('adminuser')->user()->id)->whereDate('date', $date)->whereBetween('created_at', [Carbon::parse($date.' '.'00:00:00'),Carbon::parse($date.' '.'11:59:00')])->get();
            $two_transactions_total = Two::select('amount')->where('admin_user_id', Auth::guard('adminuser')->user()->id)->whereDate('date', $date)->whereBetween('created_at', [Carbon::parse($date.' '.'00:00:00'),Carbon::parse($date.' '.'11:59:00')])->sum('amount');
        }
        
        if ($time == 'false') {
            $two_transactions = Two::select('two', DB::raw('SUM(amount) as total'))->groupBy('two')->groupBy('two')->where('admin_user_id', Auth::guard('adminuser')->user()->id)->whereDate('date', $date)->whereBetween('created_at', [Carbon::parse($date.' '.'12:00:00'),Carbon::parse($date.' '.'23:59:00')])->get();
            $two_transactions_total = Two::select('amount')->where('admin_user_id', Auth::guard('adminuser')->user()->id)->whereDate('date', $date)->whereBetween('created_at', [Carbon::parse($date.' '.'12:00:00'),Carbon::parse($date.' '.'23:59:00')])->sum('amount');
        }

        return view('backend.components.twohistorytable', compact('two_transactions', 'two_transactions_total', 'date', 'two_brake_amount'))->render();
    }

    public function twoKyon(Request $request)
    {
        return view('backend.two_overview.twokyon');
    }

    public function twoKyonTable(Request $request)
    {
        $date = $request->date;
        $time = $request->time;
        
        $two_brake = AllBrakeWithAmount::select('amount')->where('admin_user_id', Auth::guard('adminuser')->user()->id)->where('type', '2D')->first();
        $two_brake_amount = $two_brake ? $two_brake->amount : 9999999999999999;
        
        if ($time == 'all') {
            $two_transactions = Two::select('two', DB::raw('SUM(amount) as total'))->groupBy('two')->where('admin_user_id', Auth::guard('adminuser')->user()->id)->whereDate('date', $date)->whereBetween('created_at', [Carbon::parse($date.' '.'00:00:00'),Carbon::parse($date.' '.'23:59:00')])->get();
            $two_transactions_total = Two::select('amount')->where('admin_user_id', Auth::guard('adminuser')->user()->id)->whereDate('date', $date)->whereBetween('created_at', [Carbon::parse($date.' '.'00:00:00'),Carbon::parse($date.' '.'23:59:00')])->sum('amount');
        }
        
        if ($time == 'true') {
            $two_transactions = Two::select('two', DB::raw('SUM(amount) as total'))->groupBy('two')->groupBy('two')->where('admin_user_id', Auth::guard('adminuser')->user()->id)->whereDate('date', $date)->whereBetween('created_at', [Carbon::parse($date.' '.'00:00:00'),Carbon::parse($date.' '.'11:59:00')])->get();
            $two_transactions_total = Two::select('amount')->where('admin_user_id', Auth::guard('adminuser')->user()->id)->whereDate('date', $date)->whereBetween('created_at', [Carbon::parse($date.' '.'00:00:00'),Carbon::parse($date.' '.'11:59:00')])->sum('amount');
        }
        
        if ($time == 'false') {
            $two_transactions = Two::select('two', DB::raw('SUM(amount) as total'))->groupBy('two')->groupBy('two')->where('admin_user_id', Auth::guard('adminuser')->user()->id)->whereDate('date', $date)->whereBetween('created_at', [Carbon::parse($date.' '.'12:00:00'),Carbon::parse($date.' '.'23:59:00')])->get();
            $two_transactions_total = Two::select('amount')->where('admin_user_id', Auth::guard('adminuser')->user()->id)->whereDate('date', $date)->whereBetween('created_at', [Carbon::parse($date.' '.'12:00:00'),Carbon::parse($date.' '.'23:59:00')])->sum('amount');
        }

        return view('backend.components.twokyontable', compact('two_transactions', 'two_transactions_total', 'date', 'two_brake_amount'))->render();
    }
}
