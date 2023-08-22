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

            <div class="container mt-5">

                <h1 class="text-center mt-2">
                    <i class="fas fa-hotel"></i>
                    Elenco Hotels
                </h1>

                <form action="" method="GET">

                    <div class="mb-3">

                        <label for="filter_parking" class="form-label"> 
                            Scegli tra le seguenti opzioni:
                        </label>

                        <select name="filter_parking" id="filter_parking" class="form-select">
                            <option value="all"> Tutti </option>
                            <option value="true"> Con Parcheggio </option>
                            <option value="false"> Senza Parcheggio </option>
                        </select>

                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-filter"></i>
                        Filtra
                    </button>

                </form>

                <table class="table mt-3">

                    <thead>
                        <tr>

                            <th scope="col"> Nome </th>
                            <th scope="col"> Descrizione </th>
                            <th scope="col"> Parcheggio </th>
                            <th scope="col"> Voto </th>
                            <th scope="col"> Distanza dal Centro </th>

                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        $hotels = [
                            [
                                'name' => 'Hotel Belvedere',
                                'description' => 'Hotel Belvedere Descrizione',
                                'parking' => true,
                                'vote' => 4,
                                'distance_to_center' => 10.4
                            ],
                            [
                                'name' => 'Hotel Futuro',
                                'description' => 'Hotel Futuro Descrizione',
                                'parking' => true,
                                'vote' => 2,
                                'distance_to_center' => 2
                            ],
                            [
                                'name' => 'Hotel Rivamare',
                                'description' => 'Hotel Rivamare Descrizione',
                                'parking' => false,
                                'vote' => 1,
                                'distance_to_center' => 1
                            ],
                            [
                                'name' => 'Hotel Bellavista',
                                'description' => 'Hotel Bellavista Descrizione',
                                'parking' => false,
                                'vote' => 5,
                                'distance_to_center' => 5.5
                            ],
                            [
                                'name' => 'Hotel Milano',
                                'description' => 'Hotel Milano Descrizione',
                                'parking' => true,
                                'vote' => 2,
                                'distance_to_center' => 50
                            ]
                        ];

                        $filterValue = isset($_GET['filter_parking']) ? $_GET['filter_parking'] : 'all';

                        if ($filterValue !== 'all') {
                            $filteredHotels = array_filter($hotels, function ($hotel) use ($filterValue) {
                                return $hotel['parking'] == ($filterValue === 'true');
                            });
                        } else {
                            $filteredHotels = $hotels;
                        }

                        foreach ($filteredHotels as $hotel) : ?>

                            <tr>

                                <td><?php echo $hotel['name']; ?> </td>
                                <td><?php echo $hotel['description']; ?> </td>
                                <td><?php echo $hotel['parking'] ? '<i class="fas fa-parking"></i>' : '<i class="fas fa-times-circle"></i>'; ?> </td>
                                <td><?php echo $hotel['vote']; ?> <i class="fas fa-star"></i> </td>
                                <td><?php echo $hotel['distance_to_center']; ?> km <i class="fas fa-map-marker-alt"></i> </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>
                 
        </main>

        <!-- ! BOOTSTRAP JS -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </body>

</html>