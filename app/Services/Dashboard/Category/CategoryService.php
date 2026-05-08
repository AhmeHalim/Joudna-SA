<?php

namespace app\Services\Dashboard\Category;

use app\Helper\Media;
use App\Helper\SoftDeleteHelper;
use App\Models\Dashboard\Category\Category;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    public function store($dataValidated)
    {
        DB::beginTransaction();
        try {
            $data = [
                'status' => data_get($dataValidated, 'status'),
                'home'   => data_get($dataValidated, 'home', 0),
            ];

            $category = Category::create($data);

            $category->handleTranslations(
                $dataValidated,
                ['name', 'slug'],
                true
            );

            $category->handleMedia(
                request(),
                $dataValidated,
                'categories',
                ['image']
            );

            DB::commit();
            return $category;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update($request, $dataValidated, Category $category)
    {
        DB::beginTransaction();
        try {
            $data = [
                'status'    => data_get($dataValidated, 'status'),
                'home'      => data_get($dataValidated, 'home', 0),
                'alt_image' => data_get($dataValidated, 'alt_image'),
            ];

            $category->update($data);

            $category->handleTranslations(
                $dataValidated,
                ['name', 'slug'],
                true
            );

            $category->handleMedia(
                request(),
                $dataValidated,
                'categories',
                ['image']
            );

            DB::commit();
            return $category;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function deleteCategories($selectedIds)
    {
        DB::beginTransaction();
        try {
            $trashedCategories = Category::onlyTrashed()->whereIn('id', $selectedIds)->get();
            $activeCategories  = Category::whereIn('id', $selectedIds)->get();


            if ($trashedCategories->isNotEmpty()) {
                foreach ($trashedCategories as $category) {
                    if ($category->image) {
                        Media::removeFile('categories', $category->image);
                    }
                }
                Category::onlyTrashed()
                    ->whereIn('id', $trashedCategories->pluck('id'))
                    ->forceDelete();
            }

            if ($activeCategories->isNotEmpty()) {
                SoftDeleteHelper::deleteWithEvents(Category::class, $activeCategories->pluck('id')->toArray());
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}
