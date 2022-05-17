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
    <div id="loader" class="loadingio-spinner-double-ring-3gve14ylw7q d-none">
        <div class="ldio-n0pe35l796m">
            <div></div>
            <div></div>
            <div>
                <div></div>
            </div>
            <div>
                <div></div>
            </div>
        </div>
    </div>
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
                <button id="disp_data_btn" class="btn btn-danger" onclick="menuOpen()" disabled>Display Data</button>
            </div>
        </div>

    </div>
    <div class="container my-3">
        <div class="row">
            <div id="menuOpen" class="col d-flex justify-content-around overflow-hidden h-0">
                <button class="border-0 p-2 px-4 mb-3 shadow" onclick="displayData()">Users Information</button>
                <button class="border-0 p-2 px-4 mb-3 shadow">Users Paid History</button>
                <button class="border-0 p-2 px-4 mb-3 shadow">Users Total</button>
            </div>
        </div>
    </div>
    <div class="container shadow my-3">

        <div class="row">
            <div class="col overflow-scroll" style="max-height:500px;">
                <table class="table w-100">
                    <thead>
                        <tr>
                            <th class="px-4 text-center" scope="col">S.No</th>
                            <th class="px-4 text-center" scope="col">Name</th>
                            <th class="px-4 text-center" scope="col">Phone</th>
                            <th class="px-4 text-center" scope="col">Email</th>
                            <th class="px-4 text-center" scope="col">Provider</th>
                            <th class="px-4 text-center" scope="col">Reseller</th>
                            <th class="px-4 text-center" scope="col">Activated On</th>
                            <th class="px-4 text-center" scope="col">Renewed On</th>
                            <th class="px-4 text-center" scope="col">System Expiry</th>
                            <th class="px-4 text-center" scope="col">Mac Address</th>
                            <th class="px-4 text-center" scope="col">User</th>
                            <th class="px-4 text-center" scope="col">Status</th>
                            <th class="px-4 text-center" scope="col">BF Months</th>
                            <th class="px-4 text-center" scope="col">Balance Months</th>
                            <th class="px-4 text-center" scope="col">BF$$$</th>
                            <th class="px-4 text-center" scope="col">Payment Status</th>
                            <th class="px-4 text-center" scope="col">Comments</th>
                            <th class="px-4 text-center" scope="col">Paid Till</th>
                            <th class="px-4 text-center" scope="col">Box Price</th>
                            <th class="px-4 text-center" scope="col">Actual Renew</th>
                            <th class="px-4 text-center" scope="col">Months Bought</th>
                        </tr>
                    </thead>
                    <tbody id="data_row">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="assects/Js/jquery.js"></script>
    <script src="assects/Js/custom.js"></script>
</body>

</html>