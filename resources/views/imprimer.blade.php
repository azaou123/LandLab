<!DOCTYPE html>
<html>
<head>
    <title>Message Template with Bootstrap</title>
    <!-- Add Bootstrap CSS and JavaScript links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <p>Commune Asni</p>
        <p class="text-center ">
            <strong>Note de Calcul : relative à la révision des prix</strong><br>
            traveaux d'amenagements de l'assainissement liquide de l'abattoir communal, marche num : 03/2020
        </p>
        <div class="row">
            <div class="col-md-6">
                Date d'ouverture des plis : 17/08/2020
            </div>
            <div class="col-md-6">
                Délai d'exécution : 2 mois
            </div>
        </div>
        <div class="row text-center">
            <p class="col-md-5">
                Index de base BAT6 0 : 210,50
            </p>
                <table class="table col-md-7 border border-top">
                <style>
                    .empty-cell {
                        border:1px solid black ;
                        background-color: #f5f5f5; /* Light gray background color */
                        text-align: center; /* Center align text in cells */
                        padding: 5px; /* Add some padding for spacing */
                    }
                </style>
                <tbody>
                    <tr>
                        <td class="empty-cell"></td>
                        <td class="empty-cell"></td>
                    </tr>
                    <tr>
                        <td class="empty-cell"></td>
                        <td class="empty-cell"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row text-center">
            <div class="col-md-5">Date de traveaux : 25/11/2020</div>
            <div class="col-md-7">Formule de révision : P=P0*[0,15+0,58,BAT6/BAT6 0]</div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th colspan="2">Décomptes</th>
                <th colspan="8">Répartition délai d'exécution</th>
                <th colspan="2">Répartition montant</th>
                <th colspan="3">Révision des prix</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Num</th>
                    <td>Dates</td>
                    <td>mois</td>
                    <td>BAT6</td>
                    <td colspan="3">période</td>
                    <td>NBR Jours</td>
                    <td>Montant travaux HT</td>
                    <td>Déduction</td>
                    <td>Montant total</td>
                    <td>Montant à réviser</td>
                    <td>P/PO</td>
                    <td>Coef</td>
                    <td>Montant révision</td>
                </tr>
                <tr>
                    <th rowspan="6">DP N^1</th>
                    <td rowspan="6">01/02/2021</td>
                </tr>
                <tr>
                    <td>Nov-20</td>
                    <td>209.5</td>
                    <td>25</td>
                    <td>au</td>
                    <td>30</td>
                    <td>6</td>
                    <td rowspan="6">93 859,54</td>
                    <td rowspan="6"></td>
                    <td rowspan="6">93 859,54</td>
                    <td>8000,54</td>
                    <td>0.99756348</td>
                    <td>-0.00045</td>
                    <td>-0.00045</td>
                </tr>
                <tr>
                    <td>Dec-20</td>
                    <td>209.5</td>
                    <td>25</td>
                    <td>au</td>
                    <td>30</td>
                    <td>6</td>
                    <td >8000,54</td>
                    <td>0.99756348</td>
                    <td>-0.00045</td>
                    <td>-0.00045</td>
                </tr>
                <tr>
                    <td>Janv-20</td>
                    <td>209.5</td>
                    <td>25</td>
                    <td>au</td>
                    <td>30</td>
                    <td>6</td>
                    <td >8000,54</td>
                    <td>0.99756348</td>
                    <td>-0.00045</td>
                    <td>-0.00045</td>
                </tr>
                <tr>
                    <td>Févr-20</td>
                    <td>209.5</td>
                    <td>25</td>
                    <td>au</td>
                    <td>30</td>
                    <td>6</td>
                    <td >8000,54</td>
                    <td>0.99756348</td>
                    <td>-0.00045</td>
                    <td>-0.00045</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Nombre total de jours</td>
                    <td>6</td>
                    <th class="fw-bold">8000,54</th>
                    <td colspan="2">Total 2</td>
                    <td>7538</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Add Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
