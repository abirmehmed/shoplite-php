<?php
class Cart {
    private array $items = [];

    public function __construct() {
        $this->items = $_SESSION['cart'] ?? [];
    }

    public function add(int $productId, int $qty = 1): void {
        if ($qty < 1) return;
        $this->items[$productId] = ($this->items[$productId] ?? 0) + $qty;
        $this->save();
    }

    public function remove(int $productId): void {
        unset($this->items[$productId]);
        $this->save();
    }

    public function clear(): void { $this->items = []; $this->save(); }

    public function items(): array { return $this->items; }

    public function count(): int { return array_sum($this->items); }

    public function total(ProductRepository $repo): float {
        $sum = 0.0;
        foreach ($this->items as $id => $qty) {
            $p = $repo->find($id);
            if ($p) $sum += $p->price * $qty;
        }
        return $sum;
    }

    private function save(): void { $_SESSION['cart'] = $this->items; }
}
