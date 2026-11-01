<?php
class Router {
    private ProductRepository $repo;
    private Cart $cart;

    public function __construct() {
        $this->repo = new ProductRepository();
        $this->cart = new Cart();
    }

    public function dispatch(): void {
        $page = $_GET['page'] ?? 'home';
        $action = $_POST['action'] ?? '';

        // POST actions (user input)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handlePost($action);
            return;
        }

        switch ($page) {
            case 'home':    $this->home(); break;
            case 'product': $this->product(); break;
            case 'cart':    $this->cartView(); break;
            case 'checkout':$this->checkout(); break;
            default:        http_response_code(404); echo '404';
        }
    }

    private function handlePost(string $action): void {
        match ($action) {
            'add'    => $this->cart->add((int)($_POST['id'] ?? 0), (int)($_POST['qty'] ?? 1)),
            'remove' => $this->cart->remove((int)($_POST['id'] ?? 0)),
            'clear'  => $this->cart->clear(),
            'order'  => $this->order(),
            default  => null,
        };
        header('Location: index.php?page=' . ($action === 'order' ? 'home' : 'cart'));
        exit;
    }

    private function home(): void {
        $cat = $_GET['cat'] ?? '';
        $products = $cat ? $this->repo->byCategory($cat) : $this->repo->all();
        (new View('Shop', [
            'products'   => $products,
            'categories' => $this->repo->categories(),
            'cart'       => $this->cart,
            'activeCat'  => $cat,
        ]))->render('home');
    }

    private function product(): void {
        $id = (int)($_GET['id'] ?? 0);
        $p = $this->repo->find($id);
        if (!$p) { http_response_code(404); echo 'Not found'; return; }
        (new View($p->name, ['product' => $p, 'cart' => $this->cart]))->render('product');
    }

    private function cartView(): void {
        (new View('Cart', ['cart' => $this->cart, 'repo' => $this->repo]))->render('cart');
    }

    private function checkout(): void {
        (new View('Checkout', ['cart' => $this->cart, 'repo' => $this->repo]))->render('checkout');
    }

    private function order(): void {
        // Validate user input — security
        $name  = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        if ($this->cart->count() === 0 || strlen($name) < 2 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: index.php?page=checkout&err=1');
            exit;
        }
        $this->cart->clear();
        header('Location: index.php?page=home&ok=1');
        exit;
    }
}
