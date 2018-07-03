<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 25/06/2018
 * Time: 22:21
 */

namespace App\Modules\Core\Models;


use Illuminate\Database\Eloquent\Model;

class CoreModel extends Model
{

    public function add($data)
    {
        if ($data instanceof Model) {
            $result = $data->save();
        }
        if (is_array($data)) {
            $attributes = array_key($data);
            foreach ($attributes as $attribute) {
                $this->$attribute = $data[$attribute];
            }
            $result = $this->save();
        }
        return $result;
    }

    public function update($data = [])
    {
        if (empty($data)) return false;
        if ($data instanceof Model) {
            $result = $data->save();
        }
        if (is_array($data)) {
            if (isset($data['id'])) {
                $instance = $this->find($data['id']);
                $attributes = array_keys($data);
                foreach ($attributes as $attribute) {
                    $instance->$attribute = $data[$attribute];
                }
                $result = $instance->save();
            }
        }
        return $result;
    }

   public function check_value_exist($column,$value){
        $data = $this->where($column,$value)->first();
        if(isset($data)){
            return true;
        }else{
            return false;
        }
   }

}