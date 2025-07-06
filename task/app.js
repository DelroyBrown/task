document.addEventListener('DOMContentLoaded', function () {
    // Weather API
    const button = document.getElementById('weather-btn');
    if (button) {
        button.addEventListener('click', function () {
            const lat = document.getElementById('weather-lat').value;
            const lng = document.getElementById('weather-lng').value;

            fetch(`api/weather.php?lat=${lat}&lng=${lng}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('results').textContent = JSON.stringify(data, null, 2);
                })
                .catch(err => {
                    document.getElementById('results').textContent = `Error: ${err.message}`;
                });
        });
    }

    // Country API
    const countryBtn = document.getElementById('country-btn');
    if (countryBtn) {
        countryBtn.addEventListener('click', function () {
            const code = document.getElementById('country-code').value;

            fetch(`api/country.php?code=${code}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('results').textContent = JSON.stringify(data, null, 2);
                })
                .catch(error => {
                    document.getElementById('results').textContent = 'Error: ' + error.message;
                });
        });
    }

    // Earthquakes API
    const earthquakeBtn = document.getElementById('earthquake-btn');
    if (earthquakeBtn) {
        earthquakeBtn.addEventListener('click', function () {
            const north = document.getElementById('eq-north').value;
            const south = document.getElementById('eq-south').value;
            const east = document.getElementById('eq-east').value;
            const west = document.getElementById('eq-west').value;

            fetch(`api/earthquake.php?north=${north}&south=${south}&east=${east}&west=${west}`)
                .then(response => {
                    if (!response.ok || !response.headers.get('content-type').includes('application/json')) {
                        throw new Error('Non=JSON response received');
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('results').textContent = JSON.stringify(data, null, 2);
                })
                .catch(error => {
                    document.getElementById('results').textContent = 'Error: ' + error.message;
                });
        });
    }

    // Nearby Postcodes API
    const postcodeBtn = document.getElementById('postcode-btn');
    if (postcodeBtn) {
        postcodeBtn.addEventListener('click', function () {
            const lat = document.getElementById('postcode-lat').value;
            const lng = document.getElementById('postcode-lng').value;

            fetch(`api/postcode.php?lat=${lat}&lng=${lng}`)
                .then(response => {
                    if (!response.ok || !response.headers.get('content-type').includes('application/json')) {
                        throw new Error('Non-Error response receieved');
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('results').textContent = JSON.stringify(data, null, 2)
                })
                .catch(error => {
                    document.getElementById('results').textContent = 'Error: ' + error.message;
                });
        });
    }

});
