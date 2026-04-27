<!DOCTYPE html>
<html>
<head>
    <title>Lowker</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #0f172a;
            color: #e2e8f0;
            font-family: 'Segoe UI', sans-serif;
        }

        /* HEADER */
        .header {
            text-align: center;
            padding: 50px 20px 30px;
        }

        .header h1 {
            font-size: 32px;
            font-weight: 600;
            background: linear-gradient(90deg, #38bdf8, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .header p {
            color: #94a3b8;
        }

        /* SEARCH */
        .search-box {
            border-radius: 50px;
            background: #1e293b;
            border: none;
            color: white;
            padding: 12px 20px;
        }

        .search-btn {
            border-radius: 50px;
            background: linear-gradient(90deg, #38bdf8, #6366f1);
            border: none;
        }

        /* CARD */
        .job-card {
            background: #1e293b;
            border-radius: 15px;
            padding: 20px;
            transition: 0.25s;
        }

        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 20px rgba(56,189,248,0.3);
        }

        .job-title {
            font-weight: 600;
            font-size: 16px;
        }

        .company {
            color: #94a3b8;
            font-size: 14px;
        }

        .badge-source {
            background: rgba(56,189,248,0.15);
            color: #38bdf8;
            font-size: 12px;
        }

        .btn-detail {
            border-radius: 10px;
            border: 1px solid #38bdf8;
            color: #38bdf8;
        }

        .btn-detail:hover {
            background: #38bdf8;
            color: black;
        }

    </style>
</head>

<body>

<div class="header">
    <h1>INFORMASI LOWONGAN PEKERJAAN</h1>
    <p>Job Aggregator</p>

    <form method="get" action="/" class="mt-4">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="input-group">
                    <input type="text" name="q" class="form-control search-box"
                        placeholder="Search job..."
                        value="<?= $_GET['q'] ?? '' ?>">

                    <button class="btn search-btn text-white px-4">Cari</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="container">
    <div class="row">
        <?php foreach ($jobs as $job): ?>
        <div class="col-md-6 col-lg-4 mb-4">

            <div class="job-card">

                <div class="d-flex justify-content-between mb-2">
                    <span class="badge badge-source"><?= $job['source']; ?></span>

                    <?php if (strtotime($job['created_at']) > strtotime('-1 day')): ?>
                        <span class="badge bg-danger">NEW</span>
                    <?php endif; ?>
                </div>

                <div class="job-title"><?= $job['title']; ?></div>
                <div class="company"><?= $job['company']; ?></div>
                <div class="company mb-3">📍 <?= $job['location']; ?></div>

                <a href="/job/<?= $job['id']; ?>" class="btn btn-detail w-100">
                    Detail
                </a>

            </div>

        </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>