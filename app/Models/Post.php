<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'author',
        'excerpt',
        'body',
        'excerpt',
        'category'

    ];

//    protected $with = ['id', 'created_at'];

//    public function latest($column = null) {
//        if (is_null($column)) {
//            if ($this->model->usesTimestamps()) {
//                $column = $this->model->getCreatedAtColumn() ?? 'created_at';
//            } else if ($this->model->getKeyType() == 'int') {
//                $column = $this->model->getKeyName();
//            } else {
//                $column = 'created_at';
//            }
//        }
//
//
//        $this->query->latest($column);
//
//        return $this;


}
