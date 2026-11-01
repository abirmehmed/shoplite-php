<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= View::e($title) ?></title>
<style>
* { box-sizing: border-box; }
body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; font-size: 14px; line-height: 1.5; color: #111; background: #fff; margin: 0; }
.wrap { max-width: 960px; margin: 0 auto; padding: 24px; }
nav { border-bottom: 1px solid #e5e5e5; padding: 12px 0; margin-bottom: 24px; display: flex; gap: 24px; }
nav a { color: #0066cc; text-decoration: none; font-weight: 500; }
nav a:hover { text-decoration: underline; }
h1 { font-size: 20px; font-weight: 600; margin: 0 0 16px 0; padding-bottom: 12px; border-bottom: 1px solid #e5e5e5; }
h2 { font-size: 16px; font-weight: 600; margin: 16px 0 8px 0; }
table { width: 100%; border-collapse: collapse; font-size: 13px; margin-top: 8px; }
th, td { text-align: left; padding: 10px 8px; border-bottom: 1px solid #f0f0f0; }
th { background: #fafafa; font-weight: 600; color: #555; }
.price { font-weight: 600; color: #111; }
.btn { background: #111; color: #fff; border: 1px solid #111; padding: 6px 14px; font-size: 13px; cursor: pointer; border-radius: 3px; font-family: inherit; }
.btn:hover { background: #333; border-color: #333; }
.btn-danger { background: #fff; color: #d00; border-color: #d00; }
.btn-danger:hover { background: #d00; color: #fff; }
.btn-primary { background: #0066cc; border-color: #0066cc; }
.btn-primary:hover { background: #0052a3; border-color: #0052a3; }
input[type="number"], input[type="text"], input[type="email"] { border: 1px solid #ccc; padding: 6px 8px; font-size: 13px; border-radius: 3px; font-family: inherit; }
input:focus { outline: none; border-color: #0066cc; }
.filter-bar { margin: 16px 0; padding: 12px; background: #fafafa; border: 1px solid #e5e5e5; border-radius: 3px; font-size: 13px; }
.filter-bar a { color: #0066cc; text-decoration: none; margin: 0 6px; }
.filter-bar a:hover { text-decoration: underline; }
.filter-bar a.active { color: #111; font-weight: 600; text-decoration: none; border-bottom: 2px solid #111; }
.err { background: #fff5f5; color: #c00; padding: 10px 12px; border: 1px solid #fecaca; border-radius: 3px; margin: 16px 0; font-size: 13px; }
.ok { background: #f0fdf4; color: #166534; padding: 10px 12px; border: 1px solid #bbf7d0; border-radius: 3px; margin: 16px 0; font-size: 13px; }
.grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 16px; margin-top: 16px; }
.card { border: 1px solid #e5e5e5; padding: 16px; border-radius: 4px; background: #fff; }
.card h3 { font-size: 15px; margin: 0 0 4px 0; font-weight: 600; }
.card h3 a { color: #111; text-decoration: none; }
.card h3 a:hover { color: #0066cc; }
.card .cat { color: #666; font-size: 12px; margin-bottom: 12px; }
.card form { display: flex; gap: 8px; align-items: center; margin-top: 12px; }
.summary { background: #fafafa; border: 1px solid #e5e5e5; padding: 16px; border-radius: 4px; margin: 16px 0; }
form.row { display: flex; flex-direction: column; gap: 12px; margin-top: 16px; max-width: 400px; }
form.row label { font-size: 13px; font-weight: 500; color: #333; }
form.row input { width: 100%; }
.empty { text-align: center; padding: 40px 20px; color: #666; font-size: 14px; }
.actions { display: flex; gap: 12px; margin-top: 20px; }
</style>
</head>
<body>
<div class="wrap">
<nav>
<a href="index.php?page=home">Shop</a>
<a href="index.php?page=cart">Cart (<?= $cart->count() ?>)</a>
<a href="index.php?page=checkout">Checkout</a>
</nav>
<?php include __DIR__ . '/' . $view . '.php'; ?>
</div>
</body>
</html>
