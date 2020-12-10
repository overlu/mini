<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Utils;

use Mini\Pagination\LengthAwarePaginator;

class Paginator extends LengthAwarePaginator
{
    public function toArray(): array
    {
        return [
            'data' => $this->items->toArray(),
            'page_info' => [
                'total' => $this->total(),
                'count' => $this->perPage(),
                'page' => $this->currentPage()
            ],
        ];
    }
}