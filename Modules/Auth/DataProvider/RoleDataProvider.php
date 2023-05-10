<?php

namespace Modules\Auth\DataProvider;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Itstructure\GridView\DataProviders\EloquentDataProvider;
use Itstructure\GridView\Helpers\SortHelper;

class RoleDataProvider extends EloquentDataProvider
{
    public function selectionConditions(Request $request, bool $strictFilters = false): void
    {
        if ($request->get('sort', null)) {
            $this->query->orderBy(SortHelper::getSortColumn($request), SortHelper::getDirection($request));
        }

        if (!is_null($request->filters)) {
            foreach ($request->filters as $column => $value) {
                if (is_null($value)) {
                    continue;
                }

                if ($column == 'permission') {

                    $this->query->whereHas('permissions', function (Builder $query) use ($value) {
                       $query->where('id', $value);
                    });

                    continue;
                }

                if ($strictFilters) {
                    $this->query->where($column, '=', $value);
                } else {
                    $this->query->where($column, 'like', '%' . $value . '%');
                }
            }
        }
    }
}
