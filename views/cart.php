<h1>Shopping Cart</h1>
<?php if ($cart->count() === 0): ?>
<div class="empty">Your cart is empty.</div>
<?php else: ?>
<table>
<thead><tr><th>Product</th><th>Qty</th><th>Subtotal</th><th></th></tr></thead>
<tbody>
<?php foreach ($cart->items() as $id => $qty):
    $p = $repo->find($id); if (!$p) continue; ?>
<tr>
<td style="display:flex;align-items:center;gap:12px">
<img src="public/images/<?= $p->image ?>" alt="<?= View::e($p->name) ?>" style="width:48px;height:48px;object-fit:contain;border:1px solid #e5e5e5;border-radius:3px">
<?= View::e($p->name) ?>
</td>
<td><?= $qty ?></td>
<td class="price">$<?= number_format($p->price*$qty,2) ?></td>
<td><form method="post"><input type="hidden" name="action" value="remove"><input type="hidden" name="id" value="<?= $id ?>"><button class="btn btn-danger">Remove</button></form></td>
</tr>
<?php endforeach; ?>
</tbody>
<tfoot>
<tr style="background:#fafafa;font-weight:600">
<td colspan="2">Total</td>
<td class="price">$<?= number_format($cart->total($repo),2) ?></td>
<td></td>
</tr>
</tfoot>
</table>
<div class="actions">
<form method="post"><input type="hidden" name="action" value="clear"><button class="btn btn-danger">Clear Cart</button></form>
<a href="index.php?page=checkout"><button class="btn btn-primary">Checkout →</button></a>
</div>
<?php endif; ?>
