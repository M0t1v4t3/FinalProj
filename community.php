<?php include('header.php'); ?>
<main>
    <h2>Stray Community Map</h2>
    <p style="text-align: center; margin-bottom: 2rem; color: #666;">
        Use our interactive map to report stray animals in your area or find nearby rescue centers.
    </p>

    <style>
        .map-container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            border: 2px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background-color: #009688;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #00796b;
        }
    </style>
    
    <div class="map-container">
    <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1L3NceLanxq8T-XK_cSafj7dYj6Pe67A&ehbc=2E312F" width="640" height="480"></iframe>
                
        </iframe>
    </div>
    
    <div style="text-align: center; margin-top: 2rem;">
        <a href="https://forms.gle/your-report-form" class="btn">Report a Stray Animal</a>
    </div>
</main>
<?php include('footer.php'); ?>
