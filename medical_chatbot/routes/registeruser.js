const express = require('express');
const routes = express.Router();
const authControllers = require('../controllers/registeruser');

routes.post('/index', authControllers.register);
//routes.post('/', authController.login);


module.exports=routes;
