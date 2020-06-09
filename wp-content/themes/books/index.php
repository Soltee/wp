<?php get_header();?>

<?php 

while (have_posts()) {
    the_post();

    echo the_content(); 
}

?>

<?php get_footer();?>

<!-- oRDER sUMMARY
<div class="woocommerce-order">

	<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
		Thank you. Your order has been received.
	</p>

	<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

		<li class="woocommerce-order-overview__order order">
			Order number: <strong>58</strong>
		</li>

		<li class="woocommerce-order-overview__date date">
			Date:	<strong>May 26, 2020</strong>
		</li>

		<li class="woocommerce-order-overview__email email">
			Email: <strong>soltee.13@gmail.com</strong>
		</li>
				
		<li class="woocommerce-order-overview__total total">
			Total:	
			<strong>
				<span class="woocommerce-Price-amount amount">
					<span class="woocommerce-Price-currencySymbol">&#36;</span>
					156.00
				</span>
			</strong>
		</li>

		<li class="woocommerce-order-overview__payment-method method">
			Payment method:						<strong>Cash on delivery</strong>
		</li>
				
	</ul>

		
	<p>Pay with cash upon delivery.</p>
	<section class="woocommerce-order-details">
	
		<h2 class="woocommerce-order-details__title">Order details</h2>

		<table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

			<thead>
				<tr>
					<th class="woocommerce-table__product-name product-name">Product</th>
					<th class="woocommerce-table__product-table product-total">Total</th>
				</tr>
			</thead>

			<tbody>
				<tr class="woocommerce-table__line-item order_item">

					<td class="woocommerce-table__product-name product-name">
						<a href="http://localhost:8000/product/hotdog-t-shirt/">Hotdog T-shirt</a> <strong class="product-quantity">&times;&nbsp;4</strong>	</td>

					<td class="woocommerce-table__product-total product-total">
						<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span>156.00</span>	</td>

				</tr>

			</tbody>

			<tfoot>
				<tr>
					<th scope="row">Subtotal:</th>
					<td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#036;</span>156.00</span></td>
				</tr>
									<tr>
					<th scope="row">Payment method:</th>
					<td>Cash on delivery</td>
				</tr>
									<tr>
					<th scope="row">Total:</th>
					<td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#036;</span>156.00</span></td>
				</tr>
			</tfoot>
		</table>

	</section>

	<section class="woocommerce-customer-details">

		<h2 class="woocommerce-column__title">Billing address</h2>

		<address>
			Hee sdfsdf<br />Heloing<br />Pohara<br />Gandaki<br />9283492
			<p class="woocommerce-customer-details--phone">94927342344</p>
			<p class="woocommerce-customer-details--email">soltee.13@gmail.com</p>
		</address>

	</section>
</div>
 -->