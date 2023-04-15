const express = require('express');
const app = express();
const session = require('express-session');
const bodyParser = require('body-parser');
const http = require('http').Server(app);
const io = require('socket.io')(http);
const path=require('path');
const mysql=require('mysql');
const dotenv=require('dotenv');
const cookieParser = require('cookie-parser');


var natural = require('natural');
var classifier = new natural.BayesClassifier();



dotenv.config({ path: './.env'});

const db = mysql.createConnection({
  host: process.env.DATABASE_HOST,
  user: process.env.DATABASE_USER,
  password: process.env.DATABASE_PASSWORD,
  database: process.env.DATABASE
});

app.use(session({
  secret:'secret',
  resave:false,
  saveUninitialized:true,
  cookie:{
    maxAge:60 * 1000 * 30
  }
}));
app.use(bodyParser.urlencoded({extended : true}));
app.use(bodyParser.json()); 


const publicDirectory = path.join(__dirname,'./public');

app.use(express.static(publicDirectory));

//parsing url encoded bodies sent from HTMl Form
app.use(express.urlencoded({extended: false}));
app.use(express.json());
app.use(cookieParser());
app.set('view engine','hbs');

db.connect((error)=>{
if(error){
  console.log(error);

}else{
  console.log("connected");
}

})

const port = 3000;

//define routes
app.use('/', require('./routes/pages'));
app.use('/', require('./routes/auth'));
app.use('/', require('./routes/registeruser'));



io.on('connection', function(socket){
  console.log('a user connected');
  socket.on('joined', function(data) {
      console.log(data);
      socket.emit('acknowledge', 'Acknowledged');
  });
 
  const time = new Date();
  const formattedTime = time.toLocaleString("en-US", { hour: "numeric", minute: "numeric" })
  socket.on('chat message', function(msg){
      console.log('message: ' + msg);

      natural.BayesClassifier.load('nvclassifier.json',null,function(err,classifier){
      //  console.log(classifier.classify("weepiness"));
        socket.emit('response message', classifier.classify(msg) + '~' + formattedTime);
      })

     
      //socket.broadcast.emit('response message', msg + '  from server');
  });
});

// Add a connect listener
http.listen(port, () => {
  console.log(`app listening at http://localhost:${port}`)
});
