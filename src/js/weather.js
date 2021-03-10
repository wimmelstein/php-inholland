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
                        const currentDiv = document.getElementById('current');
                        const descriptionDiv = document.getElementById('description');
                        locationDiv.innerHTML = `Your city is: ${data.name}`;
                        currentDiv.innerHTML = `Temperature: ${Math.round(data.main.temp - 275.15, 2)}&#176;`
                        descriptionDiv.innerHTML = `Description: ${data.weather[0].description}`
                    });
            })
    },
    (error) => console.log('Something went wrong')
);

