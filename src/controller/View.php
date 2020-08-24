<?php

namespace App\src\controller;

use App\src\Request;

class View
{
    private $file;
    private $title;
    private $script;
    private $request;
    private $session;

    public function __construct()
    {
        $this->request = new Request();
        $this->session = $this->request->getSession();
    }

    public function render(string $template, $data = [])
    {
        $this->file = '../src/view/'.$template.'.php';
        $content = $this->renderFile($this->file, $data);
        $view = $this->renderFile('../src/view/base.php', [
            'title' => $this->title,
            'script' => $this->script,
            'content' => $content,
            'session' => $this->session
        ]);

        echo filter_var($view);
    }

    private function renderFile(string $file, array $data)
    {
        if (file_exists($file)) {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }

        header('Location: index.php?route=notFound');
    }
}