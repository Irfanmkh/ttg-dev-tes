## CARA MENJALANKAN PROGRAM

1. Install dependencies
   ```npm
   npm install
2. Buat database MySQL
- Buat database dengan nama node_api (atau bisa sesuaikan di index.js)
- Gunakan port 3308 (atau bisa sesuaikan di index.js)
- buat tabel users :
```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    email VARCHAR(100)
);
```
3. Jalankan server
   ```node
   node index.js
   ```
   & Server akan berjalan di:
```
   http://localhost:3000
```
## Test API menggunakan Postman 

1. Buat workspace baru
2. Pilih method sesuai kebutuhan
```
(POST/GET/DELETE)
```

## create data:
  - Method: POST
  - endpoint/URL : http://localhost:3000/users
  - Body → raw
  - Format → JSON
```json
 {
  "nama": "Irfan",
  "email": "irfan@example.com"
  } 
```
lalu Send
## get semua data
 ```
  Method: GET
  endpoint : http://localhost:3000/users/
```
##  get data berdasarkan id
```
  Method: GET
  endpoint : http://localhost:3000/users/id 
```
- contoh ambil data dengan id = 1 : 
```
http://localhost:3000/users/1
```
##  delete data berdasarkan id
```
  Method: DELETE
endpoint : http://localhost:3000/users/id 
```
- contoh delete data dengan id = 1 : 
```
http://localhost:3000/users/1
```

