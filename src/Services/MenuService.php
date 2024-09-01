<?php

namespace Probytech\Promin\Services;

use Probytech\Promin\Models\Collection;
use Probytech\Promin\Models\Dropdown;

class MenuService
{
    public function getMenu()
    {
        $collections = Collection::orderBy('sort', 'DESC')
            ->where('is_dev', 0)
            ->get();

        $dropdowns = Dropdown::with([
            'collections' => fn($q) =>
            $q->where('id_dev', 0)
        ])
            ->orderBy('sort')
            ->get()
            ->keyBy('title');

        $dropdowns[''] = $collections->filter(fn($item) => $item->dropdown_id == 0);

        return $dropdowns;

        return [];
    }
}
