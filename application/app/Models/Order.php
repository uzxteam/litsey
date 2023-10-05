<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function statusBadge($status){
        $html = '';
        if($this->status == 0){
            $html = '<span class="badge badge--warning">'.trans('Pending').'</span>';
        }
        elseif($this->status == 1){
            $html = '<span class="badge badge--success">'.trans('Approved').'</span>';
        }
       else{
            $html = '<span><span class="badge badge--danger">'.trans('Cancel').'</span></span>';
        }
        return $html;
    }
}
