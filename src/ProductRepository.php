<?php
class ProductRepository {
    private array $items;

    public function __construct() {
        $this->items = [
            new Product(1, 'Mechanical Keyboard', 'Cherry MX Blue switches.', 89.99, 'Electronics', 'mechanical-keyboard.png'),
            new Product(2, 'USB-C Hub', '7-in-1 aluminum hub.', 39.50, 'Electronics', 'usb-c-hub.png'),
            new Product(3, 'Coffee Beans 1kg', 'Single origin Ethiopian.', 24.00, 'Food', 'coffee-beans-1kg.png'),
            new Product(4, 'Notebook A5', '200 pages, dotted.', 12.75, 'Stationery', 'notebook-a5.png'),
            new Product(5, 'Desk Lamp', 'LED, adjustable brightness.', 45.00, 'Home', 'desk-lamp.png'),
        ];
    }

    public function all(): array { return $this->items; }

    public function find(int $id): ?Product {
        foreach ($this->items as $p) if ($p->id === $id) return $p;
        return null;
    }

    public function byCategory(string $cat): array {
        return array_values(array_filter($this->items, fn($p) => $p->category === $cat));
    }

    public function categories(): array {
        return array_values(array_unique(array_map(fn($p) => $p->category, $this->items)));
    }
}
