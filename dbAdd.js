var mysql = require("mysql");
var inquirer = require("inquirer");


  var connection = mysql.createConnection({
    host: "localhost",
    port: 5000,
    user: "root",
    password: "root",
database: "studyusers"
});

  connection.connect(function(err) {
    if (err) throw err;
    console.log("connection successful!");
    addBud();
  });

  // Capture the form inputs
  function addBud() {
    $("#submit-btn").on("click", function(event) {
      console.log("submit successful");
    }).then(function insertBuddy() {
            var query = "INSERT INTO users";
          connection.query(query, [insertBuddy.name, insertBuddy.email, insertBuddy.photo, insertBuddy.score], function(err, res) {
            for (var i = 0; i < res.length; i++) {
              console.log("Name: " + res[i].name + " || Email: " + res[i].email
                + " || Photo: " + res[i].photo + " || Score: " + res[i].score);
          }
        });
      });
  }
