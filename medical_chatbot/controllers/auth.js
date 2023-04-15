const mysql=require('mysql');
const jwt = require('jsonwebtoken');
const bcrypt = require('bcryptjs');
const session = require('express-session');

const db = mysql.createConnection({
    host: process.env.DATABASE_HOST,
    user: process.env.DATABASE_USER,
    password: process.env.DATABASE_PASSWORD,
    database: process.env.DATABASE
  });

  exports.login = async (req, res) => {
      try{
       // console.log(req.body);
          const {email, password, login} =req.body;
          if(!email || !password){
            return res,status(400).render('index',{
                message:'Email and password should not be blank'
            })
          }
            db.query('SELECT * FROM register where email=?', [email], async(error,results) => {
                //console.log(results[0].password);
                const dd=bcrypt.compare(password, results[0].password);
               // console.log(dd);
                if(!results || !(await bcrypt.compare(password, results[0].password))){
                    res.status(401).render('index',{
                        message:'Email or password is incorrect!!'
                    })
                }else{
                    const id= results[0].id;
                    //console.log(id);
                    const token =jwt.sign({ id },process.env.JWT_SECRET,{
                        expiresIn:process.env.JWT_EXPIRES_IN
                    });
                   // console.log(token);
                    const cookieOptions = {
                        expires:new Date(
                            Date.now()+ process.env.JWT_COOKIE_EXPIRES * 24 * 60 * 60 * 1000  
                        ),
                        httponly: true
                    }
                    req.session.email = email;
                   
                    res.cookie('jwt', token, cookieOptions);
                    res.status(200).redirect('/dashboard');
                }
            });
      } catch(error){
        console.log(error);
      }
  }

  