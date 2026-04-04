<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Sistema</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f4f4f4, #fceaea);
        }

        /* NAVBAR */
        .navbar {
            background: #ffffff;
            border-bottom: 2px solid #c62828;
        }

        .navbar .container {
            max-width: 1200px;
        }

        /* CONTENEDOR PRINCIPAL */
        .main-container {
            max-width: 1250px;
            margin: 40px auto;
        }

        /* CARD */
        .card {
            border-radius: 12px;
            border: none;
        }

        /* TABLA */
        table th a {
            text-decoration: none !important;
            color: white !important;
        }

        table th {
            background: #eb4444 !important;
            color: white;
            text-align: center;
        }

        table td {
            vertical-align: middle;
        }

        /* BOTONES */
        .btn-danger {
            background: #eb4444;
            border: none;
        }

        .btn-danger:hover {
            background: #9b1c1c;
        }

        /* PAGINACIÓN */
        .pagination .page-link {
            color: #c62828;
        }

        .pagination .active .page-link {
            background: #c62828;
            border-color: #c62828;
        }

    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar shadow-sm">
        <div class="container d-flex justify-content-between">

            <span class="fw-bold text-danger fs-5">Sistema</span>

            <div>
                <?php $auth = $this->request->getSession()->read('Auth'); ?>
                
                <?php if ($auth): ?>
                    <span class="me-3">
                        Hola, <strong><?= h($auth->nombre . ' ' . $auth->apellido) ?></strong>
                    </span>

                    <?= $this->Html->link(
                        'Salir',
                        ['controller' => 'Users', 'action' => 'logout'],
                        ['class' => 'btn btn-danger btn-sm']
                    ) ?>
                <?php endif; ?>
            </div>

        </div>
    </nav>

    <!-- CONTENIDO -->
    <div class="main-container">
        <div class="card shadow-sm">
            <div class="card-body">

                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>

            </div>
        </div>
    </div>

</body>
</html>