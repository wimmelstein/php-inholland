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
                        locationDiv.innerHTML = `${data.name}: `;
                        locationDiv.innerHTML += `${data.weather[0].description}: `;
                        locationDiv.innerHTML += `${Math.round(data.main.temp - 275.15, 2)}&#176;`
                    });
            })
    },
    (error) => console.log('Something went wrong: ' + error.message)
);

