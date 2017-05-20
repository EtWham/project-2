//bringing in connection from connection.js
var connection = require("./connection.js");

var orm = {
  //retrieving all users
	selectAll: function(seeAll){
		connection.query('SELECT * FROM Users', function(err, data){
			if(err){
				console.log('Error: ' + err);
			}
			seeAll(data);
		});
	},
  //inserting a new user into the table of all users
	insertOne: function(newUser){
		connection.query('INSERT INTO Users (userName, classes, userStatus) VALUES (?, ?, ?)', newUser, function(err){
			if(err){
				console.log('Error: ' +  err);
			}
		});
	},
  //updating a user by reuploading their list of classes
	updateOne: function(updateClasses){
		connection.query('UPDATE Users SET classes = ? WHERE userName = ?', updateClasses, function(err){
			if(err){
				console.log('Error: ' + err);
			}
		});
	},
	//updating a user by changing their status of asking for help or offering help to others
	updateOne: function(updateStatus){
		connection.query('UPDATE Users SET userStatus = ? WHERE userName = ?', updateStatus, function(err){
			if(err){
				console.log('Error: ' + err);
			}
		});
	}
};
//exporting orm
module.exports = orm;
