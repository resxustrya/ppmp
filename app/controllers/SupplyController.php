<?php

/**
 * Created by PhpStorm.
 * User: hahahehe
 * Date: 9/14/2017
 * Time: 11:33 AM
 */
class SupplyController extends BaseController
{
    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function home()
    {
        return View::make('supply.items.items');
    }

    public function units()
    {
        $units = DB::table('unit')->paginate('20');
        return View::make('supply.units.units', ['units' => $units]);
    }

    public function d_unit()
    {
        $id = Input::get('id');
        DB::table('unit')->where('id', '=', $id)->delete();
        return Redirect::to('units');
    }

    public function n_unit()
    {
        if (Request::method() == "GET") {
            return View::make('supply.units.new-unit');
        }
        if (Request::method() == "POST") {
            $data['unitcode'] = Input::get('unit-code');
            $data['unit'] = Input::get('unit-desc');
            DB::table('unit')->insert($data);
            return Redirect::to('units');
        }
    }

    public function save_table_a()
    {
        DB::table('table_a')->where('created_by','=',Auth::user()->section)->delete();
        $data = Input::get('data');
        $decoded = json_decode($data);
        foreach ($decoded as $d) {
            DB::insert("INSERT IGNORE INTO table_a(item,unit,amount,date_added,created_by) VALUES(?,?,?,?,?)", array($d[0], $d[1], $d[3], date("Y-m-d H:i:s"), Auth::user()->section));
        }
        return 1;
    }
    
    public function get_table_a()
    {
        $data = array();
        $pdo = DB::connection()->getPdo();
        $st = $pdo->prepare("SELECT item,unit,quantity,amount FROM table_a WHERE created_by = '" . Auth::user()->section . "' GROUP BY item ORDER BY item ASC");
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $r) {
            if ($r['item'] == NULL AND $r['unit'] == NULL AND $r['amount'] == NULL) {

            } else {
                $data[] = array($r['item'], $r['unit'], $r['quantity'], number_format($r['amount'], 2));
            }
        }
        if (count($data) <= 0) {
            $data[] = array(null, null, null, null);
        }
        return json_encode($data);
    }

    public function save_table_b()
    {
        DB::table('table_b')->where('created_by','=',Auth::user()->section)->delete();
        $data = Input::get('data');
        $decoded = json_decode($data);
        foreach ($decoded as $d) {

            $row['item'] = $d[0];
            $row['unit'] = $d[1];
            $row['amount'] = $d[2];
            $row['created_by'] = Auth::user()->section;
            $row['date_added'] = date('Y-m-d');
            DB::insert('INSERT IGNORE INTO table_b(item,unit,amount,date_added,created_by) VALUES(?,?,?,?,?)', array($d[0], $d[1], $d[3], date("Y-m-d H:i:s"), Auth::user()->section));

        }
        return 1;
    }

    public function get_table_b()
    {
        $data = array();
        $pdo = DB::connection()->getPdo();
        $st = $pdo->prepare("SELECT item,unit,quantity,amount FROM table_b WHERE created_by = '" . Auth::user()->section . "' GROUP BY item ORDER BY item ASC");
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $r) {
            if ($r['item'] == NULL AND $r['unit'] == NULL AND $r['amount'] == NULL) {

            } else {
                $data[] = array($r['item'], $r['unit'], $r['quantity'], number_format($r['amount'], 2));
            }
        }
        if (count($data) <= 0) {
            $data[] = array(null, null, null, null);
        }
        return json_encode($data);
    }

    public function save_table_c()
    {
        DB::table('table_c')->where('created_by','=',Auth::user()->section)->delete();
        $data = Input::get('data');
        $decoded = json_decode($data);

        foreach ($decoded as $d) {
            DB::insert('INSERT IGNORE INTO table_c(item,unit,amount,date_added,created_by) VALUES(?,?,?,?,?)', array($d[0], $d[1], $d[3], date("Y-m-d H:i:s"), Auth::user()->section));
        }
        return 1;
    }

    public function get_table_c()
    {
        $data = array();
        $pdo = DB::connection()->getPdo();
        $st = $pdo->prepare("SELECT item,unit,quantity,amount FROM table_c WHERE created_by = '" . Auth::user()->section . "' GROUP BY item ORDER BY item ASC");
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $r) {
            if ($r['item'] == NULL AND $r['unit'] == NULL AND $r['amount'] == NULL) {

            } else {
                $data[] = array($r['item'], $r['unit'], $r['quantity'], number_format($r['amount'], 2));
            }
        }
        if (count($data) <= 0) {
            $data[] = array(null, null, null, null);
        }
        return json_encode($data);
    }

    public function save_table_d()
    {
        DB::table('table_d')->where('created_by','=',Auth::user()->section)->delete();
        $data = Input::get('data');
        $decoded = json_decode($data);
        foreach ($decoded as $d) {
            DB::insert('INSERT IGNORE INTO table_d(item,unit,amount,date_added,created_by) VALUES(?,?,?,?,?)', array($d[0], $d[1], $d[3], date("Y-m-d H:i:s"), Auth::user()->section));
        }
        return 1;
    }

    public function get_table_d()
    {
        $data = array();
        $pdo = DB::connection()->getPdo();
        $st = $pdo->prepare("SELECT item,unit,quantity,amount FROM table_d WHERE created_by = '" . Auth::user()->section . "' GROUP BY item ORDER BY item ASC");
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $r) {
            if ($r['item'] == NULL AND $r['unit'] == NULL AND $r['amount'] == NULL) {

            } else {
                $data[] = array($r['item'], $r['unit'], $r['quantity'], number_format($r['amount'], 2));
            }
        }
        if (count($data) <= 0) {
            $data[] = array(null, null, null, null);
        }
        return json_encode($data);
    }

    public function save_table_e()
    {
        DB::table('table_e')->where('created_by','=',Auth::user()->section)->delete();
        $data = Input::get('data');
        $decoded = json_decode($data);
        foreach ($decoded as $d) {

            $row['item'] = $d[0];
            $row['unit'] = $d[1];
            $row['amount'] = $d[2];
            DB::insert('INSERT IGNORE INTO table_e(item,unit,amount,date_added,created_by) VALUES(?,?,?,?,?)', array($d[0], $d[1], $d[3], date("Y-m-d H:i:s"), Auth::user()->section));

        }
        return 1;
    }

    public function get_table_e()
    {
        $data = array();
        $pdo = DB::connection()->getPdo();
        $st = $pdo->prepare("SELECT item,unit,quantity,amount FROM table_e  WHERE created_by = '" . Auth::user()->section . "' GROUP BY item ORDER BY item ASC");
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $r) {
            if ($r['item'] == NULL AND $r['unit'] == NULL AND $r['amount'] == NULL) {
            } else {
                $data[] = array($r['item'], $r['unit'], $r['quantity'], number_format($r['amount'], 2));
            }
        }
        if (count($data) <= 0) {
            $data[] = array(null, null, null, null);
        }
        return json_encode($data);
    }

    public function get_table_f()
    {
        $data = array();
        $pdo = DB::connection()->getPdo();
        $st = $pdo->prepare("SELECT item,unit,quantity,amount FROM table_f  WHERE created_by = '" . Auth::user()->section . "' GROUP BY item ORDER BY item ASC");
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $r) {
            if ($r['item'] == NULL AND $r['unit'] == NULL AND $r['amount'] == NULL) {
            } else {
                $data[] = array($r['item'], $r['unit'], $r['quantity'], number_format($r['amount'], 2));
            }
        }
        if (count($data) <= 0) {
            $data[] = array(null, null, null, null);
        }
        return json_encode($data);
    }

    public function save_table_f()
    {
        DB::table('table_f')->where('created_by','=',Auth::user()->section)->delete();
        $data = Input::get('data');
        $decoded = json_decode($data);
        foreach ($decoded as $d) {

            $row['item'] = $d[0];
            $row['unit'] = $d[1];
            $row['amount'] = $d[2];
          
            DB::insert('INSERT IGNORE INTO table_f(item,unit,amount,date_added,created_by) VALUES(?,?,?,?,?)', array($d[0], $d[1], $d[3], date("Y-m-d H:i:s"), Auth::user()->section));
        }
        return 1;
    }

    public function get_table_g()
    {
        $data = array();
        $pdo = DB::connection()->getPdo();
        $st = $pdo->prepare("SELECT item,unit,quantity,amount FROM table_g  WHERE created_by = '" . Auth::user()->section . "' GROUP BY item ORDER BY item ASC");
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $r) {
            if ($r['item'] == NULL AND $r['unit'] == NULL AND $r['amount'] == NULL) {
            } else {
                $data[] = array($r['item'], $r['unit'], $r['quantity'], number_format($r['amount'], 2));
            }
        }
        if (count($data) <= 0) {
            $data[] = array(null, null, null, null);
        }
        return json_encode($data);
    }

    public function save_table_g()
    {
        DB::table('table_g')->where('created_by','=',Auth::user()->section)->delete();
        $data = Input::get('data');
        $decoded = json_decode($data);
        foreach ($decoded as $d) {

            $row['item'] = $d[0];
            $row['unit'] = $d[1];
            $row['amount'] = $d[2];
            DB::insert('INSERT IGNORE INTO table_g(item,unit,amount,date_added,created_by) VALUES(?,?,?,?,?)', array($d[0], $d[1], $d[3], date("Y-m-d H:i:s"), Auth::user()->section));
        }
        return 1;
    }

    public function save_open_list()
    {
        
        $ppcode = Input::get('expense');
        //$test = DB::table('open_list')->where('created_by','=',Auth::user()->section)->where('ppcode','=',$ppcode)->delete();
        $data = Input::get('data');
        $decoded = json_decode($data);
        $sections = DB::table('section')->where('division','=',Auth::user()->division)->orderby('id')->get();

        foreach($decoded as $d):
            if($d[0]) {
                $item['item'] = $d[1];
                $item['unit'] = $d[2];
                $item['quantity'] = $d[3];
                $item['amount'] = $d[4];

                DB::table('open_list')
                    ->where('code','=',$d[0])
                    ->where('ppcode','=',$ppcode)
                    ->where('created_by','=',Auth::user()->division)
                    ->update($item);
            }
            
        endforeach;
        
        return 1;
    }
}
