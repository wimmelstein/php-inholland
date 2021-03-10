fetch('http://time.jsontest.com')
    .then(res => res.json())
    .then((out) => {
        console.log('Output: ', out);
        const myDiv = document.getElementById('message');
        myDiv.innerHTML = `Date: ${out.date}. Time: ${out.time}. Epoch: ${out.milliseconds_since_epoch}`;
    }).catch(err => console.error(err)
);
