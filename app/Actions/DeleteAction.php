<?php

namespace App\Actions;

use Itstructure\GridView\Actions\BaseAction;

class DeleteAction extends BaseAction
{

    const ACTION = 'delete';
    const BOOTSTRAP_COL_WIDTH = 0;

    protected $htmlAttributes = [
        'onclick' => 'return window.confirm("Are you sure you want to delete?");'
    ];

    public function render($row, int $bootstrapColWidth = self::BOOTSTRAP_COL_WIDTH)
    {
        return view('grid_view::actions.'.self::ACTION, [
            'url' => $this->getUrl($row),
            'bootstrapColWidth' => $bootstrapColWidth,
            'htmlAttributes' => $this->buildHtmlAttributes()
        ])->render();
    }

    protected function buildUrl($row): string
    {
        return $this->getCurrentUrl() . '/' . $row->id . '/' . self::ACTION;
    }
}
