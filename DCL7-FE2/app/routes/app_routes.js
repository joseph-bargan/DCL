'use strict';
module.exports = function (app) {
    const index = require("../controllers/app_controller");

    //URL routes

    app.get('/', index.home);

    app.post('/login', index.login);

    app.get('/register', index.signup);

    app.post('/newuser', index.newuser);

    app.get('/blank', index.blank);

};