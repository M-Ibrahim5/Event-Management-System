<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div style="margin-top: 10px; margin-left: 10px;">
        <a href="{{ route('organization.showEvent') }}" class="text-decoration-none">< Back</a>
    </div>

    <div style="margin-top: 10px; margin-left: 70px;">
        <h3 style="font-weight: bold; color: salmon;">Event Report : </h3>
    </div>

    <div style="margin-top: 10px; margin-left: 100px;">
        <h1 style="font-weight: bold;">{{ $data->eventName }}</h1>
    </div>

    <div style="margin-top: 70px; margin-left: 100px;">
        <h6 style="font-weight: bold;">Ticket Sales Summary</h6>
    </div>
    
    <div class="row" style="margin-left: 80px;">
    <div class="col-sm-2">
        <div class="card" style="width: 200px;">
            <div class="card-body">
                <h5 class="card-title" style="font-size: 0.9rem; color: grey;">Gross Sales</h5>
                <p class="card-text" style="font-size: 0.9rem; font-weight: bold;">RM {{ number_format($totalAmountSold, 2) }}</p>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="card" style="width: 200px;">
            <div class="card-body">
                <h5 class="card-title" style="font-size: 0.9rem; color: grey;">Net Sales</h5>
                <p class="card-text" style="font-size: 0.9rem; font-weight: bold;">RM {{ number_format($netSales, 2) }}</p>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="card" style="width: 200px;">
            <div class="card-body">
                <h5 class="card-title" style="font-size: 0.9rem; color: grey;">Orders</h5>
                <p class="card-text" style="font-size: 0.9rem; font-weight: bold;">{{ $totalTicketsSold }}</p>
            </div>
        </div>
    </div>
    <div>
        <p style="font-size: 0.9rem; color: grey;">* 3% charges for event services</p>
    </div>
</div>

    <div style="margin-top: 30px; margin-left: 100px;">
        <h6 style="font-weight: bold;">Orders Summary Report</h6>
    </div>

    <div style="margin-left: 80px; margin-right: 40px;">
    @if($receiptDetails)
        <table class="table" style="width: 100%;">
            <thead class="table-dark">
                <tr>
                    <th style="width: 20%;">Receipt ID</th>
                    <th style="width: 20%;">User Email</th>
                    <th style="width: 20%;">Ticket Quantity</th>
                    <th style="width: 20%;">Amount</th>
                    <th style="width: 20%;">Status</th>
                    <!-- Add more table headings as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($receiptDetails as $receipt)
                <tr>
                    <td style="width: 20%;">{{ $receipt->stripe_id }}</td>
                    <td style="width: 20%;">{{ $receipt->email }}</td>
                    <td style="width: 20%;">{{ $receipt->ticket_quantity }}</td>
                    <td style="width: 20%;">RM {{ number_format($receipt->amount, 2) }}</td>
                    <td style="width: 20%;">{{ $receipt->status }}</td>
                    <!-- Add more table cells for additional receipt details -->
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No receipt details found.</p>
    @endif
</div>



</body>
</html>
