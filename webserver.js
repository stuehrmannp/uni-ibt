var http = require('http');
http.createServer(
    function (req,res){
     res.write('Nodejs started using xampp');
    res.end();}).listen(8080);
console.log('http server started'); 

const {createPool} = require('mysql');

const pool = createPool({
    host: "localhost",
    user: "root",
    password: "Ihkibt3",

})

pool.query(`select * from stadion`, (err, res) => {
    return console.log(res);
})