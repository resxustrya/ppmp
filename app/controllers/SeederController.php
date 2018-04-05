<?php

class SeederController extends BaseController {
    public function seed(){
                $divisions = DB::table('division')->get();
        
                foreach($divisions as $division):
                    $code = DB::table('code')->orderBy('code','DESC')->first();
                    DB::table('code')->increment('code');
                    DB::table('open_list')->insert(['ppcode' => 3 ,'item' => 'FUEL, OIL AND LUBRICANTS EXPENSE','unit' => '', 'quantity' => '0.00', 'amount' => '', 'created_by' => $division->id, 'date_added' => date('Y-m-d'),'code' => $code->code]);
                    //$mark = "?,?,?,?,?,?,?,?";
                    //DB::insert("INSERT IGNORE INTO open_list(ppcode,item,unit,quantity,amount,created_by,date_added,code) values($mark)",['ppcode' => 3 ,'item' => 'FUEL, OIL AND LUBRICANTS EXPENSE','unit' => '', 'quantity' => '0.00', 'amount' => '', 'created_by' => $division->id, 'date_added' => date('Y-m-d'),'code' => $code->code]);
                    
                endforeach;
                
        
                foreach($divisions as $division):
                    $code = DB::table('code')->orderBy('code','DESC')->first();
                    DB::table('code')->increment('code');
                    DB::table('open_list')->insert(['ppcode' => 4 ,'item' => 'POSTAGE AND DELIVERY EXPENSE','unit' => '', 'quantity' => '0.00', 'amount' => '', 'created_by' => $division->id, 'date_added' => date('Y-m-d'),'code' => $code->code]);
                endforeach;
                
                foreach($divisions as $division):
                    $code = DB::table('code')->orderBy('code','DESC')->first();
                    DB::table('code')->increment('code');
                    DB::table('open_list')->insert(['ppcode' => 5 ,'item' => 'INTERNET SUBSCRIPTION EXPENSE','unit' => '', 'quantity' => '0.00', 'amount' => '', 'created_by' => $division->id, 'date_added' => date('Y-m-d'),'code' => $code->code]);
                endforeach;
               
                foreach($divisions as $division):
                    $code = DB::table('code')->orderBy('code','DESC')->first();
                    DB::table('code')->increment('code');
                    DB::table('open_list')->insert(['ppcode' => 6 ,'item' => 'RENT-BUILDING AND STRUCTURE EXPENSE','unit' => '', 'quantity' => '0.00', 'amount' => '', 'created_by' => $division->id, 'date_added' => date('Y-m-d'),'code' => $code->code]);
                endforeach;
                
                foreach($divisions as $division):
                    $code = DB::table('code')->orderBy('code','DESC')->first();
                    DB::table('code')->increment('code');
                    DB::table('open_list')->insert(['ppcode' => 7 ,'item' => 'RENT-LAND EXPENSE','unit' => '', 'quantity' => '0.00', 'amount' => '', 'created_by' => $division->id, 'date_added' => date('Y-m-d'),'code' => $code->code]);
                    
                endforeach;
                
                foreach($divisions as $division):
                    $code = DB::table('code')->orderBy('code','DESC')->first();
                    DB::table('code')->increment('code');
                    DB::table('open_list')->insert(['ppcode' => 8 ,'item' => 'RENT-EQUIPMENT EXPENSE','unit' => '', 'quantity' => '0.00', 'amount' => '', 'created_by' => $division->id, 'date_added' => date('Y-m-d'),'code' => $code->code]);
                    
                endforeach;
                
                foreach($divisions as $division):
                    $code = DB::table('code')->orderBy('code','DESC')->first();
                    DB::table('code')->increment('code');
                    DB::table('open_list')->insert(['ppcode' => 10 ,'item' => 'REPRESENTATION EXPENSE','unit' => '', 'quantity' => '0.00', 'amount' => '', 'created_by' => $division->id, 'date_added' => date('Y-m-d'),'code' => $code->code]);
                    
                endforeach;
                
                foreach($divisions as $division):
                    $code = DB::table('code')->orderBy('code','DESC')->first();
                    DB::table('code')->increment('code');
                    DB::table('open_list')->insert(['ppcode' => 11 ,'item' => 'TRANSPORTATION AND DELIVERY','unit' => '', 'quantity' => '0.00', 'amount' => '', 'created_by' => $division->id, 'date_added' => date('Y-m-d'),'code' => $code->code]);
                    
                endforeach;
               
                foreach($divisions as $division):
                    $code = DB::table('code')->orderBy('code','DESC')->first();
                    DB::table('code')->increment('code');
                    DB::table('open_list')->insert(['ppcode' => 12 ,'item' => 'SUBSCRIPTION EXPENSE','unit' => '', 'quantity' => 'NULL', 'amount' => '', 'created_by' => $division->id, 'date_added' => date('Y-m-d'),'code' => $code->code]);
            
                endforeach;
                
                foreach($divisions as $division):
                    $code = DB::table('code')->orderBy('code','DESC')->first();
                    DB::table('code')->increment('code');
                    DB::table('open_list')->insert(['ppcode' => 14 ,'item' => 'JANITORIAL SERVICES EXPENSE','unit' => '', 'quantity' => '0.00', 'amount' => '', 'created_by' => $division->id, 'date_added' => date('Y-m-d'),'code' => $code->code]);
            
                endforeach;
                
                foreach($divisions as $division):
                    $code = DB::table('code')->orderBy('code','DESC')->first();
                    DB::table('code')->increment('code');
                    DB::table('open_list')->insert(['ppcode' => 15 ,'item' => 'SECURITY SERVICES EXPENSE','unit' => '', 'quantity' => '0.00', 'amount' => '', 'created_by' => $division->id, 'date_added' => date('Y-m-d'),'code' => $code->code]);
                endforeach;
        return "ok";
    }
    public function add_seed()
    {
        $code = DB::table('code')->orderBy('code','DESC')->first();
        DB::table('code')->increment('code');
        DB::table('open_list')->insert(['ppcode' => 22 ,'item' => 'ADVERTISING EXPENSE','unit' => '', 'quantity' => '0.00', 'amount' => '', 'created_by' => 4, 'date_added' => date('Y-m-d'),'code' => $code->code]);
    }
}
?>