<?php

class InventoryController extends BaseController
{

    public function __construct()
    {
        $this->beforeFilter('admin');
    }

    public function inventory()
    {

        $items = DB::table('items')
                        ->leftJoin('unit','items.unit','=','unit.unitcode')
                        ->where('section','=',Auth::user()->section)
                        ->paginate(20);

        return View::make('inventory.items.items',['items' => $items]);
    }

    public function new_item()
    {
        if(Request::method() == "GET")
        {
            return View::make('inventory.items.new-items');
        }

        if(Request::method() == "POST")
        {
            $duplicate = Items::where('description','=',Input::get('description'))
                                ->where('section','=', Auth::user()->section)
                                ->get();
            $data['item'] = Input::get('description');
            $data['duplicate'] = $duplicate;

            if(count($duplicate) > 0)
            {
                return Redirect::to('items')->with('data_error', $data);
            }

            $codes = new Codes();
            $pk = $codes->getPK();
            $pdo = DB::connection()->getPdo();
            $query = "INSERT IGNORE INTO items(description,unit,code,section,created_at,updated_at) VALUES(?,?,?,?,NOW(),NOW())";
            $st = $pdo->prepare($query);
            $st->execute(array(
                Input::get('description'),
                Input::get('unit'),
                $pk->code,
                Auth::user()->section
            ));
            if($st->rowCount() > 0)
            {
                $codes->incrementPK($pk->id);
            }
            return Redirect::to('items')->with('ok','New item save to inventory.');

        }
    }

    public function check_item()
    {
        $item = Input::get('description');

        $items = Items::where('description', 'like', "%$item%")
            ->orderBy('description', 'ASC')
            ->paginate(20);
        if(count($items) > 0){
            return View::make('inventory.old_items');
        } else {
            return "ok";
        }
    }
    public function update_qty()
    {

        $item = Items::find(Input::get('code'));
        $item->qty = Input::get('qty');
        $item->save();
        return Redirect::to('inventory')->with('ok', 'New item save to inventory.');
    }
    public function pdf(){
        $items = Items::all();
        $display = View::make('ppmp.inventory_pdf',[
            "items" => $items
        ]);
        $pdf = App::make('dompdf');
        $pdf->loadHTML($display)->setPaper('legal', 'landscape');
        return $pdf->stream();

    }

    public function deleteItem($id)
    {
        $item = Items::find($id);

        $item->delete();
        return Redirect::to('inventory');
    }

    public function search()
    {
        $keyword = Input::get('q');
        $items = Items::where('description', 'like', "%$keyword%")
                        ->where('section','=', Auth::user()->section)
                        ->orderBy('description', 'ASC')
                        ->paginate(20);
        return View::make('inventory.inventory',['items' => $items]);

    }


    public function update_item()
    {
        if(Request::method() == "GET")
        {
            $code = Input::get('code');
            Session::put('code',$code);
            $item = Items::where('code','=',Session::get('code'))->first();

            return View::make('inventory.edit-item',['item' => $item]);
        }
        if(Request::method() == "POST") 
        {
            $code = Session::get('code');
            $item = Items::where('code', '=', $code)->first();
            $item->description = Input::get('description');
            $item->unit = Input::get('unit');
            $item->save();
            return Redirect::to('inventory')->with('msg','Item successfuly updated.');
        }
    }

    public function units()
    {
        $units = Units::paginate(10);
        return View::make('inventory.units.units',['units'=> $units]);
    }

    public function new_unit()
    {
        if(Request::method() == "GET")
        {
            return View::make('inventory.units.new-unit');
        }

        if(Request::method() == "POST")
        {
            $unit = new Units();
            $unit->unitcode = Input::get('unit-code');
            $unit->unit = Input::get('unit-desc');
            $unit->save();

            return Redirect::to('units');
        }
    }
    
    public function update_unit()
    {
        if(Request::method() == "GET")
        {
            $code = Input::get('code');
            Session::put('unit_code', $code);
            $unit = Units::where('unitcode', '=', Session::get('unit_code'))->first();

            return View::make('inventory.edit-unit',['unit' => $unit]);
        }
        if(Request::method() == "POST")
        {
            $code = Session::get('unit_code');
            $unit = Units::where('unitcode','=', $code)->first();
            $unit->unitcode = Input::get('unit-code');
            $unit->unit = Input::get('unit-desc');
            $unit->save();
            return Redirect::to('units');
        }
    }

    public function deleteunit($unitcode)
    {
        $unit = Units::where('unitcode', '=', $unitcode)->first();
        $unit->delete();
        return Redirect::to('unit');
    }
}

?>