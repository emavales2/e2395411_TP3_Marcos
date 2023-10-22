{{ include('header.php', {title: 'Journal de Bord'})}}
    
    <header class = "pg_title">
        <h2>Journal de Bord</h2>  
    </header>

    <table>
        <thead>
            <tr>
                <th>Timestamp</th>
                <th>IP Address</th>
                <th>Is Guest</th>
                <th>Username</th>
                <th>Page Visited</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($logData as $logEntry): ?>
                <tr>
                    <td><?= $logEntry['timestamp'] ?></td>
                    <td><?= $logEntry['ip_address'] ?></td>
                    <td><?= $logEntry['is_guest'] ? 'Yes' : 'No' ?></td>
                    <td><?= $logEntry['username'] ?></td>
                    <td><?= $logEntry['page_visited'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>