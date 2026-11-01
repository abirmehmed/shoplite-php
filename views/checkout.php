<h1>Checkout</h1>
<?php if ($cart->count() === 0): ?>
<div class="empty">Cart is empty. Add products first.</div>
<?php else: ?>
<div class="summary">
<h2>Order Summary</h2>
<p><strong>Total:</strong> $<?= number_format($cart->total($repo),2) ?></p>
<p style="color:#666;font-size:13px"><?= $cart->count() ?> item(s)</p>
</div>
<?php if (!empty($_GET['err'])): ?><div class="err">Invalid input. Name (min 2 chars) and valid email required.</div><?php endif; ?>
<form method="post" class="row">
<input type="hidden" name="action" value="order">
<div>
<label for="name">Full Name</label>
<input type="text" id="name" name="name" required minlength="2" value="<?= View::e($_POST['name'] ?? '') ?>">
</div>
<div>
<label for="email">Email</label>
<input type="email" id="email" name="email" required value="<?= View::e($_POST['email'] ?? '') ?>">
</div>
<button class="btn btn-primary" style="margin-top:8px">Place Order</button>
</form>
<?php endif; ?>
