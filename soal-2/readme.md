#CARA MENJALANKAN PROGRAM

1. Clone repository
   git clone https://github.com/irfanmkh/node_api
2. Masuk ke folder Soal-2
3. Install dependencies
   npm install
4. Buat database MySQL
   Buat database dengan nama node_api (atau bisa sesuaikan di index.js)
   Gunakan port 3308 (atau bisa sesuaikan di index.js)
   buat tabel users :
   CREATE TABLE users (
   id INT AUTO_INCREMENT PRIMARY KEY,
   nama VARCHAR(100),
   email VARCHAR(100)
   );

5. Jalankan server
   node index.js & Server akan berjalan di: http://localhost:3000

-- Test API menggunakan Postman --

1. Buat workspace baru
2. Pilih method sesuai kebutuhan (POST/GET/DELETE)

- Untuk create data:
  Method: POST
  endpoint/URL : http://localhost:3000/users
  Body → raw
  Format → JSON
  Isi dengan contoh:
  {
  "nama": "Irfan",
  "email": "irfan@example.com"
  } send

- untuk get semua data
  Method: GET
  endpoint : http://localhost:3000/users/

- untuk get data berdasarkan id
  Method: GET
  endpoint : http://localhost:3000/users/id | contoh : (http://localhost:3000/users/1) untuk ambil data dengan id = 1

- untuk delete data berdasarkan id
  Method: DELETE endpoint : http://localhost:3000/users/id | contoh : (http://localhost:3000/users/1) untuk delete data dengan id = 1
