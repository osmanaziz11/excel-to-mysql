<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel - Mysql</title>
    <!-- Boostrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assects/css/style.css">
</head>


<body>
    <div class="container my-4 shadow rounded">

        <div class="row">
            <div class="col-4   py-3 d-flex justify-content-center align-items-center">
                <form action="data.php" onsubmit="event.preventDefault();upload_file(this);" class="d-flex"
                    method="post" enctype="multipart/form-data">
                    <input class="form-control" name="import_file" type="file" id="formFile" required>
                    <button type="submit" name="import_file_btn" class="mx-3 btn btn-dark">
                        Upload
                    </button>
                </form>
            </div>
            <div class="col-6  py-3 d-flex  align-items-center justify-content-center">

                <p id="msg" class="m-0 text-center">
                    Choose your excel file with valid extension.
                </p>

            </div>
            <div class="col-2 py-3  d-flex justify-content-center align-items-center">
                <button class="btn btn-danger" onclick="displayData()">Display Data</button>
            </div>
        </div>

    </div>
    <div class="container shadow">
        <div class="row">
            <div class="col overflow-scroll">
                <table class="table w-100">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Last</th>
                            <th scope="col">Last</th>
                            <th scope="col">Last</th>
                            <th scope="col">Last</th>
                            <th scope="col">Last</th>
                            <th scope="col">Last</th>
                            <th scope="col">Last</th>
                            <th scope="col">Last</th>
                            <th scope="col">Last</th>
                            <th scope="col">Last</th>
                            <th scope="col">Last</th>
                            <th scope="col">Last</th>
                            <th scope="col">Last</th>
                            <th scope="col">Last</th>
                            <th scope="col">Last</th>
                            <th scope="col">Last</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdolorem232222233333333333333333</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="assects/Js/jquery.js"></script>
    <script src="assects/Js/custom.js"></script>
</body>

</html>