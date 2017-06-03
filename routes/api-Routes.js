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

    for (var i = 0; i < buddies.length; i++) {
      console.log(buddies[i].name);
      totalDifference = 0;

      for (var j = 0; j < buddies[i].score[j]; j++) {
        totalDifference += Math.abs(parseInt(userScore[j]) - parseInt(buddies[i].score[j]));
        console.log(totalDifference);

        if (totalDifference <= bestBuddy.studyDifference) {
          bestBuddy.name = buddies[i].name;
          bestBuddy.email = buddies[i].email;
          bestBuddy.photo = buddies[i].photo;
          bestBuddy.studyDifference = totalDifference;
        }
      }
    }

    buddies.push(userData);
    res.json(bestBuddy);
  });
};
