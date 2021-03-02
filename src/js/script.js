function my_alert(e) {
    console.log(e);
    alert('OK ' + e);
}

function myConfirm() {
    console.warn('Yes or no are the only options');
    const reply = confirm('Do you want to quit while you are ahead');
    const quitDiv = document.getElementById('quit');
    quitDiv.innerHTML = "The boolean value of this confirmation dialog is: " + reply;
}

function myPrompt() {
    const answer = prompt('What is your favorite food?');
    const foodDiv = document.getElementById('food');
    foodDiv.innerHTML = 'Favorite food: ' + answer;
}

function displayGuitars() {
    const guitarDisplay = document.getElementById('guitars');
    const choice = prompt('Welke gitaar wil je zien (stratocaster/telecaster)');

    let tableHeader = `<table class="table"><theader><th>Brand</th><th>Model</th><th>Price</th></theader>`;
    /*
     Higher order function 'filter' in Functional programming -- Function takes another function as an argument
     Could have been written as function(guitar) { return guitar.model === choice }
     Returns: array
    */
    chosenGuitars = guitars.filter(g => g.model === choice);

    console.log(chosenGuitars);

    let tableBody = `<tbody>`;
    let content = '';

    chosenGuitars.forEach(row => {
            // Destructuring an object. Can be a subset of the fields
            let {brand, model, price} = row;
            content += `<tr><td>${brand}</td><td>${model}</td><td>${price}</td></tr>`;
        }
    );
    tableBody += content + '</tbody></table>';

    // Display table if a guitar was actually chosen.If not just return Not found
    guitarDisplay.innerHTML = (chosenGuitars) ? tableHeader + tableBody : 'Not found';
}


// Function map && forEach loop with multiline lambda
function mapGuitars() {
    // Mapping the guitar object to just its model
    guitars.map(g => g.model)
        // For each model write to div
        .forEach(model => {
            const mapElement = document.getElementById('guitarMap');
            mapElement.innerHTML += model + '<br>';
        });
}

// Array of objects in Javascript Standard Object Notiation or JSON
const guitars = [
    {
        brand: 'fender',
        model: 'stratocaster',
        price: 2000.00
    },
    {
        brand: 'fender',
        model: 'telecaster',
        price: 2500.00
    },
    {
        brand: 'cort II',
        model: 'stratocaster',
        price: 700.00
    }
];
