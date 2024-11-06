<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f9fc;
        }

        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .btn-search {
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s ease;
        }

        .btn-search:hover {
            background-color: #0056b3;
        }

        .img-thumbnail {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }

        .alert {
            border-radius: 10px;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.3s ease;
        }

        .back-btn,
        .upload-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
            display: none;
        }

        .back-btn:hover,
        .upload-btn:hover {
            background-color: #218838;
        }

        .action-btn {
            color: #dc3545;
            cursor: pointer;
        }

        .action-btn:hover {
            text-decoration: underline;
        }

        .upload-btn {
            display: block;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Uploaded Images</h2>

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif

        <div class="mb-4 d-flex justify-content-between align-items-center">
            <div class="input-group w-50">
                <input type="text" id="search" class="form-control" placeholder="Search by Product ID" aria-label="Search by Product ID">
                <button class="btn btn-search" onclick="searchImages()">Search</button>
            </div>
            <a href="{{ url('/images/upload') }}" class="btn upload-btn">Go to Upload Page</a>
        </div>

        <a href="{{ url('/images') }}" class="back-btn" id="backBtn">Back to All Images</a>

        <table class="table table-bordered table-striped table-hover mt-3">
            <thead class="table-primary">
                <tr>
                    <th>Sequence ID</th>
                    <th>Image</th>
                    <th>File Path</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="imageTableBody">
                @php $counter = 1; @endphp
                @foreach($images as $image)
                <tr class="imageRow" id="imageRow{{ $image->id }}">
                    <td>{{ $counter++ }}</td>
                    <td><img src="{{ asset('storage/' . $image->filepath) }}" alt="Image" class="img-thumbnail"></td>
                    <td>{{ $image->filepath }}</td>
                    <td>
                        <button class="btn btn-sm action-btn" onclick="deleteImage({{ $image->id }})">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function searchImages() {
            let input = document.getElementById('search').value.toLowerCase();
            let rows = document.querySelectorAll('.imageRow');

            let matchFound = false;

            rows.forEach(function(row) {
                let productId = row.cells[0].innerText.toLowerCase();
                if (productId.includes(input)) {
                    row.style.display = '';
                    matchFound = true;
                } else {
                    row.style.display = 'none';
                }
            });

            if (matchFound) {
                document.getElementById('backBtn').style.display = 'block';
            } else {
                document.getElementById('backBtn').style.display = 'none';
            }
        }

        // // function deleteImage(id) {
        // //     if (confirm('Are you sure you want to delete this image?')) {
        // //         fetch(`/images/${id}/delete`, {
        // //             method: 'DELETE',
        // //             headers: {
        // //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        // //             }
        // //         })
        // //         .then(response => response.json())
        // //         .then(data => {
        // //             if (data.success) {
        // //                 document.getElementById('imageRow' + id).remove();
        // //                 alert('Image deleted successfully!');
        // //             } else {
        // //                 alert(data.message || 'Failed to delete image!');
        // //             }
        // //         })
        // //         .catch(error => {
        // //             alert('Error: ' + error);
        // //         });
        // //     }
        // }
    </script>

</body>

</html>
