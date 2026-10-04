<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
    <link rel="icon" href="images/dollar.png" type="image/png" sizes="16x16">
</head>
<body class="site">
    <main class="eh-receipt-wrap">
        <div>
            <article class="eh-receipt" aria-labelledby="receipt-title">
                <div class="eh-receipt__top">
                    <div class="eh-receipt__tick" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.5l4.5 4.5L19 7.5"/></svg>
                    </div>
                    <h1 class="eh-receipt__title" id="receipt-title">Payment Complete</h1>
                    <p class="eh-receipt__lead">Your tickets are booked. A receipt is on its way to your email.</p>
                </div>

                <div class="eh-receipt__tear" aria-hidden="true"></div>

                <div class="eh-receipt__body">
                    <dl class="eh-receipt__list">
                        <div><dt>Event</dt><dd>{{ $eventName }}</dd></div>
                        <div><dt>Receipt email</dt><dd>{{ $userEmail }}</dd></div>
                        <div><dt>Tickets</dt><dd>{{ $quantity }} &times; RM {{ number_format((float) $eventPrice, 2) }}</dd></div>
                        <div class="eh-receipt__total"><dt>Total</dt><dd>RM {{ number_format((float) $quantity * (float) $eventPrice, 2) }}</dd></div>
                    </dl>
                    <a href="/" class="btn btn-primary eh-receipt__cta">Continue exploring</a>
                </div>
            </article>
        </div>
    </main>
</body>
</html>
