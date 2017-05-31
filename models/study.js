// Dependencies
// =============================================================

// This may be confusing but here Sequelize (capital) references the standard library
var Sequelize = require("sequelize");
// sequelize (lowercase) references our connection to the DB.
var sequelize = require("../config/config.json");

// Creates a model that matches up with DB
module.exports = function(sequelize, DataTypes) {
  var StudyUsers = sequelize.define("studyUsers", {
    userName: {
      type: Sequelize.STRING
    },
    class: {
      type: Sequelize.STRING
    },
    userStatus: {
      type: Sequelize.STRING
    },
    survey: {
      type: Sequelize.INTEGER
    }
  }, {
    timestamps: false
  });
  return StudyUsers;
};

// Makes the model available for other files (will also create a table)
