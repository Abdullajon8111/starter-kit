<?php

namespace App\Actions;

use Itstructure\GridView\Actions\BaseAction;
use Itstructure\GridView\Actions\View;

class ViewAction extends BaseAction
{
    const ACTION = 'view';
    const BOOTSTRAP_COL_WIDTH = 0;

    public function render($row, int $bootstrapColWidth = self::BOOTSTRAP_COL_WIDTH): array|string
    {
        return view('grid_view::actions.'.self::ACTION, [
            'url' => $this->getUrl($row),
            'bootstrapColWidth' => $bootstrapColWidth,
            'htmlAttributes' => $this->buildHtmlAttributes()
        ])->render();
    }

    protected function buildUrl($row): string
    {
        return $this->getCurrentUrl() . '/' . $row->id;
    }
}
