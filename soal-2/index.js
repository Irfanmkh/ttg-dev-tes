const express = require('express');
const mysql = require('mysql2');

// Inisialisasi Express
const app = express();
app.use(express.json());

// Koneksi db
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'node_api',
  port: 3308,
});

// Cek koneksi
db.connect((err) => {
  if (err) {
    console.error('koneksi db gagal:', err);
    return;
  }
  console.log('koneksi db berhasil');
});

// post
app.post('/users', (req, res) => {
  const { nama, email } = req.body;

  // Validasi
  if (!nama || !email) {
    return res.status(400).json({ message: 'nama dan Email harus diisi!' });
  }

  // cek email unik
  db.query('SELECT * FROM users WHERE email = ?', [email], (err, results) => {
    if (results.length > 0) {
      return res.status(409).json({ message: 'Email sudah digunakan!' });
    }

    // insert user
    const sql = 'INSERT INTO users (nama, email) VALUES (?, ?)';
    db.query(sql, [nama, email], (err, result) => {
      if (err) throw err;
      res.status(201).json({
        message: 'User berhasil ditambahkan',
        userId: result.insertId,
      });
    });
  });
});

// get all
app.get('/users', (req, res) => {
  db.query('SELECT * FROM users', (err, results) => {
    if (err) throw err;
    res.json(results);
  });
});

// get berdasarkan id
app.get('/users/:id', (req, res) => {
  const { id } = req.params;

  db.query('SELECT * FROM users WHERE id = ?', [id], (err, results) => {
    if (err) throw err;

    if (results.length === 0) {
      return res.status(404).json({ message: 'User tidak ditemukan' });
    }

    res.json(results[0]);
  });
});

// delete berdasarkan id
app.delete('/users/:id', (req, res) => {
  const { id } = req.params;

  db.query('DELETE FROM users WHERE id = ?', [id], (err, result) => {
    if (err) throw err;

    if (result.affectedRows === 0) {
      return res.status(404).json({ message: 'User tidak ditemukan' });
    }

    res.json({ message: 'User berhasil dihapus' });
  });
});

// server
app.listen(3000, () => {
  console.log('Server berjalan di http://localhost:3000');
});
