<?php

namespace Inventario\View;

use Exception;

class ViewEngine
{
    protected $viewPath;
    protected $layoutPath;
    protected $contentSlot;

    public function __construct()
    {
        $this->viewPath = dirname(__DIR__) . '/../app/Views/';
        $this->layoutPath = dirname(__DIR__) . '/../app/Views/layouts/';
        $this->contentSlot = '{{content}}';
    }

    public function render($view)
    {
        $viewContent = $this->getView($view->file, $view->data);
        if (!$view->layout) {
            return $viewContent;
        }
        $layoutContent = $this->getLayout($view->layout);
        return str_replace($this->contentSlot, $viewContent, $layoutContent);
    }

    private function getView($view, $params)
    {
        return $this->getContentFile($this->viewPath . $view . ".view.php", $params);
    }

    private function getLayout($layout)
    {
        return $this->getContentFile($this->layoutPath . $layout . ".view.php");
    }

    private function getContentFile($filePath, $data = [])
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }

        if (!file_exists($filePath)) {
            throw new Exception();
        }

        ob_start();
        include $filePath;
        $content = (string) ob_get_contents();
        ob_end_clean();
        return $content;
    }

}
