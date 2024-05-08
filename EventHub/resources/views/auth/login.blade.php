<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/auth.css">
    <title>Event Manager</title>
</head>
<body>
    <br><br><br>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <a href="/" class="title">EventHub</a>
                <h3>Login</h3>
                <br>
                <form action="/loginProcess" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Email address" name="email" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-dark">Login</button>
                </form>
                <div class="container">
                    <a href="/signup">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
