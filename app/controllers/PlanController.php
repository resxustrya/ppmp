<?php

/**
 * Created by PhpStorm.
 * User: hahahehe
 * Date: 8/9/2017
 * Time: 1:42 PM
 */
class PlanController extends BaseController
{
    public function __construct()
    {
        $this->beforeFilter('reg_user');
    }

    public function dashboard()
    {
        $data['plan_count'] = DB::table('ppmpplan')->where('section','=',Auth::user()->section)->where('status','=',1)->count();
        $data['plans'] = DB::table('ppmpplan')->where('section','=', Auth::user()->section)->paginate(20);
        $data['items'] = DB::table('items')->where('section', '=', Auth::user()->section)->count();
        return View::make('sectionplan.dashboard.dashboard', $data);
    }

    public function get_items()
    {
        $items = DB::table('items')->leftJoin('unit', 'items.unit', '=', 'unit.unitcode')->paginate(10);

        if (Request::ajax()) {
            return Response::json(View::make('ppmp.items', array('items' => $items))->render());
        }

        return View::make('ppmp.items', ['items' => $items]);
    }

    public function getitems()
    {

        $data = array();
        $items = DB::table('items')->where('section', '=', Auth::user()->section)->where('ppcode', '=', Input::get('ppcode'))->get();
        $data['v'] = Input::get('v');
        $data['items'] = $items;
        return View::make('sectionplan.items.items', $data);
    }

    public function section_items()
    {
        $data = array();
        $items = DB::table('items')->where('section', '=', Auth::user()->section)->paginate(20);
        $data['v'] = Input::get('v');
        $data['items'] = $items;
        return View::make('sectionplan.items.x', $data);
    }

    public function plan()
    {
        $plans = DB::table('ppmpplan')->where('section', '=', Auth::user()->section)->where('status','=',1)->paginate(20);
        $data['search'] = "search/plan/items";
        $data['plans'] = $plans;
        return View::make('sectionplan.plan.plan', $data);
    }

    public function create_plan()
    {
        if (Request::method() == "GET") {
            return View::make('sectionplan.plan.create-plan');
        }
        if (Request::method() == "POST") {
            $pk = DB::table('code')->orderBy('plancode', 'DESC')->first();

            $data['plancode'] = $pk->plancode;
            $data['source_fund'] = Input::get('txt_srcfunds');
            $data['remarks'] = Input::get('remarks');
            $data['date_created'] = date("Y-m-d");
            $data['section'] = Auth::user()->section;
            $data['created_by'] = Auth::user()->fname ." ".Auth::user()->lname;
            DB::table('ppmpplan')->insert($data);
            DB::table('code')->increment('plancode');

            return Redirect::to('plan/information?plancode=' . $pk->plancode);
        }
    }

    public function create_plan_information()
    {
        $plancode = Input::get('plancode');
        $plan = DB::table('ppmpplan')->where('plancode', '=', $plancode)->first();
        $plan_codes = DB::table('plan_expense_codes')->where('plancode', '=', $plan->plancode)->get();
        $data['plan'] = $plan;
        $data['plan_codes'] = $plan_codes;
        return View::make('sectionplan.plan.create-plan-info', $data);
    }

    public function pdf_plan_information(){
        $plancode = Input::get('plancode');
        $plan = DB::table('ppmpplan')->where('plancode', '=', $plancode)->first();
        $plan_codes = DB::table('plan_expense_codes')->where('plancode', '=', $plan->plancode)->get();
        $data['plan'] = $plan;
        $data['plan_codes'] = $plan_codes;

        $display = View::make('reports.reports',$data);
        $pdf = App::make('dompdf');
        $pdf->loadHTML($display)->setPaper('legal', 'landscape');
        return $pdf->stream();
    }

    public function expenseitems()
    {
        if (Request::method() == "GET") {
            $plancode = Input::get('plancode');
            $plan = DB::table('ppmpplan')->where('plancode', '=', $plancode)->first();
            $codes = DB::table('ppmpitems')->where('plancode', '=', $plan->plancode)->get();
            $data['plan'] = $plan;
            $data['items'] = $codes;
            return View::make('sectionplan.plan.plan-expense-codes', $data);
        }
        if (Request::method() == "POST") {
            $plancode = Input::get('plancode');
            $data['plancode'] = $plancode;
            $data['ppcode'] = Input::get('pp_code');
            DB::table('plan_expense_codes')->insert($data);

            $itemcode = Input::get('code');
            $item_desc = Input::get('item-desc');
            $q1qty = Input::get('q1qty');
            $q2qty = Input::get('q2qty');
            $q3qty = Input::get('q3qty');
            $q4qty = Input::get('q4qty');
            $q1unitcost = Input::get('q1unitcost');
            $q2unitcost = Input::get('q2unitcost');
            $q3unitcost = Input::get('q3unitcost');
            $q4unitcost = Input::get('q4unitcost');
            $recomethod = Input::get('recomethod');
            $srcfunds = Input::get('srcfunds');
            $unit = Input::get('unit');
            $ppcode = Input::get('pp_code');

            for ($i = 0; $i < count($itemcode); $i++) {
                $data['plancode'] = $plancode;
                $data['ppcode'] = $ppcode;
                $data['itemcode'] = $itemcode[$i];
                $data['unit'] = $unit[$i];
                $data['q1qty'] = $q1qty[$i];
                $data['q2qty'] = $q2qty[$i];
                $data['q3qty'] = $q3qty[$i];
                $data['q4qty'] = $q4qty[$i];
                $data['q1cost'] = $q1unitcost[$i];
                $data['q2cost'] = $q2unitcost[$i];
                $data['q3cost'] = $q3unitcost[$i];
                $data['q4cost'] = $q4unitcost[$i];
                $data['item_desc'] = $item_desc[$i];
                DB::table('ppmpitems')->insert($data);
            }
            return Redirect::to('plan/information?plancode=' . $plancode);
        }
    }

    public function view_expense($plancode = null, $ppcode = null)
    {
        if (Request::method() == "GET") {
            $plan = DB::table('ppmpplan')->where('plancode', '=', $plancode)->first();
            $items = DB::table('ppmpitems')->where('plancode', '=', $plancode)->where('ppcode', '=', $ppcode)->get();

            Session::put('u_e_p', $plancode);
            Session::put('u_pp', $ppcode);

            $data['plan'] = $plan;
            $data['items'] = $items;
            $data['expense'] = DB::table('ppmp_code')->where('ppcode', '=', $ppcode)->first();
            return View::make('sectionplan.plan.v', $data);
        }

        if (Request::method() == "POST") {
            DB::table('ppmpitems')->where('plancode', '=', Session::get('u_e_p'))->where('ppcode', '=', Session::get('u_pp'))->delete();
            $itemcode = Input::get('code');
            $item_desc = Input::get('item-desc');
            $q1qty = Input::get('q1qty');
            $q2qty = Input::get('q2qty');
            $q3qty = Input::get('q3qty');
            $q4qty = Input::get('q4qty');
            $q1unitcost = Input::get('q1unitcost');
            $q2unitcost = Input::get('q2unitcost');
            $q3unitcost = Input::get('q3unitcost');
            $q4unitcost = Input::get('q4unitcost');
            $recomethod = Input::get('recomethod');
            $srcfunds = Input::get('srcfunds');
            $unit = Input::get('unit');
            $ppcode = Input::get('pp_code');

            for ($i = 0; $i < count($itemcode); $i++) {
                $data['plancode'] = Session::get('u_e_p');
                $data['ppcode'] = Session::get('u_pp');
                $data['itemcode'] = $itemcode[$i];
                $data['unit'] = $unit[$i];
                $data['q1qty'] = $q1qty[$i];
                $data['q2qty'] = $q2qty[$i];
                $data['q3qty'] = $q3qty[$i];
                $data['q4qty'] = $q4qty[$i];
                $data['q1cost'] = $q1unitcost[$i];
                $data['q2cost'] = $q2unitcost[$i];
                $data['q3cost'] = $q3unitcost[$i];
                $data['q4cost'] = $q4unitcost[$i];
                $data['item_desc'] = $item_desc[$i];
                DB::table('ppmpitems')->insert($data);
            }
            $temp = Session::get('u_e_p');
            Session::forget('u_e_p');
            Session::forget('u_pp');

            return Redirect::to('plan/information?plancode=' . $temp);
        }
    }

    public function c_code()
    {
        $ppcode = Input::get('ppcode');
        $plancode = Input::get('plancode');
        $ppcode = DB::table('plan_expense_codes')->where('plancode', '=', $plancode)->where('ppcode', '=', $ppcode)->first();
        if (count($ppcode) > 0) {
            return $ppcode->ppcode;
        } else {
            return "0";
        }
    }

    public function d($plancode, $ppcode)
    {
        DB::table('plan_expense_codes')->where('plancode', '=', $plancode)->where('ppcode', '=', $ppcode)->delete();
        return Redirect::to('plan/information?plancode=' . $plancode);
    }

    public function d_plan($plancode = null)
    {
        DB::table('ppmpplan')->where('plancode', '=', $plancode)->update(['status' => 0]);
        return Redirect::to('plan');
    }

    public function new_item()
    {
        if (Request::method() == "GET") {
            if (Auth::user()->user_priv == "1") {
                $data['url'] = asset('e/items/' . Input::get('ppcode'));
                Session::put('ppcode', Input::get('ppcode'));
                return View::make('sectionplan.items.new-item', $data);
            } else {
                return View::make('sectionplan.items.unauthorized');
            }
        }
        if (Request::method() == "POST") {
            $pk = DB::table('code')->orderBy('code', 'DESC')->first();

            $data['code'] = $pk->code;
            $data['description'] = Input::get('description');
            $data['unit'] = Input::get('unit');
            $data['section'] = Auth::user()->section;
            $data['ppcode'] = Session::get('ppcode');

            DB::table('items')->insert($data);
            DB::table('code')->increment('code');

            return Redirect::to(Input::get('rdr'));

        }
    }

    public function expense_codes()
    {
        $ppcodes = DB::table('ppmp_code')->orderBy('description', 'ASC')->paginate(20);
        return View::make('sectionplan.items.expense', ['ppcodes' => $ppcodes]);
    }

    public function ppcode_items($ppcode)
    {
        $items = DB::table('items')->where('ppcode', '=', $ppcode)->paginate(20);
        $data['items'] = $items;
        $data['ppcode'] = DB::table('ppmp_code')->where('ppcode', '=', $ppcode)->first();

        return View::make('sectionplan.items.x', $data);
    }

    public function d_item($itemcode, $ppcode)
    {
        if (Auth::user()->user_priv == "1") {
            $rdr = asset('e/items/' . $ppcode);
            DB::table('items')->where('code', '=', $itemcode)->delete();
            return Redirect::to($rdr);
        } else if (Auth::user()->user_priv == "0") {
            $rdr = asset('e/items/' . $ppcode);
            return Redirect::to($rdr)->with('ops', 'You must log in as section head to delete an item.');
        }
    }

    public function units()
    {
        $units = DB::table('unit')->paginate('20');
        return View::make('inventory.units.units', ['units' => $units]);
    }

    public function d_unit()
    {
        if (Auth::user()->user_priv == "1") {
            $id = Input::get('id');
            DB::table('unit')->where('id', '=', $id)->delete();
            return Redirect::to('units');
        } else {
            return Redirect::to('units')->with('ops', 'You must log in as section head to delete an unit.');
        }

    }

    public function n_unit()
    {
        if (Request::method() == "GET") {
            if (Auth::user()->user_priv == "1") {
                return View::make('inventory.units.new-unit');
            } else {
                return View::make('inventory.units.unauthorized');
            }
        }
        if (Request::method() == "POST") {
            $data['unitcode'] = Input::get('unit-code');
            $data['unit'] = Input::get('unit-desc');
            DB::table('unit')->insert($data);
            return Redirect::to('units');
        }
    }

    public function e_tem()
    {
        if (Request::method() == "GET") {
            if (Auth::user()->user_priv == "1") {
                $code = Input::get('itemcode');
                Session::put('itemcode', $code);
                Session::put('rdr', asset('e/items/' . Input::get('ppcode')));
                $item = DB::table('items')->where('code', '=', $code)->first();
                return View::make('sectionplan.items.edit', ['item' => $item]);
            } else {
                return View::make('sectionplan.items.unauthorized');
            }
        }
        if (Request::method() == "POST") {
            $data['description'] = Input::get('description');
            $data['unit'] = Input::get('unit');
            DB::table('items')->where('code', '=', Session::get('itemcode'))->update($data);
            return Redirect::to(Session::get('rdr'));
        }
    }

    public function create_expense()
    {
        if(Request::method() == "GET")
        {
            if(Auth::user()->user_priv == "1")
            {
                return View::make('sectionplan.items.new_expense');
            } else {
                return Redirect::to('expense/codes')->with('ops','You must log in as section head to add new expense code.');
            }
        }
        if(Request::method() == "POST")
        {
            $exist = DB::table('ppmp_code')->where('ppcode','=',Input::get('ppcode'))->get();
            if(count($exist) > 0) {
                return Redirect::to('create/expense')->with('ops','Data not saved because another expense code already exist.');
            } else {
                $data['ppcode'] = Input::get('ppcode');
                $data['description'] = Input::get('desc');
                $data['section'] = Auth::user()->section;
                DB::table('ppmp_code')->insert($data);
                return Redirect::to('e/items/'.$data['ppcode']);
            }

        }
    }

    public function edit_expense()
    {
       if(Request::method() == "GET")
       {
           $ppcode = Input::get('ppcode');
           $expense = DB::table('ppmp_code')->where('ppcode','=', $ppcode)->where('section','=', Auth::user()->section)->first();
           Session::put('e_ppcode',$ppcode);
           return View::make('sectionplan.items.edit-expense',['expense' => $expense]);
       }
       if(Request::method() == "POST")
       {

           $ppcode = DB::table('ppmp_code')
                            ->where('description','=', Input::get('desc'))
                            ->where('ppcode','=', Input::get('ppcode'))
                            ->where('section','=',Auth::user()->section)
                            ->first();
           if(count($ppcode) > 0 AND $ppcode->ppcode == Input::get('ppcode') AND $ppcode->description == Input::get('desc')) {
               return Redirect::to('expense/codes')->with('ops','Data not saved because another expense code already exist.');
           } else {

               $data['ppcode'] = Input::get('ppcode');
               $data['description'] = Input::get('desc');
               $data['section'] = Auth::user()->section;
               DB::table('ppmp_code')->where('ppcode','=',Session::get('e_ppcode'))->where('section','=',Auth::user()->section)->update($data);

               DB::table('items')->where('ppcode','=',Session::get('e_ppcode'))->where('section','=',Auth::user()->section)->update(['ppcode' => $data['ppcode']]);

               return Redirect::to('e/items/'.$data['ppcode']);
           }
       }
    }

    public function e_unit()
    {
        if(Request::method() == "GET")
        {
            $id = Input::get('id');
            Session::put('edit_unit',$id);
            $unit = DB::table('unit')->where('id','=', $id)->first();

            return View::make('inventory.units.edit-unit',['unit' => $unit]);
        }
        if(Request::method() == "POST")
        {
            $data['unitcode'] = Input::get('unit-code');
            $data['unit'] = Input::get('unit-desc');
            DB::table('unit')->where('id','=', Session::get('edit_unit'))->update($data);
            return Redirect::to('units');
        }
    }

    public function search_item()
    {
        if(Request::method() == "GET")
        {
            return View::make('sectionplan.items.search');
        }
        if(Request::method() == "POST")
        {
            $keyword = Input::get('search');
            $items = DB::table('items')->where("section","=", Auth::user()->section)->where("description","LIKE", "%$keyword%")->orderBy("description","ASC")->paginate(20);
            return View::make('sectionplan.items.search',['items' => $items,'keyword' => $keyword]);
        }
    }
}