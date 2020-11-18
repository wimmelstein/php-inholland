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
    const choice = prompt('Welke gitaar wil je zien');

    let text = '<table class="my-table">';
    const chosenGuitars = guitars.filter(e => e.model === choice);
    console.log(chosenGuitars);
    chosenGuitars.forEach(guitar => {
        text += transformText(guitar);
    });
    text += '</table>';
    guitarDisplay.innerHTML = text;

};

function transformText(guitar) {
    console.log(guitar);
    return `<tr><td>${guitar.brand}</td><td>${guitar.model}</td><td>${guitar.price}</td></tr>`;
}


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