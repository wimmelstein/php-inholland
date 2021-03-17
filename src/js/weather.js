window.addEventListener('DOMContentLoaded', getWeatherData);

function getWeatherData() {
    navigator.geolocation.getCurrentPosition(pos => {
            const KELVIN = 273.15;
            const latitude = pos.coords.latitude;
            const longitude = pos.coords.longitude;

            fetch('http://localhost/api-key.php')
                .then(function (response) {
                    return response.json()
                })
                .then(function (data) {
                    const apiKey = data.API_KEY;
                    url = `https://api.openweathermap.org/data/2.5/weather?appid=${apiKey}&lat=${latitude}&lon=${longitude}`;
                    fetch(url)
                        .then(response => response.json())
                        .then((data) => {
                            const locationDiv = document.getElementById('location');
                            const temperature = Math.round((data.main.temp - KELVIN), 2);
                            const feelsLike = Math.round((data.main.feels_like - KELVIN), 2);
                            const description = data.weather[0].description;
                            const locationName = data.name;
                            locationDiv.innerHTML = `${locationName}: ${description}: ${temperature}&#176;: feels like ${feelsLike} `;
                        });
                })
        },
        (error) => console.log('Something went wrong: ' + error.message)
    );
}
function getWidget(apiKey) {
    document.write('<script type="text/javascript" src="./openweathermap-theme-d3.js"></script>')();
    window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];
    window.myWidgetParam.push({
        id: 11,
        cityid: '2751980',
        appid: `${apiKey}`,
        units: 'metric',
        containerid: 'openweathermap-widget-11',
    });
    console.log(window.myWidgetParam);
    (function () {
        var script = document.createElement('script');
        script.async = true;
        script.src = "./widget-generator.js";
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(script, s);
    })();
}



