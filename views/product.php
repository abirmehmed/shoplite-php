<h1><?= View::e($product->name) ?></h1>
<div style="display:flex;gap:32px;align-items:flex-start">
<img src="public/images/<?= $product->image ?>" alt="<?= View::e($product->name) ?>" style="width:320px;height:320px;object-fit:contain;background:#fafafa;border-radius:4px;border:1px solid #e5e5e5">
<div style="flex:1">
<p style="margin-bottom:16px"><?= View::e($product->description) ?></p>
<div class="cat" style="font-size:13px"><?= View::e($product->category) ?></div>
<div class="price" style="font-size:24px;margin:16px 0">$<?= number_format($product->price,2) ?></div>
<form method="post">
<input type="hidden" name="action" value="add">
<input type="hidden" name="id" value="<?= $product->id ?>">
<input type="number" name="qty" value="1" min="1" style="width:80px">
<button class="btn btn-primary">Add to Cart</button>
</form>
</div>
</div>
<p style="margin-top:20px"><a href="index.php?page=home">← Back to shop</a></p>
