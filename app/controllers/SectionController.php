<?php

/**
 * Created by PhpStorm.
 * User: hahahehe
 * Date: 9/27/2017
 * Time: 12:29 PM
 */
class SectionController extends BaseController
{
    public function __construct()
    {
        
        $this->beforeFilter('auth');
    }

    public function form_plan()
    {
        
        if(Session::has('pin_code')){
            return View::make('section.form_plan');
        } else {
            return Redirect::to('c');
        }
    }
    public function pin_code(){
        if(Request::method() == "GET"){
            Session::forget('pin_code');
            return View::make('login.pin_code');
        }
        if(Request::method() == "POST") {
            $code = Input::get('passcode');
            if($code != "HAHAhehe1211"){
                return Redirect::to('c');
            } else {
                Session::put('pin_code',Input::get('passcode'));
                return Redirect::to('ppmp/section');
                
            }
        }
    }
    public function get_expenses()
    {
        $count = DB::table('ppmp_code')->where('id','<>','1')->where('id','<>','2')->count();
        return $count;
    }
    
    public function get_table_a()
    {
        $data = array();
        $pdo = DB::connection()->getPdo();
        $st = $pdo->prepare("SELECT item,unit,quantity,amount,created_by FROM table_a  WHERE created_by = '". Auth::user()->section . "' OR created_by = 8888 GROUP BY item ORDER BY item ASC");
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_ASSOC);
        foreach($row as $r)
        {
            if($r['item'] == NULL AND $r['unit'] == NULL AND $r['amount'] == NULL ) {

            } else {
                $amount = DB::table('table_a')->where('item','=',$r['item'])->where('created_by','=','8888')->first();
                $total = (isset($r['quantity']) ? $r['quantity'] * $amount->amount : NULL );
                $data[] = array($r['item'],$amount->unit,number_format($r['quantity']),number_format($amount->amount,2),number_format($total,2));
            }
        }
        if(count($data) <= 0)
        {
            $data[] = array(NULL,NULL,NULL,NULL,NULL);
        }
        return json_encode($data);
    }

    public function save_table_a()
    {
        
        DB::table('table_a')->where('created_by','=',Auth::user()->section)->delete();
        $data = Input::get('data');
        $decoded = json_decode($data);
        foreach($decoded as $d)
        {
            $amount = DB::table('table_a')->where('item','=',$d[0])->where('created_by','=','8888')->first();
            $data = array($d[0],$amount->unit,$amount->amount,$d[2],Auth::user()->section,date("Y-m-d H:i:s"));
            DB::insert("INSERT IGNORE INTO table_a(item,unit,amount,quantity,created_by,date_added) VALUES(?,?,?,?,?,?)",$data);
        }
        return 1;
    }

    public function get_table_b()
    {
        $data = array();
        $pdo = DB::connection()->getPdo();
        $st = $pdo->prepare("SELECT id,item,quantity,unit,amount,created_by FROM table_b  WHERE created_by = '". Auth::user()->section . "' OR created_by = 8888 GROUP BY item ORDER BY item ASC");
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_ASSOC);
        foreach($row as $r)
        {
            if($r['item'] == NULL AND $r['unit'] == NULL AND $r['amount'] == NULL ) {
            } else {
                $amount = DB::table('table_b')->where('item','=',$r['item'])->where('created_by','=','8888')->first();
                $total = (isset($r['quantity']) ? $r['quantity'] * $amount->amount : NULL );
                $data[] = array($r['item'],$amount->unit,number_format($r['quantity']),number_format($amount->amount,2),number_format($total,2));
            }
        }
        if(count($data) <= 0)
        {
            $data[] = array(NULL,NULL,NULL,NULL,NULL);
        }
        return json_encode($data);
    }
    public function save_table_b()
    {
        DB::table('table_b')->where('created_by','=',Auth::user()->section)->delete();
        $data = Input::get('data');
        $decoded = json_decode($data);
        foreach($decoded as $d)
        {
            $amount = DB::table('table_b')->where('item','=',$d[0])->where('created_by','=','8888')->first();
            $data = array($d[0],$d[1],$amount->amount,$d[2],Auth::user()->section,date("Y-m-d H:i:s"));
            DB::insert("INSERT IGNORE INTO table_b(item,unit,amount,quantity,created_by,date_added) VALUES(?,?,?,?,?,?)",$data);
        }
        return 1;
    }

    public function get_table_c()
    {
        $data = array();
        $pdo = DB::connection()->getPdo();
        $st = $pdo->prepare("SELECT id,item,quantity,unit,amount,created_by FROM table_c  WHERE created_by = '". Auth::user()->section . "' OR created_by = 8888 GROUP BY item ORDER BY item ASC");
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_ASSOC);
        foreach($row as $r)
        {
            if($r['item'] == NULL AND $r['unit'] == NULL AND $r['amount'] == NULL ) {
            } else {
                $amount = DB::table('table_c')->where('item','=',$r['item'])->where('created_by','=','8888')->first();
                $total = (isset($r['quantity']) ? $r['quantity'] * $amount->amount : NULL );
                $data[] = array($r['item'],$amount->unit,number_format($r['quantity']),number_format($amount->amount,2),number_format($total,2));
            }
        }
        if(count($data) <= 0)
        {
            $data[] = array(NULL,NULL,NULL,NULL,NULL);
        }
        return json_encode($data);
    }
    public function save_table_c()
    {
        DB::table('table_c')->where('created_by','=',Auth::user()->section)->delete();
        $data = Input::get('data');
        $decoded = json_decode($data);
        foreach($decoded as $d)
        {
            $amount = DB::table('table_c')->where('item','=',$d[0])->where('created_by','=','8888')->first();
            $data = array($d[0],$d[1],$amount->amount,$d[2],Auth::user()->section,date("Y-m-d H:i:s"));
            DB::insert("INSERT IGNORE INTO table_c(item,unit,amount,quantity,created_by,date_added) VALUES(?,?,?,?,?,?)",$data);
        }
        return 1;
    }

    public function get_table_d()
    {
        $data = array();
        $pdo = DB::connection()->getPdo();
        $st = $pdo->prepare("SELECT code,item,quantity,unit,amount,created_by FROM table_d  WHERE created_by = '". Auth::user()->section . "' GROUP BY item ORDER BY item ASC");
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_ASSOC);
        foreach($row as $r)
        {
            if($r['item'] == NULL AND $r['unit'] == NULL AND $r['amount'] == NULL ) {
            } else {
                $total = (isset($r['quantity']) ? $r['quantity'] * $r['amount'] : NULL );
                $data[] = array($r['code'],$r['item'],$r['unit'],number_format($r['quantity']),number_format($r['amount'],2),number_format($total,2));
            }
        }
        if(count($data) <= 0)
        {
            $data[] = array(NULL,NULL,NULL,NULL,NULL,NULL);
        }
        return json_encode($data);
    }
    public function save_table_d()
    {
        //DB::table('table_d')->where('created_by','=',Auth::user()->section)->delete();
        $reponse = null;
        $data = Input::get('data');
        $decoded = json_decode($data);
        $insert = null;
        $mark = null;
        $amount = null;
        $sections = DB::table('section')->where('division','=',Auth::user()->division)->orderBy('id')->get();
        $codes = array();
        foreach($decoded as $d):

            if($d[0]) {
                if($d[4] AND $d[1] AND $d[2]) {
                    $item['item'] = $d[1];
                    $item['unit'] = $d[2];
                    $item['amount'] = $d[4];
                    
                    DB::table('table_d')
                            ->where('code','=',$d[0])
                            ->update($item);
                    
                    DB::table('table_d')
                            ->where('code','=',$d[0])
                            ->where('created_by','=',Auth::user()->section)
                            ->update(array('quantity' => $d[3]));
                }
            }

            else {
                if($d[1] AND $d[2] AND $d[4]) {

                    $code = DB::table('code')->orderBy('code','DESC')->first();
                    DB::table('code')->increment('code');
                    foreach($sections as $section):
                        $amount = $d[4];
                        if(Auth::user()->section == $section->id) {
                            $quantity = $d[3];
                            $insert = "code,item,unit,amount,quantity,created_by,date_added,added_by,division";
                            $data = array($code->code,$d[1],$d[2],$amount,$quantity,$section->id,date("Y-m-d H:i:s"),Auth::user()->section,Auth::user()->division);
                            $mark = "?,?,?,?,?,?,?,?,?";
                            DB::insert("INSERT IGNORE INTO table_d($insert) VALUES($mark)",$data);
                        } else {
                            $quantity = 0;
                            $insert = "code,item,unit,amount,quantity,created_by,date_added,division";
                            $data = array($code->code,$d[1],$d[2],$amount,$quantity,$section->id,date("Y-m-d H:i:s"),Auth::user()->division);
                            $mark = "?,?,?,?,?,?,?,?";
                            DB::insert("INSERT IGNORE INTO table_d($insert) VALUES($mark)",$data);
                        }
                    endforeach;
                }
            }
        endforeach;
        return 1;
    }

    public function get_table_e()
    {
        $data = array();
        $pdo = DB::connection()->getPdo();
        $st = $pdo->prepare("SELECT id,item,quantity,unit,amount,created_by FROM table_e  WHERE created_by = '". Auth::user()->section . "' OR created_by = 8888 GROUP BY item ORDER BY item ASC");
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_ASSOC);
        foreach($row as $r)
        {
            if($r['item'] == NULL AND $r['unit'] == NULL AND $r['amount'] == NULL ) {

            } else {
                $amount = DB::table('table_e')->where('item','=',$r['item'])->where('created_by','=','8888')->first();
                $total = (isset($r['quantity']) ? $r['quantity'] * $amount->amount : NULL );
                $data[] = array($r['item'],$amount->unit,number_format($r['quantity']),number_format($amount->amount,2),number_format($total,2));
            }
        }
        if(count($data) <= 0)
        {
            $data[] = array(NULL,NULL,NULL,NULL,NULL);
        }
        return json_encode($data);
    }
    public function save_table_e()
    {
        DB::table('table_e')->where('created_by','=',Auth::user()->section)->delete();
        $data = Input::get('data');
        $decoded = json_decode($data);
        foreach($decoded as $d)
        {
            $amount = DB::table('table_e')->where('item','=',$d[0])->where('created_by','=','8888')->first();
            $data = array($d[0],$d[1],$amount->amount,$d[2],Auth::user()->section,date("Y-m-d H:i:s",Auth::user()->section));
            DB::insert("INSERT IGNORE INTO table_e(item,unit,amount,quantity,created_by,date_added) VALUES(?,?,?,?,?,?)",$data);
        }
        return 1;
    }

    public function get_table_z()
    {
        $data = array();
        $pdo = DB::connection()->getPdo();
        $st = $pdo->prepare("SELECT code,item,quantity,unit,amount,created_by FROM table_z  WHERE created_by = '". Auth::user()->section . "' GROUP BY item ORDER BY item ASC");
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_ASSOC);
        foreach($row as $r)
        {
            if($r['item'] == NULL AND $r['unit'] == NULL AND $r['amount'] == NULL ) {

            } else {
                $total = (isset($r['quantity']) ? $r['quantity'] * $r['amount'] : NULL );
                $data[] = array($r['code'],$r['item'],$r['unit'],number_format($r['quantity']),number_format($r['amount'],2),number_format($total,2));
            }
        }
        if(count($data) <= 0)
        {
            $data[] = array(NULL,NULL,NULL,NULL,NULL,NULL);
        }
        return json_encode($data);
    }
    public function save_table_z()
    {
        //DB::table('table_z')->where('created_by','=',Auth::user()->section)->delete();
        $data = Input::get('data');
        $decoded = json_decode($data);
        $insert = null;
        $mark = null;
        $amount = null;
        $sections = DB::table('section')->where('division','=',Auth::user()->division)->orderBy('id')->get();

        foreach($decoded as $d):
            if($d[0]) {
                if($d[4] AND $d[1] AND $d[2]) {
                
                    $item['item'] = $d[1];
                    $item['unit'] = $d[2];
                    $item['amount'] = $d[4];
                    
                    DB::table('table_z')
                            ->where('code','=',$d[0])
                            ->update($item);
                    
                    DB::table('table_z')
                            ->where('code','=',$d[0])
                            ->where('created_by','=',Auth::user()->section)
                            ->update(array('quantity' => $d[3]));
                   
                }
            }
            else {
                if($d[1] AND $d[2] AND $d[4]) {
                    $code = DB::table('code')->orderBy('code','DESC')->first();
                    DB::table('code')->increment('code');
                    foreach($sections as $section):
                        $amount = $d[4];
                        if(Auth::user()->section == $section->id) {
                            $quantity = $d[3];
                            $insert = "code,item,unit,amount,quantity,created_by,date_added,added_by,division,ppcode";
                            $data = array($code->code,$d[1],$d[2],$amount,$quantity,$section->id,date("Y-m-d H:i:s"),Auth::user()->section,Auth::user()->division,1);
                            $mark = "?,?,?,?,?,?,?,?,?,?";
                            DB::insert("INSERT IGNORE INTO table_z($insert) VALUES($mark)",$data);
                        } else {
                            $quantity = 0;
                            $insert = "code,item,unit,amount,quantity,created_by,date_added,division,ppcode";
                            $data = array($code->code,$d[1],$d[2],$amount,$quantity,$section->id,date("Y-m-d H:i:s"),Auth::user()->division,1);
                            $mark = "?,?,?,?,?,?,?,?,?";
                            DB::insert("INSERT IGNORE INTO table_z($insert) VALUES($mark)",$data);
                        }
                    endforeach;
                }
            }
         endforeach;
        return 1;
    }
    public function get_table_f()
    {
        $data = array();
        $pdo = DB::connection()->getPdo();
        $st = $pdo->prepare("SELECT id,item,quantity,unit,amount,created_by FROM table_f  WHERE  created_by = '8888' OR created_by = '". Auth::user()->section . "'  GROUP BY item ORDER BY item ASC");
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_ASSOC);
        foreach($row as $r)
        {
            if($r['item'] == NULL AND $r['unit'] == NULL AND $r['amount'] == NULL ) {

            } else {
                $amount = DB::table('table_f')->where('item','=',$r['item'])->where('created_by','=','8888')->first();
                if(isset($amount)){
                    $total = (isset($r['quantity']) ? $r['quantity'] * $amount->amount : NULL );
                    $data[] = array($r['item'],$amount->unit,number_format($r['quantity']),number_format($amount->amount,2),number_format($total,2));
                }
            }
        }
        if(count($data) <= 0)
        {
            $data[] = array(NULL,NULL,NULL,NULL,NULL);
        }
        return json_encode($data);
    }
    public function save_table_f()
    {
        DB::table('table_f')->where('created_by','=',Auth::user()->section)->delete();
        $data = Input::get('data');
        $decoded = json_decode($data);
        foreach($decoded as $d)
        {
            $amount = DB::table('table_f')->where('item','=',$d[0])->where('created_by','=','8888')->first();
            $data = array($d[0],$d[1],$amount->amount,$d[2],Auth::user()->section,date("Y-m-d H:i:s"));
            DB::insert("INSERT IGNORE INTO table_f(item,unit,amount,quantity,created_by,date_added) VALUES(?,?,?,?,?,?)",$data);
        }
        return 1;
    }

    public function get_table_g()
    {
        $data = array();
        $pdo = DB::connection()->getPdo();
        $st = $pdo->prepare("SELECT id,item,quantity,unit,amount,created_by FROM table_g  WHERE created_by = '". Auth::user()->section . "' OR created_by = 8888 GROUP BY item ORDER BY item ASC");
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_ASSOC);
        foreach($row as $r)
        {
            if($r['item'] == NULL AND $r['unit'] == NULL AND $r['amount'] == NULL ) {

            } else {
                $amount = DB::table('table_g')->where('item','=',$r['item'])->where('created_by','=','8888')->first();
                $total = (isset($r['quantity']) ? $r['quantity'] * $amount->amount : NULL );
                $data[] = array($r['item'],$amount->unit,number_format($r['quantity']),number_format($amount->amount,2),number_format($total,2));
            }
        }
        if(count($data) <= 0)
        {
            $data[] = array(NULL,NULL,NULL,NULL,NULL);
        }
        return json_encode($data);
    }
    public function save_table_g()
    {
        DB::table('table_g')->where('created_by','=',Auth::user()->section)->delete();
        $data = Input::get('data');
        $decoded = json_decode($data);
        foreach($decoded as $d)
        {
            $amount = DB::table('table_g')->where('item','=',$d[0])->where('created_by','=','8888')->first();
            $data = array($d[0],$d[1],$amount->amount,$d[2],Auth::user()->section,date("Y-m-d H:i:s"));
            DB::insert("INSERT IGNORE INTO table_g(item,unit,amount,quantity,created_by,date_added) VALUES(?,?,?,?,?,?)",$data);
        }
        return 1;
    }

    public function get_open_list()
    {
        $ppcode = Input::get('ppcode');
        $data = array();
        $items = DB::table('open_list')
            ->where('created_by','=',Auth::user()->section)
            ->where('ppcode','=',$ppcode)
            ->groupBy('item')
            ->orderBy('item','ASC')
            ->where('item','<>','')
            ->get(['code','ppcode','item','unit','quantity','amount']);
        if($items) {
            foreach($items as $item)
            {
                if($item->item) {
                    $total = $item->quantity * $item->amount;
                    $data[] = array($item->code, $item->item,$item->unit,$item->quantity, number_format($item->amount,2), number_format($total,2));
                }
            }

        } else {
            //echo "Nag true sa else";
            $items = DB::table('open_list')
                ->where('created_by','=',Auth::user()->section)
                ->where('ppcode','=',$ppcode)
                ->groupBy('item')
                ->orderBy('item','ASC')
                ->get(['code','ppcode','item','unit','quantity','amount']);
            if(count($items) > 0) {
                foreach($items as $item)
                {
                    if($item->item) {
                        $total = $item->quantity * $item->amount;
                        $data[] = array($item->code, $item->item,$item->unit,$item->quantity, number_format($item->amount,2), number_format($total,2));
                    }
                }

            } else {
                $data[] = array(NULL,NULL,NULL,NULL,NULL,NULL);
            }
        }
        return json_encode($data);
    }
    public function save_open_list()
    {
       
        $ppcode = Input::get('expense');
        //$test = DB::table('open_list')->where('created_by','=',Auth::user()->section)->where('ppcode','=',$ppcode)->delete();
        $data = Input::get('data');
        $decoded = json_decode($data);
        $sections = DB::table('section')->where('division','=',Auth::user()->division)->orderby('id')->get();
        $quantity = 0;
        $insert = null;
        $amount = null;


        foreach($decoded as $d):
            if($d[0]) {
                if( $d[1] AND $d[2] AND $d[4] > 0) {
                    $item['item'] = $d[1];
                    $item['unit'] = $d[2];
                    $item['amount'] = $d[4];
                    
                    DB::table('open_list')
                            ->where('code','=',$d[0])
                            ->update($item);
                    
                    DB::table('open_list')
                            ->where('code','=',$d[0])
                            ->where('created_by','=',Auth::user()->section)
                            ->update(array('quantity' => $d[3]));
                }
            }else {

                if($d[1] AND $d[2] AND $d[3] AND $d[4] > 0) {

                    $code = DB::table('code')->orderBy('code','DESC')->first();
                    DB::table('code')->increment('code');
                    foreach($sections as $section):
                        $amount = $d[4];

                        if(Auth::user()->section == $section->id) {
                            $quantity = $d[3];
                            $insert = "code,item,unit,amount,quantity,created_by,date_added,added_by,division,ppcode";
                            $data = array($code->code,$d[1],$d[2],$amount,$quantity,$section->id,date("Y-m-d H:i:s"),Auth::user()->section,Auth::user()->division,$ppcode);
                            $mark = "?,?,?,?,?,?,?,?,?,?";
                            try {
                                DB::insert("INSERT IGNORE INTO open_list($insert) VALUES($mark)",$data);
                            }catch(SqlException $ex) {

                            }
                            
                        } else {
                            $quantity = 0;
                            $insert = "code,item,unit,amount,quantity,created_by,date_added,division,ppcode";
                            $data = array($code->code,$d[1],$d[2],$amount,$quantity,$section->id,date("Y-m-d H:i:s"),$section->division,$ppcode);
                            $mark = "?,?,?,?,?,?,?,?,?";
                            try{
                                DB::insert("INSERT IGNORE INTO open_list($insert) VALUES($mark)",$data);
                            }catch(SqlException $ex) {

                            }
                        }
                    endforeach;
                }
            }
        endforeach;
        return 1;
    }
    public function delete_item_open_list()
    {
        $ppcode = Input::get('expense');
        $data = Input::get('data');
        $decoded = json_decode($data);
        
        
        $list = DB::table('open_list')
                ->where('created_by','=',Auth::user()->section)
                ->where('item','=',$decoded[1])
                ->delete();

        return $list;
    }
    public function delete_table_z()
    {
        $data = Input::get('data');
        $decoded = json_decode($data);

        $test = DB::table('table_z')
                        ->where('created_by','=',Auth::user()->section)
                        ->where('code','=',$decoded[0])
                        ->delete();
        return 1;
    }

    public function delete_table_d(){
        $data = Input::get('data');
        $decoded = json_decode($data);

        $test = DB::table('table_d')
                        ->where('created_by','=',Auth::user()->section)
                        ->where('code','=',$decoded[0])
                        ->delete();
        return 1;
    }
    public function current_budget()
    {
        if(Request::method() == "GET") {
            $budget = DB::table('section')
                        ->where('id','=', Auth::user()->section)
                        ->where('division','=',Auth::user()->division)
                        ->first();
            return View::make('section.current_budget',['budget' => $budget]);
        }
        if(Request::method() == "POST") {
            $data['current_budget'] = Input::get('budget');
            DB::table('section')
                ->where('id','=', Auth::user()->section)
                ->where('division','=',Auth::user()->division)
                ->update($data);
            return Redirect::to('ppmp/section');
        }
    }

    public function source_fund()
    {
        if(Request::method() == "GET") {
            $source_fund = DB::table('section')
                        ->where('id','=', Auth::user()->section)
                        ->where('division','=',Auth::user()->division)
                        ->first();
            return View::make('section.source_fund',['source_fund' => $source_fund]);
        }
        if(Request::method() == "POST") {
            $data['source_fund'] = Input::get('source_fund');
            DB::table('section')
                ->where('id','=', Auth::user()->section)
                ->where('division','=',Auth::user()->division)
                ->update($data);
            return Redirect::to('ppmp/section');
        }
    }


    public function create_program()
    {
        if(Request::method() == "GET") {
            return View::make('section.create_program',['ppcode' => Input::get('ppcode')]);
        }
        if(Request::method() == "POST") {

            $program_name = Input::get('program_name');
            $program_id = DB::table('program_name')->insertGetId(['ppcode' => Input::get('ppcode'),'name' => $program_name, 'section' => Auth::user()->section, 'division' => Auth::user()->division]);
            if(Input::has('venue')) {
                foreach(Input::get('venue') as $venue):
                    DB::table('program_training_venue')->insert(['program_id' => $program_id, 'venue_id' => $venue]);
                endforeach;
            }
        }
        return Redirect::to('ppmp/section');
    }

    public function get_program_items()
    {
        $program_id = Input::get('program_id');
        $venue_id = Input::get('venue_id');
        $data = array();
        $items = DB::table('program_items')
            ->where('created_by','=',Auth::user()->section)
            ->where('program_id','=',$program_id)
            ->where('venue_id','=',$venue_id)
            ->groupBy('item')
            ->orderBy('item','ASC')
            ->get(['code','ppcode','item','unit','quantity','amount']);
        if(count($items) > 0) {
            foreach($items as $item)
            {
                if($item->item) {
                    $total = $item->quantity * $item->amount;
                    $data[] = array($item->code, $item->item,$item->unit,$item->quantity, number_format($item->amount,2), number_format($total,2));
                }
            }
        } else {
            $data[] = array(NULL,NULL,NULL,NULL,NULL,NULL);
        }
        return json_encode($data);
    }
    public function save_program_items()
    {

        $data = Input::get('data');
        $decoded = json_decode($data);
        $program_id = Input::get('program_id');
        $venue_id = Input::get('venue_id');
        $insert = null;
        $mark = null;
        $amount = null;

        foreach($decoded as $d):

            if($d[0]) {

                if($d[4] AND $d[1] AND $d[2] AND $d[3]) {
                    $item['item'] = $d[1];
                    $item['unit'] = $d[2];
                    $item['quantity'] = $d[3];
                    $item['amount'] = $d[4];
                    DB::table('program_items')
                            ->where('code','=',$d[0])
                            ->where('created_by','=', Auth::user()->section)
                            ->where('program_id','=',$program_id)
                            ->where('venue_id','=',$venue_id)
                            ->update($item);
                }
            }
            else {
                if($d[3] AND $d[1] AND $d[2] AND $d[4]) {
                    $code = DB::table('code')->orderBy('code','DESC')->first();
                    DB::table('code')->increment('code');
                    $quantity = $d[3];
                    $insert = "code,item,unit,amount,quantity,created_by,date_added,added_by,division,venue_id,program_id";
                    $data = array($code->code,$d[1],$d[2],$d[4],$quantity,Auth::user()->section,date("Y-m-d H:i:s"),Auth::user()->section,Auth::user()->division,$venue_id,$program_id);
                    $mark = "?,?,?,?,?,?,?,?,?,?,?";
                    DB::insert("INSERT IGNORE INTO program_items($insert) VALUES($mark)",$data);
                }
            }
         endforeach;
        return 1;
    }

    public function delete_program_item()
    {
        $data = Input::get('data');
        $decoded = json_decode($data);
        $program_id = Input::get('program_id');
        $venue_id = Input::get('venue_id');
        $test = DB::table('program_items')
                        ->where('created_by','=',Auth::user()->section)
                        ->where('code','=',$decoded[0])
                        ->delete();
        return $test;
    }


    public function delete_program($id)
    {
        DB::table('program_name')->where('id','=',$id)->delete();
        return Redirect::to('ppmp/section');
    }
}
