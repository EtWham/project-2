var path = require("path");

// Routes
// =============================================================
module.exports = function(app) {

  // Each of the below routes just handles the HTML page that the user gets sent to.

  //homepage route
  app.get("/", function(req, res) {
    res.sendFile(path.join(__dirname + "/../public/HomePage.html"));
  });
  //login route
  app.get("/login", function(req, res) {
    res.sendFile(path.join(__dirname + "/../public/Login.html"));
  });
  //about route
  app.get("/aboutUs", function(req, res) {
    res.sendFile(path.join(__dirname + "/../public/about.html"));
  });
  //survey route
  app.get("/survey", function(req, res) {
    res.sendFile(path.join(__dirname + "/../public/survey.html"));
  });
  //general chat room route
  app.get("/chat", function(req, res) {
    res.sendFile(path.join(__dirname + "/../public/chatroom.html"));
  });
  //coding chat room route
  app.get("/coding", function(req, res) {
    res.sendFile(path.join(__dirname + "/../public/chatroom.html"));
  });
  //algebra chat room route
  app.get("/algebra", function(req, res) {
    res.sendFile(path.join(__dirname + "/../public/chatroom.html"));
  });
  //calculus chat room route
  app.get("/calculus", function(req, res) {
    res.sendFile(path.join(__dirname + "/../public/chatroom.html"));
  });
  //physics chat room route
  app.get("/physics", function(req, res) {
    res.sendFile(path.join(__dirname + "/../public/chatroom.html"));
  });
  //history chat room route
  app.get("/history", function(req, res) {
    res.sendFile(path.join(__dirname + "/../public/chatroom.html"));
  });
};
