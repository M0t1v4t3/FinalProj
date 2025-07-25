<?php include('header.php'); ?>
<main>
    <h2>Stray Community Map</h2>
    <p style="text-align: center; margin-bottom: 2rem; color: #666;">
        Use our interactive map to report stray animals in your area or find nearby rescue centers.
    </p>
    
    <div class="map-container">
        <iframe src="https://www.google.com/maps/d/embed?mid=YOUR_CUSTOM_MAP_ID" 
                width="100%" height="480" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
    
    <div style="text-align: center; margin-top: 2rem;">
        <a href="#" class="btn">Report a Stray Animal</a>
    </div>
</main>
<?php include('footer.php'); ?>
