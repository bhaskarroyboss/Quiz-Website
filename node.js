const express = require('express');
const bodyParser = require('body-parser');

const app = express();
const PORT = 3000;

let dataForPage2 = null;

app.use(bodyParser.json());

// Endpoint to receive data from Page 1
app.post('/update-data', (req, res) => {
    dataForPage2 = req.body.data;
    res.sendStatus(200);
});

// Endpoint to serve data to Page 2
app.get('/get-data', (req, res) => {
    res.json({ data: dataForPage2 });
});

app.listen(PORT, () => {
    console.log(`Server listening on port ${PORT}`);
});
