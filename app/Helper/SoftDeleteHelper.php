<?php

namespace App\Helper;
class SoftDeleteHelper{
    static function deleteWithEvents(string $modelClass, array $ids): int
    {
        $count = 0;
        $records = $modelClass::whereIn('id', $ids)->get();

        foreach ($records as $record) {
            $record->delete();
            $count++;
        }
        return $count;
    }
}
