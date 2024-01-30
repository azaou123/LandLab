<!DOCTYPE html>
<html>
<head>
    <title>Message Template with Bootstrap</title>
    <!-- Add Bootstrap CSS and JavaScript links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Style css -->
</head>
<body>

<?php 
$interruptions = []; // Initialize an empty array to store interruptions
foreach ($arrets as $a) {
    $interruptions[] = [$a->OA, $a->OR]; // Append the interruption as an array
}
function monthsAndIntervalsBetweenDatesWithoutInterruptions($dateA, $dateB, $interruptions) {
    $startDate = new DateTime($dateA);
    $endDate = new DateTime($dateB);
    $months = [];

    foreach ($interruptions as $interruption) {
        $interruptionStart = new DateTime($interruption[0]);
        $interruptionEnd = new DateTime($interruption[1]);

        while ($startDate <= $endDate) {
            $monthName = $startDate->format('M-y');
            $year = $startDate->format('Y');
            $monthStart = clone $startDate;
            $monthEnd = clone $startDate;
            $monthEnd->modify('last day of this month');

            if ($monthEnd > $endDate) {
                $monthEnd = clone $endDate;
            }

            if ($interruptionStart <= $monthEnd && $interruptionEnd >= $monthStart) {
                if ($interruptionStart > $monthStart) {
                    $months[] = [
                        'month' => $monthName,
                        'year' => $year,
                        'startDate' => $monthStart->format('d-m-Y'),
                        'endDate' => $interruptionStart->modify('-1 day')->format('d-m-Y'),
                    ];
                }

                $startDate = clone $interruptionEnd;
                $startDate->modify('+1 day');
                break; // Move to the next interruption or month
            }

            $interval = [
                'month' => $monthName,
                'year' => $year,
                'startDate' => $monthStart->format('d-m-Y'),
                'endDate' => $monthEnd->format('d-m-Y'),
            ];
            $months[] = $interval;

            if ($monthEnd < $endDate) {
                $startDate->modify('first day of next month');
            } else {
                $months[] = [
                    'month' => $monthName,
                    'year' => $year,
                    'startDate' => $monthStart->format('d-m-Y'),
                    'endDate' => $monthEnd->format('d-m-Y'),
                ];
                return $months;
            }
        }
    }

    // Add remaining months after interruptions
    while ($startDate <= $endDate) {
        $monthName = $startDate->format('M-y');
        $year = $startDate->format('Y');
        $monthStart = clone $startDate;
        $monthEnd = clone $startDate;
        $monthEnd->modify('last day of this month');

        if ($monthEnd > $endDate) {
            $monthEnd = clone $endDate;
        }

        $interval = [
            'month' => $monthName,
            'year' => $year,
            'startDate' => $monthStart->format('d-m-Y'),
            'endDate' => $monthEnd->format('d-m-Y'),
        ];
        $months[] = $interval;

        if ($monthEnd < $endDate) {
            $startDate->modify('first day of next month');
        } else {
            return $months;
        }
    }

    return $months;
}











// Example usage:
// $dateA = '2023-01-11'; // Start date
// $dateB = '2023-06-08'; // End date

// $interruptions = [
//     ['2023-01-20', '2023-02-05'], // Example interruption 1
//     ['2023-03-10', '2023-03-20'], // Example interruption 2
// ];

// $intervals = monthsAndIntervalsBetweenDatesWithoutInterruptions($dateA, $dateB, $interruptions);

// // Display the intervals for each month without interruptions
// foreach ($intervals as $interval) {
//     echo $interval['month'] . ' : ' . $interval['startDate'] . ' to ' . $interval['endDate'] . PHP_EOL;
// }


?>
    @php
        for($i = 0; $i < count($bats); $i++) {
            if ($bats[$i]['id']==$operation->id){
                $bat = $bats[$i] ;
            }
        }
    @endphp
    <div class="mx-5 mt-5">
        <div class="row ">
            <div class="col-10">
                <p style="width:30%;" class="empty-cell">{{$operation->lo}}</p>
                <a class="btn btn-success rounded-circle" href="/dashboard"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
            <div class="col-2"><button class="btn btn-success rounded" id="btnImprimer" onclick="imprimer()">Imprimer</button></div>
        </div>
        <style>
            @media print {
                body {
                    margin: 0;
                }
                table {
                    width: 100%;
                }
            }
        </style>
        <script>
            function imprimer(){
                document.getElementById('btnImprimer').style.display = 'none';
                window.print();
            }
        </script>
        <p class="text-center ">
            <strong>Note de Calcul : relative à la révision des prix</strong><br>
            {{ $operation->nomMarche }}, marche num : {{ $operation->numMarche }}
        </p>
        <div class="row">
            <div class="col-md-6">
                Date d'ouverture des plis : {{ $operation->DO }}
            </div>
            {{-- <div class="col-md-6">
                Délai d'exécution : {{ $operation->ntj }} Jours
            </div> --}}
        </div>
        <div class="row">
            <div class="col-md-6 my-2">
                Date ordre de service: {{ $operation->DS }}
            </div>
            {{-- <div class="col-md-6">
                Délai d'exécution : {{ $operation->ntj }} Jours
            </div> --}}
        </div>
        <div class="row">
            <p class="col-md-5">Index de base
                <?php foreach($bats as $bat){
                    if ($bat->id == $operation->id_bat){
                        $batOriginal = $bat->i0;
                        $btpbatOriginal = $bat->btp;
                        echo $bat->btp. ' : '.$bat->i0 ; ?> </p> 
                        <?php
                    }
                }
                ?>
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
        <div class="row text-center pb-4">
            <div class="col-md-3"></div>
            <div class="col-md-7">Formule de révision : P=P0*[0,15+0,58,BAT6/BAT6 0]</div>
        </div>
        <style>
            td{
                padding:5px;
            }
        </style>
        <table class="table-bordered">
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
                    <td>Nbr Jours</td>
                    <td>Montant travaux HT</td>
                    <td>Déduction</td>
                    <td>Montant total</td>
                    <td>Montant à réviser</td>
                    <td>P/PO</td>
                    <td>Coef</td>
                    <td>Montant révision</td>
                </tr>
                <?php

                    function lastID($bats,$btp){
                        for ($i = count($bats) - 1; $i >= 0; $i--) {
                            if ($bats[$i]['btp'] == $btp) {
                                return $i;
                            }
                        }
                        return -1;
                    }
                    function retourneI0($date,$bats,$btpbatOriginal) {
                        $dateParts = explode('-', $date);
                        if (count($dateParts) === 3) {
                            $month = $dateParts[0];
                            $year = $dateParts[1];
                            $DO = $year . '-' . $month;
                        }
                        $index = 0;
                        foreach ($bats as $bat) {
                            $dateParts = explode('-', $bat['DO']);
                            if (count($dateParts) === 3) {
                                $month = $dateParts[0];
                                $year = $dateParts[1];
                                $newDO = $year . '-' . $month;
                                if ($newDO === $DO && $bat['btp']==$btpbatOriginal) {
                                    $index = 1 ;
                                    return $bat['i0'];
                                }
                            }
                        }
                        if ($index==0){
                            foreach ($bats as $bat) {
                                if ($bat['btp']==$btpbatOriginal) {
                                    return $bats[lastID($bats,$bat['btp'])]['i0'];
                                }
                            }
                        }

                        
                        return "N'existe pas !";
                    }

                    function formatDate($inputDate) {
                        $dateTime = DateTime::createFromFormat('Y-m-d', $inputDate);
                        if ($dateTime === false) {
                            return $inputDate;
                        }
                        return $dateTime->format('M-y');
                    }
                    function getDayFromDate($inputDate) {
                        $dateTime = DateTime::createFromFormat('Y-m-d', $inputDate);
                        if ($dateTime === false) {
                            return 'Invalid Date';
                        }
                        return $dateTime->format('d');
                    }
                    $nbrTJ = 0 ;
                    $intervals = monthsAndIntervalsBetweenDatesWithoutInterruptions($operation->DO, $operation->DD, $interruptions);
                    function transformDateFormat($dateStr) {
                        $timestamp = strtotime($dateStr);
                        if ($timestamp === false) {
                            return false; 
                        }
                        $transformedDate = date("Y-m-d", $timestamp);
                        return $transformedDate;
                    }
                    $i=0;
                    $ntj = 0 ;
                    $tmr = 0 ;
                    $total1 = 0 ;
                    function calculatePtoP0($b1, $b2) {
                        $b1 = floatval($b1); // Convertir $b1 en float
                        $b2 = floatval($b2); // Convertir $b2 en float

                        if ($b1 != 0) {
                            $result = 0.15 + 0.58 * $b1 / $b2;
                            return $result;
                        } else {
                            return null;
                        }
                    }
                    function transformDate($inputDate) {
                        $inputYear = date("Y"); // Get the current year
                        $monthMap = [
                            'Jan' => '01',
                            'Feb' => '02',
                            'Mar' => '03',
                            'Apr' => '04',
                            'May' => '05',
                            'Jun' => '06',
                            'Jul' => '07',
                            'Aug' => '08',
                            'Sep' => '09',
                            'Oct' => '10',
                            'Nov' => '11',
                            'Dec' => '12'
                        ];
                        list($monthStr, $day) = explode('-', $inputDate);
                        $month = $monthMap[$monthStr];
                        $transformedDate = $inputYear . '-' . $month . '-01';
                        return $transformedDate;
                    }
                    foreach ($intervals as $interval) {
                        $ntj += getDayFromDate(trim(transformDateFormat($interval['endDate']))) - getDayFromDate(trim(transformDateFormat($interval['startDate']))) + 1;
                    }
                    $ntIntervals = count($intervals)+1;
                    foreach ($intervals as $interval) {
                        echo '<tr>';
                        if ($i == 0) {
                            echo '<td rowspan="13">DP N°' . 1 . '</td>';
                            echo '<td rowspan="13">' . $operation->DD . '</td>';
                        }
                        echo '<td>' . $interval['month'] . '</td>';
                        // Call functions and variables as needed
                        echo '<td>' . retourneI0(trim(transformDateFormat($interval['startDate'])), $bats, $btpbatOriginal) . '</td>';
                        echo '<td>' . getDayFromDate(trim(transformDateFormat($interval['startDate']))) . '</td>';
                        echo '<td>au</td>';
                        echo '<td>' . getDayFromDate(trim(transformDateFormat($interval['endDate']))) . '</td>';
                        
                        echo '<td>' . (getDayFromDate(trim(transformDateFormat($interval['endDate']))) - getDayFromDate(trim(transformDateFormat($interval['startDate']))) + 1) . '</td>';
                        if ($i == 0) {
                            echo '<td rowspan="'.$ntIntervals.'">' . $operation->md . '</td>';
                            echo '<td rowspan="'.$ntIntervals.'"></td>';
                            echo '<td rowspan="'.$ntIntervals.'">' . $operation->md . '</td>';
                        }
                        $tmr += ($operation->md / $ntj) * (getDayFromDate(trim(transformDateFormat($interval['endDate']))) - getDayFromDate(trim(transformDateFormat($interval['startDate']))) + 1);
                        echo '<td>' . number_format( ($operation->md / $ntj) * (getDayFromDate(trim(transformDateFormat($interval['endDate']))) - getDayFromDate(trim(transformDateFormat($interval['startDate']))) + 1) ,2). '</td>';
                        echo '<td>' . calculatePtoP0(retourneI0(trim(transformDateFormat(transformDate($interval['month']))), $bats, $btpbatOriginal), $batOriginal) . '</td>';
                        echo '<td>' . (calculatePtoP0(retourneI0(trim(transformDateFormat(transformDate($interval['month']))), $bats,$btpbatOriginal),$batOriginal) - 1) . '</td>';
                        echo '<td>' . (($operation->md / $ntj) * (calculatePtoP0(retourneI0(trim(transformDateFormat(transformDate($interval['month']))), $bats, $btpbatOriginal),$batOriginal) - 1)) . '</td>';
                        $total1 += (($operation->md / $ntj) * (calculatePtoP0(retourneI0(trim(transformDateFormat(transformDate($interval['month']))), $bats, $btpbatOriginal),$batOriginal) - 1));
                        $i++;
                        echo '</tr>';
                    }
                ?>
                <tr>
                    <td></td>
                    <td colspan="4">Nombre total de jours</td>
                    <td>{{ $ntj }}</td>
                    <th class="fw-bold">{{ $tmr }}</th>
                    <td colspan="2">Total 1</td>
                    <td>{{$total1}}</td>
                </tr>
            </tbody>
        </table>
        <div class="row m-0 p-0">
            <div class="col-2"></div>
            <div class="col-3">
                <table class="table  m-0 p-0 border border-top">
                    <tbody>
                       <tr>
                            <td colspan="3">Nombre Total de jours : </td>
                            <td>{{$ntj}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-1"></div>
            <div class="col-2"></div>
            <div class="col-1"></div>
            <div class="col-3">
                <table class="table border border-top">
                    <tbody>
                       <tr>
                            <td>Total HT : </td>
                            <td>{{$total1}}</td>
                        </tr>
                        <tr>
                            <td>TVA : </td>
                            <td>{{$total1*0.2}}</td>
                        </tr>
                        <tr>
                            <td>TG TTC : </td>
                            <td>{{$total1*1.2}}</td>
                        </tr> 
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container">
        <?php
        function convertirEnLettres($montant) {
            $unites = array('', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf');
            $dizaines = array('', 'dix', 'vingt', 'trente', 'quarante', 'cinquante', 'soixante', 'soixante-dix', 'quatre-vingt', 'quatre-vingt-dix');
        
            // Handle negative numbers
            $isNegative = false;
            if ($montant < 0) {
                $isNegative = true;
                $montant = abs($montant);
            }
        
            $dirhams = intval($montant);
            $centimes = round(($montant - $dirhams) * 100);
        
            $dirhamsEnLettres = "";
        
            // Add "moins" for negative numbers
            if ($isNegative) {
                $dirhamsEnLettres .= 'moins ';
            }
        
            if ($dirhams >= 1000) {
                $dirhamsEnLettres .= $unites[substr($dirhams, 0, 1)] . ' mille ';
                $dirhams %= 1000;
            }
            if ($dirhams >= 100) {
                $dirhamsEnLettres .= $unites[substr($dirhams, 0, 1)] . ' cent ';
                $dirhams %= 100;
            }
            if ($dirhams >= 10 && $dirhams <= 99) {
                $dirhamsEnLettres .= $dizaines[substr($dirhams, 0, 1)];
                if ($dirhams % 10 != 0) {
                    $dirhamsEnLettres .= '-';
                    $dirhamsEnLettres .= $unites[substr($dirhams, 1, 1)];
                }
            } elseif ($dirhams >= 1 && $dirhams <= 9) {
                $dirhamsEnLettres .= $unites[$dirhams];
            }
            $dirhamsEnLettres .= ' dirhams ';
            if ($centimes > 0) {
                $dirhamsEnLettres .= 'et ';
                if ($centimes >= 10) {
                    $dirhamsEnLettres .= $dizaines[substr($centimes, 0, 1)];
                    if ($centimes % 10 != 0) {
                        $dirhamsEnLettres .= '-';
                        $dirhamsEnLettres .= $unites[substr($centimes, 1, 1)];
                    }
                } elseif ($centimes >= 1 && $centimes <= 9) {
                    $dirhamsEnLettres .= $unites[$centimes];
                }
                $dirhamsEnLettres .= ' centime';
                if ($centimes > 1) {
                    $dirhamsEnLettres .= 's';
                }
            }
            return $dirhamsEnLettres;
        }
        ?>
            <div class="row text-center">
                <div class="col-4">Arrété la personne note à la somme de : </div>
                <div class="col-5"><?php echo convertirEnLettres($total1); ?> .</div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
