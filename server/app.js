const express = require('express');
const app = express();
const cors = require('cors');
const dotenv = require('dotenv');
dotenv.config();

const dbService = require('./dbservice');

app.use(cors());
app.use(express.json());
app.use(express.urlencoded({ extended: false }));


// create


// read
app.get('/getAll', (request, response) => {
    const db = dbService.getDbServiceInstance();

    const result = db.getAllData();

    result
    .then(data => response.json({data: data}))
    .catch(err => console.log(err));
    
})


app.get('/search/:name', (request, response) => {
    const { name } = request.params;
    const db = dbService.getDbServiceInstance();

    const result = db.searchByName(name);

    result
    .then(data => response.json({data: data}))
    .catch(err => console.log(err));
})
// update


// delete

app.listen(process.env.PORT, () => console.log("app is running!"));