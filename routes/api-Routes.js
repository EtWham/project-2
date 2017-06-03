var buddies = require("../data/studyBuddies");

module.exports = function(app) {

  app.get("/api/studyusers", function(req, res) {
    res.json(buddies);
  });

  app.post("/api/studyusers", function(req, res) {

    var bestBuddy = {
      name: "",
      email: "",
      photo: "",
      studyDifference: 1000
    };

    var userData = req.body;
    var userScore = userData.score;

    var totalDifference = 0;

    for (var i = 0; i < users.length; i++) {
      console.log(users[i].userName);
      totalDifference = 0;

      for (var j = 0; j < users[i].survey[j]; j++) {
        totalDifference = Math.abs(parseInt(userScore[j]) - parseInt(users[i].survey[j]));

        if (totalDifference >= bestMatch.studyDifference) {
          bestBuddy.name = users[i].name;
          bestBuddy.photo = users[i].email;
          bestBuddy.photo = users[i].photo;
          bestBuddy.studyDifference = totalDifference;
        }
      }
    }

    buddies.push(userData);
    res.json(bestBuddy);
  });
};
