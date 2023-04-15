const express = require('express');
const routes = express.Router();
const authController = require('../controllers/auth');

//routes.post('/', authController.register);
routes.post('/dashboard', authController.login);


module.exports=routes;
