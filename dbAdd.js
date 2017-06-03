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
  });

  // Chosen CSS
  var config = {
    ".chosen-select": {},
    ".chosen-select-deselect": {
      allow_single_deselect: true
    },
    ".chosen-select-no-single": {
      disable_search_threshold: 10
    },
    ".chosen-select-no-results": {
      no_results_text: "Oops, nothing found!"
    },
    ".chosen-select-width": {
      width: "95%"
    }
  };

  for (var selector in config) {
    $(selector).chosen(config[selector]);
  }
  // Capture the form inputs
  $("#submit-btn").on("click", function(event) {
    event.preventDefault();
    // Form validation
    function validateForm() {
      var isValid = true;
      $(".form-control").each(function() {
        if ($(this).val() === "") {
          isValid = false;
        }
      });

      $(".chosen-select").each(function() {
        if ($(this).val() === "") {
          isValid = false;
        }
      });
      return isValid;
    }
    // If all required fields are filled
    if (validateForm()) {
      // Create an object for the user"s data

      var userData = {
        name: $("#userName").val(),
        email: $("#userEmail").val(),
        photo: $("#userImage").val(),
        score: [
          $("#survey1").val(),
          $("#survey2").val(),
          $("#survey3").val(),
          $("#survey4").val(),
          $("#survey5").val()
        ]
      };

      $.post("/api/studyusers", userData, function(data) {
        // Grab the result from the AJAX post so that the best match's name and photo are displayed.
        $("#buddyName").text(data.name);
        $("#buddyEmail").text(data.email);
        $("#buddyImage").attr("src", data.photo);
        // Show the modal with the best match
        $("#modal-results").modal("toggle");
      });
    } else {
      alert("Please fill out all fields before submitting!");
    }
  }).then(function insertBuddy() {
          var query = "INSERT INTO studyusers";
        connection.query(query, [insertBuddy.name, insertBuddy.email, insertBuddy.photo, insertBuddy.score], function(err, res) {
          for (var i = 0; i < res.length; i++) {
            console.log("Name: " + res[i].name + " || Email: " + res[i].email
              + " || Photo: " + res[i].photo + " || Score: " + res[i].score);
        }
      });
    });
