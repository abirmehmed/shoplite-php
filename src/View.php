<?php
class View {
    private string $title;
    private array $data;

    public function __construct(string $title, array $data = []) {
        $this->title = $title;
        $this->data = $data;
    }

    public function render(string $view): void {
        $title = $this->title;
        $data = $this->data;
        extract($this->data);
        include __DIR__ . '/../views/layout.php';
    }

    public static function e(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
}
