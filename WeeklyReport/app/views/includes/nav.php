<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">Weekly Report System</a>
        <!-- Navigation menu toggle button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navigation menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Show username in navigation bar -->
                <li class="nav-item active">
                    <a class="nav-link" href="#">Welcome, <?php echo $_SESSION['username']; ?></a>
                </li>
                <!-- Logout button -->
                <li class="nav-item">
                    <form action="/LoginOut" method="post">
                        <button onclick="loginOut" class="btn btn-sm btn-outline-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
