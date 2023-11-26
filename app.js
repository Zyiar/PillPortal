const express = require('express');
const mysql = require('mysql');

const app = express();
const port = 5000;

// Create MySQL connection
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'simpleAppDB',
});

db.connect((err) => {
  if (err) {
    console.error('Error connecting to MySQL: ' + err.stack);
    return;
  }
  console.log('Connected to MySQL as id ' + db.threadId);
});

app.use(express.json());

// Middleware for API key authentication
function authenticateApiKey(req, res, next) {
  const apiKey = req.header('X-API-Key'); // Assuming you use 'X-API-Key' as the header field

  if (!apiKey) {
    return res.status(401).json({ error: 'API key is missing' });
  }

  // Check the API key in the database
  const query = 'SELECT * FROM api_users WHERE apiKey = ?';
  db.query(query, [apiKey], (error, results) => {
    if (error) {
      return res.status(500).json({ error: 'Database query error' });
    }

    if (results.length === 0) {
      return res.status(401).json({ error: 'Invalid API key' });
    }

    // Attach user information to the request for further processing
    req.user = results[0];
    next();
  });
}

// Protected routes with API key authentication
app.use('/users', authenticateApiKey);

// Fetch all users
app.get('/users', (req, res) => {
  const query = 'SELECT * FROM users_api';
  db.query(query, (err, results) => {
    if (err) {
      res.status(500).json({ message: err.message });
      return;
    }
    res.json(results);
  });
});

// Fetch all users by id
app.get('/users/:id', (req, res) => {
  // This route is now protected with API key authentication
  const userId = req.params.id;
  const query = 'SELECT * FROM users_api WHERE id=?';
  db.query(query, [userId], (err, results) => {
    if (err) {
      res.status(500).json({ message: err.message });
      return;
    }
    res.json(results);
  });
});

// Fetch all users by gender
app.get('/users/gender/:gender', (req, res) => {
  // This route is now protected with API key authentication
  const userGender = req.params.gender;
  const query = 'SELECT * FROM users_api WHERE gender=?';
  db.query(query, [userGender], (err, results) => {
    if (err) {
      res.status(500).json({ message: err.message });
      return;
    }
    res.json(results);
  });
});

// Fetch users by specific purchase
app.get('/users/purchase/:purchase', (req, res) => {
  // This route is now protected with API key authentication
  const specificPurchase = req.params.purchase;
  const query = 'SELECT * FROM users_api WHERE purchase=?';
  db.query(query, [specificPurchase], (err, results) => {
    if (err) {
      res.status(500).json({ message: err.message });
      return;
    }
    res.json(results);
  });
});

// Fetch users by purchase date
app.get('/users/purchasedate/:date', (req, res) => {
  // This route is now protected with API key authentication
  const purchaseDate = req.params.date;
  const query = 'SELECT * FROM users_api WHERE purchase_date=?';
  db.query(query, [purchaseDate], (err, results) => {
    if (err) {
      res.status(500).json({ message: err.message });
      return;
    }
    res.json(results);
  });
});

// Fetch users by last login time
app.get('/users/lastlogin/:time', (req, res) => {
  // This route is now protected with API key authentication
  const lastLoginTime = req.params.time;
  const query = 'SELECT * FROM users_api WHERE last_login=?';
  db.query(query, [lastLoginTime], (err, results) => {
    if (err) {
      res.status(500).json({ message: err.message });
      return;
    }
    res.json(results);
  });
});

app.listen(port, () => {
  console.log(`Server is running at http://localhost:${port}`);
});
