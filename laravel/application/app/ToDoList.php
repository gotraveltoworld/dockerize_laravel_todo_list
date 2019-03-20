<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ToDoList extends Model
{

    public $table = 'todolist';

    public function getData($id = null) {
        $projection = [
            'id', 'title', 'content',
            'attachment', 'attachment_ori_name',
            'created_at', 'updated_at'
        ];
        if (!is_null($id)) {
            return DB::table($this->table)->select(
                $projection
            )->where('id', intval($id))->whereNull('deleted_at')->get();
        } else {
            return DB::table($this->table)->select(
                $projection
            )->whereNull('deleted_at')->get();
        }
    }

    public function addToDoList(
        $title = '',
        $content = '',
        $attachment = '',
        $attachmentOriName = ''
    ) {
        return DB::table($this->table)->insertGetId(
            [
                'title' => $title,
                'content' => $content,
                'attachment' => $attachment,
                'attachment_ori_name' => $attachmentOriName,
                'created_at' => gmdate('Y-m-d H:i:s')
            ]
        );
    }

    public function updatedList(
        $id = 0,
        $title = '',
        $content = ''
    ) {
        DB::table($this->table)
            ->where('id', intval($id))
            ->update([
                'title' => $title,
                'content' => $content,
                'updated_at' => gmdate('Y-m-d H:i:s')
            ]
        );
        return $id;
    }

    public function deletedList($id = null) {
        if (!is_null($id)) {
            DB::table($this->table)
                ->where('id', intval($id))
                ->update([
                    'deleted_at' => gmdate('Y-m-d H:i:s')
                ]
            );
        } else {
            DB::table($this->table)
                ->whereNotNull('id')
                ->update([
                    'deleted_at' => gmdate('Y-m-d H:i:s')
                ]
            );
        }
        return [
            'deletedId' => $id,
            'deleted_at' => gmdate('Y-m-d H:i:s')
        ];
    }
}
