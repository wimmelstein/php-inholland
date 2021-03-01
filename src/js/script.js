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

    let text = '<table class="table">';
    /*
     Higher order function filter in Functional programming -- Function takes another function as an argument
     Could have been written as function(guitar) { return guitar.model === choice }
    */
    const chosenGuitars = guitars.filter(g => g.model === choice);

    // Higher order function map
    const content = chosenGuitars.map(guitar => transformToText(guitar));

    text += content;
    text += '</table>';

    // Display table if a guitar was actually chosen.If not just return Not found
    guitarDisplay.innerHTML = (content.length) ? text : 'Not found';
}

function transformToText(guitar) {
    return `<tr><td>${guitar.brand}</td><td>${guitar.model}</td><td>${guitar.price}</td></tr>`;
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
    }
];
