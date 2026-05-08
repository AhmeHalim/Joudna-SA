<?php

namespace app\Services\Dashboard\Item;

use app\Helper\Media;
use App\Helper\SoftDeleteHelper;
use App\Models\Dashboard\Item\Item;
use App\Models\Dashboard\Category\Category;
use Illuminate\Support\Facades\DB;

class ItemService
{
    public function create()
    {
        return Category::select('id', 'name')->get();
    }

    public function edit($item)
    {
        return Category::select('id', 'name')->get();
    }

    public function store($dataValidated)
    {
        DB::beginTransaction();
        try {
            $data = [
                'category_id' => data_get($dataValidated, 'category_id'),
                'status'      => data_get($dataValidated, 'status'),
                'recommended'      => data_get($dataValidated, 'recommended',0),
                'price'        => data_get($dataValidated, 'price', 0.00),
                'alt_image'   => data_get($dataValidated, 'alt_image'),
            ];

            $item = Item::create($data);

            $item->handleTranslations(
                $dataValidated,
                ['name', 'slug', 'short_desc', 'long_desc'],
                true
            );

            $item->handleMedia(
                request(),
                $dataValidated,
                'Items',
                ['image']
            );

            DB::commit();
            return $item;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update($request, $dataValidated, Item $item)
    {
        DB::beginTransaction();
        try {
            $data = [
                'category_id' => data_get($dataValidated, 'category_id'),
                'status'      => data_get($dataValidated, 'status'),
                'recommended'      => data_get($dataValidated, 'recommended',0),
                'price'        => data_get($dataValidated, 'price', 0.00),
                'alt_image'   => data_get($dataValidated, 'alt_image'),
            ];

            $item->update($data);

            $item->handleTranslations(
                $dataValidated,
                ['name', 'slug', 'short_desc', 'long_desc'],
                true
            );

            $item->handleMedia(
                request(),
                $dataValidated,
                'Items',
                ['image']
            );

            DB::commit();
            return $item;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function deleteItems($selectedIds)
    {
        DB::beginTransaction();
        try {
            $trashedItems = Item::onlyTrashed()->whereIn('id', $selectedIds)->get();
            $activeItems  = Item::whereIn('id', $selectedIds)->get();

            if ($trashedItems->isNotEmpty()) {
                foreach ($trashedItems as $item) {
                    if ($item->image) {
                        Media::removeFile('Items', $item->image);
                    }
                }
                Item::onlyTrashed()
                    ->whereIn('id', $trashedItems->pluck('id'))
                    ->forceDelete();
            }

            if ($activeItems->isNotEmpty()) {
                SoftDeleteHelper::deleteWithEvents(Item::class, $activeItems->pluck('id')->toArray());
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}
