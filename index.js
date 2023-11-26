const express = require('express');
const mysql = require('mysql');

const app = express();
const port = 8080;

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
  const apiKey = req.header('X-API-Key');

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

// Fetch all drugs
app.get('/drugs', (req, res) => {
  const query = 'SELECT * FROM drug';
  db.query(query, (err, results)=>{
    if (err) {
      res.status(500).json({message: err.message});
      return;
    }
    res.json(results);
  });
});

// Fetch all drugs by id
app.get('/drugs/:id', (req, res) => {
  const drugId = req.params.id;
  const query = 'SELECT * FROM drug WHERE id=?';
  db.query(query, [drugId], (err, results)=>{
    if (err) {
      res.status(500).json({message: err.message});
      return;
    }
    res.json(results);
  });
});

// Fetch drugs by category
app.get('/drugs/category/:category', (req, res) => {
  const drugCategory = req.params.category;
  const query = 'SELECT * FROM drug WHERE category=?';
  db.query(query, [drugCategory], (err, results) => {
    if (err) {
      res.status(500).json({ message: err.message });
      return;
    }
    res.json(results);
  });
});

app.use('/secure/drugs/purchased/:user', authenticateApiKey);
// Fetch drugs according to the user who purchased them with API key authentication
app.get('/secure/drugs/purchased/:user', /*authenticateApiKey,*/(req, res) => {
  const purchasedByUser = req.params.user;
  const query = 'SELECT * FROM drug WHERE user = ?';
  db.query(query, [purchasedByUser], (err, results) => {
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