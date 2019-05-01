<?php

namespace App\Widgets;

use App\Advice;
use App\Option;
use Arrilot\Widgets\AbstractWidget;

class AdvicesWidget extends AbstractWidget
{
    /**
     * The number of seconds before each reload.
     *
     * @var int|float
     */
    public $reloadTimeout = 10;

    /**
     * Async and reloadable widgets are wrapped in container.
     * You can customize it by overriding this method.
     *
     * @return array
     */
    public function container()
    {
        return [
            'element' => 'div',
            'attributes' => 'style="display:inline" class="arrilot-widget-container"',
        ];
    }

    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'module' => "basic"
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $advice = Option::where('name', $this->config['module'])
            ->with(['advices' => function ($advice) {
                $advice->inRandomOrder()
                    ->first();
            }])
            ->first();
        return view('application.layouts.widgets.advices_widget', [
            'advice' => $advice['advices'],
            'config' => $this->config,
        ]);
    }
}
