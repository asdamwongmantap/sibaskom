<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Taskcontroller extends Controller
{
    //
    public function listtask()
    {
        if (auth()->user()->level == '1'){
            $data_task = \App\Task::all();
        }else{
            $data_task = DB::table('view_task')->where('created_by', '=', auth()->user()->id)->get();
        }
        
        return view('task/listtask',['data_task' => $data_task]);
    }
    public function addtask()
    {
        $data_taskcat = \App\Master::all();
        
       return view('task/addtask',['data_taskcat' => $data_taskcat]);
    }
    public function create(Request $request)
    {
        // \App\Pengiriman::create($request->all());
        $created_atawal = \Carbon\Carbon::now();
        $updated_atawal = \Carbon\Carbon::now();
        $tasktglawal = \Carbon\Carbon::now();
        $created_at = \Carbon\Carbon::parse($created_atawal)->format('d/m/Y');
        $updated_at = \Carbon\Carbon::parse($updated_atawal)->format('d/m/Y');
        $task_tgl = \Carbon\Carbon::parse($tasktglawal)->format('d/m/Y');

        $dd1 = substr($created_at,0,2);
        $mm1 = substr($created_at,3,2);
        $yyyy1 = substr($created_at,6,4);
        $tgl1 = $yyyy1."-".$mm1."-".$dd1;

        $dd2 = substr($updated_at,0,2);
        $mm2 = substr($updated_at,3,2);
        $yyyy2 = substr($updated_at,6,4);
        $tgl2 = $yyyy2."-".$mm2."-".$dd2;

        $dd3 = substr($task_tgl,0,2);
        $mm3 = substr($task_tgl,3,2);
        $yyyy3 = substr($task_tgl,6,4);
        $tgl3 = $yyyy3."-".$mm3."-".$dd3;

        

        DB::table('tasktbl')->insert(
            ['task_tgl' =>$tgl3 ,'task_cat' => $request->task_cat,'task_additional_info1' => $request->task_additional_info1,'task_additional_info2' => $request->task_additional_info2,'task_additional_info3' => $request->task_additional_info3,'created_by'=> $request->created_by,'updated_by'=> $request->updated_by,'created_at'=> $tgl1,'updated_at'=> $tgl2]
        );
        return 'berhasil';
    }
    // added 20200710 by asdam
    public function createpoint(Request $request)
    {
        // \App\Pengiriman::create($request->all());
        $created_atawal = \Carbon\Carbon::now();
        $updated_atawal = \Carbon\Carbon::now();
        $created_at = \Carbon\Carbon::parse($created_atawal)->format('d/m/Y');
        $updated_at = \Carbon\Carbon::parse($updated_atawal)->format('d/m/Y');

        $dd1 = substr($created_at,0,2);
        $mm1 = substr($created_at,3,2);
        $yyyy1 = substr($created_at,6,4);
        $tgl1 = $yyyy1."-".$mm1."-".$dd1;

        $dd2 = substr($updated_at,0,2);
        $mm2 = substr($updated_at,3,2);
        $yyyy2 = substr($updated_at,6,4);
        $tgl2 = $yyyy2."-".$mm2."-".$dd2;

        
        if ($request->confirmddl == "1"){
            DB::table('pointtbl')->insert(
                ['task_id'=>$request->task_id,'poin_amount'=>$request->point,'created_by'=>$request->created_by,'updated_by'=>$request->updated_by,'created_at'=>$tgl1,'updated_at'=>$tgl2]
            );
        }
       
        return 'berhasil';
    }
}
