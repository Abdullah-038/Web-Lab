<?php
$adminName = "Admin User";
$today = date("l, F j, Y");

$stats = [
    ["title" => "Total Users", "value" => 1542, "delta" => "+5.6%", "positive" => true],
    ["title" => "Revenue", "value" => "$12,480", "delta" => "+3.1%", "positive" => true],
    ["title" => "Orders", "value" => 384, "delta" => "-1.4%", "positive" => false],
    ["title" => "Pending Tickets", "value" => 27, "delta" => "+2 new", "positive" => false],
];

$recentOrders = [
    ["id" => "#1001", "customer" => "John Carter", "amount" => "$320", "status" => "Completed"],
    ["id" => "#1002", "customer" => "Nina Allen", "amount" => "$180", "status" => "Pending"],
    ["id" => "#1003", "customer" => "Michael Yu", "amount" => "$95", "status" => "Processing"],
    ["id" => "#1004", "customer" => "Sara Khan", "amount" => "$560", "status" => "Completed"],
    ["id" => "#1005", "customer" => "David Kim", "amount" => "$210", "status" => "Cancelled"],
];

$activity = [
    "New user registration: Emma Stone",
    "Order #1006 marked as completed",
    "Support ticket #789 assigned to Alex",
    "Inventory alert: Product SKU-21 low stock",
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <h2 class="brand">AdminPanel</h2>
            <nav>
                <a href="#" class="active">Dashboard</a>
                <a href="#">Users</a>
                <a href="#">Orders</a>
                <a href="#">Products</a>
                <a href="#">Reports</a>
                <a href="#">Settings</a>
            </nav>
        </aside>

        <main class="main-content">
            <header class="topbar">
                <div>
                    <h1>Welcome, <?php echo htmlspecialchars($adminName); ?></h1>
                    <p><?php echo htmlspecialchars($today); ?></p>
                </div>
                <button class="btn">+ Create Report</button>
            </header>

            <section class="stats-grid">
                <?php foreach ($stats as $item): ?>
                    <article class="card stat-card">
                        <h3><?php echo htmlspecialchars($item["title"]); ?></h3>
                        <p class="stat-value"><?php echo htmlspecialchars((string) $item["value"]); ?></p>
                        <span class="delta <?php echo $item["positive"] ? "positive" : "negative"; ?>">
                            <?php echo htmlspecialchars($item["delta"]); ?>
                        </span>
                    </article>
                <?php endforeach; ?>
            </section>

            <section class="content-grid">
                <article class="card table-card">
                    <h2>Recent Orders</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recentOrders as $order): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($order["id"]); ?></td>
                                    <td><?php echo htmlspecialchars($order["customer"]); ?></td>
                                    <td><?php echo htmlspecialchars($order["amount"]); ?></td>
                                    <td>
                                        <span class="status <?php echo strtolower($order["status"]); ?>">
                                            <?php echo htmlspecialchars($order["status"]); ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </article>

                <article class="card">
                    <h2>Weekly Revenue</h2>
                    <div class="chart-placeholder">
                        <div style="height: 40%"></div>
                        <div style="height: 65%"></div>
                        <div style="height: 55%"></div>
                        <div style="height: 75%"></div>
                        <div style="height: 50%"></div>
                        <div style="height: 85%"></div>
                        <div style="height: 70%"></div>
                    </div>
                </article>

                <article class="card activity-card">
                    <h2>Recent Activity</h2>
                    <ul>
                        <?php foreach ($activity as $entry): ?>
                            <li><?php echo htmlspecialchars($entry); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </article>
            </section>
        </main>
    </div>
</body>
</html>