<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ! FONTAWESOME -->

        <link rel="icon" href="ico/favicon.ico" type="image/x-icon">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous'/>

        <!-- ! FONTS -->

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

        <!-- ! BOOTSTRAP -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        
        <!-- ! CSS -->

        <link rel="stylesheet" href="./css/reset.css">
        <link rel="stylesheet" href="./css/general.css">
        <link rel="stylesheet" href="./css/style.css">

        <title> PHP Hotel </title>
        
    </head>

    <body>

        <!-- ! Main Start -->
        <main>

            <?php

                $hotels = [
                    [
                        'name' => 'Hotel Belvedere',
                        'description' => 'Hotel in collina con vista panoramica',
                        'parking' => true,
                        'vote' => 4,
                        'distance_to_center' => 10.4
                    ],
                    [
                        'name' => 'Hotel Futuro',
                        'description' => 'Hotel dal design moderno a due passi dal centro',
                        'parking' => true,
                        'vote' => 2,
                        'distance_to_center' => 2
                    ],
                    [
                        'name' => 'Hotel Rivamare',
                        'description' => 'Hotel comodo per chi vuole alloggiare vicino al mare',
                        'parking' => false,
                        'vote' => 1,
                        'distance_to_center' => 1
                    ],
                    [
                        'name' => 'Hotel Bellavista',
                        'description' => 'Lussuoso hotel vista mare con tutti i confort',
                        'parking' => false,
                        'vote' => 5,
                        'distance_to_center' => 5.5
                    ],
                    [
                        'name' => 'Hotel Milano',
                        'description' => 'Hotel in periferia ideale per chi vuole godere il relax della campagna',
                        'parking' => true,
                        'vote' => 2,
                        'distance_to_center' => 50
                    ]
                ];

                $filterValueParking = isset($_GET['filter_parking']) ? $_GET['filter_parking'] : 'all';
                $filterValueRating = isset($_GET['filter_rating']) ? intval($_GET['filter_rating']) : 0;

                if ($filterValueParking !== 'all') {
                    $filteredHotels = array_filter($hotels, function ($hotel) use ($filterValueParking) {
                        return $hotel['parking'] == ($filterValueParking === 'true');
                    });
                } else {
                    $filteredHotels = $hotels;
                }

                if ($filterValueRating > 0) {
                    $filteredHotels = array_filter($filteredHotels, function ($hotel) use ($filterValueRating) {
                        return $hotel['vote'] >= $filterValueRating;
                    });
                }

            ?>

            <div class="container mt-5 mb-5">

                <h1>
                    <i class="fas fa-hotel"></i> 
                    Elenco degli hotel
                </h1>
                
                <form action="" method="GET">

                    <div class="mb-3">

                        <label for="filter_parking" class="form-label">
                            <i class="fa-solid fa-bars"></i>
                            Scegli tra le seguenti opzioni:
                        </label>

                        <select name="filter_parking" id="filter_parking" class="form-select">
                            <option value="all">Tutti</option>
                            <option value="true">Con parcheggio</option>
                            <option value="false">Senza parcheggio</option>
                        </select>

                    </div>

                    <div class="mb-3">

                        <label for="filter_rating" class="form-label">
                            <i class="fas fa-star"></i> 
                            Filtra per voto (almeno)
                        </label>

                        <input type="number" name="filter_rating" id="filter_rating" class="form-control" min="1" max="5">

                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-filter"></i> 
                        Filtra i risultati
                    </button>

                </form>

                <div class="table-responsive">

                    <table class="table mt-3">

                        <thead>

                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col" class="d-none d-sm-table-cell">Descrizione</th>
                                <th scope="col" class="d-none d-sm-table-cell" >Parcheggio</th>
                                <th scope="col" class="d-none d-sm-table-cell" >Voto</th>
                                <th scope="col">Distanza dal centro</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php foreach ($filteredHotels as $hotel) : ?>

                                <tr>
                                    <td><?php echo $hotel['name']; ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $hotel['description']; ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $hotel['parking'] ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>'; ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $hotel['vote']; ?> <i class="fas fa-star"></i></td>
                                    <td><?php echo $hotel['distance_to_center']; ?> km <i class="fas fa-map-marker-alt"></i></td>
                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </main>

        <!-- ! BOOTSTRAP JS -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </body>

</html>