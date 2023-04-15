const mysql=require('mysql');
const jwt = require('jsonwebtoken');
const bcrypt = require('bcryptjs');
const db = mysql.createConnection({
    host: process.env.DATABASE_HOST,
    user: process.env.DATABASE_USER,
    password: process.env.DATABASE_PASSWORD,
    database: process.env.DATABASE
  });



exports.register = (req, res) => {
    const {name, mobile, email, passwoed, cpassword, dob, signup} = req.body;
    db.query('SELECT email FROM register where email=?',[email], async (error, results) =>{
        if(error){
            console.log(error);

        }
        if(results.length > 0){
            return res.render('index',{
               message: 'Email is already Taken' 
            });
        } else if( passwoed !== cpassword ){
            return res.render('index',{
                message: 'Password Not Match' 
             });
        }

       let hashedPassword= await bcrypt.hash(passwoed, 8);
       db.query('INSERT INTO register SET ?', {name:name, mobile:mobile, email:email, password:hashedPassword, dob:dob}, (error,results) =>{
        if(error){
            console.log(error);

        }else{
            return res.render('index',{
                message: 'Register Successfully' 
             });
            
        }
       })

    });
    }