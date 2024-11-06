<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        .demo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
            background-color: #f8f9fa;
        }

        .btn-demo {
            padding: 10px 30px;
            font-size: 1.2rem;
            border-radius: 25px;
        }

        .btn-demo:hover {
            background-color: #28a745;
            color: white;
        }

        h1 {
            font-family: 'Arial', sans-serif;
            color: #007bff;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>
    <div class="demo-container">
        <div>
            <h1 data-aos="fade-up">Welcome to the Image Upload Site!</h1>
            <p data-aos="fade-up" data-aos-delay="200">Do you want to upload an image?</p>
            <a href="{{ route('images.upload') }}" class="btn btn-demo btn-primary" data-aos="fade-up" data-aos-delay="400">
                Yes, Upload Image
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.0/gsap.min.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
