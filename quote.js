fetch('assets/js/quotes.json')
    .then(res => res.json())
    .then(data => {
        const randomIndex = Math.floor(Math.random() * data.length);
        document.getElementById('quoteText').innerText = data[randomIndex].text;
    })
    .catch(err => {
        document.getElementById('quoteText').innerText = "Failed to load quote.";
        console.error(err);
    });
