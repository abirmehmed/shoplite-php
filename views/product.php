<h1><?= View::e($product->name) ?></h1>
<p style="margin-bottom:16px"><?= View::e($product->description) ?></p>
<div class="card" style="max-width:400px">
<div class="cat"><?= View::e($product->category) ?></div>
<div class="price" style="font-size:20px;margin-bottom:16px">$<?= number_format($product->price,2) ?></div>
<form method="post">
<input type="hidden" name="action" value="add">
<input type="hidden" name="id" value="<?= $product->id ?>">
<input type="number" name="qty" value="1" min="1" style="width:80px">
<button class="btn btn-primary">Add to Cart</button>
</form>
</div>
<p style="margin-top:20px"><a href="index.php?page=home">← Back to shop</a></p>
