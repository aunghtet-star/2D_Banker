<?php

namespace App\Http\Controllers\frontend;

use App\Two;
use App\Wallet;
use App\ShowHide;
use App\AdminUser;
use App\Transaction;
use App\AllBrakeWithAmount;
use Illuminate\Http\Request;
use App\Helpers\UUIDGenerator;
use App\Helpers\BrakeHtaitPait;
use App\Helpers\HtaitPaitForeach;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreHtaitPait;

class HtaitPaitController extends Controller
{
    public function index()
    {
        return view('frontend.two.htaitpait', compact('htaitpaitform'));
    }


    public function confirm(StoreHtaitPait $request)
    {
        $zerohtaits = $onehtaits = $twohtaits = $threehtaits = $fourhtaits = $fivehtaits = $sixhtaits = $sevenhtaits = $eighthtaits = $ninehtaits = '';
        $amount = $request->amount ;
        
        if (!is_null($request->zerohtait)) {
            $zerohtaits =  explode('-', $request->zerohtait);
        }

        if (!is_null($request->onehtait)) {
            $onehtaits =  explode('-', $request->onehtait);
        }

        if (!is_null($request->twohtait)) {
            $twohtaits =  explode('-', $request->twohtait);
        }

        if (!is_null($request->threehtait)) {
            $threehtaits =  explode('-', $request->threehtait);
        }

        if (!is_null($request->fourhtait)) {
            $fourhtaits =  explode('-', $request->fourhtait);
        }

        if (!is_null($request->fivehtait)) {
            $fivehtaits =  explode('-', $request->fivehtait);
        }

        if (!is_null($request->sixhtait)) {
            $sixhtaits =  explode('-', $request->sixhtait);
        }


        if (!is_null($request->sevenhtait)) {
            $sevenhtaits =  explode('-', $request->sevenhtait);
        }

        if (!is_null($request->eighthtait)) {
            $eighthtaits =  explode('-', $request->eighthtait);
        }

        if (!is_null($request->ninehtait)) {
            $ninehtaits =  explode('-', $request->ninehtait);
        }


        $zeropaits = $onepaits = $twopaits = $threepaits = $fourpaits = $fivepaits = $sixpaits = $sevenpaits = $eightpaits = $ninepaits = '';
        
        if (!is_null($request->zeropait)) {
            $zeropaits =  explode('-', $request->zeropait);
        }

        if (!is_null($request->onepait)) {
            $onepaits =  explode('-', $request->onepait);
        }

        if (!is_null($request->twopait)) {
            $twopaits =  explode('-', $request->twopait);
        }

        if (!is_null($request->threepait)) {
            $threepaits =  explode('-', $request->threepait);
        }

        if (!is_null($request->fourpait)) {
            $fourpaits =  explode('-', $request->fourpait);
        }

        if (!is_null($request->fivepait)) {
            $fivepaits =  explode('-', $request->fivepait);
        }

        if (!is_null($request->sixpait)) {
            $sixpaits =  explode('-', $request->sixpait);
        }


        if (!is_null($request->sevenpait)) {
            $sevenpaits =  explode('-', $request->sevenpait);
        }

        if (!is_null($request->eightpait)) {
            $eightpaits =  explode('-', $request->eightpait);
        }

        if (!is_null($request->ninepait)) {
            $ninepaits =  explode('-', $request->ninepait);
        }

        $zerobrakes = $onebrakes = $twobrakes = $threebrakes = $fourbrakes = $fivebrakes = $sixbrakes = $sevenbrakes = $eightbrakes = $ninebrakes = '';
        
        if (!is_null($request->zerobrake)) {
            $zerobrakes =  explode('-', $request->zerobrake);
        }

        if (!is_null($request->onebrake)) {
            $onebrakes =  explode('-', $request->onebrake);
        }

        if (!is_null($request->twobrake)) {
            $twobrakes =  explode('-', $request->twobrake);
        }

        if (!is_null($request->threebrake)) {
            $threebrakes =  explode('-', $request->threebrake);
        }

        if (!is_null($request->fourbrake)) {
            $fourbrakes =  explode('-', $request->fourbrake);
        }

        if (!is_null($request->fivebrake)) {
            $fivebrakes =  explode('-', $request->fivebrake);
        }

        if (!is_null($request->sixbrake)) {
            $sixbrakes =  explode('-', $request->sixbrake);
        }


        if (!is_null($request->sevenbrake)) {
            $sevenbrakes =  explode('-', $request->sevenbrake);
        }

        if (!is_null($request->eightbrake)) {
            $eightbrakes =  explode('-', $request->eightbrake);
        }

        if (!is_null($request->ninebrake)) {
            $ninebrakes =  explode('-', $request->ninebrake);
        }


        $zeropars = $onepars = $twopars = $threepars = $fourpars = $fivepars = $sixpars = $sevenpars = $eightpars = $ninepars = '';
        
        if (!is_null($request->zeropar)) {
            $zeropars =  explode('-', $request->zeropar);
        }

        if (!is_null($request->onepar)) {
            $onepars =  explode('-', $request->onepar);
        }

        if (!is_null($request->twopar)) {
            $twopars =  explode('-', $request->twopar);
        }

        if (!is_null($request->threepar)) {
            $threepars =  explode('-', $request->threepar);
        }

        if (!is_null($request->fourpar)) {
            $fourpars =  explode('-', $request->fourpar);
        }

        if (!is_null($request->fivepar)) {
            $fivepars =  explode('-', $request->fivepar);
        }

        if (!is_null($request->sixpar)) {
            $sixpars =  explode('-', $request->sixpar);
        }


        if (!is_null($request->sevenpar)) {
            $sevenpars =  explode('-', $request->sevenpar);
        }

        if (!is_null($request->eightpar)) {
            $eightpars =  explode('-', $request->eightpar);
        }

        if (!is_null($request->ninepar)) {
            $ninepars =  explode('-', $request->ninepar);
        }

        $apuus = $tens = $powers = $natkhats = $brothers = '';
        if (!is_null($request->apuu)) {
            $apuus =  explode('-', $request->apuu);
        }

        if (!is_null($request->ten)) {
            $tens =  explode('-', $request->ten);
        }

        if (!is_null($request->power)) {
            $powers =  explode('-', $request->power);
        }

        if (!is_null($request->natkhat)) {
            $natkhats =  explode('-', $request->natkhat);
        }

        if (!is_null($request->brother)) {
            $brothers =  explode('-', $request->brother);
        }

        $from_account_wallet = Auth()->user()->wallet;
        $to_account = AdminUser::where('id', Auth()->user()->admin_user_id)->first();
        $to_account_wallet = Wallet::where('admin_user_id', $to_account->id)->where('status', 'admin')->first();
        
        $totals = 0;
       
        //-------------- insufficient condition for  htait---------------
        if ($zerohtaits) {
            foreach ($zerohtaits as $key=>$zerohtait) {
                $totals += $request->amount;
            }
        }
        
        if ($onehtaits) {
            foreach ($onehtaits as $key=>$onehtait) {
                $totals += $request->amount;
            }
        }

        if ($twohtaits) {
            foreach ($twohtaits as $key=>$twohtait) {
                $totals += $request->amount;
            }
        }

        if ($threehtaits) {
            foreach ($threehtaits as $key=>$threehtait) {
                $totals += $request->amount;
            }
        }

        if ($fourhtaits) {
            foreach ($fourhtaits as $key=>$fourhtait) {
                $totals += $request->amount;
            }
        }

        if ($fivehtaits) {
            foreach ($fivehtaits as $key=>$fivehtait) {
                $totals += $request->amount;
            }
        }

        if ($sixhtaits) {
            foreach ($sixhtaits as $key=>$sixhtait) {
                $totals += $request->amount;
            }
        }

        if ($sevenhtaits) {
            foreach ($sevenhtaits as $key=>$sevenhtait) {
                $totals += $request->amount;
            }
        }

        if ($eighthtaits) {
            foreach ($eighthtaits as $key=>$eighthtait) {
                $totals += $request->amount;
            }
        }

        if ($ninehtaits) {
            foreach ($ninehtaits as $key=>$ninehtait) {
                $totals += $request->amount;
            }
        }

        //------------------------ insufficient condition for a pait------------------------
        if ($zeropaits) {
            foreach ($zeropaits as $key=>$zeropait) {
                $totals += $request->amount;
            }
        }

        if ($onepaits) {
            foreach ($onepaits as $key=>$onepait) {
                $totals += $request->amount;
            }
        }

        if ($twopaits) {
            foreach ($twopaits as $key=>$twopait) {
                $totals += $request->amount;
            }
        }

        if ($threepaits) {
            foreach ($threepaits as $key=>$threepait) {
                $totals += $request->amount;
            }
        }

        if ($fourpaits) {
            foreach ($fourpaits as $key=>$fourpait) {
                $totals += $request->amount;
            }
        }

        if ($fivepaits) {
            foreach ($fivepaits as $key=>$fivepait) {
                $totals += $request->amount;
            }
        }

        if ($sixpaits) {
            foreach ($sixpaits as $key=>$sixpait) {
                $totals += $request->amount;
            }
        }

        if ($sevenpaits) {
            foreach ($sevenpaits as $key=>$sevenpait) {
                $totals += $request->amount;
            }
        }

        if ($eightpaits) {
            foreach ($eightpaits as $key=>$eightpait) {
                $totals += $request->amount;
            }
        }

        if ($ninepaits) {
            foreach ($ninepaits as $key=>$ninepait) {
                $totals += $request->amount;
            }
        }

        //------------------------ insufficient condition for a Brake------------------------
        if ($zerobrakes) {
            foreach ($zerobrakes as $key=>$zerobrake) {
                $totals += $request->amount;
            }
        }

        if ($onebrakes) {
            foreach ($onebrakes as $key=>$onebrake) {
                $totals += $request->amount;
            }
        }

        if ($twobrakes) {
            foreach ($twobrakes as $key=>$twobrake) {
                $totals += $request->amount;
            }
        }

        if ($threebrakes) {
            foreach ($threebrakes as $key=>$threebrake) {
                $totals += $request->amount;
            }
        }

        if ($fourbrakes) {
            foreach ($fourbrakes as $key=>$fourbrake) {
                $totals += $request->amount;
            }
        }

        if ($fivebrakes) {
            foreach ($fivebrakes as $key=>$fivebrake) {
                $totals += $request->amount;
            }
        }

        if ($sixbrakes) {
            foreach ($sixbrakes as $key=>$sixbrake) {
                $totals += $request->amount;
            }
        }

        if ($sevenbrakes) {
            foreach ($sevenbrakes as $key=>$sevenbrake) {
                $totals += $request->amount;
            }
        }

        if ($eightbrakes) {
            foreach ($eightbrakes as $key=>$eightbrake) {
                $totals += $request->amount;
            }
        }

        if ($ninebrakes) {
            foreach ($ninebrakes as $key=>$ninebrake) {
                $totals += $request->amount;
            }
        }


        //------------------------ insufficient condition for a parr ------------------------
        if ($zeropars) {
            foreach ($zeropars as $key=>$zeropar) {
                $totals += $request->amount;
            }
        }

        if ($onepars) {
            foreach ($onepars as $key=>$onepar) {
                $totals += $request->amount;
            }
        }

        if ($twopars) {
            foreach ($twopars as $key=>$twopar) {
                $totals += $request->amount;
            }
        }

        if ($threepars) {
            foreach ($threepars as $key=>$threepar) {
                $totals += $request->amount;
            }
        }

        if ($fourpars) {
            foreach ($fourpars as $key=>$fourpar) {
                $totals += $request->amount;
            }
        }

        if ($fivepars) {
            foreach ($fivepars as $key=>$fivepar) {
                $totals += $request->amount;
            }
        }

        if ($sixpars) {
            foreach ($sixpars as $key=>$sixpar) {
                $totals += $request->amount;
            }
        }

        if ($sevenpars) {
            foreach ($sevenpars as $key=>$sevenpar) {
                $totals += $request->amount;
            }
        }

        if ($eightpars) {
            foreach ($eightpars as $key=>$eightpar) {
                $totals += $request->amount;
            }
        }

        if ($ninepars) {
            foreach ($ninepars as $key=>$ninepar) {
                $totals += $request->amount;
            }
        }
        // insufficient condition balance for tens
        if ($tens) {
            foreach ($tens as $key=>$ten) {
                $totals += $request->amount;
            }
        }

        // insufficient condition balance for powers
        if ($powers) {
            foreach ($powers as $key=>$power) {
                $totals += $request->amount;
            }
        }


        // insufficient condition balance for natkhats
        if ($natkhats) {
            foreach ($natkhats as $key=>$natkhat) {
                $totals += $request->amount;
            }
        }


        // insufficient condition balance for brothers
        if ($brothers) {
            foreach ($brothers as $key=>$brother) {
                $totals += $request->amount;
            }
        }

        // insufficient condition balance for apuus
        if ($apuus) {
            foreach ($apuus as $key=>$apuu) {
                $totals += $request->amount;
            }
        }

        if ($from_account_wallet->amount < $totals) {
            return redirect('/two/htaitpait')->withErrors(['fail' => 'You have no sufficient balance']);
        }

        return view('frontend.two.htaitpaitconfirm', compact('amount', 'zerohtaits', 'onehtaits', 'twohtaits', 'threehtaits', 'fourhtaits', 'fivehtaits', 'sixhtaits', 'sevenhtaits', 'eighthtaits', 'ninehtaits', 'zeropaits', 'onepaits', 'twopaits', 'threepaits', 'fourpaits', 'fivepaits', 'sixpaits', 'sevenpaits', 'eightpaits', 'ninepaits', 'zerobrakes', 'onebrakes', 'twobrakes', 'threebrakes', 'fourbrakes', 'fivebrakes', 'sixbrakes', 'sevenbrakes', 'eightbrakes', 'ninebrakes', 'zeropars', 'onepars', 'twopars', 'threepars', 'fourpars', 'fivepars', 'sixpars', 'sevenpars', 'eightpars', 'ninepars', 'apuus', 'tens', 'powers', 'natkhats', 'brothers'));
    }

    public function store(StoreHtaitPait $request)
    {
        
        //----------------- htait ------------------------------
        $zerohtaits = $request->zerohtaits;
        $onehtaits = $request->onehtaits;
        $twohtaits = $request->twohtaits;
        $threehtaits = $request->threehtaits;
        $fourhtaits = $request->fourhtaits;
        $fivehtaits = $request->fivehtaits;
        $sixhtaits = $request->sixhtaits;
        $sevenhtaits = $request->sevenhtaits;
        $eighthtaits = $request->eighthtaits;
        $ninehtaits = $request->ninehtaits;
        
        //----------------- Pait ------------------------------
    
        $zeropaits = $request->zeropaits;
        $onepaits = $request->onepaits;
        $twopaits = $request->twopaits;
        $threepaits = $request->threepaits;
        $fourpaits = $request->fourpaits;
        $fivepaits = $request->fivepaits;
        $sixpaits = $request->sixpaits;
        $sevenpaits = $request->sevenpaits;
        $eightpaits = $request->eightpaits;
        $ninepaits = $request->ninepaits;

        //----------------- Brake ------------------------------
    
        $zerobrakes = $request->zerobrakes;
        $onebrakes = $request->onebrakes;
        $twobrakes = $request->twobrakes;
        $threebrakes = $request->threebrakes;
        $fourbrakes = $request->fourbrakes;
        $fivebrakes = $request->fivebrakes;
        $sixbrakes = $request->sixbrakes;
        $sevenbrakes = $request->sevenbrakes;
        $eightbrakes = $request->eightbrakes;
        $ninebrakes = $request->ninebrakes;
        
        //----------------- A par ------------------------------
        $zeropars = $request->zeropars;
        $onepars = $request->onepars;
        $twopars = $request->twopars;
        $threepars = $request->threepars;
        $fourpars = $request->fourpars;
        $fivepars = $request->fivepars;
        $sixpars = $request->sixpars;
        $sevenpars = $request->sevenpars;
        $eightpars = $request->eightpars;
        $ninepars = $request->ninepars;
            
        //----------------- A Sone------------------------------

        $tens = $request->tens;
        $powers = $request->powers;
        $natkhats = $request->natkhats;
        $brothers = $request->brothers;
        $apuus = $request->apuus;


        $from_account_wallet = Auth()->user()->wallet;
        $to_account = AdminUser::where('id', Auth()->user()->admin_user_id)->first();
        $to_account_wallet = Wallet::where('admin_user_id', $to_account->id)->where('status', 'admin')->first();
        
        $totals = 0;
       
        //-------------- insufficient condition for  htait---------------
        if ($zerohtaits) {
            foreach ($zerohtaits as $key=>$zerohtait) {
                $totals += $request->amount;
            }
        }
        
        if ($onehtaits) {
            foreach ($onehtaits as $key=>$onehtait) {
                $totals += $request->amount;
            }
        }

        if ($twohtaits) {
            foreach ($twohtaits as $key=>$twohtait) {
                $totals += $request->amount;
            }
        }

        if ($threehtaits) {
            foreach ($threehtaits as $key=>$threehtait) {
                $totals += $request->amount;
            }
        }

        if ($fourhtaits) {
            foreach ($fourhtaits as $key=>$fourhtait) {
                $totals += $request->amount;
            }
        }

        if ($fivehtaits) {
            foreach ($fivehtaits as $key=>$fivehtait) {
                $totals += $request->amount;
            }
        }

        if ($sixhtaits) {
            foreach ($sixhtaits as $key=>$sixhtait) {
                $totals += $request->amount;
            }
        }

        if ($sevenhtaits) {
            foreach ($sevenhtaits as $key=>$sevenhtait) {
                $totals += $request->amount;
            }
        }

        if ($eighthtaits) {
            foreach ($eighthtaits as $key=>$eighthtait) {
                $totals += $request->amount;
            }
        }

        if ($ninehtaits) {
            foreach ($ninehtaits as $key=>$ninehtait) {
                $totals += $request->amount;
            }
        }

        //------------------------ insufficient condition for a pait------------------------
        if ($zeropaits) {
            foreach ($zeropaits as $key=>$zeropait) {
                $totals += $request->amount;
            }
        }

        if ($onepaits) {
            foreach ($onepaits as $key=>$onepait) {
                $totals += $request->amount;
            }
        }

        if ($twopaits) {
            foreach ($twopaits as $key=>$twopait) {
                $totals += $request->amount;
            }
        }

        if ($threepaits) {
            foreach ($threepaits as $key=>$threepait) {
                $totals += $request->amount;
            }
        }

        if ($fourpaits) {
            foreach ($fourpaits as $key=>$fourpait) {
                $totals += $request->amount;
            }
        }

        if ($fivepaits) {
            foreach ($fivepaits as $key=>$fivepait) {
                $totals += $request->amount;
            }
        }

        if ($sixpaits) {
            foreach ($sixpaits as $key=>$sixpait) {
                $totals += $request->amount;
            }
        }

        if ($sevenpaits) {
            foreach ($sevenpaits as $key=>$sevenpait) {
                $totals += $request->amount;
            }
        }

        if ($eightpaits) {
            foreach ($eightpaits as $key=>$eightpait) {
                $totals += $request->amount;
            }
        }

        if ($ninepaits) {
            foreach ($ninepaits as $key=>$ninepait) {
                $totals += $request->amount;
            }
        }

        //------------------------ insufficient condition for a Brake------------------------
        if ($zerobrakes) {
            foreach ($zerobrakes as $key=>$zerobrake) {
                $totals += $request->amount;
            }
        }

        if ($onebrakes) {
            foreach ($onebrakes as $key=>$onebrake) {
                $totals += $request->amount;
            }
        }

        if ($twobrakes) {
            foreach ($twobrakes as $key=>$twobrake) {
                $totals += $request->amount;
            }
        }

        if ($threebrakes) {
            foreach ($threebrakes as $key=>$threebrake) {
                $totals += $request->amount;
            }
        }

        if ($fourbrakes) {
            foreach ($fourbrakes as $key=>$fourbrake) {
                $totals += $request->amount;
            }
        }

        if ($fivebrakes) {
            foreach ($fivebrakes as $key=>$fivebrake) {
                $totals += $request->amount;
            }
        }

        if ($sixbrakes) {
            foreach ($sixbrakes as $key=>$sixbrake) {
                $totals += $request->amount;
            }
        }

        if ($sevenbrakes) {
            foreach ($sevenbrakes as $key=>$sevenbrake) {
                $totals += $request->amount;
            }
        }

        if ($eightbrakes) {
            foreach ($eightbrakes as $key=>$eightbrake) {
                $totals += $request->amount;
            }
        }

        if ($ninebrakes) {
            foreach ($ninebrakes as $key=>$ninebrake) {
                $totals += $request->amount;
            }
        }


        //------------------------ insufficient condition for a parr ------------------------
        if ($zeropars) {
            foreach ($zeropars as $key=>$zeropar) {
                $totals += $request->amount;
            }
        }

        if ($onepars) {
            foreach ($onepars as $key=>$onepar) {
                $totals += $request->amount;
            }
        }

        if ($twopars) {
            foreach ($twopars as $key=>$twopar) {
                $totals += $request->amount;
            }
        }

        if ($threepars) {
            foreach ($threepars as $key=>$threepar) {
                $totals += $request->amount;
            }
        }

        if ($fourpars) {
            foreach ($fourpars as $key=>$fourpar) {
                $totals += $request->amount;
            }
        }

        if ($fivepars) {
            foreach ($fivepars as $key=>$fivepar) {
                $totals += $request->amount;
            }
        }

        if ($sixpars) {
            foreach ($sixpars as $key=>$sixpar) {
                $totals += $request->amount;
            }
        }

        if ($sevenpars) {
            foreach ($sevenpars as $key=>$sevenpar) {
                $totals += $request->amount;
            }
        }

        if ($eightpars) {
            foreach ($eightpars as $key=>$eightpar) {
                $totals += $request->amount;
            }
        }

        if ($ninepars) {
            foreach ($ninepars as $key=>$ninepar) {
                $totals += $request->amount;
            }
        }
        // insufficient condition balance for tens
        if ($tens) {
            foreach ($tens as $key=>$ten) {
                $totals += $request->amount;
            }
        }

        // insufficient condition balance for powers
        if ($powers) {
            foreach ($powers as $key=>$power) {
                $totals += $request->amount;
            }
        }


        // insufficient condition balance for natkhats
        if ($natkhats) {
            foreach ($natkhats as $key=>$natkhat) {
                $totals += $request->amount;
            }
        }


        // insufficient condition balance for brothers
        if ($brothers) {
            foreach ($brothers as $key=>$brother) {
                $totals += $request->amount;
            }
        }

        // insufficient condition balance for apuus
        if ($apuus) {
            foreach ($apuus as $key=>$apuu) {
                $totals += $request->amount;
            }
        }

        if ($from_account_wallet->amount < $totals) {
            return redirect('/')->withErrors(['fail' => 'You have no sufficient balance']);
        }
        
        $amount = $request->amount;
       
        DB::beginTransaction();

        try {

            // -------------------- MOney From User to Admin  -------------------
            $from_account_wallet->decrement('amount', $totals);
            $from_account_wallet->update();
        
            $to_account_wallet->increment('amount', $totals);
            $to_account_wallet->update();
            

            // -------------------- Store Htait -------------------
            if ($zerohtaits) {
                HtaitPaitForeach::htaitpait($zerohtaits, $amount);
            }

            if ($onehtaits) {
                HtaitPaitForeach::htaitpait($onehtaits, $amount);
            }

            if ($twohtaits) {
                HtaitPaitForeach::htaitpait($twohtaits, $amount);
            }

            if ($threehtaits) {
                HtaitPaitForeach::htaitpait($threehtaits, $amount);
            }


            if ($fourhtaits) {
                HtaitPaitForeach::htaitpait($fourhtaits, $amount);
            }
    
            if ($fivehtaits) {
                HtaitPaitForeach::htaitpait($fivehtaits, $amount);
            }
            
           
            if ($sixhtaits) {
                HtaitPaitForeach::htaitpait($sixhtaits, $amount);
            }
    
            if ($sevenhtaits) {
                HtaitPaitForeach::htaitpait($sevenhtaits, $amount);
            }
    
            if ($eighthtaits) {
                HtaitPaitForeach::htaitpait($eighthtaits, $amount);
            }
    
            if ($ninehtaits) {
                HtaitPaitForeach::htaitpait($ninehtaits, $amount);
            }
    
    
            //    -----------------------Store Pait -----------------------------
    
            if ($zeropaits) {
                $zeropaits = HtaitPaitForeach::htaitpait($zeropaits, $amount);
            }

            if ($onepaits) {
                HtaitPaitForeach::htaitpait($onepaits, $amount);
            }

            if ($twopaits) {
                HtaitPaitForeach::htaitpait($twopaits, $amount);
            }

            if ($threepaits) {
                HtaitPaitForeach::htaitpait($threepaits, $amount);
            }


            if ($fourpaits) {
                HtaitPaitForeach::htaitpait($fourpaits, $amount);
            }
    
            if ($fivepaits) {
                HtaitPaitForeach::htaitpait($fivepaits, $amount);
            }
            
           
            if ($sixpaits) {
                HtaitPaitForeach::htaitpait($sixpaits, $amount);
            }
    
            if ($sevenpaits) {
                HtaitPaitForeach::htaitpait($sevenpaits, $amount);
            }
    
            if ($eightpaits) {
                HtaitPaitForeach::htaitpait($eightpaits, $amount);
            }
    
            if ($ninepaits) {
                HtaitPaitForeach::htaitpait($ninepaits, $amount);
            }
            
    
            //----------------- Store Brake ------------------------------
    
            if ($zerobrakes) {
                $zerobrakes = HtaitPaitForeach::htaitpait($zerobrakes, $amount);
            }

            if ($onebrakes) {
                HtaitPaitForeach::htaitpait($onebrakes, $amount);
            }

            if ($twobrakes) {
                HtaitPaitForeach::htaitpait($twobrakes, $amount);
            }

            if ($threebrakes) {
                HtaitPaitForeach::htaitpait($threebrakes, $amount);
            }


            if ($fourbrakes) {
                HtaitPaitForeach::htaitpait($fourbrakes, $amount);
            }
    
            if ($fivebrakes) {
                HtaitPaitForeach::htaitpait($fivebrakes, $amount);
            }
            
           
            if ($sixbrakes) {
                HtaitPaitForeach::htaitpait($sixbrakes, $amount);
            }
    
            if ($sevenbrakes) {
                HtaitPaitForeach::htaitpait($sevenbrakes, $amount);
            }
    
            if ($eightbrakes) {
                HtaitPaitForeach::htaitpait($eightbrakes, $amount);
            }
    
            if ($ninebrakes) {
                HtaitPaitForeach::htaitpait($ninebrakes, $amount);
            }
    
    
            //-----------------Store a par ------------------------------
    
    
            if ($zeropars) {
                $zeropars = HtaitPaitForeach::htaitpait($zeropars, $amount);
            }

            if ($onepars) {
                HtaitPaitForeach::htaitpait($onepars, $amount);
            }

            if ($twopars) {
                HtaitPaitForeach::htaitpait($twopars, $amount);
            }

            if ($threepars) {
                HtaitPaitForeach::htaitpait($threepars, $amount);
            }


            if ($fourpars) {
                HtaitPaitForeach::htaitpait($fourpars, $amount);
            }
    
            if ($fivepars) {
                HtaitPaitForeach::htaitpait($fivepars, $amount);
            }
            
           
            if ($sixpars) {
                HtaitPaitForeach::htaitpait($sixpars, $amount);
            }
    
            if ($sevenpars) {
                HtaitPaitForeach::htaitpait($sevenpars, $amount);
            }
    
            if ($eightpars) {
                HtaitPaitForeach::htaitpait($eightpars, $amount);
            }
    
            if ($ninepars) {
                HtaitPaitForeach::htaitpait($ninepars, $amount);
            }
    
            //  -------------------- Apuus -----------------------------
            if ($apuus) {
                HtaitPaitForeach::htaitpait($apuus, $amount);
            }

            //  -------------------- Ten -----------------------------
    
            if ($tens) {
                HtaitPaitForeach::htaitpait($tens, $amount);
            }
           
            //  -------------------- Power -----------------------------
            if ($powers) {
                HtaitPaitForeach::htaitpait($powers, $amount);
            }
       
            //  -------------------- Natkhats -----------------------------
            if ($natkhats) {
                HtaitPaitForeach::htaitpait($natkhats, $amount);
            }
            
            //  -------------------- Brothers -----------------------------
            if ($brothers) {
                HtaitPaitForeach::htaitpait($brothers, $amount);
            }
            
            

            $ref_no = UUIDGenerator::RefNumber();

            $transactions = new Transaction();
            $transactions->ref_no = $ref_no;
            $transactions->trx_id = UUIDGenerator::TrxId();
            $transactions->user_id = Auth()->user()->id;
            $transactions->source_id = $to_account_wallet->id;
            $transactions->type = 2;
            
            $transactions->amount = $totals;
            $transactions->save();
            

            $transactions = new Transaction();
            $transactions->ref_no = $ref_no;
            $transactions->trx_id = UUIDGenerator::TrxId();
            $transactions->user_id = $to_account_wallet->id;
            $transactions->source_id = Auth()->user()->id;
            $transactions->type = 1;
           
            $transactions->amount = $totals;
            $transactions->save();
            
            DB::commit();
            return redirect('two/htaitpait')->with('create', 'Done');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->withErrors(['fail' => 'Something wrong']);
        }
    }
}
