<?php

namespace App\Functions;


class JodauNepal
{
    
    public function getObject($model, $request)
    {
        $data = $request->only($model->getFillable());
        $model->fill($data);
        return $model;
    }

    public function message(string $message,$title='success'){
         toast($message,$title);
    }

}
