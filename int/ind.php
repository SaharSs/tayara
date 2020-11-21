
<script src="https://js.stripe.com/v3/"></script>
<form action="charges.php" method="post" id="payment-form">
    <div class="form-row">
        <input type="text" name="amount" placeholder="Enter Amount" />
        <label for="card-element">
        Credit or debit card
        </label>
        <div id="card-element">
        <!-- A Stripe Element will be inserted here. -->
        </div>
 
        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
    </div>
    <button>Submit Payment</button>
</form>
<script src="card.js"></script>