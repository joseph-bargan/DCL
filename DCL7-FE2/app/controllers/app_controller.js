var path = require('path');

var mysql = require('mysql');
var x = 0;


//Controller functions called on by the route script

exports.home= function(req,res){
    res.render('login.html');
}

exports.blank = function(req,res){
  res.render('blank.html');
}


exports.login = function(req,res){

  console.log(req.body);
  res.send("Log in Sucess! \n"
  + req.body.username
  + req.body.password
  );

}

exports.signup = function(req,res){


    res.render('register.html');
}

exports.newuser = function(req,res){
  console.log(req.body);
  res.send("Registration sucess! <br>"
  + req.body.firstName
  +"<br>"
  + req.body.lastName
  +"<br>"
  + req.body.username
  +"<br>"
  + req.body.password
  +"<br>"
  + req.body.email
  +"<br>"
  + req.body.phone_number
  +"<br>"
  + req.body.user_type
  );
}
