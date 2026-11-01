<h1>Shop</h1>
<?php if (!empty($_GET['ok'])): ?><div class="ok">Order placed successfully.</div><?php endif; ?>
<div class="filter-bar">
<strong>Filter:</strong>
<a href="index.php?page=home" <?= empty($activeCat)?'class="active"':'' ?>>All</a>
<?php foreach ($categories as $c): ?>
<a href="index.php?page=home&cat=<?= View::e($c) ?>" <?= $activeCat===$c?'class="active"':'' ?>><?= View::e($c) ?></a>
<?php endforeach; ?>
</div>
<div class="grid">
<?php foreach ($products as $p): ?>
<div class="card">
<img src="public/images/<?= $p->image ?>" alt="<?= View::e($p->name) ?>" style="width:100%;height:180px;object-fit:contain;background:#fafafa;border-radius:3px;margin-bottom:12px">
<h3><a href="index.php?page=product&id=<?= $p->id ?>"><?= View::e($p->name) ?></a></h3>
<div class="cat"><?= View::e($p->category) ?></div>
<div class="price">$<?= number_format($p->price,2) ?></div>
<form method="post">
<input type="hidden" name="action" value="add">
<input type="hidden" name="id" value="<?= $p->id ?>">
<input type="number" name="qty" value="1" min="1" style="width:60px">
<button class="btn">Add</button>
</form>
</div>
<?php endforeach; ?>
</div>
