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
  //chat room route
  app.get("/chat", function(req, res) {
    res.sendFile(path.join(__dirname + "/../public/chatroom.html"));
  });
};
