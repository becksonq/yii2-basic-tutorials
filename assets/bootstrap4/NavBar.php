<?php
/**
 * User: Администратор
 * Date: 30.09.2017
 * Time: 0:39
 */

namespace app\assets\bootstrap4;

use yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class NavBar extends yii\bootstrap\Widget
{
    public $options = [];
    public $containerOptions = [];
    public $brandLabel = false;
    public $brandUrl = false;
    public $brandOptions = [];
    public $screenReaderToggleText = 'Toggle navigation';
    public $renderInnerContainer = true;
    public $innerContainerOptions = [];


    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        $this->clientOptions = false;
        if (empty($this->options['class'])) {
            Html::addCssClass($this->options, ['navbar', 'navbar-light', 'bg-faded']);
        } else {
            Html::addCssClass($this->options, ['widget' => 'navbar']);
        }
        if (empty($this->options['role'])) {
            $this->options['role'] = 'navigation';
        }
        $options = $this->options;
        $tag = ArrayHelper::remove($options, 'tag', 'nav');
        echo Html::beginTag($tag, $options);
        if ($this->renderInnerContainer) {
            if (!isset($this->innerContainerOptions['class'])) {
                Html::addCssClass($this->innerContainerOptions, 'container');
            }
            echo Html::beginTag('div', $this->innerContainerOptions);
        }
        echo Html::beginTag('div', ['class' => 'navbar-header']);
        if (!isset($this->containerOptions['id'])) {
            $this->containerOptions['id'] = "{$this->options['id']}-collapse";
        }
        echo $this->renderToggleButton();
        if ($this->brandLabel !== false) {
            Html::addCssClass($this->brandOptions, ['widget' => 'navbar-brand']);
            echo Html::a($this->brandLabel, $this->brandUrl === false ? Yii::$app->homeUrl : $this->brandUrl, $this->brandOptions);
        }
        echo Html::endTag('div');
        Html::addCssClass($this->containerOptions, ['collapse' => 'collapse', 'widget' => 'navbar-collapse']);
        $options = $this->containerOptions;
        $tag = ArrayHelper::remove($options, 'tag', 'div');
        echo Html::beginTag($tag, $options);
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        $tag = ArrayHelper::remove($this->containerOptions, 'tag', 'div');
        echo Html::endTag($tag);
        if ($this->renderInnerContainer) {
            echo Html::endTag('div');
        }
        $tag = ArrayHelper::remove($this->options, 'tag', 'nav');
        echo Html::endTag($tag);
        yii\bootstrap\BootstrapPluginAsset::register($this->getView());
    }

    /**
     * Renders collapsible toggle button.
     * @return string the rendering toggle button.
     */
    protected function renderToggleButton()
    {
        $screenReader = "<span class=\"sr-only\">{$this->screenReaderToggleText}</span>";

        return Html::button("{$screenReader}\n&#9776;", [
            'class' => 'navbar-toggler hidden-sm-up',
            'data-toggle' => 'collapse',
            'data-target' => "#{$this->containerOptions['id']}",
        ]);
    }
}