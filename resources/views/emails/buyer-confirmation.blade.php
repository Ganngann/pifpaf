<h1>Order Confirmation</h1>

<p>Hi {{ $transaction->buyer->name }},</p>

<p>Thank you for your purchase. Here are the details of your order:</p>

<ul>
    <li><strong>Ad:</strong> {{ $transaction->ad->title }}</li>
    <li><strong>Price:</strong> {{ number_format($transaction->amount, 2) }} €</li>
    <li><strong>Seller:</strong> {{ $transaction->seller->name }}</li>
</ul>

<p>You can contact the seller at {{ $transaction->seller->email }} to arrange for shipping.</p>

<p>Thanks,</p>
<p>{{ config('app.name') }}</p>
