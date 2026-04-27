<!DOCTYPE html>
<html>
<head>
    <title>Detail Job</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2><?= $job['title']; ?></h2>
<p><b><?= $job['company']; ?></b> - <?= $job['location']; ?></p>

<p><?= $job['description']; ?></p>

<a href="<?= $job['url']; ?>" target="_blank" class="btn btn-primary">
    Apply Sekarang
</a>

<br><br>
<a href="/" class="btn btn-secondary">Kembali</a>

</body>
</html>