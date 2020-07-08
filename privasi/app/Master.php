<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    //
    protected $primaryKey = 'taskcat_id';
   protected $table = 'taskcattbl';
   protected $fillable = ['task_tgl','task_cat','created_by','updated_by'];
}
