<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body class="site">
    <nav class="eh-nav">
        <div class="eh-nav__inner">
            <a class="eh-brand" href="/organization">EventHub</a>
        </div>
    </nav>

    <main class="eh-page">
        <a href="{{ route('organization.showEvent') }}" class="eh-back">&larr; Back to your events</a>

        <div class="eh-pagehead">
            <div>
                <h1>{{ $data->eventName }}</h1>
                <p>Event report</p>
            </div>
        </div>

        <h2 class="eh-form-section mt-0">Ticket sales summary</h2>
        <div class="eh-stats">
            <div class="eh-stat">
                <p class="eh-stat__label">Gross sales</p>
                <p class="eh-stat__value">RM {{ number_format($totalAmountSold, 2) }}</p>
            </div>
            <div class="eh-stat">
                <p class="eh-stat__label">Net sales</p>
                <p class="eh-stat__value">RM {{ number_format($netSales, 2) }}</p>
            </div>
            <div class="eh-stat">
                <p class="eh-stat__label">Tickets sold</p>
                <p class="eh-stat__value">{{ $totalTicketsSold }}</p>
            </div>
        </div>
        <p class="eh-footnote">Net sales are gross sales minus a 3% charge for event services.</p>

        <h2 class="eh-form-section">Orders</h2>
        @if ($receiptDetails && count($receiptDetails))
            <div class="eh-panel">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Receipt ID</th>
                            <th scope="col">Email</th>
                            <th scope="col">Tickets</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($receiptDetails as $receipt)
                            <tr>
                                <td>{{ $receipt->stripe_id }}</td>
                                <td>{{ $receipt->email }}</td>
                                <td>{{ $receipt->ticket_quantity }}</td>
                                <td>RM {{ number_format($receipt->amount, 2) }}</td>
                                <td><span class="eh-status eh-status--{{ in_array(strtolower($receipt->status), ['succeeded', 'paid', 'complete']) ? 'confirmed' : '' }}">{{ $receipt->status }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="eh-empty">No orders yet. Ticket purchases for this event will appear here.</p>
        @endif
    </main>
</body>
</html>
