navigator.geolocation.getCurrentPosition(pos => {
        const latitude = pos.coords.latitude;
        const longitude = pos.coords.longitude;
        let apiKey;

        fetch('http://localhost/api-key.php')
            .then(function (response) {
                return response.json()
            })
            .then(function (data) {
                apiKey = data.API_KEY;
                url = `https://api.openweathermap.org/data/2.5/weather?appid=${apiKey}&lat=${latitude}&lon=${longitude}`;
                fetch(url)
                    .then(response => response.json())
                    .then((data) => {
                        const locationDiv = document.getElementById('location');
                        const temperature = Math.round(data.main.temp - 275.15, 2);
                        const feelsLike = Math.round(data.main.feels_like - 275.15, 2);
                        const description = data.weather[0].description;
                        const locationName = data.name;
                        locationDiv.innerHTML = `${locationName}: ${description}: ${temperature}&#176;: feels like ${feelsLike} `;
                    });
            })
    },
    (error) => console.log('Something went wrong: ' + error.message)
);

