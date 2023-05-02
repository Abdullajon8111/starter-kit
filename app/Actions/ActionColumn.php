<?php

namespace App\Actions;

use Closure;

class ActionColumn extends \Itstructure\GridView\Columns\ActionColumn
{
    const
        ACTION_VIEW = 'view',
        ACTION_EDIT = 'edit',
        ACTION_DELETE = 'delete',

        ACTION_DEFINITIONS = [
            self::ACTION_VIEW => ViewAction::class,
            self::ACTION_EDIT => EditAction::class,
            self::ACTION_DELETE => DeleteAction::class,
        ];

    protected $actionTypes = ['view', 'edit', 'delete'];

    public function render($row): string
    {
        $value = '';
        foreach ($this->actionObjects as $actionObj) {
            $value .= $actionObj->render($row);
        }

        return '<div class="row">' . $value . '</div>';
    }

    public function buildActionButtons(): void
    {
        foreach ($this->actionTypes as $key => $type) {
            if (is_string($key) && in_array($key, array_keys(self::ACTION_DEFINITIONS))) {
                if ($type instanceof Closure) {
                    $class = self::ACTION_DEFINITIONS[$key];
                    $this->fillActionObjects(new $class(['url' => $type]));
                    continue;
                }

                if (is_string($type) && in_array($type, array_keys(self::ACTION_DEFINITIONS))) {
                    $class = self::ACTION_DEFINITIONS[$type];
                    $this->fillActionObjects(new $class);
                    continue;
                }
            }

            if (is_numeric($key)) {
                if (is_string($type) && in_array($type, array_keys(self::ACTION_DEFINITIONS))) {
                    $class = self::ACTION_DEFINITIONS[$type];
                    $this->fillActionObjects(new $class);
                    continue;
                }

                if (is_array($type) && isset($type['class']) && class_exists($type['class'])) {
                    $this->fillActionObjects(new $type['class']($type));
                }
            }
        }
    }
}
