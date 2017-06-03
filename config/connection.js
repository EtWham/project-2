//requiring mysql
var mysql = require("mysql");
var connection;
//still don't quite understand jawsDB just following the pdf
if(process.env.JAWSDB_URL){
	connection = mysql.createConnection(process.env.JAWSDB_URL);
}
else{
	connection = mysql.createConnection({
		port: 3306,
		host: 'localhost',
		user: 'root',
		password: 'root',
		database: 'studyUsers'
	});
};
//checking the connection
connection.connect(function(err){
	if(err){
		console.log(err);
	}
	else{
		console.log('connected as id: ' + connection.threadId);
	}
});
//exporting the connection
module.exports = connection;
