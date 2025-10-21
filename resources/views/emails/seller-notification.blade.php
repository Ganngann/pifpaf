<h1>You have a new sale!</h1>

<p>Hi {{ $transaction->seller->name }},</p>

<p>Congratulations! You've sold the following item:</p>

<ul>
    <li><strong>Ad:</strong> {{ $transaction->ad->title }}</li>
    <li><strong>Price:</strong> {{ number_format($transaction->amount, 2) }} €</li>
    <li><strong>Buyer:</strong> {{ $transaction->buyer->name }}</li>
</ul>

<p>You can contact the buyer at {{ $transaction->buyer->email }} to arrange for shipping.</p>

<p>Thanks,</p>
<p>{{ config('app.name') }}</p>
